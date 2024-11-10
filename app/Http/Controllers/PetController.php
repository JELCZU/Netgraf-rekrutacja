<?php

namespace App\Http\Controllers;

use App\Models\Pet;

use Illuminate\Http\Request;

class PetController extends Controller
{
    function showHome(){
        
        return view('pages.home',['title' => 'Home' ]);
            }
    function showPets(){
        $pets = (new Pet)->getPetsByStatus();
        // dd($pets);
        return view('pages.pets',['title' => 'Pets','pets'=> $pets]);
    }
    function showPet(){
        return view('pages.pet',['title' => 'Pet' ]);
    }
    //
}
