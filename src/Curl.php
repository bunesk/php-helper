<?php

declare(strict_types=1);

namespace Bunesk\PhpHelper;

class Curl
{
    /**
     * Executes a curl request.
     * Returns an array with the structure:
     * [success => boolean, data => string]
     *
     * @param string $url
     * @param array $options
     * @return string|bool)[] result
     */
    public static function execute(string $url, array $options = [])
    {
        if (empty($options)) {
            $options = [CURLOPT_HEADER => 0];
        }

        $curl = \curl_init();

        \curl_setopt($curl, CURLOPT_URL, $url);
        \curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        \curl_setopt_array($curl, $options);

        $result = \curl_exec($curl);

        if ($result === false) {
            return [
                'success' => false,
                'data'    => '',
            ];
        }

        \curl_close($curl);

        return [
            'success' => true,
            'data'    => $result,
        ];
    }
}
