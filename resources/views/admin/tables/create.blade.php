<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex  m-2 p-2">
                <a href="{{ route('admin.tables.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Table Index</a>

            </div>
            <div class="m-2 p-2 bg-white rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1">
                            <input type="text" id="title"  name="name" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2">
                        </div>
                    </div>
                    <div class="sm:col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">Image</label>
                        <div class="mt-1">
                            <input type="file" id="image" wire:model.lazy="newImage" name="image" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2">
                        </div>
                    </div>
                    <div class="sm:col-span-6">
                        <label for="price" class="block text-sm font-medium text-gray-700">Guest number</label>
                        <div class="mt-1">
                            <input type="number" id="price"  name="price" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2">
                        </div>
                    </div>
                    <div class="sm:col-span-6 pt-5">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <div class="mt-1">
                            <select id="status" name="status" class="form-multiselect block w-full mt-1">

                                    <option value=""></option>

                            </select>
                        </div>
                    </div>
                    <div class="sm:col-span-6 pt-5">
                        <label for="location" class="block text-sm font-medium text-gray-700">location</label>
                        <div class="mt-1">
                            <select id="status" name="location" class="form-multiselect block w-full mt-1">

                                    <option value=""></option>

                            </select>
                        </div>
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

