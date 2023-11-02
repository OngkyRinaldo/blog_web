@section('title')

{{Str::limit($post->title, 10) }} - Post

@endsection


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{Str::limit($post->title, 46) }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-5">
                    <h2 class="font-semibold text-lg text-gray-800 leading-tight">
                        {{$post->title }}
                    </h2>

                    <div class="flex justify-between items-center gap-x-4 mt-2">
                        <p class="font-semibold text-lg text-slate-600 leading-tight mt-2 ">
                            {{ $post->category->title }}
                        </p>

                        <div class="flex gap-x-4">
                            <p class=" font-semibold text-lg text-slate-600 leading-tight">
                                Created By: {{ $post->post_author->username }}
                            </p>
                            <p class=" font-semibold text-lg text-slate-600  leading-tight">
                                {{ $post->created_at->diffForHumans() }}
                            </p>
                        </div>

                    </div>

                    <div class="p-5">
                        <div class="text-center">
                            @if($post->image)
                            <img src="{{ asset('/storage/posts/' . $post->image) }}" alt="{{ $post->title }}"
                                class="img-fluid mb-3">
                            @else
                            <img src="https://source.unsplash.com/1200x400?{{ $post->category->title }}" alt=""
                                class="img-fluid mb-3">
                            @endif
                        </div>

                        <div class="text-justify text-slate-600">
                            <p>
                                {!! $post->content !!}
                            </p>
                        </div>
                    </div>

                    <div class="p-5">
                        <div class="mt-5 flex justify-start items-center gap-x-3">
                            @foreach ($post->tags as $tag)
                            <a href="#" class="py-2 px-4 bg-slate-500 text-white rounded-lg">
                                {{ $tag->title }}
                            </a>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>