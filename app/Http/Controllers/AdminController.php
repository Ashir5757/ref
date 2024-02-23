<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function loadeadmin(){
        $users = User::all();
        $admins = User::where("usertype", 1)->paginate(10);
        return view("backend.admins", compact('admins','users'));
    }

    public function editadmins($id){
$admins = User::Where("id",$id)->paginate(10);

        return view("backend.editadmins", compact('admins'));
    }

    public function updateUsertype(Request $request, $id)
    {
           // Validate incoming request
    $request->validate([
        'usertype' => 'required|in:0,1',
    ]);

    // Find the user by ID
    $user = User::findOrFail($id);

    // Update the user's usertype
    $user->update([
        'usertype' => $request->usertype,
    ]);
        // Return a response, if needed
        return redirect('backend.admins')->with('success', 'User role updated successfully');
    }

public function loadepermission($id){

    $admins = User::Where("id",$id)->paginate(10);
return view("backend.permission",compact('admins'));

}

}
