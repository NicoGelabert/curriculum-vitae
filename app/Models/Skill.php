<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\SlugOptions;

class Skill extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'image', 'image_mime', 'image_size', 'published', 'created_by', 'updated_by'];

}
