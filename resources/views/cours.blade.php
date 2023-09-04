@extends('master-authentificate')
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
            Bienvenue sur la liste des Cours
                
            {{Auth::user()->firstname}} 
            {{Auth::user()->lastname}}


            

           
           
            
        </h1>
    <table class="table">
        <thead>

            <tr>
               {{--  <th scope="col">Photo</th> --}}
               <th scope="col">Image</th>
                <th scope="col">Nom</th>
                <th scope="col">Coefficient</th>
                <th scope="col">Masse Horaire</th>
                <th scope="col">AddBy</th>
                <th scope="col">Actions </th>
            </tr>
        </thead>
        @if (@isset($Cours))
            @foreach ($Cours as $item)
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
                        <td>{{ $item['coef'] }}</td>
                        <td>{{ $item['masse_horaire'] }}</td>
                        <td>{{ $item['user()->firstname'] }}</td>
                        <td></td>
                        
                        <td scope="col">
                            <div class=" btn-group">

                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <a class="" href="{{ route('delete', ['id' => $item->id])}}">
                                    Supprimer
                                </a></button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">
                                    <a class="" href="{{ route('', ['id' => $item->id])}}">
                                    
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