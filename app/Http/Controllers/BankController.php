<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankRequest;
use App\Http\Requests\EditBankRequest;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $banks = Bank::all();
        return view('bank.bank')->with([
            'banks'=> $banks
        ]);

    }

    public function show()
    {

        $banks = Bank::all();
        $bankscount = Bank::count();

        return view('bank.bank',compact('banks'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

      return View('layout.bank');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BankRequest $request)
    {
        $request->validated($request->all());

         $bank = new Bank();

         $bank->banque = $request->bname;
         $bank->desc_b = $request->bdesc;

         $bank->save();

         return redirect('Banques')->with('success','Data Added');



    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EditBankRequest $request,string $id)
    {

        $request->validated($request->all());

        $bank = Bank::findOrFail($id);

        $bank->banque = $request->bank_name;
        $bank->desc_b = $request->bank_desc;

        $bank->update();




    }


    public function destroy(string $id)
    {

        $bank = Bank::findOrFail($id);
        $bank->delete();
        return redirect('Banques')->with('success','Data Deleted');

    }


}
