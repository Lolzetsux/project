<?php

namespace App\Http\Controllers;
use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    public function index()
    {
        $salles = Salle::all();
        return response()->json([
            "success" => true,
            "message" => "salles List",
            "data" => $salles,
        ]);
    }

    public function store(Request $request)
    {
           // store
           $salle = new Salle;
           $salle->designation = $request->designation;
           $salle->etat = $request->etat;
           $salle->save();
           return response()->json([
            "success" => true,
            "message" => "insertion",
            "save" => $salle,
            ]);
    
       // $user = User::create($request->all());
        
    }

    public function update($id,Request $request)
    {
           // store
           $salle = Salle::find($id);
           $salle->designation = $request->designation;
           $salle->etat = $request->etat;
           $salle->save();
           return response()->json([
            "success" => true,
            "message" => "insertion",
            "save" => $salle,
            ]);
    }

    public function getSalleById($id)
    {
        $salle = Salle::find($id);
        return response()->json([
            "success" => true,
            "message" => "salle by id",
            "data" => $salle,
            ]);
    }

    public function getSalleByEtat($etat)
    {
        
        $salle = Salle::where('etat',$etat)->first();
        return response()->json([
            "success" => true,
            "message" => "salle by etat",
            "data" => $salle,
            ]);
    }
}
