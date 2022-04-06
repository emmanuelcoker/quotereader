<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Notifications\QuoteOfTheDay;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailToSubscribers;
use App\Models\Quote;
use App\Models\User;
use Carbon\Carbon;


class notifyUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify users by mail and database notification';

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
        //check if there is a Quote scheduled for today,
        // if not pick one at random and send to mail
    
        $users = User::oldest()->get();
        $subscribers = User::where('isSubscribed', true)->get();

        //Daily Notifications
        $today = Carbon::now();
        if( Quote::whereDate('scheduled_date', '=', $today)->exists() ){
            $quote = Quote::whereDate('scheduled_date', '=', $today)
                                ->first();
            Notification::send($users, new QuoteOfTheDay($quote) );   

        }else{
            $quote = Quote::inRandomOrder()->first();
            Notification::send($users, new QuoteOfTheDay($quote) );
        }

        //Mail to Subscribers
        $subscribers = User::where('isSubscribed', true)->get();

        foreach ($subscribers as $subscriber) {
            $GLOBALS['subscriber'] = $subscriber->email;
           Mail::raw($quote->content, function ($message) {
                  $message->to($GLOBALS['subscriber'])
                    ->subject('Quote of the Day');
                });
        }

        return true;
    }
}

