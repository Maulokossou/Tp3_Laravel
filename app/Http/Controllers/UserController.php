<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function login(){
        return view ('login');
    }
    public function register(){
        return view ('register');
    }

      /* Ici je récupère toutes données du formulaire et je procède à leur vérification.Comme d'habitude on fait un $data=$request->all()*/
      public function store(Request $request){
        $data=$request->all();
        $request->validate([
            'nom'=>"required|min:2",
            'prenom'=>"required|min:2",
            'email'=>array(
                'required',
                'unique:user',
                'regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/'
            ),
              "password"=>array(
                'required',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#^_;:,])[A-Za-z\d@$!%*?&#^_;:,]{8,}$/', 
                'confirmed:password_confirmation'
            ) 
        ]);

        /* Ensuite je procède à la sauvegarde temporaire de ces données là*/
        $save= User::create([
            "firstname"=>$data['nom'],
            "lastname"=>$data['prenom'],
            "email"=>$data['email'],
            "password"=>Hash::make($data['password']),
            "birthday"=>$data['birthday'],
        ]);

        /*Ici je créé l'Url d'activation */
        $url=URL::temporarySignedRoute(
           'url' , 
           now()->addMinutes(30),['email'=>$data['email']]
        );


        /* Enfin j'envoie l'Url générer par mail pour activation du compte.*/
        Mail::send('mail',['url'=>$url, 'name'=>$data['nom'].''.$data['prenom']], function($message) use($data) {
            $config = config('mail');
            $name=$data['nom'].''.$data['prenom'];
            $message->subject("Registration verification!")
                    ->from($config['from']['address'],"ETUDIANTS")
                    ->to($data['email'], $data['nom'].' '.$data['prenom']);
        });

        return redirect()->back()->with("success", "Veuillez consultez votre mail pour activer votre compte utilisateur");
    }

    
    public function verify(Request $request, $email){

        $user = User::where("email",$email)->first();

        if(!$user){
            abort(404);
        }

        if(!$request->hasValidSignature()){
            abort(404);
        }

        /*  */
        $user->update([
            'verify_at'=>now(),
            "emailVerified"=>true
        ]);
        return redirect()->route("login")->with("success","Compte activé avec succès");

    }

    public function verification(){
        return view ('verifyMail');
    }

    public function restor_password(Request $request)
    {
        $data = $request->all();
        $request->validate([
            "email" => array(
                "required",
                "regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/",
            ),
        ]);

        $user = User::where('email', $data["email"])->first();
        
        if (User::where('email', $data["email"])->exists()) {
            $id = $user['id'];
            $url = URL::temporarySignedRoute(
                'verifyPwd',
                now()->addMinutes(30),
                ['email' => $data['email'], 'id' => $id]
            );


            Mail::send('message', ['url' => $url, 'name' => $user['frirsname'] . '' . $user['lastname']], function ($message) use ($user) {
                $config = config('mail');
                $name = $user['firsname'] . '' . $user['lastname'];
                $message->subject("Password Forgot !")
                    ->from($config['from']['address'], "ecole")
                    ->to($user['email'], $name);
            });
        }
        return redirect()->back()->with('success', "Mail envoyé avec succès");
    }

    public function verifyPwd(Request $request)
    {
        if (!$request->hasValidSignature()) {
            abort(404);
        }
        $id=$request->id;

        return view("newPassword", compact("id"));
    }

    public function updatePwd(Request $request, $id)
    {
        $validation = $request->validate([
            'password' => array(
                "required",
                "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#^_;:,])[A-Za-z\d@$!%*?&#^_;:,]{8,}$/",
                "confirmed:password_confirmation"
            ),
        ]);

        $Filter = User::find($id);

        $Filter->update([
            "password" => Hash::make($validation['password']),
        ]);
        return redirect()->route("login")->with("success","Mot de passe modifié avec succès");
    }

    public function authentification(Request $request){
        $user=Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'emailVerified'=>true
        ]);
        if ($user) {
            return redirect()->route('index');
        }

        return redirect()->back()->with('errors', 'Combinaison email/password invalide');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
