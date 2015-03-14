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
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
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
