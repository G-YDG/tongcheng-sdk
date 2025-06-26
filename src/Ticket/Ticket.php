<?php

declare(strict_types=1);

namespace Ydg\TCSdk\Ticket;

use Ydg\TCSdk\TCClient;

class Ticket extends TCClient
{
    /**
     * 查询演出产品信息
     * @param array $params
     * @return array|null
     * @example params['token'] [必填]外部渠道唯一标识
     * @example params['pageIndex'] [必填]页码
     * @example params['pageSize'] [必填]每页条数
     * @example params['name'] [非必填]名称
     * @example params['keyword'] [非必填]关键词
     * @example params['venueTcRegionId'] [非必填]城市（同程城市id）
     * @example params['categoryId'] [非必填]品类
     * @example params['sellable'] [非必填]是否可售
     * @example params['saleBeginTime'] [非必填]售票开始时间
     * @example params['saleEndTime'] [非必填]售票结束时间
     * @example params['showBeginDate'] [非必填]演出开始时间
     * @example params['showEndDate'] [非必填]演出结束时间
     * @example params['wantToSeeCount'] [非必填]热度,返回热度大于等于X值的产品
     */
    public function listTicket(array $params)
    {
        $params['token'] = $params['token'] ?? $this->offsetGet('token');
        return $this->post('/openapi/ticket/listTicket', $params, true);
    }

    /**
     * 查询演出订单信息
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
        return $this->post('/openapi/ticket/listOrder', $params, true);
    }
}
