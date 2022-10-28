<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use App\Mail\SendEmail;
class TestQueueEmails extends Controller
{
    public function sendTestEmails()
    {
        $emailJobs = new SendEmailJob();
        $this->dispatch($emailJobs);
    }
}
