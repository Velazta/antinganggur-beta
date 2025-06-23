<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $user = $request->user();

        $profile = $this->resource;

        return [
            // mengambil data dari table user
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,

            // mengambil data dari tabel profiles
            'profile_id' => $profile ? $profile->id : null,
            'phone_number' => $profile ? $profile->phone_number : null,
            'country' => $profile ? $profile->country : null,
            'province' => $profile ? $profile->province : null,
            'city' => $profile ? $profile->city : null,
            'date_of_birth' => $profile ? $profile->date_of_birth : null,
            'gender' => $profile ? $profile->gender : null,
            'address' => $profile ? $profile->address : null,
            'bio' => $profile ? $profile->bio : null,
            'profile_photo_url' => ($profile && $profile->profile_photo_path) ? asset('storage/' . $profile->profile_photo_path) : null,
            'updated_at' => ($profile && $profile->updated_at) ? $profile->updated_at->toIso8601String() : null,
        ];
    }
}
