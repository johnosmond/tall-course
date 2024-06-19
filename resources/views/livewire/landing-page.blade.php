<div class="flex flex-col bg-indigo-900 w-full h-screen" x-data="{ showSubscribe: false, showMessage: false, }">

    <nav class="flex pt-5 justify-between container mx-auto text-indigo-300">
        <a class="text-4xl font-bold" href="{{ route('home') }}">
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

    {{-- modal form --}}
    <x-modal1 class="bg-pink-500" trigger="showSubscribe">
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
    </x-modal1>

    {{-- modal message --}}
    <x-modal1 class="bg-green-500" trigger="showMessage">
        <p class="animate-pulse text-white text-9xl font-extrabold text-center">
            &check;
        </p>
        <p class="text-white text-5xl font-extrabold text-center mt-10">
            Great!
        </p>
        <p class="text-white text-3xl text-center">
            See you in your inbox.
        </p>
    </x-modal1>

</div>
