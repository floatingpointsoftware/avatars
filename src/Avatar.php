<?php
namespace FloatingPoint\Avatars;

use Exception;
use FloatingPoint\Avatars\Drivers\Driver;

class Avatar
{
    /**
     * @var Driver[]
     */
    protected $drivers = [];

    /**
     * The current driver to be using as the default for avatar calls.
     *
     * @var Driver
     */
    protected $driver;

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
    public function get($key, $size = 100)
    {
        $args = func_get_args();
        $numArgs = func_num_args();

        switch ($numArgs) {
            case 2:
            case 3:
                $driver = $this->useDriver($this->drivers[$args[1]]);
                unset($args[1]);
                return call_user_func_array([$driver, 'get'], $args);
            case 1:
                return call_user_func_array([$this->driver, 'get'], $args);
        }
    }

    /**
     * Set the default driver to be used for future calls.
     *
     * @param string $driverName
     * @return $this
     * @throws Exception
     */
    public function with($driverName)
    {
        $this->driver = $this->useDriver($driverName);

        return $this;
    }

    /**
     * Return the required driver.
     *
     * @param string $driverName
     * @return Driver
     * @throws Exception
     */
    protected function useDriver($driverName)
    {
        if (! isset($this->drivers[$driverName])) {
            throw new Exception("Driver [$driverName] has not been registered.");
        }

        return $this->drivers[$driverName];
    }
}
