<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWebsiteRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'url' => 'required|url|unique:websites,url'
        ];
    }

    public function name(): string
    {
        return $this->input('name');
    }

    public function websiteUrl(): string
    {
        return $this->input('url');
    }
}
