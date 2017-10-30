<?php

namespace ShopBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
{
    public function testIfAdminMustAuthenticate()
    {
        $client = static::createClient();

        $client->request('GET', '/admin/new-product');

        $this->assertEquals(401, $client->getResponse()->getStatusCode());
    }

    public function testIfDevCredentialsDoNotWorks()
    {
        $client = static::createClient();

        $client->request('GET', 'http://admin:admin.dev@localhost/admin/new-product');

        $this->assertEquals(401, $client->getResponse()->getStatusCode());
    }

    public function testIfBaseHttpAuthorizationWorks()
    {
        $client = static::createClient();

        $client->request('GET', 'http://admin:adminTest.dev@localhost/admin/new-product');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testIfUserCanLogOut()
    {
        $client = static::createClient();

        $client->request('GET', 'http://admin:adminTest.dev@localhost/admin/new-product');
        $client->request('GET', 'http://localhost/logout');
        $client->request('GET', '/admin/new-product');

        $this->assertEquals(401, $client->getResponse()->getStatusCode());
    }

    public function testIfUserCanStayLoggedIn()
    {
        $client = static::createClient();

        $client->request('GET', 'http://admin:adminTest.dev@localhost/admin/new-product');
        $client->request('GET', '/admin/new-product');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
