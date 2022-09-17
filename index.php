<?php
/*
Plugin Name: Glowres | Filer
Plugin URI: https://glowres.com/
Description: This plugin is developed by glowres.
Version: 2.0
Author: Mustafa Işık
License: GNU
*/

require "lib/create.php";
register_activation_hook(__FILE__, 'log_list');
register_activation_hook(__FILE__, 'file_list');
register_activation_hook(__FILE__, 'file_categories');



function style()
{
    wp_enqueue_style('file_css', plugins_url('assets/css/style.app.css', __FILE__), '', '1.0');
    wp_enqueue_style('font_awesome_all', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css', '', '6.2.0');
    wp_enqueue_style('font_awesome_brands', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/brands.min.css', '', '6.2.0');
    wp_enqueue_style('font_awesome_regular', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/regular.min.css', '', '6.2.0');
    wp_enqueue_style('font_awesome_solid', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/solid.min.css', '', '6.2.0');
}

function script()
{
    wp_enqueue_script('file_url', plugins_url('assets/js/url.js', __FILE__), '', '1.0');
    wp_enqueue_script('file_tabs', plugins_url('assets/js/tabs.js', __FILE__), '', '1.0');
    wp_enqueue_script('file_sweetalert', 'https://unpkg.com/sweetalert/dist/sweetalert.min.js', '', '1.0');
    wp_enqueue_script('dash_logs', plugins_url('assets/js/logs.js', __FILE__), '', '1.0');
}

add_action('admin_menu', 'glowres_file');
function glowres_file()
{
    add_menu_page('Glowres File', 'Glowres File', 'manage_options', 'glowfile', 'glowfile', 'dashicons-portfolio',);
    add_submenu_page('glowfile', 'Dashboard', 'Dashboard', 'manage_options', 'glowfile', 'glowfile');
    add_submenu_page('glowfile', 'File List', 'File List', 'manage_options', 'filelist', 'filelist');
    add_submenu_page('glowfile', 'Category', 'Category', 'manage_options', 'filecategory', 'filecategory');
    add_submenu_page('glowfile', 'Settings', 'Settings', 'manage_options', 'filesettings', 'filesettings');
    add_submenu_page('glowfile', 'Activate', 'Activate', 'manage_options', 'fileactivate', 'fileactivate');
    add_submenu_page('glowfile', 'Connect', 'Connect', 'manage_options', 'fileconnect', 'fileconnect');
    add_submenu_page('glowfile', 'Plugins', 'Plugins', 'manage_options', 'fileplugins', 'fileplugins');
}

function glowfile()
{
    style();
    include "components/header.php";
    include "components/tabs.php";
    include "pages/glowres.php";
    script();
    wp_enqueue_script('file_list', plugins_url('assets/js/dash.js', __FILE__), '', '1.0');

}

function filelist()
{
    style();
    include "components/header.php";
    include "components/tabs.php";
    include "pages/list.php";
    script();
    wp_enqueue_script('file_list', plugins_url('assets/js/file.js', __FILE__), '', '1.0');
}

function filecategory()
{
    style();
    include "components/header.php";
    include "components/tabs.php";
    include "pages/category.php";
    script();
    wp_enqueue_script('file_category', plugins_url('assets/js/category.js', __FILE__), '', '1.0');
}

function filesettings()
{
    style();
    include "components/header.php";
    include "components/tabs.php";
    include "pages/settings.php";
    script();
}

function fileconnect()
{
    style();
    include "components/header.php";
    include "components/tabs.php";
    include "pages/connect.php";
    script();
}


function fileplugins()
{
    style();
    include "components/header.php";
    include "components/tabs.php";
    include "pages/plugins.php";
    script();
}
