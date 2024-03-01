<?php

namespace App\Http\Controllers;

use App\Models\Carnet;
use App\Models\Historiq;
use Illuminate\Http\Request;

class HistoriController extends Controller
{


    public function showalldata()
    {


        $cheques = Historiq::with('carnte')->get();



        //dd($cheques);
        $carnets = Carnet::all();
        return view('historiq.historiq')->with([
            'cheques' => $cheques,
            'carnets' => $carnets,
        ]);
    }

    public function addtoHistoriq(Request $request)
    {


        $request->all();

        $carnet = new Historiq();




        $carnet->carnet_id = $request->carnet_id;
        $carnet->n_cheque = $request->cheque;
        $carnet->date_emission = $request->date_emission;
        $carnet->type = $request->type;
        $carnet->date_paiement = $request->date_paiement;
        $carnet->benefisaire = $request->benefisaire;
        $carnet->Montant = $request->Montant;
        $carnet->Concerne = $request->Concerne;
        $carnet->Remarques = $request->Remarques;
        $carnet->ville = $request->ville;
        $carnet->position_actuelt = $request->position_actuelt;
        $carnet->Duplicata_sur = "";



        $carnet->save();


        return back()->with('success', 'Data Added');
    }



}
