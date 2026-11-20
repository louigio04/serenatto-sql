<?php

namespace Drewlabs\Dompdf;

class PathPrefixer
{
    /** @var string */
    private $base;

    /**
     * class constructor
     * 
     * @param string $base 
     */
    public function __construct(string $base)
    {
        $this->base = $base;
    }

    /**
     * prefix the path to a given path with the base location
     * 
     * @param string $path 
     * @return string 
     */
    public function prefix(string $path)
    {
        return $path[0] === DIRECTORY_SEPARATOR ? $path : implode(DIRECTORY_SEPARATOR, [rtrim($this->base ?? sys_get_temp_dir(), DIRECTORY_SEPARATOR),$path]);
    }
}