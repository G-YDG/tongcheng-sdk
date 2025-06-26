<?php

namespace YdgTest\TCSdk;

class HotelTest extends \AbstractTest
{
    public function test_listOrder()
    {
        $response = $this->getApp()->hotel->listOrder([
            'beginDate' => date('Y-m-d H:i:s', time() - 3600),
            'endDate' => date('Y-m-d H:i:s'),
        ]);
        $this->assertIsSuccessResponse($response);
    }

    public function test_listOrderDetail()
    {
        $response = $this->getApp()->hotel->getOrderDetail([
            'orderNo' => time()
        ]);
        $this->assertIsResponse($response);
        $this->assertEquals(3000, $response['code']);
    }

    public function test_listBill()
    {
        $response = $this->getApp()->hotel->listBill([
            'page' => 1,
            'pageSize' => 10,
            'billPeriodIds' => [
                date('Ym'),
            ],
        ]);
        $this->assertIsSuccessResponse($response);
    }

}
