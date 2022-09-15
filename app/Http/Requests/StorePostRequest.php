<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'website_id' => 'required|exists:websites,id'
        ];
    }

    public function title(): string
    {
        return $this->input('title');
    }

    public function description(): string
    {
        return $this->input('description');
    }

    public function website()
    {
        return $this->input('website_id');
    }
}
