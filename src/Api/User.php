<?php

namespace FWM\Hive\Api;

class User extends AbstractApi
{
    /**
     * @param array $data
     * @return array|string
     */
    public function create($data)
    {
        return $this->post('/api/user/', ['user' => $data]);
    }

    public function get($id)
    {
        return $this->get('/api/user/' . $id . '/');
    }

    /**
     * @param $userId
     * @param array $data
     * @return array|string
     */
    public function createEntry($userId, $data)
    {
        return $this->post('/api/user/' . $userId . '/codeentry/', ['code' => $data]);
    }

    /**
     * @param $userId
     * @param array $params
     * @return \GuzzleHttp\Stream\StreamInterface|null
     */
    public function codeEntry($userId, $params = array())
    {
        return $this->get('/api/user/' . $userId . '/codeentry/', $params);
    }
}
