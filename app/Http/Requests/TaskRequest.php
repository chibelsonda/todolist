<?php

namespace App\Http\Requests;

use App\Trait\ValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    use ValidationTrait;

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
        $uniqueRule = $this->isMethod('post') ? '|unique:tasks,title' : '';
        
        return [
            'title' => 'required|string' . $uniqueRule,
            'description' => 'required|string',
            'status' => 'required|boolean'
        ];
    }
}
