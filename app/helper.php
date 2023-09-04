<?php
use App\Models\Etudiant;
if (!function_exists(" idsDB")){
    function idsDB(){
        $ids =Etudiant::pluck('id');
        return $ids;
    }
}
if (!function_exists(" idDB")){
    function idDB(){
        $idse =Enseignants::pluck('id');
        return $idse;
    }
}
