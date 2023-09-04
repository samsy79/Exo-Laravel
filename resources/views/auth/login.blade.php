@extends('auth.master-authentificate')
@section('title')
Authentification
@endsection
@section('contents')
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
@if (session("error"))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>ERREUR </strong> <br>{{session("error")}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

    </button>
</div>
    
@endif
        <div class="card-body">
            <form action="{{route('authentification')}} " method="post" autocomplete="off" enctype="multipart/form-data">
       
            @csrf
            <div class="form-group mb-3">
                <label  class="controm-label" for="">Email</label>
                <input name="email" class="form-control" type="text" name="" id="" placeholder="Saisissez vote email">
    
    
            </div>
            <div class="form-group mb-3">
                <label  class="controm-label" for="">Password</label>
                <input name="password" class="form-control" type="password" name="" id="" placeholder="Saisissez vottre mot de passe">
    
    
            </div>
            <div class="d-flex justify-content-between p-5">
                <button type="submit" class="btn btn-success" href='{{route('index')}}'>
                    Connexion
                </button>
                <div>
                    <span class="ms-5 mt-5">Vous n'avez pas un compte</span>
                    <a href="{{route('register')}} ">Cliquez ici</a>
                </div>

            </div>
           
          
        </form>
        <a href="{{route('emailForgot')}} " class="d-flex justify-content-center ">Mot de Passe Oublié</a>
        </div>
    
    </div>
</div>
@endsection
