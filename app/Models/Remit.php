<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Remit extends Model
{
    // Diese Felder dürfen per Mass Assignment gesetzt werden
    protected $fillable = ['title', 'amount', 'remit_date', 'description'];
}