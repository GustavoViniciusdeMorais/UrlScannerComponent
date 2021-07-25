<?php
require_once "src/Url/Scanner.php";
require 'vendor/autoload.php';

use Gustavo\Morais\Url\Scanner;

$urls = [
    "https://jsonplaceholder.typicode.com/posts",
    "http://localhost:8000/api/posts",
    "https://jsonplaceholder.typicode.com/todos"
];
$scanner = new Scanner($urls);
print_r(json_encode($scanner->validateUrls()));