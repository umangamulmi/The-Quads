<?php

namespace App\Http\Controllers\Requests;

use App\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:products,id',
        ];
    }
}
