<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'titre', 'description', 'niveau',
    ];
}
