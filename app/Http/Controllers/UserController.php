<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Countrie;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Kyc;
use App\Models\BankDetail;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.dashboard');
    }

    public function userList($type, Request $request)
    {

        $roleMap = config('app.roles');
        $user_type = $roleMap[$type] ?? null;

        if (!$user_type) {
            return back();
        }

        if ($request->ajax()) {
            $query = User::where('role', $user_type);

            if ($request->has('name') && !empty($request->name)) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }

            if ($request->has('email') && !empty($request->email)) {
                $query->where('email', 'like', '%' . $request->email . '%');
            }


            return DataTables::of($query)
                ->addIndexColumn()
                ->editColumn('status', function ($row) {
                    if ($row->status == 'Active') {
                        return '<span class="badge bg-success">Active</span>';
                    } elseif ($row->status == 'Inactive') {
                        return '<span class="badge bg-danger">Inactive</span>';
                    } else {
                        return '<span class="badge bg-secondary">' . $row->status . '</span>';
                    }
                })
                ->addColumn('action', function ($row) {



                    return '<div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="icon-base ti tabler-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                            <a class="dropdown-item" href="'.route('view_user',[$row->id]).'"
                                ><i class="icon-base ti tabler-eye me-1"></i> View</a
                              >
                              <a class="dropdown-item" href="' . route('edit_user', [$row->role, $row->id]) . '"
                                ><i class="icon-base ti tabler-pencil me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="javascript:void(0);" onclick="deleteUser(' . $row->id . ')"
                                ><i class="icon-base ti tabler-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>';
                    // return '<a href="' . route('users.edit', $row->id) . '" class="btn btn-sm btn-primary">Edit</a>';
                    // return '<a href="#" class="btn btn-sm btn-primary"><i class="fa-solid fa-pen"></i> Edit</a>';
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('users_list.view', compact('type'));
    }


    public function viewUser($id){
        $user = User::with(['address','address.country','address.state','address.city','kyc','bank','bank.bank'])->where('id',$id)->first();
        return view('users_list.single',compact('user'));
    }

    public function addUsers($type, Request $request)
    {
        $countries = Countrie::where('status', 'Active')->get();
        $banks = Bank::where('status', 'Active')->get();

        if ($request->method() == 'POST') {

            $request->validate([
                'fullname'         => 'required|string|max:255',
                'email'            => 'required|email|unique:users,email',
                'phone'            => 'required|digits:10',
                'father_name'      => 'nullable|string|max:255',
                'mother_name'      => 'nullable|string|max:255',
                'password'         => [
                    'required',
                    'string',
                    'min:8',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
                ],
                'dob'              => 'required|date|before:today',
                'gender'           => 'required|in:Male,Female,Other',
                'country'          => 'required|integer|exists:countries,id',
                'state'            => 'required|integer|exists:states,id',
                'city'             => 'required|integer|exists:cities,id',
                'zipcode'          => 'required|digits_between:4,10',
                'address'          => 'required|string|max:500',
                'bank'             => 'required|integer|exists:banks,id',
                'account_number'   => 'required|digits_between:8,20',
                'ifsc'             => 'required',
                'profile_image'    => 'nullable|mimes:jpg,jpeg,png|max:2048',
                'proof_type'       => 'required',
                'identification_number'       => 'required',
                'identification_image'       => 'required|image|mimes:jpg,jpeg,png|max:2048',

            ], [
                'fullname.required' => 'Full name is required.',
                'email.required' => 'Email is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.unique' => 'This email is already taken.',
                'phone.required' => 'Phone number is required.',
                'phone.digits' => 'Phone number must be 10 digits.',

                'password.required' => 'Password is required.',
                'password.min' => 'Password must be at least 8 characters.',
                'password.regex' => 'Password must contain uppercase, lowercase, number, and special character.',

                'dob.required' => 'Date of birth is required.',
                'dob.before' => 'Date of birth must be before today.',

                'gender.required' => 'Gender is required.',
                'gender.in' => 'Gender must be Male, Female or Other.',

                'country.required' => 'Country selection is required.',
                'country.exists' => 'Selected country is invalid.',
                'state.required' => 'State selection is required.',
                'state.exists' => 'Selected state is invalid.',
                'city.required' => 'City selection is required.',
                'city.exists' => 'Selected city is invalid.',

                'zipcode.required' => 'Zipcode is required.',
                'zipcode.digits_between' => 'Zipcode must be between 4 to 10 digits.',

                'address.required' => 'Address is required.',

                'bank.required' => 'Bank selection is required.',
                'bank.exists' => 'Selected bank is invalid.',
                'account_number.required' => 'Account number is required.',
                'account_number.digits_between' => 'Account number must be between 8 to 20 digits.',

                'ifsc.required' => 'IFSC code is required.',
                'ifsc.regex' => 'IFSC code format is invalid.',

                // 'profile_image.required' => 'Profile image is required.',
                'profile_image.image' => 'The file must be an image.',
                'profile_image.mimes' => 'Image must be in jpg, jpeg, or png format.',
                'profile_image.max' => 'Image size must not exceed 2MB.',

                'proof_type.required' => 'Proof TYpe is required',
                'identification_number.required' => 'Identification Type required',
                'identification_image.required' => 'Identification image is required.',
                'identification_image.image' => 'The file must be an image.',
                'identification_image.mimes' => 'Image must be in jpg, jpeg, or png format.',
                'identification_image.max' => 'Image size must not exceed 2MB.'

            ]);

            $roleMap = config('app.roles');

            $user_type = $roleMap[$type] ?? null;

            if (!$user_type) {
                return back();
            }

            $profile_image = null;
            $identification_image = null;

            if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $profile_image = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('profile_images'), $profile_image);
            }

            if ($request->hasFile('identification_image')) {
                $image = $request->file('identification_image');
                $identification_image = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('identification_images'), $identification_image);
            }



            try {

                DB::beginTransaction();

                $user = User::create([
                    'code' => config('app.shortname') . rand(0000000, 9999999),
                    'name' => $request->fullname,
                    'email' => $request->email,
                    'father_name' => $request->father_name,
                    'mother_name' => $request->mother_name,
                    'role' => $user_type,
                    'parent_id' => 0,
                    'referral_id' => 0,
                    'phone_number' => $request->phone,
                    'gender' => $request->gender,
                    'password' => Hash::make($request->password),
                    'image' => $profile_image,
                    'dob' => $request->dob
                ]);

                Wallet::create([
                    'user_id' => $user->id
                ]);

                Kyc::create([
                    'user_id' => $user->id,
                    'id_proof_type' => $request->proof_type,
                    'id_proof_no' => $request->identification_number,
                    'id_proof_img' => $identification_image
                ]);

                BankDetail::create([
                    'user_id' => $user->id,
                    'bank_id' => $request->bank,
                    'user_name_at_bank' => $request->account_number,
                    'account_number' => $request->account_number,
                    'ifscode' => $request->ifsc
                ]);

                Address::create([
                    'user_id' => $user->id,
                    'address' => $request->address,
                    'city_id' => $request->city,
                    'state_id' => $request->state,
                    'country_id' => $request->country,
                    'zip' => $request->zipcode
                ]);


                DB::commit();
                return to_route('user_list', [$type]);
            } catch (\Exception $e) {
                DB::rollBack();
                dd($e->getMessage());
                // return 'Error: ' . $e->getMessage();
                return back();
            }
        }

        return view('users_list.add', compact('type', 'countries', 'banks'));
    }

    public function editUser($type, $id, Request $request)
    {
        $user = User::with(['address', 'kyc', 'bank'])->where('id', $id)->first();
        $countries = Countrie::where('status', 'Active')->get();
        $banks = Bank::where('status', 'Active')->get();

        if ($request->method() == 'POST') {

            $request->validate([
                'fullname'         => 'required|string|max:255',
                'email'            => 'required|email|unique:users,email,' . $id,
                'phone'            => 'required|digits:10',
                'father_name'      => 'nullable|string|max:255',
                'mother_name'      => 'nullable|string|max:255',
                'password'         => [
                    'nullable',
                    'string',
                    'min:8',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
                ],
                'dob'              => 'required|date|before:today',
                'gender'           => 'required|in:Male,Female,Other',
                'country'          => 'required|integer|exists:countries,id',
                'state'            => 'required|integer|exists:states,id',
                'city'             => 'required|integer|exists:cities,id',
                'zipcode'          => 'required|digits_between:4,10',
                'address'          => 'required|string|max:500',
                'bank'             => 'required|integer|exists:banks,id',
                'account_number'   => 'required|digits_between:8,20',
                'ifsc'             => 'required',
                'profile_image'    => 'nullable|mimes:jpg,jpeg,png|max:2048',
                'proof_type'       => 'required',
                'identification_number'       => 'required',
                'identification_image'       => 'nullable|mimes:jpg,jpeg,png|max:2048',

            ], [
                'fullname.required' => 'Full name is required.',
                'email.required' => 'Email is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.unique' => 'This email is already taken.',
                'phone.required' => 'Phone number is required.',
                'phone.digits' => 'Phone number must be 10 digits.',

                'password.required' => 'Password is required.',
                'password.min' => 'Password must be at least 8 characters.',
                'password.regex' => 'Password must contain uppercase, lowercase, number, and special character.',

                'dob.required' => 'Date of birth is required.',
                'dob.before' => 'Date of birth must be before today.',

                'gender.required' => 'Gender is required.',
                'gender.in' => 'Gender must be Male, Female or Other.',

                'country.required' => 'Country selection is required.',
                'country.exists' => 'Selected country is invalid.',
                'state.required' => 'State selection is required.',
                'state.exists' => 'Selected state is invalid.',
                'city.required' => 'City selection is required.',
                'city.exists' => 'Selected city is invalid.',

                'zipcode.required' => 'Zipcode is required.',
                'zipcode.digits_between' => 'Zipcode must be between 4 to 10 digits.',

                'address.required' => 'Address is required.',

                'bank.required' => 'Bank selection is required.',
                'bank.exists' => 'Selected bank is invalid.',
                'account_number.required' => 'Account number is required.',
                'account_number.digits_between' => 'Account number must be between 8 to 20 digits.',

                'ifsc.required' => 'IFSC code is required.',
                'ifsc.regex' => 'IFSC code format is invalid.',

                // 'profile_image.required' => 'Profile image is required.',
                'profile_image.image' => 'The file must be an image.',
                'profile_image.mimes' => 'Image must be in jpg, jpeg, or png format.',
                'profile_image.max' => 'Image size must not exceed 2MB.',

                'proof_type.required' => 'Proof TYpe is required',
                'identification_number.required' => 'Identification Type required',
                'identification_image.required' => 'Identification image is required.',
                'identification_image.image' => 'The file must be an image.',
                'identification_image.mimes' => 'Image must be in jpg, jpeg, or png format.',
                'identification_image.max' => 'Image size must not exceed 2MB.'

            ]);

            $roleMap = config('app.roles');

            $user_type = array_search($type, $roleMap);;

            // if (!$user_type) {
            //     return back();
            // }

            $profile_image = null;
            $identification_image = null;

            if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $profile_image = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('profile_images'), $profile_image);
            }

            if ($request->hasFile('identification_image')) {
                $image = $request->file('identification_image');
                $identification_image = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('identification_images'), $identification_image);
            }

            try {

                DB::beginTransaction();

                $user = User::find($id);
                $user->name = $request->fullname;
                $user->phone_number = $request->phone;
                $user->father_name = $request->father_name;
                $user->mother_name = $request->mother_name;
                $user->password = Hash::make($request->password);
                $user->image = $profile_image;
                $user->gender = $request->gender;
                $user->dob = $request->dob;
                $user->update();


                // $user = User::where('id',$id)->update([
                //     'name' => $request->fullname,
                //     'phone_number' => $request->phone,
                //     'password' => Hash::make($request->password),
                //     'image' => $profile_image,
                //     'dob' => $request->dob

                // ]);

                // dd($user);

                // Wallet::create([
                //     'user_id' => $user->id
                // ]);

                Kyc::where('user_id', $user->id)->update([
                    'id_proof_type' => $request->proof_type,
                    'id_proof_no' => $request->identification_number,
                    'id_proof_img' => $identification_image
                ]);

                BankDetail::where('user_id', $user->id)->update([
                    'bank_id' => $request->bank,
                    'user_name_at_bank' => $request->account_number,
                    'account_number' => $request->account_number,
                    'ifscode' => $request->ifsc
                ]);

                Address::where('user_id', $user->id)->update([
                    'address' => $request->address,
                    'city_id' => $request->city,
                    'state_id' => $request->state,
                    'country_id' => $request->country,
                    'zip' => $request->zipcode
                ]);


                DB::commit();

                return to_route('user_list', [$user_type]);
            } catch (\Exception $e) {
                DB::rollBack();
                // dd($e->getMessage());
                // return 'Error: ' . $e->getMessage();
                return back()->withInput();
            }
        }

        return view('users_list.edit', compact('user', 'countries', 'banks', 'type'));
    }

    public function statusUser($id)
    {
        $user = User::find($id);
        $user->status = $user->status === 'Active' ? 'Inactive' : 'Active';
        $user->save();
    }
}
