<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the admins.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all admins from the database
        $admins = Admin::all();
        return view('adminModeratorHomePage', compact('admins'));
    }

    /**
     * Store a newly created Admin Moderator in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // Validate the incoming request
            $validated = $request->validate([
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|email|unique:admins,email',
                'userName' => 'required|string|max:255|unique:admins,userName',
                'phone' => 'required|numeric',
                'address' => 'required|string',
                'password' => 'required|string|min:8', // Password will be hashed automatically
                'admin_moderator_id' => 'nullable|exists:admin_moderators,id', // Foreign key
                'salary' => 'nullable|numeric',
            ]);

            // Create a new Admin Moderator in the database
            $validated['password'] = bcrypt($validated['password']); // Hash the password
            Admin::create($validated);

            // Redirect to the Admin Moderator home page with success message
            return redirect()->route('adminModeratorHomePage')->with('success', 'Admin created successfully!');
        } catch (\Exception $e) {
            // Return with an error message if there's a failure
            return back()->with('error', 'Failed to create Admin Moderator: ' . $e->getMessage());
        }
    }

    /**
     * Delete the specified Admin from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            // Find and delete the admin by ID
            $admin = Admin::findOrFail($id);
            $admin->delete();

            // Redirect back with success message
            return redirect()->route('adminModeratorHomePage')->with('success', 'Admin deleted successfully!');
        } catch (\Exception $e) {
            // Redirect back with error message if the deletion fails
            return redirect()->route('adminModeratorHomePage')->with('error', 'Failed to delete Admin: ' . $e->getMessage());
        }
    }

    /**
     * Show the form to edit the specified Admin.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            // Find the admin by ID
            $admin = Admin::findOrFail($id);

            // Return the view with admin data
            return view('editAdminInfo', compact('admin'));
        } catch (\Exception $e) {
            // Return with an error message if the admin is not found
            return back()->with('error', 'Failed to retrieve admin data: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified Admin in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            // Validate the incoming request
            $validated = $request->validate([
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|email|unique:admins,email,' . $id,
                'userName' => 'required|string|max:255|unique:admins,userName,' . $id,
                'phone' => 'required|numeric',
                'address' => 'required|string',
                'salary' => 'nullable|numeric',
                'admin_moderator_id' => 'nullable|exists:admin_moderators,id', // validate admin_moderator_id
            ]);

            // Find the admin and update its data
            $admin = Admin::findOrFail($id);
            $admin->update($validated);

            // Redirect to the Admin Moderator home page with success message
            return redirect()->route('adminModeratorHomePage')->with('success', 'Admin updated successfully!');
        } catch (\Exception $e) {
            // Return with an error message if the update fails
            return back()->with('error', 'Failed to update Admin: ' . $e->getMessage());
        }
    }
}
