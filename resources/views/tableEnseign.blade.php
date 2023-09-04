@extends('master')

@section('content')
@if (session("message"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Message success </strong> <br>{{session("message")}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

            </button>
        </div>
            
        @endif
        <div class="d-flex justify-content-end">
            <a href="/teachProfil">
                <button type="button" class="btn btn-primary m-5">Ajouter Enseignant</button>
              </a>
               <a href="/">
                    <button type="button" class="btn btn-success m-5">Gestion des Cours</button>
                  </a>
                  <a href="/">
                    <button type="button" class="btn btn-danger m-5">Attribution de Cours</button>
                  </a>   
        </div>
        <h1 class="m-4 text-center">
            Bienvenue sur la liste des Enseignants
                
            {{Auth::user()->firstname}} 
            {{Auth::user()->lastname}}


            

           
           
            
        </h1>
    <table class="table">
        <thead>

            <tr>
               {{--  <th scope="col">Photo</th> --}}
               <th scope="col">Image</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Email</th>
                <th scope="col">Cours</th>
                <th scope="col">Actions </th>
            </tr>
        </thead>
        @if (@isset($tableEns))
            @foreach ($tableEns as $item)
                <tbody>
                    <tr>
                        {{--  <th {{ $item['id'] }} scope="row"></th> --}}
                        <td><img 
                            @if (!empty($item['picture']))
                                
                             src="{{asset($item['picture'])}}" style="width: 100px ;
                            Height:50px" 
                            @else src=""
                            @endif alt=""></td>
                        <td>{{ $item['nom'] }}</td>
                        <td>{{ $item['prenom'] }}</td>
                        <td>{{ $item['email'] }}</td>
                        <td></td>
                        
                        <td scope="col">
                            <div class=" btn-group">
                              
                                <button type="button" class="btn btn-sm btn-outline-secondary" >
                                    <a href="{{route("indexWithIdE",['id'=>$item['id']])}}">Voir Plus </a> </button>
                              
                              <button type="button" class="btn btn-sm btn-outline-secondary" >
                                <a class="" href="{{ route('edit', ['id' => $item->id])}}">Modifier</a>
                                 </button>

                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <a class="" href="{{ route('delete', ['id' => $item->id])}}">
                                    Supprimer
                                </a></button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <a class="" href="{{ route(' AffecterCours', ['id' => $item->id])}}">
                                    Affecter Cours
                                </a></button>
                                
                            </div>
                        </td>
                    </tr>
                    
                </tbody>
               
                
            @endforeach
            

    </table>
    <div class="paginate d-flex justify-content-end m-5">
        {{ $tableEns->links() }}
    </div>
@endif
@if ($errors->any())
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <ul>
         @foreach ($errors->all() as $error)
             <li>{{ $error }}</li><br />
         @endforeach
     </ul>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
 </div>
@endif
    
<form method="POST" action="{{route('tableauEnsStore')}}" enctype="multipart/form-data" >
 @csrf 
<div  height="800px"class=" d-flex align-items-center justify-content-center" >
     <div class="d-flex justify-content-between align-items-center" style ="width: 600px">
         
    <div  class=" d-flex flex-column justify-content-center">
    <h2 class="bold text-center mt-4 ">Ajouter un Enseignant </h2>
 
     <div class="input-group mb-3 d-flex  mb-3">
         <input type="text" value="{{old('nom')}}" name="nom" class="form-control" placeholder="nom" aria-label="Nom">
         <span class="input-group-text">|  |</span>
         <input type="text" value="{{old('prenom')}}" name="prenom" class="form-control" placeholder="prenom" aria-label="prénom">
     </div>

         <div class="input-group mb-3">
         <span class="input-group-text" >Email</span>
         <input type="email" name="email" class="form-control"   value="{{old('email')}}" id="">
         </div>
         <div class="input-group mb-5    ">
          <select name="Cours" multiple>
            @foreach($cours as $item)
                <option value="{{ $item->nom }}">{{ $item->nom }}</option>
            @endforeach
        </select>
        <div class="input-group mb-3">
            <span class="input-group-text" >Téléphone</span>
            <input type="tel" name="phone" class="form-control"   value="{{old('phone')}}" id="">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" >Adresse</span>
                <input type="text" name="adresse" class="form-control"   value="{{old('adresse')}}" id="">
                </div>

         </div>
         <div class="input-group mb-5    ">

             </div>
       
           <button  type="submit" style="width: 30%" class="btn btn-success m-auto ">Ajouter</button>
         </div>
        
     </div>
         <div>
                 <img src="{{ asset('images/ping.jpeg') }}" height="400" class="card-img-top" alt="..."></div>
         </div>
        
 </div>
 

 </form>
</div>
@endsection
<script src="js/bootstrap.min.js">
    
</script>
