<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentary extends Model
{

    protected $table = 'comentary';

    protected $primaryKey = 'id';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function entry(){
        return $this->belongsTo(Entry::class);
    }

    protected $fillable = [
        'content',
    ];
}
