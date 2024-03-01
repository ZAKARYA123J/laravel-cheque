<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Chiques extends Model
{
    use HasFactory;


    public $table = "Chiques";
    protected $fillable  =  ['carnet_id','date_emission','type',
    'date_paiement','benefisaire','Montant','Concerne','Remarques','Duplicata_sur','n_cheque','ville','letter'];




    public function carnte(): HasOne
    {
        return $this->hasOne(Carnet::class, 'id', 'carnet_id');
    }



}
