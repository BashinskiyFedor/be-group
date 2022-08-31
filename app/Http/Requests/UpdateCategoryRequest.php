<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Infrastructure\DTO\RequestDto;
class UpdateCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => [
                'string',
            ],
            'description' => [
                'string',
            ],
            'active' => [
                'bool',
            ]
        ];
    }


    public function data()
    {
        return (new RequestDto())->fromRequest($this);
    }
}
