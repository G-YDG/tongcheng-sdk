<?php

namespace YdgTest\TCSdk;

class HotelActivityTest extends \AbstractTest
{
    public function test_list()
    {
        $response = $this->getApp()->hotelActivity->list();
        $this->assertIsSuccessResponse($response);
    }

    public function test_getSubCode()
    {
        $activityData = $this->getApp()->hotelActivity->list();
        $this->assertIsSuccessResponse($activityData);

        $response = $this->getApp()->hotelActivity->getSubCode([
            'outerUserId' => 'test_123456',
            'activityId' => $activityData['data'][0]['activityId']
        ]);
        $this->assertIsSuccessResponse($response);
    }

}
