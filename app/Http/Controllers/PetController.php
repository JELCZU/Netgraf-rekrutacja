<?php

namespace App\Http\Controllers;

use App\Models\Pet;

use Illuminate\Http\Request;

class PetController extends Controller
{
    function showHome(){
        
        return view('pages.home',['title' => 'Home' ]);
            }
    function showPets($status='available'  ){
        $pets = (new Pet)->getPetsByStatus($status='available' );
        // dd($pets);
        return view('pages.pets',['title' => 'Pets','pets'=> $pets]);
    }
    function showPet(Request $request){
        $id = $request->query('id'); 
        
        if ($id) {
            $pet = (new Pet)->getPetById($id);
            // dd($pet);
            if($pet){
                return view('pages.pet', ['title' => $pet['name']??"Pet", 'pet' => $pet]);
            }
            else{
                return redirect()->route('pets')->with('error', 'Pet not found');

            }
        }
        return redirect()->route('pets')->with('error', 'Pet ID is required');
    }function deletePet($id){
        
        $response = (new Pet)->deletePet($id);
        
        if($response['code'] == 200){
            return redirect()->route('pets')->with('success', 'Pet deleted successfully');
        }
        else{
            return redirect()->route('pets')->with('error', 'Error deleting pet');
        }   
    }
    //
}
