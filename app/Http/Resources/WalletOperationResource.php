<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletOperationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'datetime' => $this->created_at->format('d.m.Y H:i:s'),
            'value' => $this->value,
            'description' => $this->description,
        ];
    }
}
