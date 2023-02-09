# Ziva Nada Church Website

## Usage
----

* First, install XAMPP for your device at this link [here](https://www.apachefriends.org/download.html?/).
* Next, navigate to wherever you set up your XAMPP folder (this would be in your C drive on windows by default), and find a folder named **htdocs**.
* Then, clone this repository with the destination being within the htdocs folder.
* After this, open [phpmyadmin](localhost/phpmyadmin/index.php), and then import the file **tables.sql** (located with the rest of the files cloned).
* Next create a file called **config.inc.php** within the "Protected" folder with these contents:
```php
<?php 
define('DBHOST', 'your host here');
define('DBNAME', 'your database name');
define('DBUSER', 'your user here');
define('DBPASS', 'your password here');
define('DBCONNSTRING', "mysql:host=". DBHOST. ";dbname=". DBNAME);
define('SITE_ROOT', "your site root here");
define('APP_PASS', 'your app pass from Gmail here');
?>

```
* The app pass for Gmail is used to send the email when someone forgets their password. To create it:
    * Do this
    * Then this
* The final step will be to download the dependencies by running these two commands:
```powershell
npm -i --save composer
composer config
php composer.phar update
composer require phpmailer/phpmailer

npm -i jest --save-dev

```


