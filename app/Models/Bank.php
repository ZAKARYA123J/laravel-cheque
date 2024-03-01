<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;


    public $table = "banks";

    protected  $fillable  =  ['banque','desc_b'];




}
