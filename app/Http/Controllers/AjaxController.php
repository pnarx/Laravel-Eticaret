<?php
namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function iletisimkaydet(ContactFormRequest $request)
    {
        $newdata = [
            'name' => Str::title($request->name),
            'email' => $request->email,
            'sucjet' => $request->sucjet,
            'message' => $request->message,
            'ip' => $request->ip(),
        ];

        Contact::create($newdata);

        return back()->with('success', 'Mesajınız Başarılı bir şekilde gönderildi.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('anasayfa');
    }
}




