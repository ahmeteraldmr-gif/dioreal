<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasTranslations;

class Guide extends Model
{
    use HasTranslations;

    protected $casts = [
        "title" => "array",
        "tag" => "array",
        "desc" => "array",
        "gallery" => "array"
    ];

    protected $guarded = [];

    //
}
