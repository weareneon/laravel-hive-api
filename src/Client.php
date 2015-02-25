<?php

namespace FWM\Hive;

use Carling\Hive\Api\Code;
use Carling\Hive\Api\User;

class Client
{

    /**
     * @param $name
     * @return Code|User
     * @throws \Exception
     */
    public function api($name)
    {
        switch ($name) {
            case 'user':
                $api = new User($this);
                break;
            case 'code':
                $api = new Code($this);
                break;

            default:
                throw new \Exception(sprintf('Undefined api instance called: "%s"', $name));
        }

        return $api;
    }
}
