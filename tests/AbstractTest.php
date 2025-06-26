<?php

use PHPUnit\Framework\TestCase;
use Ydg\TCSdk\TC;

abstract class AbstractTest extends TestCase
{
    public function getApp(): TC
    {
        return new TC([
            'token' => getenv('TOKEN'),
            'app_id' => getenv('APP_ID'),
            'app_secret' => getenv('APP_SECRET'),
        ]);
    }

    public function assertIsResponse($response)
    {
        $this->assertIsArray($response);
        $this->assertArrayHasKey('code', $response);
    }

    public function assertIsSuccessResponse($response)
    {
        $this->assertIsArray($response);
        $this->assertArrayHasKey('code', $response);
        $this->assertEquals(200, $response['code']);
    }
}
