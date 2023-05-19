<?php

namespace App\Http\Resources;

use App\Models\Friend;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

class ResultResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'result' => $this->result,
        ];
    }
}
