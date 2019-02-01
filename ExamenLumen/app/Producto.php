<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model 
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'categoria', 'generos_id',
    ];
    
    public function generos()
    {
        return $this->hasMany('App\Genero');
    }
}
