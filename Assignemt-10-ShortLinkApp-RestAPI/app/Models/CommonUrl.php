<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonUrl extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'url_id'] ;
}
