<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Paginator\paginate;
use  App\Models\Etudiant;
use Illuminate\Support\Facades\Auth;
use  App\Models\User;

class TableauController extends Controller
{
    public function index(){
        $tableaux = Etudiant::paginate(10);
        /* ids = Etudiant ::select("id")->get()->toArray(); */
        $ids = idsDB();
        
          return view('tableau', compact("tableaux"));
        /* return $ids; */
           /*   dd(($tableaux));  */

    }
    public function show($id= null){
        $profil = Etudiant::find($id);
        $lenght = Etudiant::all();
        return view('profil', compact("profil","id", 'lenght' ));
    }

    public function store(Request $request){
        /*  dd($request->all()); */
        /*  dd ($request->input('nom')); */
        /*  dd ($request->image); */

        $file = $request->file('image');
        $images=null;
        //$name= $file->getClientOriginalName();
        if($request->hasFile("image")){
            $images =$file->store('avatar');
        }



        /* $size = $file->getSize();
        if($request->hasFile("image")){
            if($size>50000){
                return redirect ()->route('index')->with('message', "error!!");
            }
        } */
           /*  possibility1
           $storage = Storage::disk("local");
           $info = $storage->put($name,file_get_contents($file)); */

          /*
          Possibilité3
            $info = $file->move(storage_path('app'),$name); */

           /* possibilite4 */

           $validation =$request->validate([
            "nom" => "required",
            "prenom" =>"required",
            "specialite"=>"required",
            "description" => "required",
            "nationalite" => "required",
            "hobbies"  => "required",
            "image"=>"required|mimes:jpg,png, ",
           ]);


          /*
          Possibilité 4
            $storage = Storage::disk("users");
            $info = $storage->put($name,file_get_contents($file)); */
           /* possibilité 5
           $storage = Storage::disk("users_public");
           $info = $storage->put($name,file_get_contents($file)); */
            /*dd($file->getClientOriginalName()); */
        $data = $request->all();
        $save = Etudiant::create([
         "nom" => $data['nom'],
         "prenom"=> $data ['prenom'],
         "hobbies" => $data['hobbies'],
         "specialite"=> $data ['specialite'],
         "description" => $data['description'],
         "nationalite"=> $data ['nationalite'],
         'picture'=>$images,
         'user_id'=>Auth::user()->id,
        ]);

        return redirect()->route('index')->with ("message"," Etudiant enregistré avec sucèss !");
     }

     public function status(Request $request, $id)
{
    if ($request->isMethod('post')) {
        $etudiant = Etudiant::find($id);
        if ($etudiant){
            $etudiant->active = !$etudiant->active;
            $etudiant->save();
        }
        return redirect()->route('index')->with("message", "Status enregistré avec succès !");
    }

    return redirect()->route('index')->with("error", "Méthode non autorisée !");
}


 public function delete(Request $request,$id){
    $data =$request->all();
    Etudiant::where("id",$id)->delete();
    return redirect()->route('index')->with ("message"," Etudiant supprimé avec sucèss !");

 }
public function edit($id)
{
    $item = Etudiant::find($id);
}

public function update(Request $request, $id)
{
    $item = Etudiant::find($id);
    $item->nom = $request->input('nom');
    $item->prenom = $request->input('prenom');
    $item->hobbies = $request->input('hobbies');
    $item->specialite = $request->input('specialite');
    $item->description = $request->input('description');
    $item->nationalite = $request->input('nationalite');
    $item->save();

    return redirect()->route('index')->with('message', 'Données mises à jour avec succès');
}

}
