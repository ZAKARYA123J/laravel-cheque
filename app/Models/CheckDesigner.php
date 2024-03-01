<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckDesigner extends Model
{
    use HasFactory;

    public $table = 'check_designs';


    protected $fillable = [
        'template_name',
        'field_name',
        'x_position',
        'y_position',
        'width',
        'height',
    ];
}
