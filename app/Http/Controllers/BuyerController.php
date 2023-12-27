<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use App\Http\Requests\Buyer;
use Illuminate\Support\Facades\Redirect;
use App\Models\verifytoken;
use App\Models\SurveyTopic;
use App\Models\QuesType;
use App\Models\SurveyQues;
use App\Models\SurveyAns;
use App\Models\UsersAns;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Validator;

class BuyerController extends Controller
{

    public function buyer()
    {
        return view('auth.buyer');
    }
    public function registerBuyer(Buyer $request)
    {
        $validatedData = $request->validated();
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'password' => bcrypt($validatedData['password']),
            'company' => $validatedData['company'],
            'industry' => $validatedData['industry'],
            'location' => $validatedData['location'],
            'user_type_id' => '3',
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
        return view('auth.otp_verification_buyer');
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


    public function buyerAccountActivation(Request $request)
    {
        $enteredOtp = $request->input('otp');
        $tokenAttheTimeOfRegistration = session()->get('email_token');
        $newToken = session()->get('new_token');
        $new_token = verifytoken::where('token', $newToken)->first();
        $tokenTthetimeoflogin = session()->get('token_at_the_time_of_login');
        $validation = Validator::make($request->all(), [
            'otp' => 'required|digits:6'
        ]);
        if ($validation->fails()) {
            return Redirect::back()->withErrors($validation);
        }
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

    public function addSurvey()
    {
        $survey_topics = SurveyTopic::where('parent_id', 0)->get();
        return view('auth.addSurvey', [
            'survey_topics' => $survey_topics,
        ]);
    }

    public function addSurvey1()
    {
        $survey_topics = SurveyTopic::where('parent_id', 0)->get();
        return view('auth.addSurvey1', [
            'survey_topics' => $survey_topics,
        ]);
    }
    public function addSurvey2()
    {
        $survey_topics = SurveyTopic::where('parent_id', 0)->get();
        return view('auth.addSurvey2', [
            'survey_topics' => $survey_topics,
        ]);
    }

    public function getQuestions(Request $request)
    {
        $selectedTopicId = $request->input('topic_id');
        $quiz = [];
        if ($selectedTopicId) {
            $questions = SurveyQues::with('answers:survey_answers_id,survey_questions_id,ans_name')
                ->where('survey_topics_id', $selectedTopicId)->get();


            $quiz = $questions->map(function ($item, $key) {
                $ans = $item?->answers ?? [];

                $answers = [];
                $fill = UsersAns::where('survey_questions_id', $item->survey_questions_id)
                    ->where('user_id', auth()->user()->user_id)
                    ->first();
                // echo "<pre>";

                // print_r($fill);exit;
                // echo "</pre>";
                foreach ($ans as $row) {
                    $answers[] = [
                        'answers_id' => $row->survey_answers_id,
                        'answer' => $row->ans_name,
                        'fill' => $fill?->ans_name,
                        'other' => $fill?->others
                    ];
                }
                if ($item->ques_type === 'regular') {
                    $userResponse = $fill ? $fill->ans_name : null;
                    // Add it to the answers array or handle it according to your data structure
                    $answers[] = [
                        'answers_id' => null, // You might need to provide an appropriate value or leave it as null
                        'answer' => $userResponse,
                        'fill' => $userResponse,
                        'other' => null,
                    ];
                }
                return [
                    'question_id' => $item->survey_questions_id,
                    'question' => $item->name,
                    'type' => $item->ques_type,
                    'answers' => $answers
                ];
            });
            return response()->json(['success' => $quiz ? true : false, 'questions' => $quiz, 'message' => 'No questions available for this topic.']);
        }
        return response()->json(['success' => false, 'message' => 'No questions available for this topic.']);
    }


    /* save data from localstorage */
    // public function saveAnswers(Request $request)
    // {
    //     $user = Auth::user();
    //     $formData = $request->all();

    //     if (isset($formData['answers'])) {
    //         $answers = json_decode($formData['answers'], true);

    //         if ($answers) {
    //             foreach ($answers as $answer) {
    //                 $data = new UsersAns();
    //                 $data->user_id = $user->user_id;
    //                 $data->survey_topics_id = $answer['anyTopic'];
    //                 $data->ques_name = $answer['question'];
    //                 $data->survey_questions_id = $answer['question_id'];

    //                 switch ($answer['type']) {
    //                     case 'radioButton':
    //                         $data->ans_name = $answer['selectedAnswer'];
    //                         break;
    //                     case 'textforEnergyConsumption':
    //                         if (isset($answer['selectedAnswer']) && is_array($answer['selectedAnswer'])) {
    //                             $data->ans_name = json_encode($answer['selectedAnswer']);
    //                         } else {
    //                             $data->ans_name = json_encode(['error' => 'Invalid answer format']);
    //                         }
    //                         break;
    //                     case 'checkbox':
    //                         if (isset($answer['selectedAnswer']) && is_array($answer['selectedAnswer'])) {
    //                             $data->ans_name = json_encode($answer['selectedAnswer']);
    //                         } else {
    //                             $data->ans_name = json_encode(['error' => 'Invalid answer format']);
    //                         }
    //                         break;
    //                     case 'textbox':
    //                         if (isset($answer['selectedAnswer']) && is_array($answer['selectedAnswer'])) {
    //                             $data->ans_name = json_encode($answer['selectedAnswer']);
    //                         } else {
    //                             $data->ans_name = json_encode(['error' => 'Invalid answer format']);
    //                         }
    //                         break;
    //                     case 'regular':
    //                         $data->ans_name = $answer['selectedAnswer'];
    //                         break;
    //                     case 'radio':
    //                         $data->ans_name = $answer['selectedAnswer'];
    //                         break;
    //                 }

    //                 $data->save();
    //             }

    //             return response()->json(['message' => 'Answers submitted successfully'], 200);
    //         } else {
    //             return response()->json(['message' => 'Invalid answer data format'], 400);
    //         }
    //     } else {
    //         return response()->json(['message' => 'Incomplete data received'], 400);
    //     }
    // }






    // public function saveAnswers(Request $request)
    // {
    //     $user = Auth::user();
    //     $formData = $request->all();
    //     if (isset($formData['answers'])) {
    //         $answers = json_decode($formData['answers'], true);
    //         if ($answers) {
    //             foreach ($answers as $answer) {
    //                 $existingEntry = UsersAns::where('user_id', $user->user_id)
    //                 ->where('survey_topics_id', $answer['anyTopic'])
    //                 ->where('survey_questions_id', $answer['question_id'])
    //                 ->first();
    //                 if (!$existingEntry) {
    //                     $data = new UsersAns();
    //                     $data->user_id = $user->user_id;
    //                     $data->survey_topics_id = $answer['anyTopic'];
    //                     $data->ques_name = $answer['question'];
    //                     $data->survey_questions_id = $answer['question_id'];

    //                     $data->others = $answer['text'];
    //                     $questionType = $answer['questionType'];
    //                     if ($questionType == "radio") {
    //                         $data->ans_name = $answer['answer'];
    //                     } else if ($questionType == "radioButton") {
    //                         $data->ans_name = $answer['answer'];
    //                     } 
    //                     else if ($questionType == "textforEnergyConsumption") {
    //                         $energyConsumption = $answer['energyConsumption'];

    //                         $data->ans_name = json_encode([[
    //                             'electricity' => $energyConsumption['electricity'] ?? null,
    //                             'naturalGas' => $energyConsumption['naturalGas'] ?? null,
    //                             'renewable' => $energyConsumption['renewable'] ?? null,
    //                             'otherName' => $energyConsumption['otherName'] ?? null,
    //                             'percentage' => $energyConsumption['percentage'] ?? null,
    //                         ]]);
    //                     } 
    //                     else if ($questionType == "textbox") {
    //                         $annualMileage = $answer['annualMileage'];

    //                         $data->ans_name = json_encode([[
    //                             'employeeCommuting' => $annualMileage['employeeCommuting'] ?? null,
    //                             'companyFleet' => $annualMileage['companyFleet'] ?? null,
    //                         ]]);
    //                     } else if ($questionType == "checkbox") {
    //                         if (is_array($answer['answer'])) {
    //                             $data->ans_name  = json_encode($answer['answer']);
    //                         }
    //                     }
    //                     else if ($questionType == "regular") {
    //                         $data->ans_name = $answer['textbox'];
    //                     }
    //                     $data->save();
    //                 }

    //             }

    //             return response()->json(['message' => 'Answers submitted successfully'], 200);
    //         } else {
    //             return response()->json(['message' => 'Invalid answer data format'], 400);
    //         }
    //     } else {
    //         return response()->json(['message' => 'Incomplete data received'], 400);
    //     }
    // }




    public function saveAnswers(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        $formData = $request->all();

        if (isset($formData['answers'])) {
            $answers = json_decode($formData['answers'], true);

            if ($answers) {
                foreach ($answers as $answer) {
                    UsersAns::updateOrCreate(
                        [
                            'user_id' => $user->user_id,
                            'survey_topics_id' => $answer['anyTopic'],
                            'survey_questions_id' => $answer['question_id'],
                        ],
                        [
                            'ques_name' => $answer['question'],
                            'others' => $answer['text'],
                            'ans_name' => $this->getAnswerData($answer),
                        ]
                    );
                }

                return response()->json(['message' => 'Answers submitted successfully'], 200);
            } else {
                return response()->json(['message' => 'Invalid answer data format'], 400);
            }
        } else {
            return response()->json(['message' => 'Incomplete data received'], 400);
        }
    }

    private function getAnswerData($answer)
    {
        $questionType = $answer['questionType'];

        switch ($questionType) {
            case "radio":
            case "radioButton":
                return $answer['answer'];
            case "textforEnergyConsumption":
                $energyConsumption = $answer['energyConsumption'];
                return json_encode([[
                    'electricity' => $energyConsumption['electricity'] ?? null,
                    'naturalGas' => $energyConsumption['naturalGas'] ?? null,
                    'renewable' => $energyConsumption['renewable'] ?? null,
                    'otherName' => $energyConsumption['otherName'] ?? null,
                    'percentage' => $energyConsumption['percentage'] ?? null,
                ]]);
            case "textbox":
                $annualMileage = $answer['annualMileage'];
                return json_encode([[
                    'employeeCommuting' => $annualMileage['employeeCommuting'] ?? null,
                    'companyFleet' => $annualMileage['companyFleet'] ?? null,
                ]]);
            case "checkbox":
                return is_array($answer['answer']) ? json_encode($answer['answer']) : null;
            case "regular":
                return $answer['textbox'];
            default:
                return null;
        }
    }
}
