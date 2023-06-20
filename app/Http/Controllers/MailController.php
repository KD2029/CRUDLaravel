<?php

namespace App\Http\Controllers;

use App\Mail\mealReminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;


class MailController extends Controller
{
    //
    public function index(){
        $mealtime = 'Breakfast';
        $User = User::first()->select('name')->get();
        $email = User::first()->select('email')->get();
    
        Mail::to($email)->send(new mealReminder($User,$mealtime));
        return response()->json([
            'message' => 'Email has been sent.'
        ], Response::HTTP_OK);

    }
     
}
