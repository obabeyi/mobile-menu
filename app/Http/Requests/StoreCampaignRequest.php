<?php

namespace App\Http\Requests;

use App\Models\Campaign;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCampaignRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('campaign_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'campain_photo' => [
                'required',
            ],
            'order' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'status' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
