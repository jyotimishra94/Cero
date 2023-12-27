<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use App\Http\Requests\ServiceProvider;
use App\Models\verifytoken;
use App\Models\Company;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\ClientExperience;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\ServiceCategory;
use App\Models\ProductCategory;
use Carbon\Carbon;
use DataTables;
use Illuminate\Support\Facades\Redirect;
use Validator;
use DB;


class ServiceProviderController extends Controller
{

    public function serviceProvider()
    {
        return view('auth.serviceProvider');
    }

    public function registerServiceProvider(ServiceProvider $request)
    {
        $validatedData = $request->validated();
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'password' => bcrypt($validatedData['password']),
            'company' => $validatedData['company'],
            'user_type_id' => '2',
            'designation' => $validatedData['designation'],
        ]);

        $validToken = rand(10, 100) . '2022';
        $get_token = new verifytoken();
        $get_token->token = $validToken;
        $get_token->email = $validatedData['email'];
        $get_token->save();
        $get_user_email = $validatedData['email'];
        $get_user_name = $validatedData['name'];
        $session = session();
        $session->put('email_token', $validToken);
        $data = [
            'name' => $get_user_name,
            'email' => $get_user_email,
            'token' => $validToken,
        ];
        Mail::to($validatedData['email'], 'Recipient Name')
            ->send(new WelcomeMail($data));
        if ($user) {
            return redirect()->route('verifyEmail')->with('success', 'Service Provider Registered Successfully!!');
        } else {
            $response = [
                'title' => 'Registration failed',
            ];

            return response()->json($response, Response::HTTP_UNAUTHORIZED);
        }
    }

    public function verify_email()
    {
        return view('auth.otp_verification');
    }
    public function send_otp()
    {
        return view('auth.send_otp');
    }

    public function resendOtp(Request $request)
    {

        $latestUser = User::latest()->first();
        $email = $latestUser->email;
        $tokenRecord = DB::table('verifytokens')
            ->where('email', $email)
            ->first();

        if ($tokenRecord) {
            $token = $tokenRecord->token;
            $newToken = rand(10, 100) . '2022';
            DB::table('verifytokens')
                ->where('email', $email)
                ->update(['token' => $newToken]);
            Mail::to($email)->send(new WelcomeMail(['token' => $newToken])); // Pass 'token' as a key in an associative array
            session()->put('new_token', $newToken);
            return "New token sent to the user's email.";
        }

        return "No record found for the provided email.";
    }
    public function serviceProviderAccountActivation(Request $request)
    {
        $enteredOtp = $request->input('otp');
        $tokenAttheTimeOfRegistration = session()->get('email_token');
        $enteredOtp = $request->input('otp');
        $newToken = session()->get('new_token');
        $new_token = verifytoken::where('token', $newToken)->first();
        $tokenTthetimeoflogin = session()->get('token_at_the_time_of_login');
        $validation = Validator::make($request->all(), [
            'otp' => 'required|digits:6'
        ]);
        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation);
        }
        $enteredOtp = $request->input('otp');
        $get_token_at_the_time_of_login = verifytoken::where('token', $tokenTthetimeoflogin)->first();
        $get_token_at_the_time_of_register = verifytoken::where('token', $tokenAttheTimeOfRegistration)->first();

        if ($get_token_at_the_time_of_register) {

            if ($enteredOtp !=  $get_token_at_the_time_of_register->token) {
                return Redirect::back()->withErrors(['otp' => 'Invalid OTP. Please check your email and try again.']);
            }
            $session_time1 = Carbon::parse($get_token_at_the_time_of_register->created_at)->format('Y-m-d H:i:s');
            $session_time2 = Carbon::now()->subMinutes(2)->format('Y-m-d H:i:s');

            if (strtotime($session_time2) > strtotime($session_time1)) {
                return Redirect::back()->withErrors(['otp' => 'OTP has expired.']);
            }
            $get_token_at_the_time_of_register->is_activated = 1;
            $get_token_at_the_time_of_register->save();
            $user = User::where('email',  $get_token_at_the_time_of_register->email)->first();
            $user->email_verified_at = Carbon::now();
            $user->is_email_verified = 1;
            $user->save();

            $get_token_at_the_time_of_register->delete();
            session()->forget('token_at_the_time_of_login');
            return redirect()->route('root')->with('success', 'Your Account has been activated successfully!!');
        } elseif ($get_token_at_the_time_of_login) {
            if ($enteredOtp != $get_token_at_the_time_of_login->token) {
                return Redirect::back()->withErrors(['otp' => 'Invalid OTP. Please check your email and try again.']);
            }
            $session_time1 = Carbon::parse($get_token_at_the_time_of_login->created_at)->format('Y-m-d H:i:s');
            $session_time2 = Carbon::now()->subMinutes(2)->format('Y-m-d H:i:s');

            if (strtotime($session_time2) > strtotime($session_time1)) {
                return Redirect::back()->withErrors(['otp' => 'OTP has expired.']);
            }
            $get_token_at_the_time_of_login->is_activated = 1;
            $get_token_at_the_time_of_login->save();
            $user = User::where('email', $get_token_at_the_time_of_login->email)->first();
            $user->email_verified_at = Carbon::now();
            $user->is_email_verified = 1;
            $user->save();

            $get_token_at_the_time_of_login->delete();
            session()->forget('token_at_the_time_of_login');
            return redirect()->route('root')->with('success', 'Your Account has been activated successfully!!');
        } else {
            if ($enteredOtp != $new_token->token) {
                return Redirect::back()->withErrors(['otp' => 'Invalid OTP. Please check your email and try again.']);
            }

            $new_token->is_activated = 1;
            $new_token->save();
            $user = User::where('email', $new_token->email)->first();
            $user->email_verified_at = Carbon::now();
            $user->is_email_verified = 1;
            $user->save();

            $new_token->delete();
            return redirect()->route('root')->with('success', 'Your Account has been activated successfully!!');
        }
    }

    public function addCompany()
    {
        $user = Auth::user();
        $company = Company::where('user_id', $user->user_id)->first();

        if ($company) {
            $experience = ClientExperience::where('company_id', $company->company_id)->get();
            $clientExperiences = ClientExperience::where('company_id', $company->company_id)->get();
        } else {
            $experience = null; // or an empty array, depending on your requirements
            $clientExperiences = null; // or an empty array, depending on your requirements
        }

        $categories = ServiceCategory::where('parent_id', 0)->get();
        $productCategories = ProductCategory::where('parent_id', 0)->get();

        return view('auth.addCompany', [
            'company' => $company,
            'categories' => $categories,
            'productCategories' => $productCategories,
            'experience' => $experience,
            'clientExperiences' => $clientExperiences
        ]);
    }

    public function showCompanyDetails()
    {
        try {
            $auth = Auth::user();
            $user = $this->getUsername($auth->id);
            $company = Company::where('user_id', $auth->user_id)->get();
            return view('auth.viewCompany', compact('company', 'user'));
        } catch (ModelNotFoundException $e) {
            return view('auth.noCompanyFound');
        }
    }

    public function createCompany(Request $request)
    {

        // Validation rules
        $rules = [
            'company_name' => 'required|string|max:255|regex:/^[a-zA-Z0-9\s\-]+$/',
            'team_size' => 'required|integer',
            'official_website' => 'url',
            'pan_number' => [
                'required',
                'string',
                'max:255',
                'regex:/[A-Z]{5}[0-9]{4}[A-Z]{1}/',
            ],
            'gst_number' => [
                'required',
                'string',
                'max:255',
                'regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}[Z]{1}[0-9A-Z]{1}$/',
            ],
            'experience_in_month' => 'required|integer|min:0|max:30',
            'experience_in_year' => 'required|integer|min:0|max:11',
            'specialization' => 'required|string|max:255',
            'min_project_amount' => 'required|numeric',
            'min_project_currency' => 'required|string|max:255',
            'max_project_amount' => 'required|numeric',
            'max_project_currency' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pan_number_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
        $request->validate($rules);

        $user = Auth::user();
        $logo = $pan_number_image = null;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $logo = time() . '_' . $file->getClientOriginalName();
            $path = "logo/logo/";
            $file->move(public_path($path), $logo);
        }
        if ($request->hasFile('pan_number_image')) {
            $file = $request->file('pan_number_image');
            $pan_number_image = 'pan_' . time() . '_' . $file->getClientOriginalName();
            $path = "pan/pan/";
            $file->move(public_path($path), $pan_number_image);
        }
        $company_id = $request->input('company_id');
        $array = [
            'company_name' => $request->input('company_name'),
            'team_size' => $request->input('team_size'),
            'official_website' => $request->input('official_website'),
            'pan_number' => $request->input('pan_number'),
            'gst_number' => $request->input('gst_number'),
            'experience_in_month' => $request->input('experience_in_month'),
            'experience_in_year' => $request->input('experience_in_year'),
            'specialization' => $request->input('specialization'),
            'min_project_amount' => $request->input('min_project_amount'),
            'min_project_currency' => $request->input('min_project_currency'),
            'max_project_amount' => $request->input('max_project_amount'),
            'max_project_currency' => $request->input('max_project_currency'),
            'user_id' => $user->user_id
        ];
        if ($logo) {
            $array['logo'] = $logo;
        }
        if ($pan_number_image) {
            $array['pan_number_image'] = $pan_number_image;
        }
        if ($company_id) {
            $company = Company::where('company_id', $company_id)->update($array);
            session(['step' => 1]);
            return redirect()->route('addCompany')->with('success', 'Company Updated Successfully!!');
        } else {
            $company = Company::create($array);
            session(['step' => 1]);
            return redirect()->route('addCompany')->with('success', 'Company Added Successfully!!');
        }
    }

    public function addCompanyExperience()
    {
        return view('auth.addCompany');
    }

    public function editExperience($expId)
    {
        $experience = ClientExperience::where('client_experience_id', $expId)->firstOrFail();
        return response()->json($experience);
    }

    public function addExperience(Request $request)
    {
        $rules = [
            'clientName' => 'required|string|max:255',
            'projectTitle' => 'required|string|max:255',
            'desc' => 'required|string|min:10|max:400',
            'projectHighlights' => 'required|string',
            'projectSize' => 'required|numeric',
            'projectSizeCurrency' => 'required|string',
            'projectDurationInYear' => 'required|integer|min:0|max:11',
            'projectDurationInMonth' => 'required|integer|min:0|max:30',
        ];

        // Validate the request
        $request->validate($rules);

        $user = Auth::user();
        $company = Company::where('user_id', $user->user_id)->first();

        try {
            // Create a new ClientExperience instance
            $experience = new ClientExperience;
            $experience->client_name = $request->input('clientName');
            $experience->project_title = $request->input('projectTitle');
            $experience->description = $request->input('desc');
            $experience->highlights = $request->input('projectHighlights');
            $experience->project_size = $request->input('projectSize');
            $experience->project_size_currency = $request->input('projectSizeCurrency');
            $experience->project_duration_in_year = $request->input('projectDurationInYear');
            $experience->project_duration_in_month = $request->input('projectDurationInMonth');
            $experience->company_id = $company->company_id;
            // Save the experience to the database
            $experience->save();

            return redirect()->route('addCompany')->with('success', 'Experience added successfully');
        } catch (\Exception $e) {
            return redirect()->route('addCompany')->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function updateExp(Request $request, $expId)
    {

        $rules = [
            'client_name' => 'required|string|max:255',
            'project_title' => 'required|string|max:255',
            'description' => 'required|string|min:10|max:400',
            'highlights' => 'required|string',
            'project_size' => 'required|numeric',
            'project_size_currency' => 'required|string',
            'project_duration_in_year' => 'required|integer|min:0|max:11',
            'project_duration_in_month' => 'required|integer|min:0|max:30',
        ];

        // Validate the request
        $request->validate($rules);
        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        // Check if "project_size" is an array and convert it to a string
        if (is_array($requestData['project_size'])) {
            // Assuming the array contains a date string
            $dateString = $requestData['project_size'][0];
            $requestData['project_size'] = $dateString;
        }
        if (is_array($requestData['project_duration_in_month'])) {
            $intValue = (int) $requestData['project_duration_in_month'][0];
            $requestData['project_duration_in_month'] = $intValue;
        }
        if (isset($requestData['project_duration_in_year'])) {
            if ($requestData['project_duration_in_year'] === '[null]') {
                $requestData['project_duration_in_year'] = null; // Set it to null
            } else {
                $requestData['project_duration_in_year'] = (int) $requestData['project_duration_in_year'];
            }
        }
        // Find the record by ID and update it
        $experience = ClientExperience::where('client_experience_id', $expId)->first();
        if ($experience) {
            $experience->update($requestData);
            return response()->json(['message' => 'Experience updated successfully']);
        } else {
            return response()->json(['message' => 'Experience not found'], 404);
        }
    }

    public function deleteExp($id)
    {

        $experience = ClientExperience::find($id);
        if (!$experience) {
            return response()->json(['message' => 'Experience not found'], 404);
        }
        $experience->delete();
        return response()->json(['message' => 'Experience deleted successfully']);
    }

    // public function getClientExp(Request $request)
    // {
    //     $user = Auth::user();
    //     $company = Company::where('user_id', $user->user_id)->first();
    //     if ($request->ajax()) {
    //         if ($company) {
    //             $data = ClientExperience::select(['client_experience_id', 'client_name', 'project_title', 'description', 'highlights', 'project_size', 'project_size_currency', 'project_duration_in_year', 'project_duration_in_month', 'client_experience_id'])
    //                 ->where('company_id', $company->company_id)
    //                 ->get();
    //         } else {
    //             $data = collect();
    //         }
    //         return Datatables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('action', function ($row) {

    //                 $actionBtn = '
    //                 <a href="javascript:void(0)" class="edit btn btn-success btn-sm"  data-bs-toggle="modal"  data-client_experience_id="' . $row->client_experience_id  . '" data-bs-target="#kt_modal_1">Edit</a> 
    //                 <a href="javascript:void(0)" class="delete btn btn-danger btn-sm" data-client_experience_id="' . $row->client_experience_id  . '">Delete</a>
    //                 ';
    //                 return $actionBtn;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }
    // }



    public function getClientExp(Request $request)
    {
        $user = Auth::user();
        $company = Company::where('user_id', $user->user_id)->first();
        if ($request->ajax()) {
            if ($company) {
                $data = ClientExperience::select(['client_experience_id', 'client_name', 'project_title', 'description', 'highlights', 'project_size', 'project_size_currency', 'project_duration_in_year', 'project_duration_in_month', 'client_experience_id'])
                    ->where('company_id', $company->company_id)
                    ->get();
            } else {
                $data = collect();
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editBtn = '<a href="javascript:void(0)" class="edit" data-bs-toggle="modal" data-client_experience_id="' . $row->client_experience_id . '" data-bs-target="#kt_modal_1"><i class="fas fa-edit" style="color: #009ef7;"></i></a>';
                    $buttonGap = '&nbsp;&nbsp;';
                    $deleteBtn = '<a href="javascript:void(0)" class="delete" data-client_experience_id="' . $row->client_experience_id . '"><i class="fas fa-trash-alt" style="color: 
                    #990000;"></i></a>';


                    return $editBtn . $buttonGap . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
