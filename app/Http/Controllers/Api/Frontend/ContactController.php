<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactAddRequest;
use App\Mail\LuminafixMail;
use App\Models\Contact;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

class ContactController extends Controller
{

    public function store(ContactAddRequest $request)
    {
        $validatedData = $request->validated();
        Mail::to('waqar@luminafix.com')->send(new LuminafixMail($validatedData['name'], $validatedData['email'], $validatedData['phone'], $validatedData['description']));
        Contact::create($validatedData);
        return response()->json();
    }
}
