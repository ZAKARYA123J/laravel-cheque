<?php

namespace App\Http\Controllers;

use App\Http\Requests\SociteRequest;
use App\Models\Bank;
use App\Models\Compte;
use App\Models\Societe;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocieteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $Societe = Societe::with('comptes')->get();
        //dd($Societe);

        // $Societe = Societe::all();





        $banks = Bank::all();
        $comptes = Compte::all();

        //dd($Societe);
        //$comptes = Compte::where('socity_id', $banks->id )->get();


        return view('Comptes.compte')->with([
            'banks' => $Societe,
            'allbanks' => $banks,
            'comptes' => $comptes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View('Comptes.compte');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_s' => 'required',
            'desc_s' => 'nullable', // Make 'desc_s' nullable in the validation rules
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $bank = new Societe();
    
        $bank->name_s = $request->name_s;
        
        // Check if 'desc_s' is provided, otherwise set a default value
        $bank->desc_s = $request->has('desc_s') ? $request->desc_s : '';
    
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $imageName);
            $bank->logo_link = $imageName;
        } else {
            $bank->logo_link = '';
        }
    
        $bank->save();
    
        return redirect('Comptes')->with('success', 'Data Added');
    }
     

    public function StoreCompte(Request $request)
    {




        $request->all();

        $bank = new Compte();

        $bank->socity_id = 2;
        $bank->bank_id = preg_replace('/[^0-9]/', '', $request->bank_id);


        $bank->bank_name =  preg_replace('/[^a-z]/i', '', $request->bank_id);

        $bank->rib = $request->rib;
        $bank->adress_id = $request->adress_id;


        $bank->save();

        return redirect('Comptes')->with('success', 'Data Added');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function destroyCompte(string $id)
    {

        $compte = Compte::findOrFail($id);
        $compte->delete();

        return redirect('Comptes')->with('success', 'Data Deleted');
    }
}
