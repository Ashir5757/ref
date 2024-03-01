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
    $user_id = Auth::user()->id;
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    $category = new Category();
    $category->user_id = $user_id;
    $category->name = $request->name;
    $category->description = $request->description;
    $category->save();

    return response()->json(['message' => 'Category added successfully'], 200);
}




    public function loadproduct()
    {
        $user_id = Auth::user()->id;

        try {
            $userCategories = Category::where('user_id', $user_id)->get();

            if ($userCategories->isNotEmpty()) {
                return view("dashbord.addproduct", compact('userCategories'));
            } else {

                return view("dashbord.addproduct");
            }
        } catch (\Exception $e) {

            Log::error('Error retrieving categories: ' . $e->getMessage());

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

        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully.');
    } catch (Exception $e) {
        log::error('Error soft-deleting category: ' . $e->getMessage());
        return back()->with('error','An error occurred while deleting the category.');
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
       'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
   ]);

   if($request->hasFile('image')) {
       $image = $request->file('image');
       $imageName = time() . '.' . $image->getClientOriginalExtension();
       $image->move(public_path('product'), $imageName);
       // Now $imageName holds the name of the uploaded image file.
   }

   $product = new Product();
   $product->category_id = $request->category;
   $product->user_id = $user_id;
   $product->name = $request->name;
   $product->description = $request->description;
   $product->price = $request->price;
   $product->image = $imageName ?? null; // If no image uploaded, set to null

   $product->save();

   return redirect()->back()->with('success', 'Product Added Successfully');
}



public function deleteproduct($id){

$deleteproduct = Product::where('id', $id)->find($id);
$deleteproduct->delete();
return redirect()->back()->with("Success","Product Deleted Secessfully");

}
}
