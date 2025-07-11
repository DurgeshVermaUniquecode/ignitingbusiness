<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Kyc;
use App\Models\Wallet;
use App\Models\Address;
use App\Models\BankDetail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function showRegistrationForm()
    {
        // $var = "3";
        // dd(Helper::shortEncrypt($var));
        // $type = Helper::shortDecrypt(request()->type);
       
        // $typeError = false;
        // if((int)$type != 2 && (int)$type != 3) {
        //     $typeError = true; 
              
        // }
        
        // $referral = '';
        // if(request()->referral != ''){
        //     // $referral = Helper::shortDecrypt(request()->referral);
        //     $referral = request()->query('referral_code');
        // }
        // dd($referral);

        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $data['code'] = config('app.shortname').rand(0000000,9999999);
        $data['role'] = 1;//request()->role_id;
        $referral = (string)request()->referral_code;
        $user = User::where('code', $referral)->first();
        $data['referral_id'] = $user->id??1;

        request()->merge(['code' => $data['code']]);
        request()->merge(['role' => $data['role']]);
        request()->merge(['referral_id' => $data['referral_id']]);

        return Validator::make($data, [
            'code' => ['required', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'regex:/^[6-9]\d{9}$/', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'role' => ['required', 'in:2,3'],
            'terms' => ['required'],
        ],[
            'phone_number.regex' => 'Please enter a valid 10-digit Indian mobile number.'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'code' => $data['code'],
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'parent_id' => $data['referral_id'],
            'referral_id' => $data['referral_id'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
        ]);

        if($check) {

            Wallet::create(['user_id' => $check->id]);
            Kyc::create(['user_id' => $check->id]);
            BankDetail::create(['user_id' => $check->id]);
            Address::create(['user_id' => $check->id]);
        } 


    }

    protected function redirectTo()
    {
        // if (auth()->user()->role == 1) {
           
        // } elseif (auth()->user()->role == 2 || auth()->user()->role == 3) {
        //     return '/home';
        // }
         return redirect('/dashboard');

        // Auth::logout();
        // return redirect('/login');
    }
}
