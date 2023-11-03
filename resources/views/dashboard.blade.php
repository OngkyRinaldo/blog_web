@section('title')
{{ $user }} - Dashboard
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome {{ $user }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-2 py-2 md:px-6 md:py-4">No.</th>
                                <th scope="col" class="px-2 py-2 md:px-6 md:py-4">Title</th>
                                <th scope="col" class="px-2 py-2 md:px-6 md:py-4 hidden md:table-cell">Category</th>
                                <th scope="col" class="px-2 py-2 md:px-6 md:py-4">Author</th>
                                <th scope="col" class="px-2 py-2 md:px-6 md:py-4 hidden md:table-cell">Image</th>
                                <th scope="col" class="px-2 py-2 md:px-6 md:py-4 hidden md:table-cell">Time</th>
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
                                <td class="px-2 py-2 md:px-6 md:py-4 hidden md:table-cell">
                                    {{ $post->category->title }}
                                </td>
                                <td class="px-2 py-2 md:px-6 md:py-4">
                                    {{ $post->post_author->username }}
                                </td>
                                <td class="px-2 py-2 md:px-6 md:py-4 hidden md:table-cell">
                                    <img src="{{ asset('/storage/posts/' . $post->image) }}"
                                        alt="{{Str::limit($post->title, 10) }}" width="75px">
                                </td>
                                <td class="px-2 py-2 md:px-6 md:py-4 hidden md:table-cell">
                                    {{ $post->created_at->diffForHumans() }}
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
</x-app-layout>