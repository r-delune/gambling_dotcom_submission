<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'latitude', 
        'affiliate_id',
        'longitude'
    ];

    /**
     * The attributes that will be hidden (we do not want to pass these back to client
     *
     * @var array
    */
    protected $hidden = [
        'longitude',
        'latitude', 
        'proximity'
    ];
}
