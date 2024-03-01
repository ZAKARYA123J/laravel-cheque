<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChequeRequest;
use App\Models\Carnet;
use App\Models\Chiques;
use App\tools\Converter;
use Illuminate\Http\Request;

class ChiquesController extends Controller
{


    public function showalldata()
    {

        $cheques = Chiques::with('carnte')->get();




        //dd($cheques);
        $carnets = Carnet::all();
        return view('cheque.cheque')->with([
            'cheques' => $cheques,
            'carnets' => $carnets,
        ]);
    }

    public function addnewCheque(Request $request)
    {


        $request->all();

        $carnet = new Chiques();







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

        $carnet->Duplicata_sur = "";



        $save = $carnet->save();
        if ($save) {

            // Increment Position Value

            $carnet = Carnet::findOrFail($request->carnet_id);
            $cheques = Chiques::where('carnet_id','LIKE',$request->carnet_id);


            $carnet->position_actuelt = $carnet->Start_Number+$cheques->count();

            $carnet->save();

        }

        return back()->with('success', 'Data Added');
    }


    public function DeletChique($id)
    {

        $compte = Chiques::findOrFail($id);
        $compte->delete();

        return back()->with('success', 'Data Added');
    }


    public function updatechequeLetter(Request $request,$id){
        $request->all();

        $cheques = Chiques::findOrFail($id);

        $cheques->lettre = $request->paycontre;

        $cheques->save();



    }


    public function PrintCheque($id){

        $cheques = Chiques::with('carnte')->findOrFail($id);



        return View('cheque.implimentcheque')->with([
            'cheques' => $cheques
        ]);


    }

    public static function convert($number)
    {
        return Converter::getInstance()->converter($number);
    }
}
