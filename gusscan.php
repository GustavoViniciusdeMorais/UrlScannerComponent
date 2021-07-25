<?php
// composer autoload
require 'vendor/autoload.php';

use League\Csv\Reader;

// initiate guzzle http client
$client = new \GuzzleHttp\Client();

if(!isset($argv[1])){
    return "argument is needed";
}

// open and iterate over CSV file
$csv = Reader::createFromPath($argv[1], 'r');

foreach($csv as $row){
    try {
        // send http option request
        $response = $client->options($row[0]);

        if($response->getStatusCode() >= 400){
            throw new \Exception('400 error returned');
        }
    } catch (\Throwable $th) {
        echo 'error: ' . $row[0] . PHP_EOL;
    }
}