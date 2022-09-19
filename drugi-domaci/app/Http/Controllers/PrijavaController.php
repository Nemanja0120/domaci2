<?php

namespace App\Http\Controllers;

use App\Models\Prijava;
use App\Models\Termin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PrijavaController extends Controller
{
    public function getPrijave()
    {
        $prijave = Prijava::get();
        if(is_null($prijave)) return response()->json('Data not found', 404);
        return response()->json($prijave);
    }

    public function showPrijava($prijava_id)
    {
        $prijava = Prijava::find($prijava_id);
        if(is_null($prijava))
        return response() -> json('Data not found', 404);
        return response() -> json($prijava);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'naziv' => 'required|string|max:255',
            'termin_id' => 'required'
        ]);

        if($validator->fails()) {
            return response() -> json ($validator->errors());
        }

        $prijava=Prijava::create([
            'naziv' => $request->naziv,
            'user_id' => Auth::user()->id,
            'termin_id' => $request->termin_id
        ]);

        return response()-> json(['Prijava ' . $prijava->naziv . ' je uspesno kreirana.']); 
    }


}
