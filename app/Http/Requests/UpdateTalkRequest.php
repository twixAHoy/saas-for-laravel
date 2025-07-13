<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTalkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //we are able to do this because we are using model binding
        return $this->user()->id === $this->talk->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        
                'title' => 'required|max:255',
                'length' => '',
                'type' => ['required', Rule::enum(TalkType::class)],
                'abstract' => '',
                'orgnotes' => '',
      
        ];
    }
}
