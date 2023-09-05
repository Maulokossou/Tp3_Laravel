<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Support\Facades\Storage;

class Etudiant extends Controller
{
    public function index(){

        $etudiant_list= Student::paginate(10);
        session (['etudiant_list'=>$etudiant_list]);
        return view ('accueil', compact ("etudiant_list"));
    }


    public function seeMore ($id=null){
        $item= Student::find($id);
        return view ('profil', compact("id", "item"));
    }


    public function store (Request $request){
        $data =$request->all();

        if ($data["images"]) {
            $images=$data['images'];
            $path=$images->store('picture');
        };

        $save = Student::create([
            "name"=>$data['name'],
            "hobbies"=>$data['hobbies'],
            "spécialité"=>$data['specialite'],
            "images"=>$path,
        ]);
        return redirect()->route('index');
    }

    /* Ici la fontion permet de supprimer un étudiant ici mais le conserve dans la base de données */
    public function supprimer ($id){
        $etudiant_list=Student::where('id', $id)->delete();
        return redirect() ->route('index');
    }

    /* Ici la fonction permet de modifier un étudiant.Il nous renvoie sur une page modify ou les informatiosn de l'étudiant en question sont pré-remplies */
    public function modifyForm ($id){
        $data= Student::find($id);
        $etudiant=Student::all();
        return view ('modify', compact('id', 'data', 'etudiant'));
    }

    /* Ici la fonction permet de mettre à jour les données modifiées et les remplacer dans la base de donnée */
    public function update (Request $request, $id){
        
        $data = $request->all();
        $validateData = $request->validate([
            "name" => "required",
            "hobbies" => "required",
            "specialite" => "required",
            "images" => "required|mimes:jpg,jpeg,png"
        ]);
        /* dd($request); */

        
        $student = Student::find($id);

        if ($request->hasFile('images')) {
            $path = $request->file('images')->store('picture');
            $student->images = $path;
        }

        $student->name = $data['name'];
        $student->hobbies = $data['hobbies'];
        $student->spécialité = $data['specialite']; 

        $student->save();

        return redirect()->route('index');
    }
    


    public function activate($id){
        $student = Student::find($id);
        if ($student) {
            if ($student->status) {
                $student->status = false;
            }
            else {
                $student->status = true;
            }
            $student->save();
        }
        return redirect()->route('index');  
    }
    
}
