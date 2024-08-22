<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table= "user";
    public $timestamps = false;
    
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
