<?php
namespace Vogelzang\Http\Controllers;

use Mail;
use Vogelzang\Http\Requests\ReplyToContactFormRequest;
use Vogelzang\Http\Requests\StoreContactFormRequest;
use Vogelzang\Models\Contact;

class ContactsController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(20);

        return view('contacts.index', compact('contacts'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('contacts.create')->with('title', 'Contacteer ons');
    }

    /**
     * @param \Vogelzang\Http\Requests\StoreContactFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreContactFormRequest $request)
    {
        $data = [
            'full_name' => $request->get('full_name'),
            'subject' => $request->get('subject'),
            'email' => $request->get('email'),
            'message' => $request->get('q'),
            'name' => $request->get('name'),
        ];

        $contact = Contact::create($data);

        Mail::send('emails.contact', array_merge($data, [
            'link' => route('contacts.show', $contact->id)
        ]), function ($message) use ($contact) {
            $message->to('info@staldevogelzang.be', 'Peter')->subject('U hebt een nieuw bericht vanop de site.');
        });

        return redirect()->route('contacts.create')->with('global', 'Uw bericht is verzonden. We nemen zo snel mogelijk contact met u op.');
    }

    /**
     * @param \Vogelzang\Models\Contact $contact
     * @return \Illuminate\View\View
     */
    public function show(Contact $contact)
    {
        $contact->read = 1;
        $contact->save();

        return view('contacts.show', compact('contact'));
    }

    /**
     * @param \Vogelzang\Http\Requests\ReplyToContactFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ReplyToContactFormRequest $request)
    {
        Mail::send('emails.reply', [
            'reply' => $request->get('reply'),
        ], function($message) use ($request) {
            $message->to($request->get('email'), $request->get('name'))->subject('Antwoord op: ' . $request->get('subject'));
        });

        return back()->with('global', 'Het bericht is verzonden.');
    }

    /**
     * @param \Vogelzang\Models\Contact $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('global', 'Bericht verwijderd.');
    }
}
