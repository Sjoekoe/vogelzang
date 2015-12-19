<?php

namespace Vogelzang\Jobs;

use Illuminate\Contracts\Mail\Mailer;
use Vogelzang\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Vogelzang\User;

class SendNewsletter extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    /**
     * @var
     */
    private $subject;

    /**
     * @var
     */
    private $body;

    public function __construct($subject, $body)
    {
        $this->subject = $subject;
        $this->body = $body;
    }

    /**
     * @param \Illuminate\Contracts\Mail\Mailer $mail
     */
    public function handle(Mailer $mail)
    {
        $emails = [];

        foreach (User::all() as $user) {
            array_push($emails, $user->email);
        }

        $body = $this->body;
        $subject = $this->subject;

        foreach($emails as $email) {
            $mail->send('emails.newsletter', [
                'body' => $body
            ], function($message) use ($subject, $email) {
                $message->to($email)->subject($subject);
            });
        }
    }
}
