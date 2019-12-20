<?php

declare(strict_types=1);


namespace OpenEMR\Tests\E2E;

use Symfony\Component\Panther\PantherTestCase;
use Symfony\Component\Panther\Client;

class PantherOnExternalWebsiteTest extends PantherTestCase
{
    /** @test */
    public function check_openEmr_demo_page(): void
    {
        //self::markTestSkipped();
        $openEmrDemoPage = 'https://demo.openemr.io/openemr/interface/login/login.php?site=default';
        
        // ok - PantherClient
        $client = static::createPantherClient(['external_base_uri' => $openEmrDemoPage]);

        // ok - GoutteClient -> Goutte is not installed. Run "composer req fabpot/goutte".
        //$goutteClient = static::createGoutteClient();

        // ok ChromeClient
        //$client = Client::createChromeClient(null, null, [], $openEmrDemoPage);
        
        // not tested customSeleniumClient
        //$client = Client::createSeleniumClient('http://127.0.0.1:4444/wd/hub', null, $openEmrDemoPage); // Create a custom Selenium client

        // no - only for Symfony's functional test
        //$client = static::createClient(['external_base_uri' => $openEmrDemoPage]);
        
        $crawler = $client->request('GET', $openEmrDemoPage); //var_dump($crawler);


        // TITLE
        $title = $client->getTitle();
        $this->assertSame('Holby City Hospital Login', $title);
    }
}