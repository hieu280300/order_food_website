<?php

namespace App\Jobs;

use Mail;
use App\Mail\MailNotify;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    protected  $mail;

    /**
     * Create a new job instance.
     *
     * @param $data
     */
    public function __construct($data, $mail)
    {
        $this->data = $data;
        $this->mail = $mail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // foreach ($this->users as $user) {
            Mail::to($this->mail)->send(new MailNotify($this->data));
        // }
    }
}
