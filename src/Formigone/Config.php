<?php

namespace Formigone;

class Config
{
    /** @var array */
    private $config;

    /** @var string */
    private $baseDir;

    public function __construct($env, $baseDir = '.')
    {

        $this->baseDir = $baseDir;
        $defaultConfig = $baseDir.'/config/default.json';
        $envConfig = $baseDir.'/config/'.$env.'.json';
        $config = [];

        if (file_exists($defaultConfig)) {
            $config['default'] = json_decode(file_get_contents($defaultConfig), true);
        }

        if (file_exists($envConfig)) {
            $config[$env] = json_decode(file_get_contents($envConfig), true);
        }

        $this->config = array_merge(
            array_key_exists('default', $config) ? $config['default'] : [],
            array_key_exists($env, $config) ? $config[$env] : []
        );
    }

    public function get($key = null, $def = null)
    {
        if ($key === null) {
            return $this->config;
        }

        $pieces = explode('.', $key);
        $path = $this->config;
        foreach($pieces as $level) {
            if (!array_key_exists($level, $path)) {
                return $def;
            }

            $path = $path[$level];
        }

        return $path;
    }
}
