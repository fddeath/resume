<?php

namespace Controller;

class layout
{
    public string $layout;

    public function __construct(string $name)
    {
        $this->layout = $name;
    }
}