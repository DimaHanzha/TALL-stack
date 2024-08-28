<?php

namespace App\Livewire\Services;

use App\Models\Subscriber as SubscriberModel;
use App\Livewire\Services\Interfaces\Subscriber as SubscriberInterface;
use Illuminate\Database\Eloquent\Collection;

class Subscriber implements SubscriberInterface
{
    public function create(string $email): SubscriberModel
    {
        return SubscriberModel::create([
            'email' => $email,
        ]);
    }

    public function get($search): ?Collection
    {
        return SubscriberModel::where('email', 'like', "%$search%")->get();
    }
}
