#!/usr/bin/env php
<?php
/**
 * A utility to create JSON configuration files for jQuery JavaScriptResource objects
 * that use the jQuery CDN for the src attribute
 *
 * @package FlossJS/jQuery
 * @author  Alice Wonder <paypal@domblogger.net>
 * @license https://opensource.org/licenses/MIT MIT
 * @link    https://github.com/AliceWonderMiscreations/jQuery
 */

$confdir = dirname(dirname(__FILE__)) . '/etc';

if (! $files = scandir($confdir)) {
    echo "Could not located configuration directory, exiting\n";
    return(1);
}

foreach ($files as $file) {
    $suffix = substr($file, -5);
    if ($suffix === '.dist') {
        $dist = $confdir . '/' . $file;
        $new = $confdir . '/' . preg_replace('/\.dist$/', '', $file);
        if ($STRING = file_get_contents($dist)) {
            if ($json = json_decode($STRING)) {
                if ($json->name === 'jquery') {
                    $srcurl = preg_replace('/\/js/', 'https://code.jquery.com', $json->srcurl);
                    $json->srcurl = $srcurl;
                    $STRING = json_encode($json, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
                    if ($handle = @fopen($new, 'w')) {
                        fwrite($handle, $STRING);
                        fclose($handle);
                    } else {
                        echo "\nCan not create file " . $new . "\n";
                    }
                }
            }
        }
    }
}

?>