<?php

namespace Dspacelabs\Component\Ecwid\Tests;

use Dspacelabs\Component\Ecwid\Client;
use Dspacelabs\Component\Http\Message\Response;
use Dspacelabs\Component\Http\Message\Stream;
use Dspacelabs\Component\Http\Message\Uri;
use Mockery as m;

class ClientTest extends \PHPUnit\Framework\TestCase
{
    public function testGetAccessToken()
    {
        $body = new Stream(fopen(__DIR__.'/data/response/api/oauth/token/response.json', 'r'));
        $mockResponse = (new Response())
            ->withStatus(200, 'OK')
            ->withBody($body);
        $client = m::mock('Dspacelabs\Component\Ecwid\Client')->makePartial();
        $client->shouldReceive('sendWithRequest')->andReturn($mockResponse);

        $uri = new Uri('https://www.example.com/myapp');
        $response = $client->getAccessToken('abcd0123', $uri);
        $this->assertInternalType('array', $response);
        $this->assertSame('secure_123453lasdADSKasasdjasdklasASkmns', $response['access_token']);
        $this->assertSame('bearer', $response['token_type']);
        $this->assertSame('read_store_profile update_catalog', $response['scope']);
        $this->assertSame(1003, $response['store_id']);
        $this->assertSame('john@store.com',$response['email']);
        $this->assertSame('public_qKDUqKkNXzcj9DejkMUqEkYLq2E6BXM9', $response['public_token']);

        m::close();
    }
}
