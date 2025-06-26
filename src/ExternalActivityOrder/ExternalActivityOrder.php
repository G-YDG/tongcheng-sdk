<?php

declare(strict_types=1);

namespace Ydg\TCSdk\ExternalActivityOrder;

use Ydg\TCSdk\TCClient;

class ExternalActivityOrder extends TCClient
{
    /**
     * 订单查询接口
     * @param array $params
     * @return array|null
     * @example params['appId'] [非必填]分配token查询接口提供的appId
     * @example params['begin_date'] [非必填]订单更新时间查询起始，精确到秒，yyyy-MM-dd HH:mm:ss（除了传订单号外，其他查询必传）
     * @example params['end_date'] [非必填]订单更新时间查询结束，精确到秒，yyyy-MM-dd HH:mm:ss（除了传订单号外，其他查询必传）
     * @example params['order_id'] [非必填]指定订单号查询返回该订单的最新详情
     * @example params['update'] [非必填]0:仅已支付的订单，1:所有状态订单，默认查所有1
     * @example params['page_index'] [非必填]分页index，从0开始（除了传订单号外，其他查询必传）
     * @example params['page_size'] [非必填]分页条数（除了传订单号外，其他查询必传）
     */
    public function list(array $params)
    {
        $params['appId'] = $params['appId'] ?? $this->offsetGet('app_id');
        return $this->get('/openapi/external/activityOrder/listOrder', $params);
    }

    /**
     * 生成跳转链接根据 token 获取外部渠道配置信息
     * @example params['token'] [必填]分配 token
     * @example params['action_time'] [必填]时间戳(秒级),用以进行参数校验
     * @example params['code'] [必填]校验关键参数,防止被篡改; code=md5(token+action_time)
     * @example params['outUserId'] [必填]三方用户ID
     */
    public function getChannelConfig(array $params)
    {
        $params['token'] = $params['token'] ?? $this->offsetGet('token');
        return $this->get('/openapi/external/activityOrder/getChannelConfig', $params);
    }
}
