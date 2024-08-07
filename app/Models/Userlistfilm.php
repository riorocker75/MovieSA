<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userlistfilm extends Model
{
    use HasFactory;
    protected $table= "user_listfilm";
    public $timestamps = false;
}
