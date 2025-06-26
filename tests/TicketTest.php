<?php

namespace YdgTest\TCSdk;

class TicketTest extends \AbstractTest
{
    public function test_listTicket()
    {
        $response = $this->getApp()->ticket->listTicket([
            'pageIndex' => 1,
            'pageSize' => 10,
        ]);
        $this->assertIsSuccessResponse($response);
    }

    public function test_listOrder()
    {
        $response = $this->getApp()->ticket->listOrder([
            'pageIndex' => 1,
            'pageSize' => 10,
        ]);
        $this->assertIsSuccessResponse($response);
    }
}
