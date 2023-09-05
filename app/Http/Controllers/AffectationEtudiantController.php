<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;
use App\Models\Student;

class AffectationEtudiantController extends Controller
{
    public function affectCoursEtudiant ($id=null ){
        $cours = Cours::all();
        $etudiant=Student::all();
        return view ('etudiant.affectCoursEtudianthome', compact("cours", "etudiant"));
    }
    public function storeCours(Request $request, $id){
        $data=$request->all();
        $validation=$request->validate([
            "cours"=>"required",
            "etudiant"=>"required",
        ]);

        $etudiant_selection=$request->input('etudiant');
        $cours_selection=$request->input('cours');

        foreach ($cours_selection as $coursId) {
            foreach ($etudiant_selection as $etudiantId) {
                AffectationEtudiant::create([
                    "cours_id" => $coursId,
                    "etudiant_id" => $etudiantId,
                ]);
            }
        }
        return redirect()->back()->with("Success", "Vous venez d'affecter un cours à un étudiant!");
    }
}
