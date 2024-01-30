<?php

namespace App\Http\Controllers;

use App\Models\PagesContent;
use Illuminate\Http\Request;
use App\Models\AboutPageContent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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



// frontend pages content code



public function frontendmain() {

    $home = PagesContent::first();
    $about = AboutPageContent::first();

    return view('frontend.main',compact('home','about'));
}

public function frontendabout() {


    $about = AboutPageContent::first();

    return view('frontend.about',compact('about'));
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

            // images and videos
            'video' => 'required|string|max:255',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'image3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

]);



// Check if the homepage content already exists
$existingHomepage = PagesContent::first();

if ($existingHomepage) {
    // If the record already exists, you may choose to update it or handle it as needed
    return redirect()->back()->with('error', 'Homepage content already exists. Use the update method.');
}

 $homepage = new PagesContent();
// Handle image1 update
$this->handleFileUpload($request, 'image1', 'images', $homepage);

// Handle image2 update
$this->handleFileUpload($request, 'image2', 'images', $homepage);

// Handle image3 update
$this->handleFileUpload($request, 'image3', 'images', $homepage);


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
            // images and videos
            'video' => 'required|string|max:255',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'image3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


    // Find the homepage record
    $homepage = PagesContent::findOrFail($id);

    // Handle image1 update
    $this->handleFileUpload($request, 'image1', 'images', $homepage);

    // Handle image2 update
    $this->handleFileUpload($request, 'image2', 'images', $homepage);

    // Handle image3 update
    $this->handleFileUpload($request, 'image3', 'images', $homepage);


    // If the record exists, update it
    $homepage->update($validatedData);
    $message = 'Homepage content updated successfully';

    return redirect()->back()->with('success', $message);
}

private function handleFileUpload(Request $request, $fieldName, $storagePath, $model)
{
    if ($request->hasFile($fieldName)) {
        // Delete old file if it exists
        if ($model->{$fieldName}) {
            Storage::disk('public')->delete($model->{$fieldName});
        }

        // Upload new file
        $file = $request->file($fieldName)->store($storagePath, 'public');
        $model->{$fieldName} = $file;
    }
}


// About page


public function loadeaboutpage()
{
    // Query the database to get the existing homepage data
    $newAboutpage = AboutPageContent::first();

    if ($newAboutpage) {
        // If data exists, pass it to the view
        return view('backend.aboutpage', compact('newAboutpage'));
    } else {
        // If no data exists, you can handle it accordingly
        return view('backend.aboutpage');
    }
}

public function loadeditaboutpage()
    {
        $aboutpage = AboutPageContent::first();


        return view("backend.editaboutpage",compact('aboutpage'));
    }


    public function updateaboutpage(Request $request, $id)
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

            // images and videos
            'video' => 'required|string|max:255',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'image3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


    // Find the homepage record
    $aboutpage = AboutPageContent::findOrFail($id);

    // Handle image1 update
    $this->handleFileUpload($request, 'image1', 'images', $aboutpage);

    // Handle image2 update
    $this->handleFileUpload($request, 'image2', 'images', $aboutpage);

    // Handle image3 update
    $this->handleFileUpload($request, 'image3', 'images', $aboutpage);


    // If the record exists, update it
    $aboutpage->update($validatedData);
    $message = 'Aboutpage content updated successfully';

    return redirect()->back()->with('success', $message);
}

public function loadeaddaboutpage()
    {
        return view("backend.addaboutpage");
    }



    public function addaboutpage(Request $request)
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


            // images and videos
            'video' => 'required|string|max:255',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'image3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

]);



// Check if the homepage content already exists
$existingaboutpage = AboutPageContent::first();

if ($existingaboutpage) {
    // If the record already exists, you may choose to update it or handle it as needed
    return redirect()->back()->with('error', 'Homepage content already exists. Use the update method.');
}

 $aboutpage = new aboutPageContent();
// Handle image1 update
$this->handleFileUpload($request, 'image1', 'images', $aboutpage);

// Handle image2 update
$this->handleFileUpload($request, 'image2', 'images', $aboutpage);

// Handle image3 update
$this->handleFileUpload($request, 'image3', 'images', $aboutpage);


// If the record doesn't exist, create a new one
AboutPageContent::create($validatedData);

$message = 'Aboutpage content created successfully';

return redirect()->back()->with('success', $message);


    }

}


