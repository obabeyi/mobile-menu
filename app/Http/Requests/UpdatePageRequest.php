<?php

namespace App\Http\Requests;

use App\Models\Page;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('page_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'slug' => [
                'string',
                'nullable',
            ],
            'photo' => [
                'array',
            ],
        ];
    }
}
