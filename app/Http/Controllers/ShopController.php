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
            $logoPath = $request->file('logo')->store('shop_logos');
            $shop->logo = $logoPath;
        }

        if ($request->hasFile('banner_image')) {
            $bannerImagePath = $request->file('banner_image')->store('shop_banners');
            $shop->banner_image = $bannerImagePath;
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
        // User authorization (if applicable)
        if (Auth::guest()) {
            return redirect()->route('login')->with('error', 'You must be logged in to add categories.');
        }

        // Input validation with detailed error messages
        $validatedData = $request->validate([
            'name' => 'required|string|unique:categories,name|max:255',
            'description' => 'required|string|max:255',
        ], [
            'name.required' => __('A category name is required.'),
            'name.string' => __('The category name must be a string.'),
            'name.unique' => __('The category name must be unique.'),
            'name.max' => __('The category name must be no more than 255 characters.'),
            'description.required' => __('A category description is required.'),
            'description.string' => __('The category description must be a string.'),
            'description.max' => __('The category description must be no more than 255 characters.'),
        ]);

        // Sanitize user input (basic XSS prevention)
        $validatedData['name'] = htmlspecialchars($validatedData['name']);
        $validatedData['description'] = htmlspecialchars($validatedData['description']);

        // Model saving
        $validatedData['user_id'] = Auth::user()->id; // Add user ID
        $category = Category::create($validatedData);

        // Successful creation handling
        if ($category) {
            Log::info("Category '{$category->name}' created by user " . Auth::user()->id);

            return response()->json([
                'status' => 'success',
                'message' => 'Category added successfully!',
                'data' => $category, // Optionally return created category data
            ]);
        } else {
            Log::error("Failed to create category with data: " . json_encode($validatedData));

            // Prepare validation error responses
            $errors = $category->errors()->toArray();
            $errorMessages = [];
            foreach ($errors as $field => $messages) {
                $errorMessages[$field] = implode(', ', $messages);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'Failed to add category. Please check the errors below.',
                'errors' => $errorMessages,
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
        return back()->withErrors(['error' => 'An error occurred while soft-deleting the category.']);
    }
}


public function viewcategory(){

    return view("dashbord.viewcategory");
}


public function addproduct(Request $request){
    $user_id = Auth::user()->id;
    $request->validate([
        'name' => 'required|string|max:255|unique:products',
        'price' => 'required|numeric|min:0.01',
        'description' => 'required|string',
        'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048', // Optional image validation
    ]);

    // Handle image upload, if applicable (see additional notes)
    $imageName = null;
    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->storePubliclyAs('products', $imageName);
    }

    $product = new Product;
    $product->user_id = $user_id;
    $product->name = $request->name;
    $product->price = $request->price;
    $product->description = $request->description;
    $product->image = $imageName; // Store image name, if uploaded

    try {
        $product->save();

        return redirect()->route('dashbord.viewcategory')->with('success', 'Product added successfully!');
    } catch (\Exception $e) {
        // Handle database errors gracefully
        return back()->withErrors(['error' => 'An error occurred while adding the product: ' . $e->getMessage()]);
    }

}

}
