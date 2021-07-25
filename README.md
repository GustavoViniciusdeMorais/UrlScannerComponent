# Gustavo Morais URL's Scanner

This component validates if an url is responding correctly

## Installation

```bash
composer require gustavomorais/scannerurls
```

## Usage 1

```php
use Gustavo\Morais\Url\Scanner;

$urls = [
    "https://jsonplaceholder.typicode.com/posts",
    "http://localhost:8000/api/posts",
    "https://jsonplaceholder.typicode.com/todos"
];
$scanner = new Scanner($urls);
print_r(json_encode($scanner->validateUrls()));
```
## Usage 2

```php
require 'vendor/autoload.php';

$urls = [
    "https://jsonplaceholder.typicode.com/posts",
    "http://localhost:8000/api/posts",
    "https://jsonplaceholder.typicode.com/todos"
];
$scanner = new Gustavo\Morais\Url\Scanner($urls);
print_r(json_encode($scanner->validateUrls()));
```

## License
[MIT](https://choosealicense.com/licenses/mit/)