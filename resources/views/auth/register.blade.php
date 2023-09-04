@extends('auth.master-authentificate')
@section('title')
Création de compte 
@endsection
@section('contents')

<div>
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
</div>
@if (session("message"))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Message success </strong> <br>{{session("message")}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

    </button>
</div>
    
@endif



        <div class="card-body">
            <form action="{{route('storeUser')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
       
            @csrf
            <div class="form-group mb-3">
                <label  class="controm-label" for="">Nom</label>
                <input name="nom" value="{{old('nom')}}" class="form-control" type="text" id="" placeholder="Saisissez votre nom">
    
    
            </div>
            <div class="form-group mb-3">
                <label  class="controm-label" for="">Prénom</label>
                <input name="prenom"  value="{{old('prenom')}}" class="form-control" type="text"  id="" placeholder="Saisissez votre prénom">
    
    
            </div>
            <div class="form-group mb-3">
                <label  class="controm-label" for="">Date de Naissance</label>
                <input name="birthday" class="form-control" type="date"  id="" >
    
    
            </div>

            <div class="form-group mb-3">
                <label  class="controm-label" for="">Email</label>
                <input required name="email"   value="{{old('email')}}" class="form-control" type="text" name="" id="" placeholder="Saisissez vote email">
    
    
            </div>
            <div class="form-group mb-3">
                <label  class="controm-label" for="">Password</label>
                <input name="password" class="form-control" type="password" name="" id="" placeholder="Saisissez votre mot de passe">
    
    
            </div>
            <div class="form-group mb-3">
                <label  class="controm-label" for="">Confirmation de mot de passe</label>
                <input name="password_confirmation" class="form-control" type="password" name="" id="" placeholder="Confirmez votre mot de passe ">
    
    
            </div>
            <button type="submit" class="btn btn-success">
             Enregistrer
    
            </button>
            
            <span class="ms-5 mt-5">Vous avez déjà  un compte</span>
            <a href=" {{route('login')}}">Cliquez ici</a>
        </form>
        </div>
    
    </div>
</div>
@endsection
<script src="{{asset('js/bootstrap.min.js')}}"></script>
