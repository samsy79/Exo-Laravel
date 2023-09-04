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
            <a href="/profil">
                <button type="button" class="btn btn-primary m-5">Ajouter Etudiant</button>
              </a>
               <a href="/">
                    <button type="button" class="btn btn-success m-5">Gestion des Cours</button>
                  </a>
                  <a href="/">
                    <button type="button" class="btn btn-danger m-5">Attribution de Cours</button>
                  </a>   
                  <a href="/tableEnseign">
                    <button type="button" class="btn btn-secondary m-5">Gestion Enseignant</button>
                  </a>
        </div>
        <h1 class="m-4 text-center">
            Bienvenue sur la liste des Etudiants
           
                
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
                <th scope="col">Hobbies</th>
                <th scope="col">Spécialités</th>
                <th scope="col">Actions </th>
            </tr>
        </thead>
        @if (@isset($tableaux))
            @foreach ($tableaux as $item)
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
                        <td>{{ $item['hobbies'] }}</td>
                        <td>{{ $item['specialite'] }}</td>
                        <td scope="col">
                            <div class=" btn-group">
                              
                                <button type="button" class="btn btn-sm btn-outline-secondary" >
                                    <a href="{{route("indexWithId",['id'=>$item['id']])}}">Voir Plus </a> </button>
                              
                              <button type="button" class="btn btn-sm btn-outline-secondary" >
                                <a class="" href="{{ route('edit', ['id' => $item->id])}}">Modifier</a>
                                 </button>

                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <a class="" href="{{ route('delete', ['id' => $item->id])}}">
                                    Supprimer
                                </a></button>
                                <form method="POST" action="{{ route('status', ['id' => $item->id]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-{{ $item['active'] ? 'success' : 'danger' }}">
                                        {{ $item['active'] ? 'Activé' : 'Désactivé' }}
                                    </button>
                                </form>
                                
                            </div>
                        </td>
                    </tr>
                    
                </tbody>
               
                
            @endforeach
            

    </table>
    <div class="paginate d-flex justify-content-end m-5">
        {{ $tableaux->links() }}
    </div>
@endif
   
@endsection
<script src="js/bootstrap.min.js">
    
</script>
