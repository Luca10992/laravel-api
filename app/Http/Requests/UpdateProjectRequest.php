<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'thumb' => 'nullable|file',
            'description' => 'nullable|string',
            'type_id' => ['nullable', 'exists:types,id']
        ];
    }

    public function messages()
    {
    return [
        'title.required' => 'Inserire il nome del progetto',
        'type_id.exists' => 'La tipologia inserita non è valida'
    ];
    }
}