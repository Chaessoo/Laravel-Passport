<?php

namespace App\Http\Controllers;

use App\Mail\Attachment;
use Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function email()
    {
        Mail::to("hasanzusamah@gmail.com")->send(new Attachment());
    }
}
