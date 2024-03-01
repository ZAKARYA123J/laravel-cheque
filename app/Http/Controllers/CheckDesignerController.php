<?php

namespace App\Http\Controllers;

use App\Models\CheckDesigner;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CheckDesignerController extends Controller
{

    public function index()
    {
        $designParams = CheckDesigner::all();
        return view('layouts.check-designer', compact('designParams'));
    }

    public function save(Request $request)
    {
        $requestData = $request->only(['id', 'x_position', 'y_position', 'width', 'height']);
        $checkDesign = CheckDesigner::find($requestData['id']);

        if ($checkDesign) {
            $checkDesign->update($requestData);
            return response()->json(['message' => 'Check design saved successfully.']);
        } else {
            return response()->json(['message' => 'Check design not found.'], 404);
        }
    }
    public function generateCheck(Request $request,Dompdf $pdf)
{

    $html = view::make('check-template', ['fields' => $request->input('fields')])->render();
    $pdf->loadHtml($html);
    $pdf->setPaper('A4', 'landscape');
    $pdf->render();

    return $pdf->stream();
}



}
