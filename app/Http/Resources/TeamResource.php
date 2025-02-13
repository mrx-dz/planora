<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'owner' => $this->whenLoaded('owner', [
                'name' => $this->owner->name,
                'profilePicture' => $this->owner->profile_photo_url,
            ]),
            'members' => $this->whenNotNull(
                ProjectMembersResource::collection($this->whenLoaded('users'))
            )
        ];
    }
}
