# Blocks for CiviCRM
Contributors: bastho, aureliefoucher  
Donate link: https://apps.avecnous.eu/en/product/blocks-for-civicrm/?mtm_campaign=wp-plugin&mtm_kwd=blocks-for-civicrm&mtm_medium=wp-repo&mtm_source=donate 
Tags: civicrm, block, gutenberg, crm  
Requires at least: 5.4  
Tested up to: 6.5  
Stable tag: 1.4.1  
License: GPLv2  
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Gutenberg block in place of CiviCRM shortcode

## Description

CiviCRM uses shortcode in order to insert dynamic content into WordPress pages, such as Petition, Survey, Contribution form, Membership…

As mentioned into the [CiviCRM documentation](https://docs.civicrm.org/sysadmin/en/latest/integration/wordpress/):
"Currently there is no specific CiviCRM block for Gutenberg so there is no interactive way to see the options available for the shortcode.
You will need to know the format and look up IDs and options in CiviCRM before creating the shortcode in WordPress."

Knowing an object ID is not very convenient. So we've made a plugin which uses the CiviCRM API to get and display all attributes for the shortcode, directly in a simple block.

This way, embedding CiviCRM content into any WordPress page becomes a child's play!

## Installation

1. Install, activate and configure CiviCRM (if not done yet)
2. Install and activate **Blocks for CiviCRM** as any plugin
3. In the editor, search the block "CiviCRM Component"



## Changelog

## 1.4.1

- Fix version propagation

### 1.4.0

- Add preview in editor
- Test if CiviCRM is activated before loading its options
- Load after `plugins_loaded` hook
- Uses composer autoload
- Uses wp_add_inline_script to pass options to the block
- Update all dependencies to latest version
    - wordpress/block-editor v12.14.0
    - wordpress/blocks v12.23.0
    - wordpress/components v25.12.0
    - wordpress/element v5.23.0
    - wordpress/hooks v3.46.0
    - wordpress/i18n v4.46.0
    - wordpress/server-side-render v4.23.0
    - wp-reporting v1.6

### 1.3.4

- Update wp-reporting to v1.5.1, fix WP Notices about scripts

### 1.3.3

- Update wp-reporting to v1.5

### 1.3.2

- Fix "Undefined array key className" warning. 
- Update wp-reporting to v1.4

### 1.3.1

- Let CiviCRM call its generated shortcode
- Update wp-reporting to v1.3

### 1.3.0

- Cleanup shortcode attributes (only keep those CiviCRM understands)
- Set default value for mode & hijack
- Update NPM dependencies

### 1.2.0

- Removes limit of options
- Uses CiviCRM API4 when possible
- Remove some PHP8+ deprecated warnings

### 1.1.2

- Fix Parse error on PHP7.4

### 1.1.1

- Fix Parse error on PHP7.4

### 1.1.0

- Refactor: use latest version of blocks library
- Wrap output into a div. Allows editor to add CSS classes
- Add error log report option

### 1.0.0

-  Initial release

### Upgrade notice

No particular informations
