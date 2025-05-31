<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Remit extends Model
{
    // Erlaubt 'title' beim Mass Assignment
    protected $fillable = ['title'];
}