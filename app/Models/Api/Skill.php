<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Skill extends \App\Models\Skill
{

    public function getRouteKeyName()
    {
        return 'id';
    }

}
