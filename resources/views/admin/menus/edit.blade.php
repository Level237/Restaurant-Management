<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex  m-2 p-2">
                <a href="{{ route('admin.menus.index') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Menu Index</a>

            </div>
            <div class="m-2 p-2 bg-white rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form method="POST" action="{{ route('admin.menus.update',$menu->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="sm:col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1">
                            <input type="text" id="title" wire:model.lazy="title" name="name" value="{{ $menu->name  }}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 @error('name') border-red-400 @enderror">
                        </div>
                        @error('name')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">Image</label>
                        <div>
                            <img class="w-32 h-32" src="{{ Storage::url($menu->image) }}">
                        </div>
                        <div class="mt-1">
                            <input type="file" id="image" wire:model.lazy="newImage" name="image" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 @error('image') border-red-400 @enderror">
                        </div>
                        @error('image')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-6">
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <div class="mt-1">
                            <input type="number" id="price" min="0.00" max="10000.00" step="0.01" name="price" value="{{ $menu->price }}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 @error('price') border-red-400 @enderror">
                        </div>
                        @error('price')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-6">

                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
                        <textarea name="description" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('description') border-red-400 @enderror" placeholder="Your message...">{{ $menu->description }}</textarea>
                        @error('description')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-6 pt-5">
                        <label for="body" class="block text-sm font-medium text-gray-700">Categories</label>
                        <div class="mt-1">
                            <select multiple name="categories[]" class="form-multiselect block w-full mt-1 @error('categories[]') border-red-400 @enderror">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected( $menu->categories->contains($category))>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('categories[]')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="mt-6 p-4">
                        <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded text-white">Update</button>
                    </div>

                    </form>

                </div>

            </div>


        </div>
    </div>
</x-admin-layout>

