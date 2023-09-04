
    @extends('master')
    @section('content')
        
   
    <div >
       @if (@isset($id))
       <div class="card m-auto " style="width: 30rem;">
        <img src="photo" style="height: 200px" class="card-img-top bg-dark " alt="photo">
        <div class="card-body">
          <h5 class="card-title">Profil</h5>
          <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos error distinctio tenetur porro, blanditiis accusamus eveniet? Quia fugit totam nostrum, ratione voluptatum magnam sint asperiores esse odio ex architecto quam.
            <h1 class="bold text-center">Etudiant N°{{$profil['id']}}</h1>
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
          <li class="list-group-item">Hobbies :{{ $profil['hobbies'] }}</li>
          <li class="list-group-item">Specialité :{{ $profil['specialite'] }}</li>
          <li class="list-group-item">Description :{{ $profil['description'] }}</li>
          <li class="list-group-item">Nationalité :{{ $profil['nationalite'] }}</li>
        </ul>
        <div class="card-body">
            
            <a 
            @if ($id >1)
            href="{{route("indexWithId",['id'=>$profil['id']- 1 ])}}" 
            @else
            href="{{route("index")}}" 
             
            @endif class="btn btn-primary m-4">Retour</a>
            <a 
            @if ($id < sizeof($lenght))
            href="{{route("indexWithId",['id'=>$profil['id']+ 1 ])}}" 
            @else
            href="{{route("index")}}"
            @endif  class="btn btn-primary m-4">Suivant</a>
                
        
         
        </div>
      </div>
      </div>
       @else
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
           
       <form method="POST" action="{{route('tableauStore')}}" enctype="multipart/form-data" >
        @csrf 
     <div  height="800px"class=" d-flex align-items-center justify-content-center" >
            <div class="d-flex justify-content-between align-items-center" style ="width: 600px">
                
           <div  class=" d-flex flex-column justify-content-center">
           <h2 class="bold text-center mt-4 ">Ajouter un Etudiant </h2>
        
            <div class="input-group mb-3 d-flex  mb-3">
                <input type="text" value="{{old('nom')}}" name="nom" class="form-control" placeholder="nom" aria-label="Nom">
                <span class="input-group-text">|  |</span>
                <input type="text" value="{{old('prenom')}}" name="prenom" class="form-control" placeholder="prenom" aria-label="prénom">
            </div>
    
                <div class="input-group mb-3">
                <input type="file" name="image" class="form-control" id="inputGroupFile02">
                <label class="input-group-text"  for="inputGroupFile02">Images</label>
    </div>
                <div class="input-group mb-3">
                <span class="input-group-text" >Hobbies</span>
                <textarea class="form-control"  name="hobbies" aria-label="Description">{{old('hobbies')}}</textarea>
                </div>
                <div class="input-group mb-5    ">
                <span class="input-group-text">Specialité</span>
                <textarea class="form-control"  name="specialite" aria-label="Description">{{old('specialite')}}</textarea>
                </div>
                <div class="input-group mb-5    ">
                    <span class="input-group-text">Description</span>
                    <textarea class="form-control"  name="description" aria-label="Description">{{old('description')}}</textarea>
                    </div>
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
                  <button  type="submit" style="width: 30%" class="btn btn-success m-auto ">Ajouter</button>
                </div>
               
            </div>
                <div>
                        <img src="{{ asset('images/ping.jpeg') }}" height="400" class="card-img-top" alt="..."></div>
                </div>
               
        </div>
        
    
        </form>
    </div>
       @endif

    <script src="js/bootstrap.min.js"></script>
       
    @endsection
   


  