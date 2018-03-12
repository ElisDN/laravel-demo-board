<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('cabinet.profile.home', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();

        return view('cabinet.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255|regex:/^\d+$/s',
        ]);

        $user = Auth::user();

        $oldPhone = $user->phone;

        $user->update($request->only('name', 'last_name', 'phone'));

        if ($user->phone !== $oldPhone) {
            $user->unverifyPhone();
        }

        return redirect()->route('cabinet.profile.home');
    }
}
