<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChequeRequest;
use App\Models\Carnet;
use App\Models\Traite;
use Illuminate\Http\Request;

class TraiteController extends Controller
{


    public function showalldata() {



        $cheques = Traite::with('carnte')
        ->whereHas('carnte', function ($query) {
            $query->where('name','LIKE', 'T-%');
        })
        ->get();

        $cheques = Traite::all();
        $carnets = Carnet::all();
        return view('Traite.trait')->with([
            'cheques'=> $cheques,
            'carnets'=> $carnets,
        ]);


    }

    public function addnewCheque(ChequeRequest $request){


        $request->all();

        $carnet = new Traite();



        $carnet->carnet_id = $request->carnet_id;
        $carnet->date_emission = $request->date_emission;
        $carnet->date_paiement = $request->date_paiement;
        $carnet->benefisaire = $request->benefisaire;
        $carnet->Montant = $request->Montant;
        $carnet->Concerne = $request->Concerne;
        $carnet->Remarques = $request->Remarques;
        $carnet->Duplicata_sur = $request->Duplicata_sur;




        $carnet->save();

        return back()->with('success', 'Data Added');



    }


    public function DeletChique($id){

        $compte = Traite::findOrFail($id);
        $compte->delete();

        return back()->with('success', 'Data Deleted');
    }
}
