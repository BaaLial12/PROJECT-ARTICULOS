<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    protected  $fillable= ['nombre' , 'descripcion' , 'imagen' , 'decimal' , 'stock' , 'slug' , 'user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }


}
