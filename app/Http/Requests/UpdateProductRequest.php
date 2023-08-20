<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_edit');
    }

    public function rules()
    {
        return [
            'product_code' => [
                'string',
                'required',
                'unique:products,product_code,' . request()->route('product')->id,
            ],
            'barcode' => [
                'string',
                'required',
                'unique:products,barcode,' . request()->route('product')->id,
            ],
            'name' => [
                'string',
                'required',
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
