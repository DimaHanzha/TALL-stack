<?php

namespace App\Livewire;

use App\Livewire\Services\Interfaces\Subscriber;
use App\Models\Subscriber as SubscriberModel;
use Livewire\Component;

class Subscribers extends Component
{
    public $search;

    protected $subscriber;

    protected $queryString = [
        'search' => [
            'except' => '',
        ]
    ];

    public function boot(Subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    public function delete(SubscriberModel $subscriber)
    {
        $subscriber->delete();
    }

    public function render()
    {
        $subscribers = $this->subscriber->get($this->search);

        return view('livewire.subscribers')->with(['subscribers' => $subscribers]);
    }
}
