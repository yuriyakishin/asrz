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
        $headers= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=UTF-8\r\n";
		
	$body = "<h3>Заказ обратного звонка</h3>";
	$body .= "Телефон: ".$request->input('phone')."<br />";
	if($request->input('name') !== null) {
            $body .= "Имя: ".$request->input('name')."<br />";
        }

	mail($email,"Заказ обратного звонка с сайта АСРЗ",$body,$headers);
        
        return Response::json(['message' => 'Ваша заявка успешно отправлена. Мы свяжемся с вами в течение 30 секунд.']);
    }
    
    public function order(Request $request)
    {
        $email = \App\CmsSetting::where('code','base')->first()->getValue()['email'];
        $headers= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=UTF-8\r\n";
		
	$body = "<h3>Заявка с сайта АСРЗ</h3>";
        $body .= "Фирма: ".$request->input('firm')."<br />";
	$body .= "Телефон: ".$request->input('phone')."<br />";
	$body .= "Имя: ".$request->input('name')."<br />";
        
        $body .= "Должность: ".$request->input('prof')."<br />";
        $body .= "Email: ".$request->input('email')."<br />";
        $body .= "Сообщение: ".$request->input('message')."<br />";

	mail($email,"Заявка с сайта АСРЗ",$body,$headers);
        
        return Response::json(['message' => 'Ваша заявка успешно отправлена. Мы свяжемся с вами в течение 30 секунд.']);
    }
}