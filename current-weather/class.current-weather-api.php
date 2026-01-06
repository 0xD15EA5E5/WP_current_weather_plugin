<?php

class Markweather_api {

    private $API_KEY;
    private $LAT;
    private $LON;
    private $cache_key = 'weather_data';
    
    function get_current_weather(){
        $weather_data = get_transient($this->cache_key);
        
        if( false === $weather_data){
            $this->API_KEY = get_option('currentweather-apikey');
            $this->LAT = get_option('currentweather-lat');
            $this->LON = get_option('currentweather-lon');
            $url = 'https://api.openweathermap.org/data/2.5/weather?lat='.$this->LAT.'&lon='.$this->LON.'&appid='.$this->API_KEY.'&units=metric';
            $args = array();
            $response = wp_remote_get($url, $args);
            $weather_data = $response["body"];
            set_transient($this->cache_key, $weather_data, 1 * HOUR_IN_SECONDS);
        }
        
        return $weather_data;
    }
}