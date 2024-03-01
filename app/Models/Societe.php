<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Societe extends Model
{
    use HasFactory;


    public $table = "societes";

    protected $fillable  =  ['name_s','desc_s','logo_link'];
    


    public function comptes()
{
    return $this->hasMany(Compte::class,'socity_id','id');
}

}
