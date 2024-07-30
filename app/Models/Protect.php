<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protect extends Model
{
    use HasFactory;
    protected $table = 'protects';
    protected $fillable =[
        'name',
        'descrption',
        'price'];
}
