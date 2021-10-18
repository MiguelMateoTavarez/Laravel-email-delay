<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use Carbon\Carbon;

class MailController extends Controller
{
    public function __construct()
    {
        $this->email = "elsander94@gmail.com";
    }
    public function sendNotification()
    {
        $details = $this->email;
        $emailJob = (new SendEmail($details))->delay(Carbon::now()->addMinutes(2));

        dispatch($emailJob);
    }
}
