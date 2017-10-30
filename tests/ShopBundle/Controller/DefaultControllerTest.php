<?php

namespace ShopBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testDefaultPagination()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertContains('<span class="current">1</span>', $client->getResponse()->getContent());
    }
    public function testSecondPagePagination()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/2');

        $this->assertContains('<span class="current">2</span>', $client->getResponse()->getContent());
    }
}
