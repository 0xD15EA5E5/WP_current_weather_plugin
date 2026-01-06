<?php

class Markweather_Admin {
    public $options_group = 'currentweather';

    public static function settings_init() {
    
        add_settings_section(
            'currentweather_section_id',
            '', 
            '', 
            'currentweather'
        );

        register_setting('currentweather', 'currentweather-apikey');
        register_setting('currentweather', 'currentweather-lat');
        register_setting('currentweather', 'currentweather-lon');
        
        add_settings_field('currentweather-apikey', 'API key', array('Markweather_Admin','apikey_cb'), 'currentweather', 'currentweather_section_id');
        add_settings_field('currentweather-lat', 'Latitude', array('Markweather_Admin', 'lat_cb'), 'currentweather', 'currentweather_section_id');
        add_settings_field('currentweather-lon', 'Longitude', array('Markweather_Admin','lon_cb'), 'currentweather', 'currentweather_section_id');
    }

    function apikey_cb($args){
        $value = get_option('currentweather-apikey');
        printf('<input type="text" name="currentweather-apikey" value="'.$value.'"/>');
    }

    function lat_cb($args){
        $value = get_option('currentweather-lat');
        printf('<input type="text" name="currentweather-lat" value="'.$value.'"/>');
    }
    
    function lon_cb($args){
        $value = get_option('currentweather-lon');
        printf('<input type="text" name="currentweather-lon" value="'.$value.'"/>');
    }


    function currentweather_options_page() {
        add_submenu_page(
            'options-general.php',
            'Current Weather Options',
            'Current Weather',
            'manage_options',
            'currentweather',
            array('Markweather_Admin','currentweather_options_page_html')
        );
    }

    function currentweather_options_page_html() {
        if ( ! current_user_can('manage_options')) {
            return;
        }
        ?>
        <div class="wrap">
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
            <form action="options.php" method="post">
                <?php
                settings_fields( 'currentweather' );
                do_settings_sections( 'currentweather' );
                submit_button( 'Save Settings' );
                ?>
            </form>
    	</div>
        <?php
    }

}