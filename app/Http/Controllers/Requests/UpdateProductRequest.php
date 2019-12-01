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
// create a  namespace object
/******/ 	// mode & 1: value is a module id, require it
