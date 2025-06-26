<?php

declare(strict_types=1);

namespace Ydg\TCSdk\Support;

use Psr\Http\Message\ResponseInterface;

class Utils
{
    public static function genUUID(string $prefix = ''): string
    {
        return md5($prefix . uniqid() . random_bytes(8));
    }

    public static function getMillisecond(): int
    {
        return (int)(microtime(true) * 1000);
    }

    public static function jsonResponseToArray(ResponseInterface $response)
    {
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * 生成签名
     *
     * @param array $params 过滤后的参数
     * @return string 签名结果
     */
    public static function generateSign(string $appSecret, array $params): string
    {
        $params = self::flattenParams($params);

        unset($params['sign'], $params['timestamp']);

        // 按键名升序排序
        ksort($params);

        // 构建签名字符串
        $signString = '';
        foreach ($params as $key => $value) {
            if ($value == null || $value == '') {
                continue;
            }
            $signString .= $key . '=' . $value . '&';
        }
        $signString .= 'key=' . $appSecret;

        // 计算MD5并转为大写
        return strtoupper(md5($signString));
    }

    /**
     * @param $params
     * @param string $prefix
     * @return array
     */
    private static function flattenParams($params, string $prefix = ''): array
    {
        $result = [];

        if (is_array($params)) {
            foreach ($params as $key => $value) {
                if (is_int($key)) {
                    $newKey = $prefix . '[' . $key . ']';
                } else {
                    $newKey = $prefix ? $prefix . '.' . $key : $key;
                }
                if (is_array($value) || is_object($value)) {
                    $result = array_merge($result, self::flattenParams($value, $newKey));
                } else {
                    $result[$newKey] = (string)$value;
                }
            }
        }

        return $result;
    }
}
