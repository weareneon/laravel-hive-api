<?php

namespace FWM\Hive\Api;

use GuzzleHttp\Client;

/**
 * Class AbstractApi
 * @package FWM\Hive\Api
 */
class AbstractApi
{

    /**
     * @var
     */
    protected $perPage;

    /**
     * @return mixed
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * @param $perPage
     * @return $this
     */
    public function setPerPage($perPage)
    {
        $this->perPage = (null === $perPage ? $perPage : (int)$perPage);
        return $this;
    }

    /**
     * @param $path
     * @param array $parameters
     * @return \GuzzleHttp\Stream\StreamInterface|null
     */
    protected function get($path, $parameters = array())
    {
        if (null !== $this->perPage && !isset($parameters['page'])) {
            $parameters['page'] = $this->perPage;
        }

        $response = $this->getHttp()->get($path, [], $parameters);

        return $response->getBody();
    }

    /**
     * @param $path
     * @param array $parameters
     * @return \GuzzleHttp\Stream\StreamInterface|null
     */
    protected function post($path, array $parameters = array())
    {
        $response = $this->getHttp()->createRequest('POST', $path, ['json' => $parameters]);

        return $response->getBody();
    }

    /**
     * @return Client
     */
    public function getHttp()
    {
        $client = new Client([
            'base_url' => [config('hive.url'), []],
            'defaults' => [
                'headers' => ['Content-Type' => 'application/json'],
                'query'   => ['api_key' => config('hive.token')],
            ]
        ]);

        return $client;
    }
}
