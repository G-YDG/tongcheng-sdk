<?php

declare(strict_types=1);

namespace Ydg\TCSdk\Hotel;

use Ydg\TCSdk\TCClient;

class Hotel extends TCClient
{
    /**
     * 查询酒店订单
     * @param array $params
     * @return array|null
     * @example params['token'] [必填]外部渠道唯一标识
     * @example params['page'] [非必填]页码
     * @example params['pageSize'] [非必填]每页条数
     * @example params['beginDate'] [非必填]订单更新时间查询起始,精确到秒, yyyy-MM-dd HH:mm:ss
     * @example params['endDate'] [非必填]订单更新时间查询结束,精确到秒, yyyy-MM-dd HH:mm:ss
     * @example params['orderNo'] [非必填]指定订单号查询
     * @example params['status'] [非必填]订单状态，1已下单、2已确认、3已成交、4已取消、10异常
     */
    public function listOrder(array $params)
    {
        $params['token'] = $params['token'] ?? $this->offsetGet('token');
        return $this->post('/openapi/hotel/listOrder', $params, true);
    }

    /**
     * 获取酒店订单详情
     * @param array $params
     * @return array|null
     * @example params['token'] [必填]外部渠道唯一标识
     * @example params['orderNo'] [必填]订单号
     */
    public function getOrderDetail(array $params)
    {
        $params['token'] = $params['token'] ?? $this->offsetGet('token');
        return $this->post('/openapi/hotel/getOrderDetail', $params, true);
    }

    /**
     * 账单列表
     * @param array $params
     * @return array|null
     * @example params['token'] [必填]外部渠道唯一标识
     * @example params['traceId'] [非必填]请求id
     * @example params['timestamp'] [必填]请求时间戳(毫秒)
     * @example params['sign'] [必填]请求签名
     * @example params['page'] [非必填]页码
     * @example params['pageSize'] [非必填]每页条数
     * @example params['billPeriodIds'] [非必填]账期，示例：[202505,202504]
     */
    public function listBill(array $params)
    {
        $params['token'] = $params['token'] ?? $this->offsetGet('token');
        return $this->post('/openapi/hotel/listBill', $params, true);
    }
}
