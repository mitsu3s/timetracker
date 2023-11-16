<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight justify-center">
                {{ __('All Tasks') }}
            </h2>
            <a href="{{ route('create') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Create') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div> --}}
                @if ($tasks->isNotEmpty())
                    <ul class="text-black flex">
                        @foreach ($tasks as $task)
                            <div class="">
                                <li>
                                    {{ $task->context }}
                                </li>
                                <li>
                                    {{ $task->place }}
                                </li>
                                <div>
                                    <a href="{{ route('edit', ['id' => $task->id]) }}">
                                        edit
                                    </a>
                                </div>
                                <div>
                                    <form method="post" action="{{ route('destroy', ['id' => $task->id]) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">delete</button>
                                    </form>
                                </div>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
