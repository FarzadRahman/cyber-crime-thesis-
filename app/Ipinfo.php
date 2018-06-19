<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ipinfo extends Model
{
    protected $table='ipinfo';
    public $timestamps = false;
    protected $primaryKey = 'ipinfoId';
}
