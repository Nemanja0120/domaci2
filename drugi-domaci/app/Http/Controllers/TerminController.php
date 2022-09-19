<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Termin;
use App\Models\Prijava;

class TerminController extends Controller
{
    public function getTermini()
    {
        $termini = Termin::all();

        return response()->json([
            'termini' => $termini
        ]);
    }

    public function showTermin($termin_id)
    {
        $termin = Termin::find($termin_id);
        if(is_null($termin))
        return response() -> json('Data not found', 404);
        return response() -> json($termin);
    }

    public function showTerminsPrijave($termin_id)
    {
        $prijave = Prijava::get()->where('termin_id', $termin_id);
        if(is_null($prijave))
        return response() -> json('Data not found', 404);
        return response() -> json($prijave);
    }


}
