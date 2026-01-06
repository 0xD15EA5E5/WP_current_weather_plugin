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
        
        add_settings_field('currentweather-apikey', 'API key', array('Markweather_Admin','apikey_cb'), 'currentweather', 'currentweather_section_id');
    }

    function apikey_cb($args){
        $value = get_option('currentweather-apikey');
        printf('<input type="text" name="currentweather-apikey" value="'.$value.'"/>');
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