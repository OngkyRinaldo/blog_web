@section('title')

Edit - Category

@endsection

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('category.update', $category->slug) }}" method="POST" class="p-5">
                    @csrf

                    @method('PATCH')

                    <div class="mb-6">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 ">Title</label>
                        <input type="text" id="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 d"
                            placeholder="Edit Title..." @error('title') is-invalid @enderror" name="title" required
                            value="{{ old('title') ?? $category->title }}">

                        @error('title')
                        <p class=" text-red-500"> {{ $message }}</p>
                        @enderror

                    </div>

                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Update
                        Category</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>