<?php

namespace FWM\Hive\Api;

/**
 * Class Code
 * @package FWM\Hive\Api
 */
class Code extends AbstractApi
{
    /**
     * @param $code
     * @return string
     */
    public function getCode($code)
    {
        return $this->get('/api/code/'.$code.'/');
    }

    /**
     * @param $audit
     * @return \GuzzleHttp\Stream\StreamInterface|null
     */
    public function getAudit($audit)
    {
        return $this->get('/api/codeentry/'.$audit.'/');
    }
}
