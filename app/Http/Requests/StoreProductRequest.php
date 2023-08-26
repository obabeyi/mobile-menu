<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_create');
    }

    public function rules()
    {
        return [
            'product_code' => [
                'string',
                'required',
                'unique:products',
            ],
            'barcode' => [
                'string',
                'required',
                'unique:products',
            ],
            'name' => [
                'string',
                'required',
                'unique:products',

            ],
            'slug' => [
                'string',
                'nullable',
            ],
            'image' => [
                'array',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'prepare_time' => [
                'date_format:' . config('panel.time_format'),
                'nullable',
            ],
            'price' => [
                'numeric',
                'min:0',
            ],
        ];
    }
}
