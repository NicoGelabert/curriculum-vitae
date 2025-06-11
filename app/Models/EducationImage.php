<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'education_id',
        'path',
        'url',
        'mime',
        'size',
        'position',
    ];

    public function education()
    {
        return $this->belongsTo(Education::class);
    }
}
