<?php

namespace App\Http\Controllers;

class ReferralCodeController extends Controller
{
    public function index()
    {
        return view('admin.referral-code.index');
    }
}
