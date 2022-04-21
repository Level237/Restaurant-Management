<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        @foreach ($categories as $category)
        <div class="grid lg:grid-cols-4 gap-y-6">

            <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
            <img class="w-full h-48" src="{{ Storage::url($category->image) }}"
              alt="Image" />
            <div class="px-6 py-4">
                <a href="{{ route('categories.show',$category->id) }}"></a>

              <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">{{ $category->name }}</h4>

            </div>

          </div>

        </div>
        @endforeach

      </div>
</x-guest-layout>
