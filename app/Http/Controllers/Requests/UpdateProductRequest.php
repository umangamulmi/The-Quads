<?php

namespace App\Http\Controllers\Requests;

use App\Product;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}
