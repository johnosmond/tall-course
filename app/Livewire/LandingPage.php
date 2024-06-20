<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Models\Subscriber;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Notifications\VerifyEmail;

class LandingPage extends Component
{
    public $email;
    public $showSubscribe = false;
    public $showSuccess = false;

    protected $rules = [
        'email' => 'required|email:filter|unique:subscribers,email',
    ];

    // public function messages()
    // {
    //     return [
    //         'email.required' => 'Please enter your email address.',
    //         'email.email' => 'Please enter a valid email address.',
    //         'email.unique' => 'That email address is already subscribed.',
    //     ];
    // }

    public function subscribe()
    {
        $this->validate();

        // DB::transaction(function () {

        //     $subscriber = Subscriber::create([
        //         'email' => $this->email,
        //     ]);

        //     $notification = new VerifyEmail;

        //     $notification->createUrlUsing(function ($notifiable) {
        //         return URL::temporarySignedRoute(
        //             'subscribers.verify',
        //             now()->addMinutes(360),
        //             [
        //                 'subscriber' => $notifiable->getKey(),
        //             ],
        //         );
        //     });

        //     $subscriber->notify($notification);
        // }, $deadLockRetries = 5);

        Log::info('Updating fields here:');
        Log::info('(before updates) email: ' . $this->email . ' showSubscribe: ' . $this->showSubscribe . ' showSuccess: ' . $this->showSuccess);
        $this->reset('email');
        $this->showSubscribe = false;
        $this->showSuccess = true;
        Log::info('(after updates) email: ' . $this->email . ' showSubscribe: ' . $this->showSubscribe . ' showSuccess: ' . $this->showSuccess);
    }

    public function render()
    {
        return view('livewire.landing-page');
    }
}
