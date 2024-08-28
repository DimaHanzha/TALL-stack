<div class="flex flex-col bg-indigo-900 w-full h-screen" x-data="{ showSubscribe: $wire.entangle('showSubscribe'), showSuccess: $wire.entangle('showSuccess') }">
    <nav class="flex pt-5 justify-between container mx-auto text-indigo-200">
        <a class="text-4xl font-bold" href="/">
            <x-application-logo class="w-16 h-16 fill-current">

            </x-application-logo>
        </a>
        <div class="flex justify-end">
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    </nav>
    <div class="flex container mx-auto items-center h-full">
        <div class="flex flex-col w-1/3 items-start">
            <h1 class="text-white font-bold text-5xl leading-tight mb-4">
                Simple generic landing page to subscribe
            </h1>
            <p class="text-indigo-200 text-xl mb-10">
                Would you mind to subscribe?
            </p>
            <x-danger-button x-on:click="showSubscribe = true">
                Subscribe
            </x-danger-button>
        </div>
    </div>
    <x-subscribtion-modal class="bg-pink-500" trigger="showSubscribe">
        <p class="text-white text-5xl font-extrabold text-center">
            Let's do it!
        </p>
        <form class="flex flex-col items-center p-24" wire:submit.prevent="subscribe">
            <x-text-input
                class="dark:bg-white dark:text-gray-900 px-5 py-3 w-80 border border-blue-400"
                type="email"
                name="email"
                placeholder="Email address"
                wire:model.defer="email"
            ></x-text-input>
            <span class="text-gray-100 text-xs">
                {{ $errors->has('email') ? $errors->first('email') : 'We will send you a confirmation email.' }}
            </span>
            <x-primary-button class="px-5 py-3 mt-5 w-80 bg-blue-500 justify-center">
                <span class="animate-spin" wire:loading wire:target="subscribe">
                    &#9696;
                </span>
                <span wire:loading.remove wire:target="subscribe">
                    Get In
                </span>
            </x-primary-button>
        </form>
    </x-subscribtion-modal>
    <x-subscribtion-modal class="bg-green-500" trigger="showSuccess">
        <p class="animate-pulse text-white text-9xl font-extrabold text-center">
            &check;
        </p>
        <p class="text-white text-5xl font-extrabold text-center mt-16">
            Great!
        </p>
        @if(request()->has('verified') && request()->verified == 1)
            <p class="text-white text-3xl text-center">
                Thanks for confirming.
            </p>
        @else
            <p class="text-white text-3xl text-center">
                See you in your inbox.
            </p>
        @endif

    </x-subscribtion-modal>
</div>
