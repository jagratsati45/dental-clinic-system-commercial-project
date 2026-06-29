<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
{
    $users = \App\Models\User::latest()->paginate(10);

    return view('admin.users.index', compact('users'));
}

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        return redirect()->route('users.index');
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
        return view('admin.users.edit');
    }

    public function update(Request $request, string $id)
    {
        return redirect()->route('users.index');
    }

    public function destroy(string $id)
    {
        return redirect()->route('users.index');
    }
}