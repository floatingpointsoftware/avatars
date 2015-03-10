<?php
namespace FloatingPoint\Avatars\Drivers;

interface Driver
{
    /**
     * Retrieve a single avatar from the service requested.
     *
     * @return mixed
     */
    public function get();
}
