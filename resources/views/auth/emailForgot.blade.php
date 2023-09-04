@extends('auth.master-authentificate')
@section('title')

<h1 class="bold">
     Récupération Email
</h1>
 
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
        <div class="card-body">
            <form action="{{route('emailVerify')}}" method="post" autocomplete="off" enctype="multipart/form-data">
       
            @csrf
            <div class="form-group mb-3">
                <label  class="controm-label" for="">Email</label>
                <input name="email" class="form-control" type="text" name="" id="" placeholder="Saisissez vote email">
    
    
            </div>
            
            <button type="submit" class="btn btn-success" href='{{route('emailChange')}}'>
                Envoyer
    
            </button>
            
          
    </div>
</div>
@endsection
