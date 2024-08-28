<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LeadCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'surname' => 'alpha_dash|between:2,30|required',
            'name' => 'alpha_dash|between:2,30|required',
            'phone' => [
                'digits:11', 'integer', 'required',
                Rule::unique('leads', 'phone')->ignore($this->id),
            ],
            'email' => [
                'email:rfc', 'required',
                Rule::unique('leads', 'email')->ignore($this->id),
            ],
            'appeal' => 'string|min:5|max:500|required',
            'status' => 'integer|exists:App\Models\Status,id|nullable',
        ];
    }
}
