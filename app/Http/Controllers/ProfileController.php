<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

public function viewProfile(){
    return view('dashbord.users-profile');
}

    public function addProfile(Request $request)
    {

        $request->validate([
            "image" => 'nullable|image|mimes:jpeg,png,jpg|max:1000',
            "about" => 'nullable',
            "cnic" => 'required|unique:profiles|min:13|max:13|numeric',
            "country" => 'nullable',
            "address" => 'nullable',
            "phone" => 'required',
            "twitter" => 'nullable',
            "facebook" => 'nullable',
            "instagram" => 'nullable',
            "linkedin" => 'nullable',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile_images');
        } else {
            $imagePath = null;
        }

        // Create a new profile instance
        $profile = new Profile;

        // Set profile attributes
        $profile->image = $imagePath;
        $profile->about = $request->input('about');
        $profile->cnic = $request->input('cnic');
        $profile->country = $request->input('country');
        $profile->address = $request->input('address');
        $profile->phone = $request->input('phone');
        $profile->twitter = $request->input('twitter');
        $profile->facebook = $request->input('facebook');
        $profile->instagram = $request->input('instagram');
        $profile->linkedin = $request->input('linkedin');

        // Save the profile
        $profile->save();

        return redirect()->response()->json(['success'=>'added successfully']);
    }

    public function editProfile(Request $request, $id)
    {
        $request->validate([
            "image" => 'nullable|image|mimes:jpeg,png,jpg|max:1000',
            "about" => 'nullable',
            "cnic" => 'required|min:13|max:13|numeric|unique:profiles,cnic,' . $id,
            "country" => 'nullable',
            "address" => 'nullable',
            "phone" => 'required',
            "twitter" => 'nullable',
            "facebook" => 'nullable',
            "instagram" => 'nullable',
            "linkedin" => 'nullable',
        ]);

        // Fetch the profile to be edited
        $profile = Profile::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the previous image if it exists
            if ($profile->image) {
                Storage::delete($profile->image);
            }

            // Upload the new image
            $imagePath = $request->file('image')->store('profile_images');
            $profile->image = $imagePath;
        }

        // Modify other fields as needed
        $profile->about = $request->input('about');
        $profile->cnic = $request->input('cnic');
        $profile->country = $request->input('country');
        $profile->address = $request->input('address');
        $profile->phone = $request->input('phone');
        $profile->twitter = $request->input('twitter');
        $profile->facebook = $request->input('facebook');
        $profile->instagram = $request->input('instagram');
        $profile->linkedin = $request->input('linkedin');

        // Save the changes
        $profile->save();

        return back()->with('success', 'Profile Successfully Updated');
    }
}
