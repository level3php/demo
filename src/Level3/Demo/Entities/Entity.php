<?php

namespace Level3\Demo\Entities;

class Entity
{
    public function toArray()
    {
        $data = [];
        foreach (get_object_vars($this) as $key => $value) {
            if (0 !== strpos($key, '_')) {
                $data[$key] = $value;
            }
        }

        return $data;
    }
}