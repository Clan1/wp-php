<?php
/**
 * @package TurismoInsert
 */
/*
Plugin Name: Tourism Management
Plugin URI: https://www.clarizia.com/ostuni
Description: Plugin realizzato da <b>Angelo Clarizia</b> per gestire il back-end di Ostuni.it
Version: 1.2
Requires at least: 6.4
Requires PHP: 5.6.20
Author: Angelo Clarizia
Author URI: https://www.clarizia.com/ostuni
License: All Rights Reserved
Text Domain: Ostuni.it
*/

// Funzione per creare tabelle nel database
function mpdp_create_tables() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $table1 = $wpdb->prefix . 'table1';
    $table2 = $wpdb->prefix . 'table2';
    $table3 = $wpdb->prefix . 'table3';

    $sql = "CREATE TABLE $table1 (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        image1 varchar(255),
        image2 varchar(255),
        image3 varchar(255),
        image4 varchar(255),
        image5 varchar(255),
        text1 text,
        text2 text,
        text3 text,
        text4 text,
        text5 text,
        dropdown varchar(255),
        checkbox boolean,
        url varchar(255),
        PRIMARY KEY (id)
    ) $charset_collate;
    CREATE TABLE $table2 LIKE $table1;
    CREATE TABLE $table3 LIKE $table1;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'mpdp_create_tables');

// Funzione per aggiungere il menu di amministrazione
function mpdp_admin_menu() {
    add_menu_page(
        'Multi Page Data Plugin', // Titolo della pagina
        'Multi Page Data', // Titolo del menu
        'manage_options', // Capacità
        'mpdp-main-menu', // Slug
        'mpdp_page_1', // Funzione di callback
        'dashicons-admin-generic', // Icona
        6 // Posizione
    );

    add_submenu_page(
        'mpdp-main-menu',
        'Page 1',
        'Page 1',
        'manage_options',
        'mpdp-page-1',
        'mpdp_page_1'
    );

    add_submenu_page(
        'mpdp-main-menu',
        'Page 2',
        'Page 2',
        'manage_options',
        'mpdp-page-2',
        'mpdp_page_2'
    );

    add_submenu_page(
        'mpdp-main-menu',
        'Page 3',
        'Page 3',
        'manage_options',
        'mpdp-page-3',
        'mpdp_page_3'
    );
}
add_action('admin_menu', 'mpdp_admin_menu');

// Funzioni di callback per le pagine amministrative
function mpdp_page_1() {
    include plugin_dir_path(__FILE__) . 'luoghi.php';
}

function mpdp_page_2() {
    include plugin_dir_path(__FILE__) . 'dormire.php';
}

function mpdp_page_3() {
    include plugin_dir_path(__FILE__) . 'food.php';
}

// Funzione per gestire il caricamento dei file JS e CSS
function mpdp_admin_scripts() {
    wp_enqueue_media();
    //wp_enqueue_style('mcp_admin_css', plugins_url('/css/style.css', __FILE__));
    wp_enqueue_script('mpdp-script', plugin_dir_url(__FILE__) . '/js/script.js', array('jquery'), '1.0', true);
}
add_action('admin_enqueue_scripts', 'mpdp_admin_scripts');
