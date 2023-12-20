<?php

namespace App\Http\Controllers\hr;

use App\Helpers\Moving;
use App\Http\Controllers\Controller;

use App\Http\Requests\hr\ProfileUpdateRequest;
use App\Models\hr\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
  
    public function edit(Request $request,$id= null): View
    {
        Moving::getMoving('عرض ملف الموظف');

       $user=is_null($id) ? $request->user() : Employee::findOrFail($id);
       return view('pages.hr.profile.edit', [
            'user' => $user,
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
