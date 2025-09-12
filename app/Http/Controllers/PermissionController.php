<?php

namespace App\Http\Controllers;

use App\Models\Permissions;
use App\Models\purchase;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        // Fetch all users except super admin itself (optional)
        $users = User::where('role', '!=', 'super admin')->get();

        // If you want to include super admin too, just use:
        // $users = User::all();

        return view('superadmin.permissionsuser', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $menus = [
            'dashboard' => 'Dashboard',
            'users' => 'Users',
            'store' => 'Store',
            'suppliers' => 'Suppliers',
            'inventory' => 'Inventory',
            'production' => 'Production',
            'sales_report' => 'Sales Report',
            'inventory_report' => 'Inventory Report',
        ];

        $userPermissions = $user->permission ? $user->permission->menus : [];

        return view('superadmin.permissionsedit', compact('user', 'menus', 'userPermissions'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        Permissions::updateOrCreate(
            ['user_id' => $user->id],
            ['menus' => $request->menus ?? []]
        );

        return redirect()->route('superadmin.permissionsuser')->with('success', 'Permissions updated successfully.');
    }


    public function purchaseupdate()
    {
        $purchases = purchase::all();
        return view('superadmin.purchaseauth')->with(compact('purchases'));
    }

    public function toggleStatus(Request $request)
    {
        $purchase = Purchase::findOrFail($request->id);
        $purchase->status = $request->status;
        $purchase->save();

        return response()->json(['success' => true, 'status' => $purchase->status]);
    }


}
