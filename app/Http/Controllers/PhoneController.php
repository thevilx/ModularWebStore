<?php

namespace App\Http\Controllers;

use App\Models\User;
use Tzsk\Sms\Facades\Sms;
use App\Models\ActiveCode;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * generate active code and send sms to givin phone number
     *
     * @param  Request $request
     * @return Response
     */
    public function sendSmsTo(Request $request){
        $request->validate([
            'phone' => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric',
        ]);

        $code = ActiveCode::generateCode($request->phone);
        $to = array($request->phone);

        Sms::send("code:$code" , function($sms) use ($request , $to){
            $sms->to($to);
        });

        return ['massage' => "اس ام اس حاوی کد 6 رقمی به شماره تلفن شما ارسال شد"];
    }

    /**
     * validate phone number with givin phone and active code
     *
     * @param  Request $request
     * @return Response
     */
    public function validatePhone(Request $request){
        
        $request->validate([
            'token' => 'required|numeric',
            'phone' => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric',
        ]);

        if(ActiveCode::verifyCode($request->token, $request->phone)){
            $user = User::wherePhone($request->phone)->first();

            if(!$user){

                $user =User::create([
                    'phone' => $request->phone,
                ]);

                return ['massage' => 'اکانت شما با موفقیت ایجاد شد' , 'btoken' => $user->createToken("Rahnma")->plainTextToken];
            }

            if ($user->tokens()->count() > 0) // delete previous token 
                $user->tokens()->delete();

            return ['massage' => 'با موفیقت وارد شدید', 'btoken' => $user->createToken("Rahnma")->plainTextToken];
        }

        return response(['massage' => 'کد به اشتباه وارد شده است'] , 401);
    }
}
