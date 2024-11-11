<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Pet extends Model
{
    protected $apiUrl="https://petstore.swagger.io/v2";

    protected $customHttp;

    public function __construct(array $attributes = [])
    {
      
        $this->customHttp = Http::withOptions(['verify' => false]);
    }
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
        $response = $this->customHttp->post("{$this->apiUrl}/pets", $data);

        return $response->json();
    }

    // Update an existing pet
    public function putPet($id, $data)
    {
        $response = $this->customHttp->put("{$this->apiUrl}/pets/{$id}", $data);

        return $response->json();
    }

    // Get pets by status
    public function getPetsByStatus($status = "available")
    {
        $response = $this->customHttp->get("{$this->apiUrl}/pet/findByStatus", [
            'status' => $status
        ]);

        return $response->json();
    }

    // Get a pet by ID
    public function getPetById($id)
    {
        $response = $this->customHttp->get("{$this->apiUrl}/pet/{$id}");

        return $response->json();
    }

    // Update pet information by ID
    public function putPetById($id, $data)
    {
        $response = $this->$customHttp->put("{$this->apiUrl}/pets/{$id}", $data);

        return $response->json();
    }

    // Delete a pet by ID
    public function deletePet($id)
    {
        $response = $this->customHttp->delete("{$this->apiUrl}/pet/{$id}");

        return $response->json();
    }
}
