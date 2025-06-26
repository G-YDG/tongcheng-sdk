<?php

declare(strict_types=1);

namespace Ydg\TCSdk\HotelActivity;

use Ydg\TCSdk\TCClient;

class HotelActivity extends TCClient
{
    /**
     * 获取酒店活动列表
     * @param array $params
     * @return array|null
     * @example params['token'] [必填]外部渠道唯一标识
     * @example params['outUserId'] [非必填]外部用户ID
     * @example params['cityId'] [非必填]城市ID
     */
    public function list(array $params = [])
    {
        $params['token'] = $params['token'] ?? $this->offsetGet('token');
        return $this->post('/openapi/hotel/activity/list', $params, true);
    }

    /**
     * 生成指定分销商活动二维码
     * @param array $params
     * @return array|null
     * @example params['token'] [必填]外部渠道唯一标识
     * @example params['outerUserId'] [必填]外部分销商用户id
     * @example params['activityId'] [必填]活动ID
     */
    public function getSubCode(array $params = [])
    {
        $params['token'] = $params['token'] ?? $this->offsetGet('token');
        return $this->post('/openapi/hotel/activity/getSubCode', $params, true);
    }
}
