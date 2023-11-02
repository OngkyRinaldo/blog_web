@extends('layouts.admin.admin')


@section('title')
Admin - Dashboard
@endsection

@section('header')


<h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Welcome {{ $user }}
</h2>

@endsection

@section('main')

<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-2 py-2 md:px-6 md:py-4">No.</th>
                            <th scope="col" class="px-2 py-2 md:px-6 md:py-4">Title</th>
                            <th scope="col" class="px-2 py-2 md:px-6 md:py-4">Category</th>
                            <th scope="col" class="px-2 py-2 md:px-6 md:py-4">Author</th>
                            <th scope="col" class="px-2 py-2 md:px-6 md:py-4">Image</th>
                            <th scope="col" class="px-2 py-2 md:px-6 md:py-4">Time</th>
                            <th scope="col" class="px-2 py-2 md:px-6 md:py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>

                        @foreach ($posts as $post)
                        <tr class="bg-white border-b text-gray-900 cursor-pointer">
                            <th scope="row" class="px-6 py-4 ">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-2 py-2 md:px-6 md:py-4">
                                {{Str::limit($post->title, 46) }}
                            </td>
                            <td class="px-2 py-2 md:px-6 md:py-4">
                                {{ $post->category->title }}
                            </td>
                            <td class="px-2 py-2 md:px-6 md:py-4">
                                {{ $post->post_author->username }}
                            </td>
                            <td class="px-2 py-2 md:px-6 md:py-4">
                                <img src="{{ asset('/storage/posts/' . $post->image) }}"
                                    alt="{{Str::limit($post->title, 10) }}" width="75px">
                            </td>
                            <td class="px-2 py-2 md:px-6 md:py-4">
                                {{ $post->created_at->diffForHumans() }}
                            </td>

                            <td class="px-2 py-2 md:px-6 md:py-4 flex gap-x-2 ">
                                <a href="{{ route('post.edit', $post->slug) }}"
                                    class="bg-yellow-400  py-2 px-4 md:py-3 md:px-6 rounded-lg hover:font-semibold">Edit</a>
                                <a href="{{ route('post.show', $post->slug) }}"
                                    class="bg-blue-400  py-2 px-4 md:py-3 md:px-6 rounded-lg hover:font-semibold">Detail</a>
                                <form onsubmit="return confirm('Are you sure delete this post ?');"
                                    action="{{ route('post.destroy', $post) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500  py-2 px-4 md:py-3 md:px-6 rounded-lg hover:font-semibold">Delete</button>
                                </form>

                            </td>
                        </tr>

                        @endforeach

                    </tbody>

                    </tbody>
                </table>
            </div>


        </div>
    </div>
</div>

@endsection