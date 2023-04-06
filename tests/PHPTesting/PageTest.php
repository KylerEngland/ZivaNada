<?php
require_once('protected/functions.inc.php');
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotEquals;

class PageTest extends \PHPUnit\Framework\TestCase{


    /*
    This test makes sure that when we try to translate the dogadaji.php page, that it redirects you to the vrijednosti.php page.
    */
    public function testRedirectionDogadaji(){
        $currentPage = "dogadaji.php";
        $expectedRedirectPage = "vrijednosti.php";
        $this->assertEquals($expectedRedirectPage, redirectTranslation($currentPage));
    }

    /*
    This test makes sure that when we try to translate the dogadaji.php page, that it redirects you to the vrijednosti.php page.
    */
    public function testRedirectionOtherPages(){
        $currentPage = "vrijednosti.php";
        $expectedRedirectPage = "vrijednosti.php";
        $this->assertEquals($expectedRedirectPage, redirectTranslation($currentPage));
    }
}
?>