<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriptionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'website_id' => 'required|exists:websites,id'
        ];
    }
    
    public function email(): string
    {
        return $this->input('email');
    }

    public function website()
    {
        return $this->input('website_id');
    }
}
