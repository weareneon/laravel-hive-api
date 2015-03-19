<?php

namespace FWM\Hive\Api;

/**
 * Class User.
 */
class User extends AbstractApi
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
     * @param array $data
     *
     * @return array|string
     */
    public function create($data)
    {
        return $this->post('/api/user/', ['user' => $data]);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getUser($id)
    {
        return $this->get('/api/user/'.$id.'/');
    }

    /**
     * @param $userId
     * @param array $data
     *
     * @return array|string
     */
    public function createEntry($userId, $data)
    {
        return $this->post('/api/user/'.$userId.'/codeentry/', ['code' => $data]);
    }

    /**
     * @param $userId
     * @param array $params
     *
     * @return \GuzzleHttp\Stream\StreamInterface|null
     */
    public function codeEntry($userId, $params = array())
    {
        return $this->get('/api/user/'.$userId.'/codeentry/', $params);
    }
}
