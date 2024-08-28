<?php

namespace App\Livewire;

use App\Livewire\Services\Interfaces\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use App\Livewire\Services\Interfaces\Subscriber;

class LandingPage extends Component
{
    public $email;

    public $showSubscribe = false;

    public $showSuccess = false;

    protected array $rules = [
        'email' => 'required|email:filter|unique:subscribers,email',
    ];

    protected Subscriber $subscriber;

    protected Notification $notification;

    public function boot(Notification $notification, Subscriber $subscriber, Request $request): void
    {
        $this->notification = $notification;
        $this->subscriber = $subscriber;

        if ($request->has('verified') && $request->verified == 1) {
            $this->showSuccess = true;
        }
    }

    public function subscribe(): void
    {
        $this->validate();

        DB::transaction(function () {
            $subscriber = $this->subscriber->create($this->email);

            $this->notification->send($subscriber);
        },5);


        $this->reset('email');

        $this->showSubscribe = false;
        $this->showSuccess = true;
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.landing-page');
    }
}
