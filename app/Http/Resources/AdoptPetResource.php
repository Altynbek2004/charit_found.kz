<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdoptPetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'petType' => $this->pet_type,
            'otherPetType' => $this->other_pet_type,
            'breed' => $this->breed,
            'gender' => $this->gender,
            'age' => $this->age,
            'location' => $this->location,
            'namePet' => $this->pet_name,
            'description' => $this->description,
            'photoUrl' => $this->photo_path ? asset('storage/' . $this->photo_path) : null,
            'contactName' => $this->contact_name,
            'contactPhone' => $this->contact_phone,
            'contactEmail' => $this->contact_email,
            'createdAt' => $this->created_at->format('Y-m-d H:i:s'),
            'updatedAt' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
