<?php

class ExternalActivityOrderTest extends AbstractTest
{
    public function test_list()
    {
        $response = $this->getApp()->externalActivityOrder->list([
            'begin_date' => date('Y-m-d H:i:s', time() - 3600),
            'end_date' => date('Y-m-d H:i:s'),
            'update' => 1,
            'page_index' => 0,
            'page_size' => 10,
        ]);
        $this->assertIsSuccessResponse($response);
    }

    public function test_getChannelConfig()
    {
        $token = getenv('TOKEN');
        $actionTime = time();
        $code = md5($token . $actionTime);
        $response = $this->getApp()->externalActivityOrder->getChannelConfig([
            'token' => $token,
            'action_time' => $actionTime,
            'code' => $code,
            'outUserId' => 'test_123456',
        ]);
        $this->assertIsSuccessResponse($response);
    }
}
