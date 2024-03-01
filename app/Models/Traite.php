<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Traite extends Model
{
    use HasFactory;

    public $table = "traites";
    protected $fillable  =  ['carnet_id','date_emission',
    'date_paiement','benefisaire','Montant','Concerne','Remarques','Duplicata_sur'];


  public function carnte(): HasOne
    {
        return $this->hasOne(Carnet::class, 'id', 'carnet_id');
    }
}
