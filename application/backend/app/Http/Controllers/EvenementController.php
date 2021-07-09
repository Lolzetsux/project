<?php

namespace App\Http\Controllers;
use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    public function index()
    {
        $evenement = Evenement::all();
        return response()->json([
            "success" => true,
            "message" => "evenement List",
            "data" => $evenement,
        ]);
    }

    public function store(Request $request)
    {
           // store
           $evenement = new Evenement;
           $evenement->user_id = $request::get('user_id');
           $evenement->salle_id = $request::get('salle_id');
           $evenement->date = $request::get('date');
           $evenement->save();
           return response()->json([
            "success" => true,
            "message" => "insertion",
            "save" => $evenement,
            ]);
    
       // $user = User::create($request->all());
        
    }

    public function update($id,Request $request)
    {
           // store
           $evenement = new Evenement;
           $evenement->user_id = $request::get('user_id');
           $evenement->salle_id = $request::get('salle_id');
           $evenement->date = $request::get('date');
           $salle->save();
           return response()->json([
            "success" => true,
            "message" => "insertion",
            "save" => $salle,
            ]);
    }

    public function getEvenementById($id)
    {
        $salle = Salle::find($id)->first();
        return response()->json([
            "success" => true,
            "message" => "salle by id",
            "data" => $salle,
            ]);
    }

    public function getEvenementByDate($date)
    {
        $evenement = Evenement::Where('date',$date)->first();
        return response()->json([
            "success" => true,
            "message" => "evenement by date",
            "data" => $evenement,
            ]);
    }

    
}
