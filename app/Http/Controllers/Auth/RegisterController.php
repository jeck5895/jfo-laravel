<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Jobseeker;
use App\Employer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\Registration\RegisterJobseeker;
use App\Http\Requests\Registration\RegisterEmployer;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/oauth';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function jobseeker(RegisterJobseeker $request)
    {   
        $userId = User::create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phonenumber' => $request['phonenumber'],
            'user_type' => 2,
        ])->id;

        if($userId) {
            $user = User::where('id', $userId)->firstOrFail();

            $profile = Jobseeker::create([
                'account_id' => $user['uuid'],
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'job_category' => $request['job_category'],
                'location' => $request['location']
            ]);
            
            if (Auth::attempt(['email' => $user['email'], 'password' => $request['password']]))
            
            return [
                'message' => 'Successfully registered',
                'token' => $user->createToken('JobfairOnline')->accessToken,
                'user' => [
                    'uuid' => $user['uuid'],
                    'email' => $user['email'],
                    'phonenumber' => $user['phonenumber'],
                    'user_type' => $user['user_type'],
                    'profile' => $profile
                ],
                'auth_user' => Auth::user()
            ];
        }
    }

    public function employer() 
    {

    }
    
}
