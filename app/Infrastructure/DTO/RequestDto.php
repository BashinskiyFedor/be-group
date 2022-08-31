<?php

namespace App\Infrastructure\DTO;
use Illuminate\Foundation\Http\FormRequest;

class RequestDto
{
    public function fromRequest(FormRequest $request)
    {
        return $request->all();
    }
}
