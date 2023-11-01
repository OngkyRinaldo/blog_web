<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Post') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <form action="{{ route('post.store') }}" method="POST" class="p-5" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-6">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 ">Title</label>
                        <input type="text" id="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 d"
                            placeholder="Create New Title..." @error('title') is-invalid @enderror" name="title"
                            required value="{{ old('title') }}">

                        @error('title')

                        <p class=" text-red-500"> {{ $message }}</p>

                        @enderror

                    </div>

                    <div class="mb-6">

                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Select an
                            category</label>
                        <select id="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Choose a category</option>
                            @foreach ($categories as $category)

                            <option value="{{ $category->id }}">{{ $category->title }}</option>

                            @endforeach
                        </select>


                        @error('category')

                        <p class=" text-red-500"> {{ $message }}</p>

                        @enderror

                    </div>
                    <div class="mb-6">

                        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 ">Your
                            content</label>
                        <textarea id="content" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                            placeholder="Write your thoughts here..."></textarea>



                        @error('content')

                        <p class=" text-red-500"> {{ $message }}</p>

                        @enderror

                    </div>

                    <div class="mb-6">
                        <label for="tag" class="block mb-2 text-sm font-medium text-gray-900 ">Tag</label>
                        <input type="text" id="tag"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 d"
                            placeholder="Create New tag..." @error('tag') is-invalid @enderror" name="tag" required
                            value="{{ old('tag') }}">

                        @error('title')

                        <p class=" text-red-500"> {{ $message }}</p>

                        @enderror

                    </div>

                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>