<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allow all users to make this request
    // return $this->user()->can('create', Form::class); // Check if the user has permission to create a Form
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
             'title' => 'required|string|min:3|max:255',
             'description' => 'nullable|string',
             'completed' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Lūdzu, ievadiet uzdevuma nosaukumu.',
            'title.min' => 'Uzdevuma nosaukuma garums ir jābūt vismaz 3 simboliem.',
            'description.required' => 'Lūdzu, ievadiet uzdevuma aprakstu.',
        ];
    }
}
