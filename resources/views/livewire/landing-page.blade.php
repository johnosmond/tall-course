<div x-data="{ showSubscribe: false }" class="flex flex-col bg-indigo-900 w-full h-screen">
    <nav class="flex pt-5 justify-between container mx-auto text-indigo-300">
        <a href="{{ route('home') }}" class="text-4xl font-bold">
            <x-application-logo class="w-16 h-auto fill-current" />
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
                Simple Generic Landing Page to Subscribe
            </h1>
            <p class="text-indigo-200 text-xl mb-5">
                We are testing the <span class="font-bold underline">TALL</span>
                stack. Please subscribe.
            </p>
            <x-primary-button x-on:click="showSubscribe=true">
                Subscribe
            </x-primary-button>
        </div>
    </div>

    <div x-cloak x-show="showSubscribe" x-on:click.self="showSubscribe=false" x-on:keydown.escape.window="showSubscribe=false" class="flex fixed top-0 bg-gray-900 bg-opacity-60 items-center w-full h-full">
        <div class="bg-pink-500 m-auto shadow-2xl rounded-xl p-8">
            <p class="text-white text-5xl font-extrabold text-center">Let's do it!</p>
            <form class="flex flex-col items-center p-24 gap-4" wire:submit.prevent="subscribe">
                <x-text-input class="px-5 py-3 w-80 border border-blue-400" name="email" type="email"
                    placeholder="Email" wire:model="email" />
                <span class="text-gray-100 text-sm">
                    We will send you a confirmation email.
                </span>
                <x-primary-button class="w-80">
                    <span class="mx-auto">Get In!</span>
                </x-primary-button>
            </form>
        </div>
    </div>
</div>
