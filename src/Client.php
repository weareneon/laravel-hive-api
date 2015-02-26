<?php

namespace FWM\Hive;

use FWM\Hive\Api\Code;
use FWM\Hive\Api\User;

/**
 * Class Client
 * @package FWM\Hive
 */
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
