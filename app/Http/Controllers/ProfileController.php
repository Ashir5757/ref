<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function viewProfile()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Retrieve the profile associated with the user
        $profile = Profile::where('id', $user->id)->first();
        return view('dashbord.users-profile', ['profile' => $profile]);
    }

    public function addProfile(Request $request)
    {
        $user_id = Auth::id();
        $existingProfile = Profile::where('id', $user_id)->first();

        if ($existingProfile) {
            // Update the existing profile
            $request->validate([
                "image" => 'nullable|max:1000',
                "about" => 'nullable',
                "cnic" => 'required|numeric|unique:profiles,cnic,' . $existingProfile->id,
                "country" => 'required',
                "address" => 'required',
                "phone" => 'required',
                "twitter" => 'nullable',
                "facebook" => 'nullable',
                "instagram" => 'nullable',
                "linkedin" => 'nullable',
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/profile_images', $imageName);
                $existingProfile->image = $imageName;
            }

            // Update other profile attributes
            $existingProfile->about = $request->input('about');
            $existingProfile->cnic = $request->input('cnic');
            $existingProfile->country = $request->input('country');
            $existingProfile->address = $request->input('address');
            $existingProfile->phone = $request->input('phone');
            $existingProfile->twitter = $request->input('twitter');
            $existingProfile->facebook = $request->input('facebook');
            $existingProfile->instagram = $request->input('instagram');
            $existingProfile->linkedin = $request->input('linkedin');

            // Save the updated profile
            $existingProfile->save();

            return response()->json(['success' => 'Profile updated successfully']);
        } else {
            // Create a new profile
            $request->validate([
                "image" => 'nullable|max:1000',
                "about" => 'nullable',
                "cnic" => 'required|numeric|unique:profiles',
                "country" => 'required',
                "address" => 'required',
                "phone" => 'required',
                "twitter" => 'nullable',
                "facebook" => 'nullable',
                "instagram" => 'nullable',
                "linkedin" => 'nullable',
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/profile_images', $imageName);
                $data['image'] = $imageName;
            } else {
                $data['image'] = null;
            }

            // Create a new profile instance
            $profile = new Profile;

            // Set profile attributes
            $profile->image = $data['image'];
            $profile->about = $request->input('about');
            $profile->cnic = $request->input('cnic');
            $profile->country = $request->input('country');
            $profile->address = $request->input('address');
            $profile->phone = $request->input('phone');
            $profile->twitter = $request->input('twitter');
            $profile->facebook = $request->input('facebook');
            $profile->instagram = $request->input('instagram');
            $profile->linkedin = $request->input('linkedin');

            // Set the user_id to the ID of the authenticated user
            $profile->id = $user_id;

            // Save the profile
            $profile->save();

            return response()->json(['success' => 'Profile added successfully']);
        }
    }



}
