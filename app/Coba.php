<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coba extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['coba_code', 'coba_description', 'masuk'];
}
