<?php

namespace App\Models\Api;

class Feature extends \App\Models\Feature
{
    public function getRouteKeyName()
    {
        return 'id';
    }
}
