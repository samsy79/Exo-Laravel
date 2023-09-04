<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'email sending';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Mail::send('emailCommand',[],function($message){
            $config = config('mail');
            $name = 'samson';
            $message->subject("Email testing")
                    ->from($config['from']['address'],"Ecole229") //mail d'envoi
                    ->to('titussamson007@gmail.com', $name);
         });
    }
}
