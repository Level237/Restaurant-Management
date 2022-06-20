<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex  m-2 p-2">
                <a href="{{ route('admin.reservations.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Reservation Index</a>

            </div>
            <div class="m-2 p-2 bg-white rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form action="" enctype="multipart/form-data">
                    <div class="sm:col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1">
                            <input type="text" id="title" wire:model.lazy="title" name="title" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2">
                        </div>
                    </div>
                    <div class="sm:col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">Image</label>
                        <div class="mt-1">
                            <input type="file" id="image" wire:model.lazy="newImage" name="image" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2">
                        </div>
                    </div>
                    <div class="sm:col-span-6">

                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
                        <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea>

                    </div>
                    <div class="mt-6 p-4">
                        <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">Store</button>
                    </div>

                    </form>

                </div>

            </div>


        </div>
    </div>
</x-admin-layout>

