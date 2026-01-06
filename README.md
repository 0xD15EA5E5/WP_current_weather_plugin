# WP_current_weather_plugin
A WordPress plugin that displays the current weather via a short code with cached API data

Requirements:<br/>
An OpenWeathermap.org API key for the Current weather API these can be generated here https://home.openweathermap.org/api_keys

Installation:<br/>
Copy the current_weather folder into the wp-content/plugins folder of your wordpress instance.
Enable the plugin in the admin panel by opening the Plugins menu in the left sidebar and clicking enable on the "Current weather - Coding test" plugin

Setup:<br/>
Before use the API key needs to be set, this can be set in the Settings menu in the left sidebar in the Current Weather submenu.

Usage:<br/>
The Current weather will be shown with the [weather_widget city="{City name}"] shortcode
