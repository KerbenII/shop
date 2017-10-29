<?php

namespace ShopBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
{
    public function testAddproduct()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/add-product');
    }

}
