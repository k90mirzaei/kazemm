<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use k90mirzaei\Media\HasMedia;
use k90mirzaei\Media\InteractsWithMedia;

class Work extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
