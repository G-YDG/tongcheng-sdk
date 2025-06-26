<?php

declare(strict_types=1);

namespace Ydg\TCSdk\Trip;

use Ydg\TCSdk\TCClient;

class Trip extends TCClient
{
    /**
     * 查询火车票订单信息
     * @param array $params
     * @return array|null
     * @example params['token'] [必填]外部渠道唯一标识
     * @example params['page'] [非必填]页码
     * @example params['pageSize'] [非必填]每页条数
     * @example params['orderNo'] [非必填]订单号
     * @example params['status'] [非必填]订单状态，1已下单、2已确认、3已成交、4已取消、10异常
     * @example params['beginTime'] [非必填]订单创建开始时间（格式：yyyy-MM-dd HH:mm:ss）。如果未指定订单号，时间范围不能超过31天
     * @example params['endTime'] [非必填]订单创建结束时间（格式：yyyy-MM-dd HH:mm:ss）。如果未指定订单号，时间范围不能超过31天
     */
    public function listOrder(array $params)
    {
        $params['token'] = $params['token'] ?? $this->offsetGet('token');
        return $this->post('/openapi/trip/listTrainOrder', $params, true);
    }

    /**
     * 查询国际机票订单信息
     * @param array $params
     * @return array|null
     * @example params['token'] [必填]外部渠道唯一标识
     * @example params['page'] [非必填]页码
     * @example params['pageSize'] [非必填]每页条数
     * @example params['orderNo'] [非必填]订单号
     * @example params['status'] [非必填]订单状态，1已下单、2已确认、3已成交、4已取消、10异常
     * @example params['beginTime'] [非必填]订单创建开始时间（格式：yyyy-MM-dd HH:mm:ss）。如果未指定订单号，时间范围不能超过31天
     * @example params['endTime'] [非必填]订单创建结束时间（格式：yyyy-MM-dd HH:mm:ss）。如果未指定订单号，时间范围不能超过31天
     */
    public function listInternationalFlightOrder(array $params)
    {
        $params['token'] = $params['token'] ?? $this->offsetGet('token');
        return $this->post('/openapi/trip/listInternationalFlightOrder', $params, true);
    }

    /**
     * 查询国内机票订单信息
     * @param array $params
     * @return array|null
     * @example params['token'] [必填]外部渠道唯一标识
     * @example params['page'] [非必填]页码
     * @example params['pageSize'] [非必填]每页条数
     * @example params['orderNo'] [非必填]订单号
     * @example params['status'] [非必填]订单状态，1已下单、2已确认、3已成交、4已取消、10异常
     * @example params['beginTime'] [非必填]订单创建开始时间（格式：yyyy-MM-dd HH:mm:ss）。如果未指定订单号，时间范围不能超过31天
     * @example params['endTime'] [非必填]订单创建结束时间（格式：yyyy-MM-dd HH:mm:ss）。如果未指定订单号，时间范围不能超过31天
     */
    public function listFlightOrder(array $params)
    {
        $params['token'] = $params['token'] ?? $this->offsetGet('token');
        return $this->post('/openapi/trip/listFlightOrder', $params, true);
    }
}
