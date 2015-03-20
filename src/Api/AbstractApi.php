<?php

namespace FWM\Hive\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

/**
 * Class AbstractApi.
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
     *
     * @return $this
     */
    public function setPerPage($perPage)
    {
        $this->perPage = (null === $perPage ? $perPage : (int) $perPage);

        return $this;
    }

    /**
     * @param $path
     * @param array $parameters
     *
     * @return \GuzzleHttp\Stream\StreamInterface|null
     */
    protected function get($path, $parameters = array())
    {
        if (null !== $this->perPage && !isset($parameters['page'])) {
            $parameters['page'] = $this->perPage;
        }

        $response = $this->getHttp()->get($path, $parameters);

        return $response->json();
    }

    /**
     * @param $path
     * @param array $parameters
     *
     * @return \GuzzleHttp\Stream\StreamInterface|null
     */
    protected function post($path, array $parameters = array())
    {
        try {
            $request = $this->getHttp()->createRequest('POST', $path, ['json' => $parameters]);

            $response = $this->getHttp()->send($request);
        } catch (RequestException $e) {
            return $e;
        }

        return $response->getBody();
    }

    /**
     * @return Client
     */
    public function getHttp()
    {
        $client = new Client([
            'base_url' => [$this->url, []],
            'defaults' => [
                'headers' => ['Content-Type' => 'application/json'],
                'query'   => ['api_key' => $this->token],
            ],
        ]);

        return $client;
    }
}
