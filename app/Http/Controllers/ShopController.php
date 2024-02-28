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
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    $category = new Category();
    $category->name = $request->name;
    $category->description = $request->description;
    $category->save();

    return response()->json(['message' => 'Category added successfully'], 200);
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
        'name' => 'required|string',
        'description' => 'required|string',
        'category' => 'required|exists:categories,id',
        'price' => 'required|numeric',
        // 'file' => 'required|file|mimes:jpg,jpeg,png,|max:2048',
    ]);


    // Store product information
    $product = new Product;
    // $product->id = $id;
    $product->user_id = $user_id;
    $product->name = $request->name;
    $product->description = $request->description;
    $product->category_id = $request->category;
    $product->price = $request->price;
    $product->image = $imageName;
    $product->save();

    return redirect()->back()->with('success', 'Product added successfully');

}


public function upload(Request $request)
{
    
    $request->validate([
        'file' => 'required|file|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $file = $request->file('file');
    $imageName = $file->getClientOriginalName();
    $file->move(public_path('products'), $imageName);

    $product = new Product;
    $product->image = $imageName;

    $product->save();

    return response()->json(['success' => true, 'message' => 'File uploaded successfully']);

}


public function deleteproduct($id){

$deleteproduct = Product::where('id', $id)->find($id);
$deleteproduct->delete();
return redirect()->back()->with("Success","Product Deleted Secessfully");

}

}
