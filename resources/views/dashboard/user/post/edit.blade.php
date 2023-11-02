@section('title')

Edit {{Str::limit($post->title, 10) }} - Post

@endsection


<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>

    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('post.update', $post->slug) }}" method="POST" class="p-5"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-6">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 ">Title</label>
                        <input type="text" id="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 d"
                            placeholder="Create New Title..." @error('title') is-invalid @enderror" name="title"
                            required value="{{ old('title') ?? $post->title }}">

                        @error('title')

                        <p class=" text-red-500"> {{ $message }}</p>

                        @enderror

                    </div>

                    <div class="mb-6">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Select an
                            category</label>
                        <select id="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            name="category">
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
                        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 ">Content</label>
                        <input type="hidden" id="content" name="content" value="{{ old('content') }}">
                        <trix-editor input="content">{!! old('content') ?? $post->content !!}</trix-editor>

                        @error('content')

                        <p class=" text-red-500"> {{ $message }}</p>

                        @enderror

                    </div>

                    <div class="mb-6">
                        <label for="tag" class="form-label fw-bold">Tag</label>
                        <select class="form-control fs-3" multiple="multiple" data-placeholder="Select a Tag"
                            style="width: 100%" id="tag" name="tags[]">

                            @foreach ($tags as $tag)

                            <option value="{{ $tag->id }}">{{ $tag->title }}</option>

                            @endforeach

                        </select>

                        @error('tag')

                        <p class=" text-red-500"> {{ $message }}</p>

                        @enderror

                    </div>

                    <div class="mb-6">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 ">Image</label>
                        @if ($post->image)
                        <img src="{{ asset('/storage/posts/' . $post->image) }}"
                            class="img-preview max-w-md block mx-auto ">

                        @else

                        <img class="img-preview img-fluid md-3 col-sm-5  ">

                        @endif

                        <input type="file" id="image"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 d"
                            @error('image') is-invalid @enderror" name="image" onchange="previewImage()">
                        @error('image')

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