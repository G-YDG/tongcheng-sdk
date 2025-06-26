<?php

namespace YdgTest\TCSdk;

class TripTest extends \AbstractTest
{
    public function test_listOrder()
    {
        $response = $this->getApp()->trip->listOrder([
            'pageIndex' => 1,
            'pageSize' => 10,
        ]);
        $this->assertIsSuccessResponse($response);
    }

    public function test_listFlightOrder()
    {
        $response = $this->getApp()->trip->listFlightOrder([
            'pageIndex' => 1,
            'pageSize' => 10,
        ]);
        $this->assertIsSuccessResponse($response);
    }

    public function test_listInternationalFlightOrder()
    {
        $response = $this->getApp()->trip->listInternationalFlightOrder([
            'pageIndex' => 1,
            'pageSize' => 10,
        ]);
        $this->assertIsSuccessResponse($response);
    }
}
