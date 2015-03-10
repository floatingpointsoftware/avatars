<?php
namespace FloatingPoint\Avatars;

use FloatingPoint\Avatars\Drivers\Driver;

class Avatar
{
    /**
     * @var Driver[]
     */
    private $drivers = [];

    /**
     * @param Driver $driver
     */
    public function addDriver(Driver $driver)
    {
        $this->drivers[$driver->name] = $driver;
    }

    /**
     * Retrieve a single avatar with the key provided.
     *
     * @param string $key
     */
    public function get($key)
    {

    }
}
