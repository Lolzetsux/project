<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Salle;
use App\Models\Evenement;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return response()->json([
            "success" => true,
            "message" => "user List",
            "data" => $user,
        ]);
    }

    public function isAdmin($id)
    {
        $user = User::find($id);
        if($user->job == 'admin')
        {
            return response()->json([
                "success" => true,
                "message" => "admin user",
                "data" => true,
            ]);
        }
        else{
            return response()->json([
                "success" => false,
                "message" => "admin user",
                "data" => false,
            ]);
        }
        
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->job = $request->ob;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(10);
        $user->save();
        return response()->json([
         "success" => true,
         "message" => "insertion",
         "save" => $user,
         ]);
        
    }

    public function update($id,Request $request)
    {
           // store
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->job = $request->ob;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(10);
        $user->save();
           return response()->json([
            "success" => true,
            "message" => "insertion",
            "save" => $user,
            ]);
    }

    public function getUserById($id)
    {
        $user = User::find($id);
        return response()->json([
            "success" => true,
            "message" => "user by id",
            "data" => $user,
            ]);
    }

    public function getUserByJob($job)
    {
        $user = User::where('job',$job)->first();
        return response()->json([
            "success" => true,
            "message" => "user by job",
            "data" => $user,
            ]);
    }

    public function reserver()
    {
        $salle = Salle::find($request->$salle_id);
        if($salle) {
            if($salle->etat == 0)
            {
                $evenement = new Evenement;
                $evenement->user_id = $request->user_id;
                $evenement->salle_id = $request->salle_id;
                $evenement->date = $request->date;
                $evenement->save();
                return response()->json([
                 "success" => true,
                 "message" => "insertion",
                 "save" => $evenement,
                 ]);
            }
            else 
            {
                return response()->json([
                    "success" => false,
                    "message" => "salle occupée",
                    "data" => $salle,
                    ]);
            }
            
        }
        else
        {
            return response()->json([
                "success" => false,
                "message" => "erreur"
                ]);

        }
    }
}
