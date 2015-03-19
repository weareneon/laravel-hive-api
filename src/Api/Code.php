<?php

namespace FWM\Hive\Api;

/**
 * Class Code.
 */
class Code extends AbstractApi
{
    /**
     * @var
     */
    protected $url;

    /**
     * @var
     */
    protected $token;

    /**
     * @param $url
     * @param $token
     */
    public function __construct($url, $token)
    {
        $this->url = $url;
        $this->token = $token;
    }

    /**
     * @param $code
     *
     * @return string
     */
    public function getCode($code)
    {
        return $this->get('/api/code/'.$code.'/');
    }

    /**
     * @param $audit
     *
     * @return \GuzzleHttp\Stream\StreamInterface|null
     */
    public function getAudit($audit)
    {
        return $this->get('/api/codeentry/'.$audit.'/');
    }
}
