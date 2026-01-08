<div class="py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl animate-fade-in-up">Get in Touch</h2>
            <p class="mt-2 text-lg leading-8 text-gray-400 animate-fade-in-up delay-100">
                Ready to start your project? Contact us today.
            </p>
        </div>

        <form wire:submit="submit" class="mx-auto mt-16 max-w-xl sm:mt-20 animate-fade-in-up delay-200">
             @if (session()->has('success'))
                <div class="mb-4 rounded-md bg-green-500/10 p-4 text-sm text-green-400">
                    {{ session('success') }}
                </div>
            @endif
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label for="name" class="block text-sm font-semibold leading-6 text-white">Name</label>
                    <div class="mt-2.5">
                        <input type="text" wire:model="name" id="name" class="block w-full rounded-md border-0 bg-white/5 py-2 px-3.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-semibold leading-6 text-white">Email</label>
                    <div class="mt-2.5">
                        <input type="email" wire:model="email" id="email" class="block w-full rounded-md border-0 bg-white/5 py-2 px-3.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="message" class="block text-sm font-semibold leading-6 text-white">Message</label>
                    <div class="mt-2.5">
                        <textarea wire:model="message" id="message" rows="4" class="block w-full rounded-md border-0 bg-white/5 py-2 px-3.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm sm:leading-6"></textarea>
                    </div>
                </div>
            </div>
            <div class="mt-10">
                <button type="submit" class="block w-full rounded-md bg-blue-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Send Message</button>
            </div>
        </form>
    </div>
</div>
