<?php

namespace Lewik\BoManagerBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BoGenerateControllerTest extends WebTestCase
{
    public function testGenerate()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/generate');
    }

}
