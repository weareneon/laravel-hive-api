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
     *
     * @return Code|User
     *
     * @throws InvalidArgumentException
     */
    public function api($name, $url)
    {
        switch ($name) {
            case 'user':
                $api = new User($url);
                break;
            case 'code':
                $api = new Code($url);
                break;

            default:
                throw new InvalidArgumentException(sprintf('Undefined api instance called: "%s"', $name));
        }

        return $api;
    }
}
