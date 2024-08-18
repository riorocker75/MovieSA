<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Film extends Model
{
    use HasFactory;
    protected $table= "film";
    public $timestamps = false;
    

    public function getIsFavoritedAttribute()
    {
        $userId = Session::get('user_id');
        return $this->favorites()
                    ->where('user_id', $userId)
                    ->exists();
    }
    public function favorites()
    {
        return $this->hasMany(Favorit::class, 'film_id');
    }

}
