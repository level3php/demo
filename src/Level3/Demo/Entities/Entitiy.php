<?php

namespace Level3\Demo\Entities;

class Entitiy
{
    public function toArray()
    {
        return get_object_vars($this);
    }
}