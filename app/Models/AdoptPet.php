<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdoptPet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pet_type',
        'pet_name',
        'other_pet_type',
        'breed',
        'gender',
        'age',
        'location',
        'found_date',
        'description',
        'photo_path',
        'contact_name',
        'contact_phone',
        'contact_email',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'found_date' => 'date',
    ];
}
