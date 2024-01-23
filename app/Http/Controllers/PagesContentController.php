<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PagesContent;
use App\Http\Controllers\Controller;

class PagesContentController extends Controller
{

    public function loadehomepage()
{
    // Query the database to get the existing homepage data
    $newHomepage = PagesContent::first();

    if ($newHomepage) {
        // If data exists, pass it to the view
        return view('backend.homepage', compact('newHomepage'));
    } else {
        // If no data exists, you can handle it accordingly
        return view('backend.homepage');
    }
}


public function frontendmain() {

    $data = PagesContent::first();

    return view('frontend.main',compact('data'));
}


    public function loadedithomepage()
    {
        $homepage = PagesContent::first();

        return view("backend.edithomepage",compact('homepage'));
    }

    public function loadeaddhomepage()
    {
        return view("backend.addhomepagecontent");
    }

    public function addhomepage(Request $request)
    {
  // Validate the request data
  $validatedData = $request->validate([
            'h1' => 'required|string|max:255',
            'h2' => 'required|string|max:255',
            'h4' => 'required|string|max:255',
            'h5' => 'required|string|max:255',
            'h6' => 'required|string|max:255',
            'h7' => 'required|string|max:255',
            'h8' => 'required|string|max:255',
            'h9' => 'required|string|max:255',
            'h10' => 'required|string|max:255',
            'h11' => 'required|string|max:255',
            'h12' => 'required|string|max:255',
            'h13' => 'required|string|max:255',
            'h14' => 'required|string|max:255',
            'h15' => 'required|string|max:255',
            'h16' => 'required|string|max:255',
            'h17' => 'required|string|max:255',
            'h18' => 'required|string|max:255',
            'h19' => 'required|string|max:255',
            'h20' => 'required|string|max:255',
            'h21' => 'required|string|max:255',
            'h22' => 'required|string|max:255',
            'h23' => 'required|string|max:255',
            'h24' => 'required|string|max:255',
            'h25' => 'required|string|max:255',
            'h26' => 'required|string|max:255',
            'h27' => 'required|string|max:255',
            'h28' => 'required|string|max:255',
            'h29' => 'required|string|max:255',
            'h30' => 'required|string|max:255',
            'h31' => 'required|string|max:255',
            'h32' => 'required|string|max:255',
]);

// Check if the homepage content already exists
$existingHomepage = PagesContent::first();

if ($existingHomepage) {
    // If the record already exists, you may choose to update it or handle it as needed
    return redirect()->back()->with('error', 'Homepage content already exists. Use the update method.');
}

// If the record doesn't exist, create a new one
PagesContent::create($validatedData);

$message = 'Homepage content created successfully';

return redirect()->back()->with('success', $message);


    }


    public function updatehomepage(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'h1' => 'required|string|max:255',
            'h2' => 'required|string|max:255',
            'h3' => 'required|string|max:255',
            'h4' => 'required|string|max:255',
            'h5' => 'required|string|max:255',
            'h6' => 'required|string|max:255',
            'h7' => 'required|string|max:255',
            'h8' => 'required|string|max:255',
            'h9' => 'required|string|max:255',
            'h10' => 'required|string|max:255',
            'h11' => 'required|string|max:255',
            'h12' => 'required|string|max:255',
            'h13' => 'required|string|max:255',
            'h14' => 'required|string|max:255',
            'h15' => 'required|string|max:255',
            'h16' => 'required|string|max:255',
            'h17' => 'required|string|max:255',
            'h18' => 'required|string|max:255',
            'h19' => 'required|string|max:255',
            'h20' => 'required|string|max:255',
            'h21' => 'required|string|max:255',
            'h22' => 'required|string|max:255',
            'h23' => 'required|string|max:255',
            'h24' => 'required|string|max:255',
            'h25' => 'required|string|max:255',
            'h26' => 'required|string|max:255',
            'h27' => 'required|string|max:255',
            'h28' => 'required|string|max:255',
            'h29' => 'required|string|max:255',
            'h30' => 'required|string|max:255',
            'h31' => 'required|string|max:255',
            'h32' => 'required|string|max:255',
        ]);

        $homepage = PagesContent::find($id);

        if ($homepage) {
            // If the record exists, update it
            $homepage->update($validatedData);
            $message = 'Homepage content updated successfully';
        } else {
            // If the record doesn't exist, create a new one
            PagesContent::create($validatedData);
            $message = 'Homepage content created successfully';
        }

        return redirect()->back()->with('success', $message);

    }

}
