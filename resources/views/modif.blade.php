<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <title>Modification</title>
</head>
<body>
    <form method="POST" action="{{ route('update', ['id' => $item->id]) }}">
        @csrf
        @method('PATCH') 
        @if (@isset($id))
        <div class="card m-auto " style="width: 30rem;">
         <img src="photo" style="height: 200px" class="card-img-top bg-dark " alt="photo">
         <div class="card-body">
           <h5 class="card-title">Profil</h5>
           <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos error distinctio tenetur porro, blanditiis accusamus eveniet? Quia fugit totam nostrum, ratione voluptatum magnam sint asperiores esse odio ex architecto quam.
             <h1 class="bold text-center">Etudiant N°{{$item['id']}}</h1>
           </p>
           <img 
               
            src="{{asset($item['picture'])}}" style="width: 450px ;
           Height:100px" 
           @else src=""
           @endif alt="">
         </div>
           <input name="nom" class="form-control" value="{{ $item['nom'] }}">
           <input  name="prenom" class="form-control" value="{{ $item['prenom'] }}"> 
           <input name="hobbies" class="form-control"value="{{ $item['hobbies'] }}">
           <input name="specialite" class="form-control" value="{{ $item['specialite'] }}">
           <input name="description" class="form-control" value="{{ $item['description'] }}">
           {{--  <select name="nationalite" id="">
                <option selected name="nationalite" value="{{ $item['nationalite'] }}">
            </select> --}}
            <select  value="{{old('nationalite')}}" name="nationalite" class="form-select form-select-lg mb-3" aria-label="Large select example">
                <option  @if (old('value')) selected
                
                @endif >Benin</option>
                <option value="Kenya">Kenya</option>
                <option value="Togo">Togo</option>
                <option value="Sénegal">Sénégal</option>
                <option value="Niger">Niger</option>
                <option value="Mali">Mali</option>
                <option value="USA">USA</option>
                <option value="France">France</option>
              </select>
              <button type="submit" class="btn btn-primary m-5">Enregistrez</button>
         <div class="card-body">
             
            
         
          
         </div>
       </div>
       </div>

        
    
        
    </form>
</body>
</html>