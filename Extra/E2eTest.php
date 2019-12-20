<?php


declare(strict_types=1);


namespace OpenEMR\Tests\E2E;

echo 'OK';


use Symfony\Component\Panther\PantherTestCase;
use Symfony\Component\Panther\Client;

class E2eTest extends PantherTestCase
{
    protected $client = null;

    public function setUp(): void
    {
        parent::setUp();

        //$this->client = static::createPantherClient();
    }

    /** @test */
    public function check_google_page(): void
    {
        //self::markTestSkipped();
        $googleUrl = 'https://demo.openemr.io/openemr/interface/login/login.php?site=default';
        
        // ok - PantherClient
        $client = static::createPantherClient(['external_base_uri' => $googleUrl]);

        // ok - GoutteClient -> Goutte is not installed. Run "composer req fabpot/goutte".
        //$goutteClient = static::createGoutteClient();

        // ok ChromeClient
        //$client = Client::createChromeClient(null, null, [], $googleUrl);
        
        // not tested customSeleniumClient
        //$client = Client::createSeleniumClient('http://127.0.0.1:4444/wd/hub', null, $googleUrl); // Create a custom Selenium client

        // no - only for Symfony's functional test
        //$client = static::createClient(['external_base_uri' => $googleUrl]);
        
        $crawler = $client->request('GET', $googleUrl); //var_dump($crawler);


/*        $response = $client->getResponse();
        $this->assertSame(Response::HTTP_NOT_FOUND, $response->getStatusCode());
*/

        // TITLE
        $title = $client->getTitle(); echo $title;
        $this->assertSame('Holby City Hospital Login', $title);


        //$this->assertEquals(200, $client->getResponse()->getStatusCode());


        // ok
        //echo $client->getPageSource();


        //$crawler->
        //$this->assertPageTitleContains('','');
        //$this->assertPageTitleSame('OpenEMR Login');
        //$this->assertPageTitleContains('OpenEMR Login');
        //$this->assertSelectorTextContains('#main', 'My body');
    }

    /** @test */
    public function check__page(): void
    {
        self::markTestSkipped();
        $googleUrl = 'https://www.google.com';

        // ok - PantherClient
        $client = static::createPantherClient();

        // ok - GoutteClient -> Goutte is not installed. Run "composer req fabpot/goutte".
        //$goutteClient = static::createGoutteClient();

        // ok ChromeClient
        //$client = Client::createChromeClient(null, null, [], $googleUrl);

        // not tested customSeleniumClient
        //$client = Client::createSeleniumClient('http://127.0.0.1:4444/wd/hub', null, $googleUrl); // Create a custom Selenium client

        // no - only for Symfony's functional test
        //$client = static::createClient(['external_base_uri' => $googleUrl]);

        $crawler = $client->request('GET', '/login.html'); //var_dump($crawler);


        /*        $response = $client->getResponse();
                $this->assertSame(Response::HTTP_NOT_FOUND, $response->getStatusCode());
        */

        // TITLE
        $title = $client->getTitle(); echo $title;
        $this->assertSame('Google', $title);


        //$this->assertEquals(200, $client->getResponse()->getStatusCode());


        // ok
        //echo $client->getPageSource();


        //$crawler->
        //$this->assertPageTitleContains('','');
        //$this->assertPageTitleSame('OpenEMR Login');
        //$this->assertPageTitleContains('OpenEMR Login');
        //$this->assertSelectorTextContains('#main', 'My body');
    }



    /** @test */
    public function check_my_local_page_with_php_built_in_server(): void
    {
        self::markTestSkipped();
        $googleUrl = 'localhost';
        
        // ok - PantherClient
        //$client = static::createPantherClient(['external_base_uri' => $googleUrl]);

        // ok - GoutteClient -> Goutte is not installed. Run "composer req fabpot/goutte".
        //$client = $goutteClient = static::createGoutteClient(['hostname' => '127.0.0.1', 'port' => '8888']);
        $client = $goutteClient = static::createGoutteClient();
        // ok ChromeClient
        //$client = Client::createChromeClient(null, null, [], $googleUrl);
        
        // not tested customSeleniumClient
        //$client = Client::createSeleniumClient('http://127.0.0.1:4444/wd/hub', null, $googleUrl); // Create a custom Selenium client

        // no - only for Symfony's functional test
        //$client = static::createClient(['external_base_uri' => $googleUrl]);
        
        $crawler = $client->request('GET', '/login.html'); //var_dump($crawler);


/*        $response = $client->getResponse();
        $this->assertSame(Response::HTTP_NOT_FOUND, $response->getStatusCode());
*/

        // TITLE
        $title = $client->getTitle(); //echo $title;
        $this->assertSame('OpenEMR Login', $title);


        //$this->assertEquals(200, $client->getResponse()->getStatusCode());

        // ok
        echo $client->getPageSource();


        //$crawler->
        //$this->assertPageTitleContains('','');
        //$this->assertPageTitleSame('OpenEMR Login');
        //$this->assertPageTitleContains('OpenEMR Login');
        //$this->assertSelectorTextContains('#main', 'My body');
    }



    /** @test */
/*    public function login_page_is_accesible_for_visitor(): void
    {
        $loginUrl = '/c/openemr/interface/login/login.php?site=default';
        $client = static::createPantherClient();
        //$client = static::createChromeClient();
        //$client = \Symfony\Component\Panther\Client::createChromeClient();

        $crawler = $client->request('GET', $loginUrl); //var_dump($crawler);


        //$crawler->
        //$this->assertPageTitleContains('','');
        //$this->assertPageTitleSame('OpenEMR Login');
        $this->assertPageTitleContains('OpenEMR Login');
        //$this->assertSelectorTextContains('#main', 'My body');
    }
*/


//    /** @test */
//    public function a_visitor_with_wrong_credentials_cant_logged_in(): void
//    {
//        $this->assertPageTitleContains('','');
//        $client = static::createPantherClient();
//        $loginUrl = '/c/openemr/interface/login/login.php?site=default';
//        $crawler = $client->request('GET', $loginUrl);
//        $form = $crawler->selectButton('Login')->form();
//        $form['authUser'] = 'fake-user@example.com';
//        $form['clearPassword'] = 'password';
//        $crawler = $client->submit($form);
//
//        $this->assertSame(self::$baseUri.$loginUrl, $client->getCurrentURL());
//        // TODO assert form error message is visible.
//        $client->takeScreenshot('screen-login.png');
//    }

}