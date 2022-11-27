<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        $packages = Package::select(['prefix', 'name'])->get();
        return view('register', compact('packages'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirmation-password' => 'required',
            'package' => [
                'required',
                Rule::in(Package::pluck('prefix')->toArray())
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }

        $user_exist = User::where('email', $request->input('email'))->exists();
        if ($user_exist) {
            $validator->getMessageBag()->add('email', 'User Exist!');
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }

        if ($request->input('password') === $request->input('confirmation-password')) {
            $package = Package::where('prefix', $request->input('package'))->first();
            $start_date = Carbon::now();
            $expired_date = Carbon::now()->addDays($package->period);
            $role = Role::where('prefix', 'user')->first();

            $attrs = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'package' => $package->prefix,
                'role_id' => $role->id,
                'package_start' => $start_date,
                'package_expired' => $expired_date,
            ];

            DB::beginTransaction();
            User::create($attrs);
            DB::commit();

            return redirect('login')->with(['success' => 'User created']);
        } else {
            $validator->getMessageBag()->add('password', 'Password not match!');
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
    }
}
