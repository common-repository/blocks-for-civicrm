<?php
/*
 * Plugin Name: Blocks for CiviCRM
 * Plugin URI: https://apps.avecnous.eu/en/product/blocks-for-civicrm/?mtm_campaign=wp-plugin&mtm_kwd=blocks-for-civicrm&mtm_medium=dashboard&mtm_source=plugin
 * Description: Gutenberg block in place of CiviCRM shortcode
 * Version: 1.4.1
 * Author: NOUS Open Useful and Simple
 * Contributor: Bastien Ho, Sabrina Leroy, Florian Lecocq, Aurelie Foucher
 * Author URI: https://apps.avecnous.eu/?mtm_campaign=wp-plugin&mtm_kwd=blocks-for-civicrm&mtm_medium=dashboard&mtm_source=author
 * Text Domain: blocks-for-civicrm
 * Domain Path: languages/
 */

add_action ('plugins_loaded', function(){
     require plugin_dir_path(__FILE__).'vendor/autoload.php';
     \WPReporting()->register('blocks-for-civicrm', [
         'label' => __('Blocks for CiviCRM', 'blocks-for-civicrm'),
         'description' => __('Help us to improve this plugin. Send logs when a bug occurs.', 'blocks-for-civicrm'),
         'category' => 'plugin',
         'to' => 'am91cm5hbGlzZXIrMjM5QGF2ZWNub3VzLmV1',
         'only_in_dir' => __DIR__,
     ]);
     include_once plugin_dir_path(__FILE__) . 'inc/block_civicrm.php';
});
