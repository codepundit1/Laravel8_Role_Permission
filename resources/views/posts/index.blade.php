<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight
">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="page-heading mx-5 mb-4">
            <a href="{{ route('posts.create') }}" style="text-decoration: none;"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700
                hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300
                dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center
                mr-2 mb-2">Add
            </a>
        </div>
        <div class="overflow-x-auto relative p-2">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            SI.
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Ttile
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Status
                        </th>
                        <th scope="col" class="py-3 px-6 ">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->index + 1 }}
                            </th>
                            <td class="py-4 px-6">
                                {{ $post->title }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $post->deleted_at ? 'Inactive' : 'Active' }}
                            </td>
                            <td class="py-4 px-6">

                                @if ($post->deleted_at)
                                    <a href="{{ route('posts.restore', $post->id) }}"
                                        class="text-white bg-gradient-to-r from-green-400
                                        via-green-500 to-green-600 hover:bg-gradient-to-br
                                        focus:ring-4 focus:outline-none focus:ring-green-300
                                        dark:focus:ring-green-800 font-medium rounded-lg text-sm px-2.5 py-2
                                        text-center mr-2 mb-2">Restore
                                    </a>

                                    <a href="{{ route('posts.force-delete', $post->id) }}"
                                        class="text-white bg-gradient-to-r from-red-400 via-red-500
                                        to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none
                                        focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50
                                        dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm
                                        px-2.5 py-2 text-center mr-2 mb-2">ForceDelete
                                    </a>

                                @else
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                        class="text-white bg-gradient-to-r from-blue-500
                                    via-blue-600 to-blue-700 hover:bg-gradient-to-br
                                    focus:ring-4 focus:outline-none focus:ring-blue-300
                                    dark:focus:ring-blue-800 font-medium rounded-lg
                                    text-sm px-3.5 py-2 text-center mr-2 mb-2 ">
                                        Edit
                                    </a>

                                    <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                                class="text-gray-900 bg-gradient-to-r from-lime-200
                                            via-lime-400 to-lime-500 hover:bg-gradient-to-br
                                            focus:ring-4 focus:outline-none focus:ring-lime-300
                                            dark:focus:ring-lime-800 font-medium rounded-lg
                                            text-sm px-2.5 py-2 text-center mr-2 mb-2">
                                                Trash
                                        </button>
                                    </form>
                                @endif
                                {{-- <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
                                    @csrf

                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-block">Delete</button>
                                </form> --}}

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <span class="float-end">
            {{ $posts->links() }}
        </span>
    </div>
</x-app-layout>
