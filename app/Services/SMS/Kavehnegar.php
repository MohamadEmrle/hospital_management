<?php
namespace App\Services\SMS;
use App\Interfaces\SmsInterface;
use App\Models\SmsLog;
use Kavenegar;
class Kavehnegar implements SmsInterface {

    public function send($receiver, $message)
    {
        try{
            $sender = "10009000700011";		//This is the Sender number
            $receptor = array($receiver);			//Receptors numbers

            $result = Kavenegar::Send($sender,$receptor,$message);
            if($result){
                foreach($result as $r){
                   $this->log(1,$receiver,$message,$r);
                }
            }
        }
        catch(\Kavenegar\Exceptions\ApiException $e){
          // يحدث هذا الخطأ إذا لم يكن ناتج خدمة الويب 200
            $result = $e->errorMessage();
            $this->log(0,$receiver,$message,$result);
        }
        catch(\Kavenegar\Exceptions\HttpException $e){
            // يحدث هذا الخطأ عند وجود مشكلة في إنشاء اتصال بخدمة الويب
            $result = $e->errorMessage();
            $this->log(0,$receiver,$message,$result);
        }
    }

    function log($success, $receiver, $message, $result)
    {
        SmsLog::create([
            'success' => $success,
            'receiver' => $receiver ,
            'message' => $message,
            'result' => json_encode($result)
        ]);
    }
}