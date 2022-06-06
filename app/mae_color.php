<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mae_color extends Model
{
    protected $fillable = ['color_name', 'color_code'];
    protected $primaryKey = "color_id";
}
