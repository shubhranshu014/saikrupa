<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Services\UserService;
use App\Services\StoreService;
use App\Http\Requests\StoreRequest;

class SpController extends Controller
{
    protected $userService;
    protected $storeService;

    public function __construct(UserService $userService, StoreService $storeService)
    {
        $this->userService = $userService;
        $this->storeService = $storeService;
    }
    public function userlist()
    {
        $query = \App\Models\User::query();

        if (auth()->user()->role === 'HR') {
            // HR should not see super admin and admin
            $query->whereNotIn('role', ['super admin', 'admin']);
        } else {
            // Everyone else should not see super admin
            $query->where('role', '!=', 'super admin');
        }

        $users = $query->orderBy('id')->get();
        // Logic to retrieve and display the user list for super admin
        return view('superadmin.userlist')->with(compact('users'));
    }
    public function createuser()
    {
        // Logic to show the form for creating a new user
        return view('superadmin.adduser');
    }

    public function storeuser(StoreUserRequest $request)
    {
        $this->userService->createUser($request->validated());

        return redirect()
            ->route('superadmin.userlist')
            ->with('success', 'User created successfully!');
    }


    public function storelist()
    {
        $stores = \App\Models\Store::all();
        return view('superadmin.storelist')->with(compact('stores'));
    }
    public function createstore()
    {
        // Logic to show the form for creating a new store
        return view('superadmin.createstore');
    }

    public function storestore(StoreRequest $request)
    {
        dd($request);
        $this->storeService->createStore($request->validated());

        return redirect()->back()->with('success', 'Store added successfully.');
    }
}
