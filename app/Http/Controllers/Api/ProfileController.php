<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request) {
        $user = $request->user();

        $profile = $user->profile ?? new Profile();

        return new ProfileResource($profile);
    }

    public function store(Request $request) {
        $user = $request->user();

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:255',
            'province' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'gender' => ['nullable', Rule::in(['male', 'female'])],
            'address' => 'nullable|string',
            'bio' => 'nullable|string',
        ]);


        if ($request->has('name')) {
            $user->update(['name' => $validatedData['name']]);
        }


        $profile = $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            $validatedData
        );

        return new ProfileResource($profile->fresh());
    }
}
