<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class XRayResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "toes" => $this["toes"] ?? null,
            "foot" => $this["foot"] ?? null,
            "chest" => $this["chest"] ?? null,
            "ankle" => $this["ankle"] ?? null,
            "femoral" => $this["femoral"] ?? null,
            "humerus" => $this["humerus"] ?? null,
            "fingers" => $this["fingers"] ?? null,
            "hip_joint" => $this["hip_joint"] ?? null,
            "knee_joint" => $this["knee_joint"] ?? null,
            "elbow_joint" => $this["elbow_joint"] ?? null,
            "wrist_joint" => $this["wrist_joint"] ?? null,
            "pelvic_joint" => $this["pelvic_joint"] ?? null,
            "tibia/fibula" => $this["tibia/fibula"] ?? null,
            "rradius/ulner" => $this["radius/ulner"] ?? null,
            "thoratic_inlet" => $this["thoratic_inlet"] ?? null,
            "shoulder_joint" => $this["shoulder_joint"] ?? null,
            "sacro_iliac_joint" => $this["sacro_iliac_joint"] ?? null,
            "lumbvar_vertibrae" => $this["lumbvar_vertibrae"] ?? null,
            "thoratic_vertebrae" => $this["thoratic_vertebrae"] ?? null,
            "cervical_vertebrae" => $this["cervical_vertebrae"] ?? null,
            "lumbo_sacral_vertebrae" => $this["lumbo_sacral_vertebrae"] ?? null,
            "thoraco_lumbar_vertebrae" => $this["thoraco_lumbar_vertebrae"] ?? null,
        ];
    }
}
