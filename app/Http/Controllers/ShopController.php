<?php

namespace App\Http\Controllers;


use App\Models\Shop;
use App\Models\Product;
use App\Models\Profile;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{

    public function loadshop(){
        $user_id = Auth::user()->id;
        $profile = Profile::where('id', $user_id)->first();

        $shop = Shop::where('id', $user_id)->first();

        if ($shop) {

            try {
                $user_id = Auth::user()->id;
                $categories = Category::where('user_id', $user_id)->get();

                if ($categories->isNotEmpty()) {
                    return view("dashbord.category", compact('categories'));
                }else{
                    return view("dashbord.category");
                }
            } catch (\Exception $e) {
                 return back()->with('error', ['message' => 'An error occurred while retrieving categories.']);
            }
        } else {

            return view('dashbord.shop', compact(['profile']));
        }
    }

    public function shop(Request $request)
    {
        $user_id = Auth::user()->id;
        $shop = Shop::where('id', $user_id)->first();

if ($shop) {
    return view("dashbord.category");
}else{
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
        $shop->id = $user_id;
        $shop->name = $request->name;
        $shop->description = $request->description;
        $shop->contact_email = $request->contact_email;
        $shop->contact_phone = $request->contact_phone;
        $shop->address = $request->address;

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('public/shop_logos');
            $shop->logo = str_replace('public/', '', $logoPath);
        }

        if ($request->hasFile('banner_image')) {
            $bannerImagePath = $request->file('banner_image')->store('public/shop_banners');
            $shop->banner_image = str_replace('public/', '', $bannerImagePath);
        }


        $shop->save();

        return redirect()->route('category')->with('success', 'shop created successfully!');

}
       }


    public function loadcategory(){
        $user_id = Auth::user()->id;
$categories =  Category::where('user_id',$user_id)->get();
return view("dashbord.category",compact('categories'));

    }


    public function addcategory(Request $request)
    {
        // User authorization with detailed error message
        if (Auth::guest()) {
            return response()->json([
                'status' => 'error',
                'message' => 'You must be logged in to add categories.',
            ]);
        }

        // Input validation with clear and informative error messages
        $validatedData = $request->validate([
            'name' => 'required|string|unique:categories,name|max:255',
            'description' => 'required|string|max:255',
        ], [
            'name.required' => 'A category name is required.',
            'name.string' => 'The category name must be alphabetic.',
            'name.unique' => 'This category name already exists.',
            'name.max' => 'The category name must be no more than 255 characters.',
            'description.required' => 'A category description is required.',
            'description.string' => 'The category description must be alphabetic.',
            'description.max' => 'The category description must be no more than 255 characters.',
        ]);

        // Sanitize user input (advanced XSS prevention)
        $validatedData['name'] = strip_tags($validatedData['name']);
        $validatedData['description'] = strip_tags($validatedData['description']);

        // Additional security measures (as needed)
        // ... (e.g., input filtering, whitelisting, escaping)

        // Model saving with error handling and logging
        try {
            $validatedData['user_id'] = Auth::user()->id;
            $category = Category::create($validatedData);

            Log::info("Category '{$category->name}' created by user " . Auth::user()->id);

            return response()->json([
                'status' => 'success',
                'message' => 'Category added successfully!',
                'data' => $category, // Optionally return created category data
            ]);
        } catch (\Exception $e) {
            Log::error("Failed to create category: " . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred. Please try again later.',
            ]);
        }
    }



    public function loadproduct()
    {
        $user_id = Auth::user()->id; // Retrieve the user ID

        try {
            $userCategories = Category::where('user_id', $user_id)->get();

            if ($userCategories->isNotEmpty()) {
                return view("dashbord.addproduct", compact('userCategories'));
            } else {
                // Handle the case where no categories exist for the user
                return view("dashbord.addproduct"); // Or provide an alternate view/message
            }
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error retrieving categories: ' . $e->getMessage());

            // Display a user-friendly error message
            return back()->with('error', 'An error occurred while retrieving categories. Please try again.');
        }
    }



public function deletecategory(Request $request, $id)
{
    $category = Category::find($id);

    if (!$category) {
        return back()->withErrors(['error' => 'Category with ID ' . $id . ' not found.']);
    }

    try {
        $category->deleted_at = Carbon::now(); // Use Carbon for accurate timestamps
        $category->save();

        return redirect()->back()->with('success', 'Category soft-deleted successfully.');
    } catch (Exception $e) {
        log::error('Error soft-deleting category: ' . $e->getMessage());
        return back()->with('error','An error occurred while soft-deleting the category.');
    }
}


public function viewcategory(Request $request, $id)
{
    $user_id = Auth::user()->id;

    // Check if the category ID is provided
    if (!$id) {
        return back()->with('error', 'No category ID provided.');
    }

    // Retrieve products only if the category ID and user ID are provided
    $products = Product::where('category_id', $id)
                        ->where('user_id', $user_id)
                        ->get();
    $shops = Shop::where('id',$user_id)->get();

    // Check if there are any products found
    if ($products->isEmpty()) {
        return view("dashbord.viewcategory")->with('error', 'No products found for this category.');
    }

    // If products are found, return the view with the products
    return view("dashbord.viewcategory", compact('products','shops'));
}






public function addproduct(Request $request)
{
    $user_id = Auth::user()->id;

    $request->validate([
        'name' => 'required|string|max:255|unique:products',
        'price' => 'required|numeric|min:0.01',
        'description' => 'required|string',
        'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048', // Optional image validation
        'category' => 'required|integer|exists:categories,id', // Validate category existence
    ]);

    // Securely handle image upload (replace with your implementation)
    $imageName = null;
    if ($request->hasFile('image')) {
        $imageName = uniqid() . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();

        // Store the uploaded file in the public/images directory
        $request->file('image')->storeAs('public/product', $imageName);
    }


    $product = new Product;
    $product->user_id = $user_id;
    $product->name = $request->name;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->category_id = $request->category; // Use validated category ID
    $product->image = $imageName; // Store image name, if uploaded

        $product->save();
        return redirect()->back()->with('success', 'Product added successfully!');

}


}
