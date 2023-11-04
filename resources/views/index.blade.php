@extends('layouts.main.template')


@section('main')
@if (!$posts->count())
{{-- carousel --}}
<x-main.home.carousel />
@else
<section class="max-h-fit mt-5 ">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-1 md:gap-x-3 bg-black  rounded-md">
        <div class="h-full md:h-96 md:py-10 w-full p-5">
            @if ($posts[0]->image)

            <img src="{{ asset('/storage/posts/' . $posts[0]->image) }}" alt="{{
                $posts[0]->title }}" class="h-full w-full object-cover rounded-md">

            @else

            <img src="https://source.unsplash.com/1200x1000?{{ $posts[0]->category->title }}" alt="unsplash"
                class="h-full w-full object-cover rounded-md">

            @endif
        </div>

        <div class="text-white md:py-10 p-5">
            <p class="text-slate-400 italic  md:text-lg">{{ $posts[0]->category->title}}</p>
            <h1 class="font-bold text-lg md:text-2xl">{{Str::limit($posts[0]->title, 46) }}</h1>
            <p class="text-slate-400">By {{ $posts[0]->post_author->username }} on {{
                $posts[0]->created_at->diffForHumans() }}</p>
            <p class="mt-2 md:mt-5">
                {{$posts[0]->descriptions}}

            </p>

            <a href="#" class="block w-fit rounded-md bg-slate-700 text-white py-2 px-4 mt-2 md:mt-5">Read More</a>
        </div>
    </div>
</section>
@endif

@if ($posts->count()
< 2) <x-main.home.main />

@else
<section class="flex justify-start items-start gap-x-5 min-h-screen w-full">
    <div class="p-5 md:p-0 mt-5 w-full md:w-3/4 md:pr-5 md:border-r-2">
        <div class="grid grid-col-1 md:grid-cols-2 gap-x-3 ">
            @foreach ($posts->take(9)->skip(1) as $post)

            <div class="md:mt-5 border-b-2 pb-5">
                <div class="grid grid-col-1 md:grid-cols-2 md:gap-x-2">
                    <div class=" w-full flex flex-col py-3 md:py-14 ">
                        <h3 class="text-slate-500"> {{ $post->category->title }}</h3>
                        <h2 class="font-bold"> {{Str::limit($post->title, 46) }}
                        </h2>
                        <p class="text-slate-500">By {{ $post->post_author->username }} on {{
                            $post->created_at->diffForHumans() }}</p>
                        </p>

                    </div>
                    <div class="h-56 w-56 mx-auto md:mx-0">

                        @if ($posts[0]->image)

                        <img src="{{ asset('/storage/posts/' . $post->image) }}" alt="{{
                                $post->title }}" class="h-full w-full object-cover rounded-md">

                        @else

                        <img src="https://source.unsplash.com/640x960?{{ $post->category->title }}" alt="unsplash"
                            class="h-full w-full object-cover rounded-md">

                        @endif
                    </div>

                </div>
                <div class="mt-5 md:mt-2">
                    <p class="text-slate-500">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci officia
                        est, ea, ullam
                        debitis saepe reiciendis, libero corporis sit qui cum totam nobis itaque pariatur ab placeat
                        quidem
                        earum eveniet.</p>
                    <a href="#"
                        class="ml-auto block w-fit rounded-md bg-slate-700 text-white py-2 px-4 mt-2 md:mt-5">Read
                        More</a>
                </div>
            </div>

            @endforeach
        </div>

        <div class="mt-10 text-end w-full">
            <a href="#" class="w-full bg-black text-white py-2 px-4 rounded-md">Show more stories</a>
        </div>

    </div>

    <x-main.home.ads />
</section>
@endif



@endsection