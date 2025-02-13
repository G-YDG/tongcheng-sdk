<?php

declare(strict_types=1);

namespace Ydg\TCSdk;

use GuzzleHttp\Exception\GuzzleException;
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

    /**
     * @param string $method
     * @param array $data
     * @return array|null
     * @throws GuzzleException
     */
    public function get(string $method, array $data)
    {
        $data['trackid'] = $data['trackid'] ?? Utils::genUUID();

        $response = $this->getHttpClient()->get($this->getUri($method), $data, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ]);

        return Utils::jsonResponseToArray($response);
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
