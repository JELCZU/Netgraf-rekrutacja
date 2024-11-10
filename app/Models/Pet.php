<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Pet extends Model
{
    protected $apiUrl="https://petstore.swagger.io/v2";

    // public function __construct(array $attributes = [])
    // {
    //     parent::__construct($attributes);
    //     $this->apiUrl = config('services.external_api_url', env('EXTERNAL_API_URL'));
    // }

    // Post a pet image
    public function postPetImage($petId, $imagePath)
    {
        $response = Http::attach(
            'image', file_get_contents($imagePath), 'pet-image.jpg'
        )->post("{$this->apiUrl}/pets/{$petId}/images");

        return $response->json();
    }

    // Create a new pet
    public function postPet($data)
    {
        $response = Http::post("{$this->apiUrl}/pets", $data);

        return $response->json();
    }

    // Update an existing pet
    public function putPet($id, $data)
    {
        $response = Http::put("{$this->apiUrl}/pets/{$id}", $data);

        return $response->json();
    }

    // Get pets by status
    public function getPetsByStatus($status = "available")
    {
        $response = Http::withOptions(['verify' => false])->get("{$this->apiUrl}/pet/findByStatus", [
            'status' => $status
        ]);

        return $response->json();
    }

    // Get a pet by ID
    public function getPetById($id)
    {
        $response = Http::get("{$this->apiUrl}/pets/{$id}");

        return $response->json();
    }

    // Update pet information by ID
    public function putPetById($id, $data)
    {
        $response = Http::put("{$this->apiUrl}/pets/{$id}", $data);

        return $response->json();
    }

    // Delete a pet by ID
    public function deletePet($id)
    {
        $response = Http::delete("{$this->apiUrl}/pets/{$id}");

        return $response->json();
    }
}
