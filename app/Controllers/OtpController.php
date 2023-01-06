<?php

namespace App\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Capsule\Manager as DB;

class OtpController
{
    public function send(Request $request)
    {
        if (! $request->has('mobile')) {
            return [
                'error' => true,
                'message' => 'Mobile is invalid.'
            ];
        }

        $mobile = $request->input('mobile');
        $otp = mt_rand(100000, 999999);

        DB::connection('mysql')->table('otp_table')->insert([
            'mobile' => $mobile,
            'code' => $otp,
            'expired_at' => Carbon::now('Asia/Tehran')->addMinutes(2)->format('Y-m-d H:i:s')
        ]);

        $this->sendOtpWithSMS($mobile, $otp);

        return [
            'success' => true,
            'message' => 'OTP Sent.'
        ];        
    }

    public function verify(Request $request)
    {
        // verify otp
        return [
            'verify' => true
        ];
    }

    private function sendOtpWithSMS(string $mobile, int $otp): void
    {
        // send otp to mobile ...
    }
}
