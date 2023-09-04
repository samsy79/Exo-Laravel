<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash; 
use  App\Models\User;
use Illuminate\Support\Facades\validate;
use Illuminate\Support\Facades\URL; 
use Illuminate\Support\Facades\Mail; 
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
    //validation
    public function store(Request $request){
        $data = $request->all();

        $validation = $request->validate([
            'nom'=>"required|min:2",
            'prenom'=>"required|min:2",
            'email' => array(
                'required',
                "unique:user",
                "regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/"

            ),
            
            'password'=>
            array(
                'required',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#^_;:,])[A-Za-z\d@$!%*?&#^_;:,]{9,}$/',
                'confirmed:password_confirmation'
            )
            
        ]);

          $save = User::create([
            "firstname"=>$data['nom'],
            "lastname"=>$data['prenom'],
            'email'=>$data['email'],
            'birthday'=>$data['birthday'],
            'password'=> Hash::make($data['password'])
        ]); 


        //Creation de l'URL d'activation
        $url =URL::temporarySignedRoute(
            'modif_pass',now()->addMinutes(10),['email'=>$data['email']]

        );
         //Envoi de l'url géneré par mail pour activation du compte
         //send(view,params,callback)
          Mail::send('auth.mail',['url'=>$url ,'name'=>$data['nom'].' '.$data['prenom']],function($message)use ($data){
            $config = config('mail');
            $name = $data['nom'].' '.$data['prenom'];
            $email = $data['email'];
            $message->subject("Registration verification!")
                    ->from($config['from']['address'],$config['from']['name']) //mail d'envoi
                    ->to($email, $name); 
         });
        
        return redirect()->back()->with('message',"Veuillez consulter votre mail pour confirmer votre compte");
       
        
    }
    public function verifyEmail(Request $request,$email){
        $user = User::where('email',$email)->first();
        if(!$user){
            abort(404);
        }
        if(!$request->hasValidSignature()){
            abort(404);
        }

        $user->update([
            "email_verified_at"=>now(),
            "email_verified"=>true
        ]);
        return redirect()->route('login')->with('message',"compte activé avec success");

    }
    public function emailForgot(){
        return view('auth.emailForgot');
    }
    public function emailVerify(Request $request){
        $request->validate([
            'email' => array(
                'required',
                "regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/"

            ),
        ]);
        $user = User::where('email',$request->email)->first();
        if(!$user){
            return redirect()->back()->with('message','Invalide Email');
        }
        else{
            $url2 = URL::temporarySignedRoute(
                'modif_pass',
                now()->addMinutes(30),
                ['email'=>$user['email']]
            );
            Mail::send('auth.mailForgot',['url'=>$url,'name'=> $user['nom'].'  '.$user['prenom']],function($message)use($user){
                $config = config('mail');
                $name = $user['nom'].' '.$user['prenom'];
                $email = $user['email'];
                $message->subject("Registration verification!")
                        ->from($config['from']['address'],$config['from']['name']) //mail d'envoi
                        ->to($email, $name);
                        
            });
            return redirect()->back()->with('message',"Veuillez consulter votre mail pour la Réinitialisation de votre mot de passe");
        }
    }
    public function modif_pass(Request $request,$email){
        $user = User::where('email',$email)->first();
        if(!$user){
            abort(404);
        }
        if(!$request->hasValidSignature()){
            abort(404);
        }

        session(['reini_pass'=>$user->email]);
        return view('auth.emailChange',compact('email'));


    }
    public function emailChange(Request $request,$email){
        $data =$request->all();
        $user =User::where('email',$request->email)->first();
        $request->validate([
            'newpassword'=>
            array(
                'required',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#^_;:,])[A-Za-z\d@$!%*?&#^_;:,]{9,}$/',
                'confirmed: newpassword_confirmation'
            )
            ]);
            dd($user);
            $user->update([
                'password'=> Hash::make($data['newpassword']),
            ]);
            return redirect()->route('login')->with('message',"Mot de passe Réinialisé avec success");

    }
    public function authentification(Request $request){
        $user = Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'email_verified'=>true,
        ]);
        if ($user) {
            $data = Auth::user();
            
            return redirect()->route('index',compact('data'));
            
        }
       
        else{
            return redirect()->back()->with('error','combinaison erroné');
        }

    }
    public function logout(){
        Auth::logout();
        return view('auth.login');
    }
   
}


