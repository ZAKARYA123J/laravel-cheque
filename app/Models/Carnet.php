<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carnet extends Model
{
    use HasFactory;

    public $table = "carnets";

    protected $fillable  =  ['socity_id','compte_id','type',
    'numberdocarnet','Ville','numberdebut','numberfin','datelimite',"N°_de_carnet"];





}
