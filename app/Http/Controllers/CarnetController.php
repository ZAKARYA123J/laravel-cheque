<?php

namespace App\Http\Controllers;

use App\Models\Carnet;
use App\Models\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CarnetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $Carnet = Carnet::all();
        $cheques = Carnet::where('type','cheque')->get();
        $traite = Carnet::where('type','traite')->get();
        $comptes = Compte::all();


        return view('Carnets.carnet')->with([
            'Carnets'=> $Carnet,
            'cheques'=> $cheques,
            'traite'=> $traite,
            'comptes'=> $comptes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View('Carnets.carnet');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $socity_id)
    {
        $request->validate([
            // Add validation rules for your fields here
        ]);
    
        $carnet = new Carnet();
    
        $carnet->socity_id = $socity_id;
        $carnet->compte_id = $request->compte_id;
        $carnet->type = $request->type;
        $carnet->numberdocarnet = $request->numberdocarnet;
        $carnet->Ville = $request->Ville;
        $carnet->numberdebut = $request->numberdebut;
        $carnet->numberfin = $request->numberfin;
        $carnet->datelimite = $request->datelimite;
    
        // Generate a random number
        $randomNumber = rand(1, 10);
    
        // Generate a random alphanumeric string of length 10
        $randomAlphanumericString = Str::random(1);
    
        // Concatenate the random number and alphanumeric string
        $concatenatedString = $randomNumber . '_' . $randomAlphanumericString;
    
        // Set the 'N_de_carnet' field to the concatenated string
        $carnet->N°_de_carnet = $concatenatedString; // Updated field name
    
        $carnet->save();
    
        return redirect()->route('Carnets.index')->with('success', 'Data Added');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy($id)
    {
        // Find the Carnet by ID

        $carnet = Carnet::find($id);
    
        // Check if the Carnet exists
        if (!$carnet) {
            return redirect()->route('Carnets.index')->with('error', 'Carnet not found');
        }
    
        // Delete the Carnet
        $carnet->delete();
    
        return redirect()->route('Carnets.index')->with('success', 'Carnet deleted successfully');
    }
    
}
