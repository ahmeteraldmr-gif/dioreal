<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasTranslations;

class Event extends Model
{
    use HasTranslations;

    protected $casts = [
        "title" => "array",
        "tag" => "array",
        "month" => "array",
        "loc" => "array",
        "desc" => "array",
        "long_desc" => "array",
        "gallery" => "array"
    ];

    protected $guarded = [];

    //
}
