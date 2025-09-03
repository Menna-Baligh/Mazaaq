<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'to' => 'required|email|in:book@example.com,info@example.com,tech@example.com',
            'message' => 'required',
        ]);
        $to = $validated['to'];
        $subject = $request->subject ?? 'Massage from ' . $validated['name'];

        Mail::raw($validated['message'], function ($message) use ($to, $subject, $validated) {
            $message->to($to)
                    ->from($validated['email'], $validated['name'])
                    ->subject($subject)
                    ->replyTo($validated['email']);
        });
        return back()->with('success', 'Message sent successfully.');
    }
}
