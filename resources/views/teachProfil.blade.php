@extends('master')
@section('content')
    
<div >
   @if (@isset($id))
   <div class="card m-auto " style="width: 30rem;">
    <img src="photo" style="height: 200px" class="card-img-top bg-dark " alt="photo">
    <div class="card-body">
      <h5 class="card-title">Profil</h5>
      <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos error distinctio tenetur porro, blanditiis accusamus eveniet? Quia fugit totam nostrum, ratione voluptatum magnam sint asperiores esse odio ex architecto quam.
        <h1 class="bold text-center">Enseignant  N°{{$profil['id']}}</h1>
      </p>
      <img 
      @if (!empty($profil['picture']))
          
       src="{{asset($profil['picture'])}}" style="width: 450px ;
      Height:100px" 
      @else src=""
      @endif alt="">
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Nom :{{ $profil['nom'] }}</li>
      <li class="list-group-item">Pronom : {{ $profil['prenom'] }}</li>
      <li class="list-group-item">Email:{{ $profil['email'] }}</li>
      <li class="list-group-item">Cours :{{ $profil['cours'] }}</li>
      <li class="list-group-item">Téléphone :{{ $profil['phone'] }}</li>
      <li class="list-group-item">Adresse:{{ $profil['adresse'] }}</li>
    </ul>
    <div class="card-body">
        
        <a 
        @if ($id >1)
        href="{{route("indexWithIdE",['id'=>$profil['id']- 1 ])}}" 
        @else
        href="{{route("indexEns")}}" 
         
        @endif class="btn btn-primary m-4">Retour</a>
        <a 
        @if ($id < sizeof($lenght))
        href="{{route("indexWithIdE",['id'=>$profil['id']+ 1 ])}}" 
        @else
        href="{{route("indexEns")}}"
        @endif  class="btn btn-primary m-4">Suivant</a>
            
    
       @endif
    </div>
  </div>
  </div>
  @endsection