<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{

    public function loadshop(){
        $user = Auth::user();
        $profile = Profile::where('id', $user->id)->first();
        return view('dashbord.shop',compact(['profile']));
    }

    public function shop(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|string',
            'address' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $shop = new Shop();
        $shop->name = $request->name;
        $shop->description = $request->description;
        $shop->contact_email = $request->contact_email;
        $shop->contact_phone = $request->contact_phone;
        $shop->address = $request->address;

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('shop_logos');
            $shop->logo = $logoPath;
        }

        if ($request->hasFile('banner_image')) {
            $bannerImagePath = $request->file('banner_image')->store('shop_banners');
            $shop->banner_image = $bannerImagePath;
        }

        $shop->save();

        return redirect()->back()->with('success', 'shop created successfully!');
    }
}
