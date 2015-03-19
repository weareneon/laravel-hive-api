<?php

namespace FWM\Hive;

use FWM\Hive\Api\Code;
use FWM\Hive\Api\User;
use InvalidArgumentException;

/**
 * Class Client.
 */
class Client
{
    /**
     * @param $name
     * @param $url
     * @param $token
     *
     * @return Code|User
     *
     * @throws InvalidArgumentException
     */
    public function api($name, $url, $token)
    {
        switch ($name) {
            case 'user':
                $api = new User($url, $token);
                break;
            case 'code':
                $api = new Code($url, $token);
                break;

            default:
                throw new InvalidArgumentException(sprintf('Undefined api instance called: "%s"', $name));
        }

        return $api;
    }
}
