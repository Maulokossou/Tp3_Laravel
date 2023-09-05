<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cours;
use App\Models\Categorie;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class CoursController extends Controller
{   

    public function addCategorie(){
        return view ('gestion.addCategorie');
    }

    public function newCategorie(Request $request)
    {
        // Validez et sauvegardez la nouvelle catégorie
        $request->validate([
            'name' => 'required|unique:categorie',
        ]);

        $nouvelleCategorie = new Categorie();
        $nouvelleCategorie->name = $request->name;
        $nouvelleCategorie->save();
        /* dd($nouvelleCategorie); */

        // Récupérez toutes les catégories après avoir ajouté la nouvelle
        $categories = Categorie::all();

        // Redirigez l'utilisateur vers le formulaire d'ajout de cours avec les nouvelles données de catégorie
        return view('gestion.courshome', compact('categories'));
    }

    public function addcours(){
        $categories = Categorie::all(); // Assurez-vous que le modèle Categorie est correctement importé en haut de votre contrôleur.
        return view ('gestion.addcours', compact('categories'));
    }


    public function accumulation(Request $request){
        $data = $request->all();
    
            $validation = $request->validate([
                "name" => 'required',
                "Maxhoraire" => 'required',
                "Coefficient" => 'required',
                "categorie" => 'required',
            ]);
            $save = Cours::create([
                "name" => $data['name'],
                "Maxhoraire" => $data['Maxhoraire'],
                "Coefficient" => $data['Coefficient'],
                /* "added_by" => Auth::user()->fullname, */
                "categorie_id" => $data["categorie"],
            ]);
                
                return redirect()->route('courshome');
    } 


    public function courshome(){
        $cours_list= Cours::paginate(8);
        return view ('gestion.courshome', compact ("cours_list"));
    }

    /* Ici la fonction permet de supprimer un cours ici mais le conserve dans la base de données */
    /* public function supprimer ($id){
        $cours_list=Cours::where('id', $id)->delete();
        return redirect()->route('courshome');
    } */

    public function modifyForm ($id){
        $data= Cours::find($id);
        $cours=Cours::all();
        return view ('gestion.modifyCours', compact('id', 'data', 'cours'));
    }

     /* Ici la fonction permet de mettre à jour les données modifiées et les remplacer dans la base de donnée */
     public function update (Request $request, $id){
        
        $data = $request->all();
        $validateData = $request->validate([
            "name" => 'required',
            "Maxhoraire" => 'required',
            "Coefficient" => 'required',
            /* "categorie" => 'required', */
        ]);
        /* dd($request); */

        $cours = Cours::find($id);
        $categories = Categorie::all();

        $cours->name = $data['name'];
        $cours->Maxhoraire = $data['Maxhoraire'];
        $cours->Coefficient = $data['Coefficient']; 

        $cours->save();

        /* return redirect()->route('courshome'); */
        return view('gestion.courshome', compact('cours', 'categories'));
    }
    
}
