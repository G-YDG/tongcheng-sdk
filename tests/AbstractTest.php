<?php

use PHPUnit\Framework\TestCase;
use Ydg\TCSdk\TC;

abstract class AbstractTest extends TestCase
{
    public function getApp(): TC
    {
        return new TC();
    }

    public function assertIsSuccessResponse($response)
    {
        $this->assertIsArray($response);
        $this->assertArrayHasKey('code', $response);
        $this->assertEquals(200, $response['code']);
    }
}
