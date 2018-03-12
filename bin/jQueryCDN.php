#!/usr/bin/env php
<?php

$confdir = dirname( dirname(__FILE__) ) . '/etc';

//echo $confdir;

$files = scandir($confdir);

//var_dump($files);

foreach($files as $file) {
  $suffix = substr($file, -5);
  if($suffix === '.dist') {
    $dist = $confdir . '/' . $file;
    $new = $confdir . '/' . preg_replace('/\.dist$/', '', $file);
    var_dump($new);
    sleep(5);
    if($STRING = file_get_contents($dist)) {
      if($json = json_decode($STRING)) {
        if($json->name === 'jquery') {
          $srcurl = preg_replace('/\/js/', 'https://code.jquery.com', $json->srcurl);
          $json->srcurl = $srcurl;
          $STRING = json_encode($json, JSON_PRETTY_PRINT);
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