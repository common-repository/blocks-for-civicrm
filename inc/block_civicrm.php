<?php
/**
 * Blocks for CiviCRM in WordPress
 * 
 * @package BlocksForCiviCRM
 * @version 1.4.1
 * @since 1.0.0
 * 
 */

add_action( 'init',  function(){
    if ( ! function_exists( 'register_block_type' ) ) {
        return;
    }
    if(!function_exists('civi_wp')){
        add_action( 'admin_notices', function(){
            echo '<div class="notice notice-warning"><p>'.__('Activating blocks for CiviCRM without CiviCRM does not make sens.', 'blocks-for-civicrm').'</p></div>';
        });
        return;
    }
    if (!civi_wp()->initialize()) {
        return;
    }

    wp_register_script(
        'block-civicrm',
        plugins_url('build/civicrm/index.js', __DIR__ ),
        ['wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n', 'wp-core-data'],
        filemtime(plugin_dir_path(__DIR__).'build/civicrm/index.js')
    );

    register_block_type( plugin_dir_path(__DIR__).'build/civicrm', array(
        'editor_script' => 'block-civicrm',
        'render_callback' => 'block_civicrm',
    ) );
} );

add_action ('enqueue_block_editor_assets', function(){
    \WPReporting()->listen('blocks-for-civicrm');
    if(!function_exists('civi_wp')){
        return;
    }
    try{
        if (!civi_wp()->initialize()) {
            return;
        }
        $CRM_Core_Form_ShortCode = new CRM_Core_Form_ShortCode();
        $CRM_Core_Form_ShortCode->preProcess();
        $components = $CRM_Core_Form_ShortCode->components;
        $options = $CRM_Core_Form_ShortCode->options;
    
        $id_options = [];
        if(function_exists('civicrm_api4') || function_exists('civicrm_api3')){
            foreach($components as $component_id=>$component){
                if($component['select'] !== null){
                    $id_options[$component_id] = [
                        [
                            'label' => '',
                            'value' => '',
                        ],
                    ];
                    $idSelect = $component['select'];
                    $result_count = 0;
                    $result_values = [];

                    if(function_exists('civicrm_api4')){
                        $api_data = [
                            'select'=>[
                                'id', 
                                'title'
                            ],
                            'orderBy' => ['title' => 'ASC'],
                            'checkPermissions' => false,
                        ];
                        if($idSelect['entity'] == 'Pcp'){
                            $idSelect['entity'] = 'PCP';
                        }
                        $result = civicrm_api4($idSelect['entity'], 'get', $api_data);
                        $result_count = count($result);
                        $result_values = $result;
                    }
                    elseif(function_exists('civicrm_api3')){
                        $api_data = [
                            'return'=>'id, title',
                            'options' => [
                                'limit' => 0,
                                'sort' => 'title',
                            ],
                        ];
                        $result = civicrm_api3($idSelect['entity'], 'get', $api_data);
                        $result_count = $result['count'];
                        $result_values = $result['values'];
                    }

                    if($result_count){
                        foreach ($result_values as $item) {
                            $id_options[$component_id][] = [
                                'label' => $item['title'],
                                'value' => $item['id'],
                            ];
                        }
                    }
                }
            }
        }
    
        $option_labels = include __DIR__.'/options-labels.php';
        foreach ($options as $option) {
            $option_labels[$option['key']] = __(ucfirst($option['key']), 'blocks-for-civicrm');
        }
   
        wp_add_inline_script('blocks-for-civicrm-civicrm-editor-script', 'var block_civicrm = '.wp_json_encode([
            'i18n' => [
                'title'=>__('CiviCRM component', 'blocks-for-civicrm'),
                'description'=>__('Block for CiviCRM', 'blocks-for-civicrm'),
                'component'=>__('Component', 'blocks-for-civicrm'),
                'options'=>$option_labels,
            ],
            'components' => $components,
            'options' => $options,
            'id_options' => $id_options,
        ]), 'before');
    }
    catch(\Throwable $e){
        \WPReporting()->send($e, 'blocks-for-civicrm');
    }
    catch(\Exception $e){
        \WPReporting()->send($e, 'blocks-for-civicrm');
    }
    \WPReporting()->stop();
});

function block_civicrm($attributes, $content=''){
    if(is_admin()){
        return 'civicrm preview';
    }
    \WPReporting()->listen('blocks-for-civicrm');
    try{    
        $class_name = isset($attributes['className']) ? $attributes['className'] : '';
        $atts = $attributes;
        $shortcode_atts = '';
        $option_labels = include __DIR__.'/options-labels.php';
        foreach($attributes as $key=>$value){
            if(!isset($option_labels[$key]) || empty($value)){
                unset($attributes[$key]);
            }
            else{
                $shortcode_atts.=' '.$key.'="'.$value.'"';
            }
        }
        $shortcode = '[civicrm'.$shortcode_atts.']';
    }
    catch(\Throwable $e){
        \WPReporting()->send($e, 'blocks-for-civicrm');
    }
    catch(\Exception $e){
        \WPReporting()->send($e, 'blocks-for-civicrm');
    }
    \WPReporting()->stop();
    
    // If we are in editor preview context
    if (defined('REST_REQUEST') && REST_REQUEST && filter_input(INPUT_GET, 'context') === 'edit'){

        $post = get_post(filter_input(INPUT_GET, 'post_id', FILTER_SANITIZE_NUMBER_INT));
        // Preprocess Shortcode attributes.
        $args = \civi_wp()->shortcodes->preprocess_atts($attributes);

        // Check for pathless Shortcode.
        if (empty($args['q'])) {
            $content = '<p>' . __('This Shortcode could not be handled. It could be malformed or used incorrectly.', 'blocks-for-civicrm') . '</p>';
            return apply_filters('civicrm_shortcode_get_markup', $content, $atts, $args, 'single');
        }

        foreach ($args as $key => $value) {
            if ($value !== NULL) {
                set_query_var($key, $value);
                $_REQUEST[$key] = $_GET[$key] = $value;
            }
        }
                
        $argdata = explode('/', $args['q']);

        if (!\civi_wp()->shortcodes->civi->initialize()) {
            return 'Civi not initialized';
        }

        // Start buffering.
        ob_start();
        // Now, instead of echoing, Shortcode output ends up in buffer.
        \CRM_Core_Invoke::invoke($argdata);
        // Save the output and flush the buffer.
        $content = ob_get_clean();
        if(empty($content)){
            $content = $shortcode;
        }
        return $content;
    }
    return '<div class="block-civicrm '.esc_attr($class_name).'">'.$shortcode.'</div>';
}
