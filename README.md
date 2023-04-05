# Ziva Nada Church Website

This code is currently in development as part of my senior project. The final product will be a fully functional website for the Ziva Nada church in Split, Croatia.

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
define('MY_EMAIL', 'senders (most likely your) email here');
?>

```
* The "APP_PASS" from the step above is used by Gmail to send the email when someone forgets their password. To create it:
    * Go to your Google Account settings.
    * From there choose Security, and then set up two-step verification.
    * Then under the section titled "Signing into Google", choose "App passwords."
    * It will then direct you on how to set up an app password, which you will then paste in the **config.inc.php** file you created in the step above.

## Installing Dependencies
----
* The final step will be to download the dependencies
* First off, to be able to add dependencies to your php, download composer [here](https://getcomposer.org/download/).
* Then, at the top level of your folder, create a valid json called composer.json.
* Finally, run these commands:
```powershell
composer config
composer require phpmailer/phpmailer
```


