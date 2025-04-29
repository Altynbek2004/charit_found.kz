<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdoptPetRequest;
use App\Http\Resources\AdoptPetResource;
use App\Models\AdoptPet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdoptPetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = AdoptPet::latest()->paginate(10);
        return AdoptPetResource::collection($pets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdoptPetRequest $request)
    {
        // Handle photo upload
        $photoPath = null;
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $photoPath = $request->file('photo')->store('adopt-pet-photos', 'public');
        }

        // Create new pet record
        $pet = AdoptPet::create([
            'pet_type' => $request->petType,
            'other_pet_type' => $request->otherPetType,
            'breed' => $request->breed,
            'gender' => $request->gender,
            'age' => $request->age,
            'location' => $request->location,
            'pet_name' => $request->namePet,
            'description' => $request->description,
            'photo_path' => $photoPath,
            'contact_name' => $request->contactName,
            'contact_phone' => $request->contactPhone,
            'contact_email' => $request->contactEmail,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Объявление успешно опубликовано',
            'pet' => $pet
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pet = AdoptPet::findOrFail($id);
        return new AdoptPetResource($pet);
    }

    /**
     * Get recent pet listings
     */
    public function getRecentPets(Request $request)
    {
        // Get the most recent pets (default limit is 6)
        $limit = $request->query('limit', 6);
        $recentPets = AdoptPet::latest()->take($limit)->get();

        return AdoptPetResource::collection($recentPets);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pet = AdoptPet::findOrFail($id);

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'petType' => 'required|string',
            'otherPetType' => 'required_if:petType,other|nullable|string',
            'breed' => 'nullable|string',
            'gender' => 'nullable|string',
            'age' => 'nullable|string',
            'location' => 'required|string',
            'namePet' => 'required|string',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|max:2048', // Max 2MB
            'contactName' => 'required|string',
            'contactPhone' => 'required|string',
            'contactEmail' => 'nullable|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Handle photo upload
        $photoPath = $pet->photo_path;
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            // Delete old photo if exists
            if ($photoPath) {
                Storage::disk('public')->delete($photoPath);
            }
            $photoPath = $request->file('photo')->store('adopt-pet-photos', 'public');
        }

        // Update pet record
        $pet->update([
            'pet_type' => $request->petType,
            'other_pet_type' => $request->otherPetType,
            'breed' => $request->breed,
            'gender' => $request->gender,
            'age' => $request->age,
            'location' => $request->location,
            'pet_name' => $request->namePet,
            'description' => $request->description,
            'photo_path' => $photoPath,
            'contact_name' => $request->contactName,
            'contact_phone' => $request->contactPhone,
            'contact_email' => $request->contactEmail,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Объявление успешно обновлено',
            'pet' => $pet
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pet = AdoptPet::findOrFail($id);

        // Delete photo if exists
        if ($pet->photo_path) {
            Storage::disk('public')->delete($pet->photo_path);
        }

        $pet->delete();

        return response()->json([
            'success' => true,
            'message' => 'Объявление успешно удалено'
        ]);
    }
}
