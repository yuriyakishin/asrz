<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class MailController extends Controller
{
    public function callback(Request $request)
    {
        $email = \App\CmsSetting::where('code','base')->first()->getValue()['email'];
                
        Mail::send('emails.callback', ['name' => $request->input('name'), 'phone' => $request->input('phone')], function($message)
        {
            //$message->to($email, 'Джон Смит')->subject('Привет!');
        });
        
        return Response::json(['message' => 'Ваша заявка успешно отправлена']);
    }
    
    public function order(Request $request)
    {
        Mail::send('emails.callback', ['name' => $request->input('name'), 'phone' => $request->input('phone')], function($message)
        {
            //$message->to($email, 'Джон Смит')->subject('Привет!');
        });
        
        return 'Ваша заявка успешно отправлена';
    }
}