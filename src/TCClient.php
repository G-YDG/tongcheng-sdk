<?php

declare(strict_types=1);

namespace Ydg\TCSdk;

use Ydg\FoudationSdk\FoundationApi;
use Ydg\FoudationSdk\Traits\HasAttributes;
use Ydg\TCSdk\Support\Utils;

class TCClient extends FoundationApi
{
    use HasAttributes;

    protected $baseUri = 'https://alliance.ly.com';

    protected $httpClientDefaultOptions = [
        'headers' => [
            'Content-Type' => 'application/json',
        ],
        'verify' => false,
    ];

    public function get(string $method, array $data, bool $make_sign = false)
    {
        $response = $this->getHttpClient()->get(
            $this->getUri($method),
            $this->formatData($data, $make_sign),
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
            ]
        );

        return Utils::jsonResponseToArray($response);
    }

    public function post(string $method, array $data, bool $make_sign = false)
    {
        $response = $this->getHttpClient()->json(
            $this->getUri($method),
            $this->formatData($data, $make_sign),
            [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
            ]
        );

        return Utils::jsonResponseToArray($response);
    }

    protected function formatData(array $data, bool $make_sign = false): array
    {
        if ($make_sign) {
            $data['traceId'] = $data['traceId'] ?? Utils::genUUID();
            $data['timestamp'] = Utils::getMillisecond();
            $data['sign'] = Utils::generateSign($this->offsetGet('app_secret'), $data);
        } else {
            $data['trackid'] = $data['trackid'] ?? Utils::genUUID();
        }

        return $data;
    }

    public function getUri(string $method): string
    {
        return $this->getBaseUri() . $method;
    }

    public function getBaseUri(): string
    {
        return $this->baseUri;
    }

    public function setBaseUri(string $baseUri)
    {
        $this->baseUri = $baseUri;
    }

    public function getHttpClientDefaultOptions(): array
    {
        return $this->httpClientDefaultOptions;
    }

    public function setHttpClientDefaultOptions(array $httpClientDefaultOptions)
    {
        $this->httpClientDefaultOptions = $httpClientDefaultOptions;
    }
}
