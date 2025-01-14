<?php
final class FileGetContentsCurl
{
    static private $ch;

    static function get($url, $header = 0, $user_agent = null): bool|string
    {
        self::$ch = curl_init();
        $ch = self::$ch;

        curl_setopt($ch, CURLOPT_HEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    static function getFinalUrl()
    {
        return curl_getinfo(self::$ch, CURLINFO_EFFECTIVE_URL);
    }
}