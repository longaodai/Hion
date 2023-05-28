<?php

if (!function_exists('env')) {
    /**
     * Register function support help get env
     *
     * @param String $key
     * @param String $default
     * 
     * @return String
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    function env($key, $default = null)
    {
        $envFilePath = __DIR__ . '/../../.env';

        if (file_exists($envFilePath)) {
            $envContent = file_get_contents($envFilePath);
            $lines = explode("\n", $envContent);

            foreach ($lines as $line) {
                list($keyEnv, $valueEnv) = explode('=', $line, 2);

                if (!empty($keyEnv) && $keyEnv === $key) {
                    return trim($valueEnv);
                }
            }
        }

        return $default;
    }
}
