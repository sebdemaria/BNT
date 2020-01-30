<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $table = "services";
    public $primaryKey = "id";
    public $guarded = [];
}
