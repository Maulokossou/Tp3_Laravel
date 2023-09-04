<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cours;
use App\Models\Enseignants;
use App\Http\Controllers\Enseignant;
use App\Models\AffectationProfesseur;

class AffectationController extends Controller
{
    public function affectation ( $id=null){
        $cours = Cours::all();
        $item= Enseignants::find($id);
        $affect= AffectationProfesseur::where('enseignant_id', $id)->get();
        $tableau=[];
        foreach( $affect as $item){
            $donnee=Cours::find($item->cours_id);
            array_push($tableau, $donnee);
        }
        return view ('enseignant.affectationCours', compact("id", "item", "cours", "tableau"));
    }
   
    /* public function supprimer ($id){
        $etudiant_list=Enseignants::where('id', $id)->delete();
        return redirect() ->route('index');
    } */

    public function storeEnseignant(Request $request, $id){
        $data=$request->all(); 
        $validation=$request->validate([
            "cours"=>"required",
        ]);

        $cours_selection=$request->input('cours');
        foreach($cours_selection as $coursId){
            AffectationProfesseur::create([
                "enseignant_id" => $id,
                "cours_id" =>$coursId,
            ]);
        }
        return redirect()->back()->with("Success", "Vous venez d'affecter un cours!");
    }

 /*    public function showAffectations($enseignantId, $coursId)
    {
        // Récupérez les affectations d'enseignants en fonction de l'ID de l'enseignant et du cours
        $affectations = AffectationProfesseur::where('enseignant_id', $enseignantId)
            ->where('cours_id', $coursId)
            ->get();

        // Transmettez les données à votre vue
        return view('enseignant.affectationCours', compact('affectations'));
    }
    */

}
