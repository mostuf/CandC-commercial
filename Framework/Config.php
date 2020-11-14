<?php
    class Config
    {
        public static function getConfig($file = "config")
        {
            return json_decode(file_get_contents("ConfigFile/" . $file . ".json"));
        }

    }