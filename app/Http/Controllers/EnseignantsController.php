<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enseignants;
use App\Models\Cours;

class EnseignantsController extends Controller
{
    public function addenseignant(){
        return view ('enseignant.addenseignant');
    }
    public function affectationCours(){
        return view ('enseignant.affectationCours');
    }
    
    public function accumulation(Request $request){
        $data = $request->all();
    
            $validation = $request->validate([
                "firstname" => 'required',
                "lastname" => 'required',
                "telephone" => 'required',
                "adresse" => 'required',
            ]);
            /* dd($validation); */
            
                $save = Enseignants::create([
                    "firstname" => $data['firstname'],
                    "lastname" => $data['lastname'],
                    "telephone" => $data['telephone'],
                    "adresse" => $data["adresse"],
                ]);
                
                return redirect()->route('enseignanthome');
    } 
    public function enseignanthome(){
        $enseignants_list= Enseignants::all();
        return view ('enseignant.enseignanthome', compact ("enseignants_list"));
    }
    public function supprimer ($id){
        $enseignants_list=Enseignants::where('id', $id)->delete();
        return redirect() ->route('enseignanthome');
    }

    
}
