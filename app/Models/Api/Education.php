<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends \App\Models\Education
{
    public function getRouteKeyName()
    {
        return 'id';
    }
}
