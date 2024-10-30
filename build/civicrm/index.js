(()=>{"use strict";var __webpack_modules__={312:(__unused_webpack_module,__webpack_exports__,__webpack_require__)=>{__webpack_require__.d(__webpack_exports__,{Z:()=>Edit});var react__WEBPACK_IMPORTED_MODULE_0__=__webpack_require__(196),react__WEBPACK_IMPORTED_MODULE_0___default=__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__),_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__=__webpack_require__(175),_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default=__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__),_wordpress_element__WEBPACK_IMPORTED_MODULE_2__=__webpack_require__(307),_wordpress_element__WEBPACK_IMPORTED_MODULE_2___default=__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__),_wordpress_components__WEBPACK_IMPORTED_MODULE_3__=__webpack_require__(609),_wordpress_components__WEBPACK_IMPORTED_MODULE_3___default=__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__),_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__=__webpack_require__(736),_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4___default=__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__),_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_5__=__webpack_require__(423),_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_5___default=__webpack_require__.n(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_5__),withSelect=wp.data.withSelect,components_options=[];for(var component_id in block_civicrm.components)components_options.push({label:block_civicrm.components[component_id].label,value:component_id});var block_attributes={};for(var co in block_civicrm.options){var default_value=null;for(var o in block_civicrm.options[co].options)if(null===default_value){default_value=o;break}block_attributes[block_civicrm.options[co].key]={type:"string",default:default_value}}function Edit({className,attributes,setAttributes,isSelected}){const blockProps=(0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.useBlockProps)(),{component,id,gid,cid}=attributes,setComponent=_=>setAttributes({component:_}),setId={id:function(_){setAttributes({id:_,gid:"",cid:""})},gid:function(_){setAttributes({gid:_,id:"",cid:""})},cid:function(_){setAttributes({cid:_,gid:"",id:""})}};var idControl=null;if(void 0!==block_civicrm.id_options[component]){var idSelect=block_civicrm.components[component].select;idControl=(0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.TextControl,{label:idSelect.key,name:idSelect.key,onChange:setId[idSelect.key],value:attributes[idSelect.key]}),block_civicrm.id_options[component].length&&(idControl=(0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl,{label:block_civicrm.i18n.options[idSelect.key],name:idSelect.key,onChange:setId[idSelect.key],value:attributes[idSelect.key],options:block_civicrm.id_options[component]}))}function getControl(_,e){var t=[];for(var r in _.options)t.push({label:_.options[r],value:r});return(0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl,{label:block_civicrm.i18n.options[_.key],name:_.key,onChange:setOptions[_.key],value:e,options:t})}var setOptions=[],options=[];for(var co in block_civicrm.options)eval('setOptions["'+block_civicrm.options[co].key+'"] = '+block_civicrm.options[co].key+" => setAttributes({"+block_civicrm.options[co].key+"})"),(!0===block_civicrm.options[co].components||block_civicrm.options[co].components.indexOf(component)>-1)&&options.push(getControl(block_civicrm.options[co],attributes[block_civicrm.options[co].key]));var attrs="";for(var attr in attributes)""!=attributes[attr]&&void 0!==block_civicrm.i18n.options[attr]&&(attrs+=" "+attr+'="'+attributes[attr]+'"');var preview=null;try{preview=(0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_server_side_render__WEBPACK_IMPORTED_MODULE_5___default(),{block:"blocks-for-civicrm/civicrm",attributes})}catch{preview=(0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.Fragment,null,(0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("code",null,"There was an error rendering the shortcode"),(0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("code",null,"[civicrm ",attrs,"]"))}return(0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div",{...blockProps},(0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__.Fragment,null,(0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div",{class:"blocks-for-civicrm-preview"},(0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)("div",{sx:{"pointer-events":"none"}},preview)),isSelected&&(0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InspectorControls,null,(0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody,{title:(0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__.__)("CiviCRM")},(0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.SelectControl,{label:block_civicrm.i18n.component,name:"component",onChange:setComponent,value:component,options:components_options}),idControl),(0,react__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.PanelBody,{title:(0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__.__)("Options")},options))))}},196:_=>{_.exports=window.React},175:_=>{_.exports=window.wp.blockEditor},609:_=>{_.exports=window.wp.components},307:_=>{_.exports=window.wp.element},736:_=>{_.exports=window.wp.i18n},423:_=>{_.exports=window.wp.serverSideRender}},__webpack_module_cache__={};function __webpack_require__(_){var e=__webpack_module_cache__[_];if(void 0!==e)return e.exports;var t=__webpack_module_cache__[_]={exports:{}};return __webpack_modules__[_](t,t.exports,__webpack_require__),t.exports}__webpack_require__.n=_=>{var e=_&&_.__esModule?()=>_.default:()=>_;return __webpack_require__.d(e,{a:e}),e},__webpack_require__.d=(_,e)=>{for(var t in e)__webpack_require__.o(e,t)&&!__webpack_require__.o(_,t)&&Object.defineProperty(_,t,{enumerable:!0,get:e[t]})},__webpack_require__.o=(_,e)=>Object.prototype.hasOwnProperty.call(_,e);var __webpack_exports__={};(()=>{const _=window.wp.blocks;__webpack_require__(736);var e=__webpack_require__(312),t=__webpack_require__(196),r=__webpack_require__(307);(0,_.registerBlockType)("blocks-for-civicrm/civicrm",{edit:e.Z,save:function({attributes:_}){var e="";for(var o in _)""!=_[o]&&void 0!==block_civicrm.i18n.options[o]&&(e+=" "+o+'="'+_[o]+'"');return(0,t.createElement)(r.RawHTML,null,"[civicrm"+e+"]")}})})()})();