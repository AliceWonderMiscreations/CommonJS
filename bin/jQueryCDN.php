#!/usr/bin/env php
<?php

$confdir = dirname( dirname(__FILE__) ) . '/etc';

$files = scandir($confdir);

foreach($files as $file) {
  $suffix = substr($file, -5);
  if($suffix === '.dist') {
    $dist = $confdir . '/' . $file;
    $new = $confdir . '/' . preg_replace('/\.dist$/', '', $file);
    if($STRING = file_get_contents($dist)) {
      if($json = json_decode($STRING)) {
        if($json->name === 'jquery') {
          $srcurl = preg_replace('/\/js/', 'https://code.jquery.com', $json->srcurl);
          $json->srcurl = $srcurl;
          $STRING = json_encode($json, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
          if($handle = @fopen($new, 'w')) {
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