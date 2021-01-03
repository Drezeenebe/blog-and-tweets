<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Entry extends Model
{
    // $entry->name
    // Entry N - 1 User
    //Eager loading
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Metodo para colocar el slug a la tabla segun
     * el titulo
     */
    //mutator
    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    /**
     * Metodo para elegir el nombre de la columna que se utilizara como clave en
     * las routas (POR DEFECTO ES EL ID)
     *     public function getRouteKeyName()
     *{
     *   return 'slug';
     *}
     */


    public function getUrl(){
        return url("entries/$this->slug-$this->id");
    }
}
