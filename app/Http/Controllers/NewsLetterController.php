<?php
namespace Vogelzang\Http\Controllers;

use Mail;
use Vogelzang\Http\Requests\NewsLetterRequest;
use Vogelzang\Jobs\SendNewsletter;

class NewsLetterController extends Controller
{
    public function index()
    {
        return view('newsletter.index');
    }

    public function send(NewsLetterRequest $request)
    {
        $this->dispatch(new SendNewsletter($request->get('subject'), $request->get('body')));

        session()->put(['success', 'Nieuwsbrief wordt uitgezonden']);

        return back();
    }
}
