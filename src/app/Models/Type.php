<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        // type name
        'name',
        // a length or portion of time (item) type is used (in months)
        'period',
    ];
}
