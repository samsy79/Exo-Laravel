<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Paginator\paginate;
use  App\Models\Enseignant;
use  App\Models\Cours;
use Illuminate\Support\Facades\Auth;
use  App\Models\User;

class TeachController extends Controller
{
    public function indexEns(){
        $tableEns = Enseignant::paginate(10);
        /* ids = Etudiant ::select("id")->get()->toArray(); */
        $ids = idsDB();
        $cours=Cours::all();
        
          return view('tableEnseign', compact("tableEns",'ids','cours'));
        /* return $ids; */
           /*   dd(($tableaux));  */

    }
    public function show($id= null){
        $profil = Enseignant::find($id);
        $lenght = Enseignant::all();
        return view('teachProfil', compact("profil","id", 'lenght' ));
    }

    public function store(Request $request){
      

           $validation =$request->validate([
            'nom'=>"required|min:2",
            'prenom'=>"required|min:2",
            "phone" => "required|:integer",
            "adresse" => "required",
            'email' => array(
                'required',
                "unique:enseignants",
                "regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/"

            ),
           ]);


         
        $data = $request->all();
        $save = Enseignant::create([
         "nom" => $data['nom'],
         "prenom"=> $data ['prenom'],
         "phone"=> $data ['phone'],
         "email"=> $data ['email'],
         "adresse" => $data['adresse'],
         'user_id'=>Auth::user()->id,
        ]);

        return redirect()->route('indexEns')->with ("message"," Enseignant enregistré avec sucèss !");
     }
public function AffecterCours(Request $request,$id){
    $data =$request->all();
    Enseignant::where("id",$id)->show();
    return redirect()->route('indexEns')->with ("message"," Enseignant supprimé avec sucèss !");

 }

 public function delete(Request $request,$id){
    $data =$request->all();
    Enseignant::where("id",$id)->delete();
    return redirect()->route('indexEns')->with ("message"," Enseignant supprimé avec sucèss !");

 }
public function edit($id)
{
    $item = Enseignant::find($id);
}

public function update(Request $request, $id)
{
    $item = Enseignant::find($id);
    $item->nom = $request->input('nom');
    $item->prenom = $request->input('prenom');
    $item->phone = $request->input('phone');
    $item->email= $request->input('email');
    $item->adresse= $request->input('adresse');
    $item->save();

    return redirect()->route('indexEns')->with('message', 'Données mises à jour avec succès');
}

}
