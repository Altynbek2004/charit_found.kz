<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFoundPetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'petType' => 'required|string',
            'otherPetType' => 'required_if:petType,other|nullable|string',
            'breed' => 'nullable|string',
            'gender' => 'nullable|string',
            'age' => 'nullable|string',
            'location' => 'required|string',
            'date' => 'required|date',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|max:2048', // Max 2MB
            'contactName' => 'required|string',
            'contactPhone' => 'required|string',
            'contactEmail' => 'nullable|email',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'petType.required' => 'Выберите вид животного',
            'otherPetType.required_if' => 'Укажите вид животного',
            'location.required' => 'Укажите место находки',
            'date.required' => 'Укажите дату находки',
            'contactName.required' => 'Укажите ваше имя',
            'contactPhone.required' => 'Укажите ваш телефон',
            'contactEmail.email' => 'Укажите корректный email',
            'photo.image' => 'Загружаемый файл должен быть изображением',
            'photo.max' => 'Максимальный размер файла - 2MB',
        ];
    }
}
