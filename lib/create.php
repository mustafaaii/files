<?php

global $jal_db_version;
$jal_db_version = '1.0';

function file_list()
{
    global $wpdb;
    global $jal_db_version;

    $table_name = $wpdb->prefix . 'file_list';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
		id int(11) NOT NULL AUTO_INCREMENT,
		filename VARCHAR(500) DEFAULT '' NOT NULL,
        cate_name VARCHAR(500) DEFAULT '' NOT NULL,
        cate_id VARCHAR(500) DEFAULT '' NOT NULL,
		filetype VARCHAR(100) DEFAULT '' NOT NULL,
        filesize VARCHAR(100) DEFAULT '' NOT NULL,
		filedate VARCHAR(100) DEFAULT '' NOT NULL,
		byname VARCHAR(400) DEFAULT '' NOT NULL,
        byid VARCHAR(1000) DEFAULT '' NOT NULL,
        fileurl VARCHAR(800) DEFAULT '' NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
    add_option('jal_db_version', $jal_db_version);
}

function log_list()
{
    global $wpdb;
    global $jal_db_version;

    $table_name = $wpdb->prefix . 'log_list';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
		id int(11) NOT NULL AUTO_INCREMENT,
		log_text VARCHAR(500) DEFAULT '' NOT NULL,
        log_stat VARCHAR(500) DEFAULT '' NOT NULL,
        log_date VARCHAR(500) DEFAULT '' NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
    add_option('jal_db_version', $jal_db_version);
}

function file_categories()
{
    global $wpdb;
    global $jal_db_version;

    $table_name = $wpdb->prefix . 'file_category';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
		id int(11) NOT NULL AUTO_INCREMENT,
		category VARCHAR(500) DEFAULT '' NOT NULL,
        category_auth VARCHAR(500) DEFAULT '' NOT NULL,
        category_create_date VARCHAR(500) DEFAULT '' NOT NULL,
        category_update_date VARCHAR(500) DEFAULT '' NOT NULL,
        category_text TEXT DEFAULT '' NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
    add_option('jal_db_version', $jal_db_version);
}
