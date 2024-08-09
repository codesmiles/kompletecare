<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UltrasoundResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "pelvis" => $this["pelvis"] ?? null,
            "thyroid" => $this["thyroid"] ?? null,
            "breasts" => $this["breasts"] ?? null,
            "prostate" => $this["prostate"] ?? null,
            "obstetric" => $this["obstetric"] ?? null,
            "abdominal" => $this["abdominal"] ?? null,
        ];
    }
}
