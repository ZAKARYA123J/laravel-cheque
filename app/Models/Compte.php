<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte extends Model
{
    use HasFactory;

    public $table = "comptes";

    protected $fillable  =  ['socity_id','bank_id','bank_name','rib','adress_id'];


    public function socitie(){
        return $this->belongsTo(Societe::class,'id','socity_id');
    }


}
