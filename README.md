# SIMPLE ROUTER
## Connection 
____
1. First, add the following lines to `.htaccess` file:
```
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule . index.php [L]
```
2. Connect the file `Router.php` and create its object:
```php
require_once "Router.php";
$rout = new Router();
```
## Using 
___
1. To set connection paths, call the set `setRout` method:
```php
$rout->setRout("path", "include", "title");
```
2. Set the 404 page using the `setNotFoundPage` method:
```php
$rout->setNotFoundPage("notFoundPage", "notFoundTitle");
```
3. Use the `getPage` method to get the current page:
```php
$path = $rout->getPage();
```
4. Use the `getTitle` method to get the page title:
```php
$rout->getTitle()
```
## Example
____
```php
<?php
require_once "Router.php";

$rout = new Router();
$rout->setRout('/', 'main.php', "Главная страница");
$rout->setRout('/about', 'about.php', "О нас");
$rout->setNotFoundPage('404.php', "Страница не найдена");
$path = $rout->getPage();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $rout->getTitle() ?></title>
</head>
<body>
<?php require_once $path;?>
</body>
</html>

```