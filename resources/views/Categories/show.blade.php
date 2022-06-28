<x-guest-layout>
        @foreach ($category->menus as $menu)
        <div class="container w-full px-5 py-6 mx-auto">
            <div class="grid lg:grid-cols-4 gap-y-6">
              <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                <img class="w-full h-48" src="{{ Storage::url($menu->image) }}"
                  alt="Image" />
                <div class="px-6 py-4">
                  <div class="flex mb-2">
                    <span class="px-4 py-0.5 text-sm bg-red-500 rounded-full text-red-50">{{ $menu->name }}</span>
                  </div>
                  <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">salmon fish 1 seafood</h4>
                  <p class="leading-normal text-gray-700">{{ $menu->description }}.</p>
                </div>
                <div class="flex items-center justify-between p-4">
                  <button class="px-4 py-2 bg-green-600 text-green-50">Order Now</button>
                  <span class="text-xl text-green-600">${{ $menu->price }}</span>
                </div>
              </div>


            </div>
          </div>
        @endforeach
</x-guest-layout>
