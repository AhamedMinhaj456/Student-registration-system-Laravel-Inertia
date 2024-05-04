<?php

namespace App\Http\Requests;


use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'       => ['string'],
            'age' => ['string'],
            //'status'      => ['string', Rule::in(array_column(TicketStatus::cases(), 'value'))],
            'image'  => ['sometimes', 'file', 'mimes:jpg,jpeg,png'],
        ];
    }
}
