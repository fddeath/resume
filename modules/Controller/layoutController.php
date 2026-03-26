<?php

namespace Controller;

class layoutController
{
    public string $layout;

    public function __construct(string $name)
    {
        $this->layout = $name;
    }
}