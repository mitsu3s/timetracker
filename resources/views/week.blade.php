<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                <span class="hidden md:inline">{{ $start }} ~ {{ $end }} Tasks</span>
                <span class="inline md:hidden">{{ $start }} ~ {{ $end }}</span>
            </h2>
            <div class="flex items-center">
                <a href="{{ route('moveweek', ['year' => $year, 'month' => $month, 'day' => $day, 'offset' => 'back']) }}"
                    class="px-4">back</a>
                <a href="{{ route('moveweek', ['year' => $year, 'month' => $month, 'day' => $day, 'offset' => 'next']) }}"
                    class="px-4">next</a>

                <a href="{{ route('create') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Create') }}
                </a>
            </div>
        </div>
    </x-slot>
    <div>
        <ul class="bg-white shadow overflow-hidden sm:rounded-md max-w-md mx-auto mt-16">
            @if ($tasks->isNotEmpty())
                @foreach ($tasks as $task)
                    <li class="border-t border-gray-200">
                        <div class="px-4 py-5 sm:px-6">
                            <div class="flex items-center justify-between">
                                <h3 class="text-xl leading-6 text-gray-900">{{ $task->context }}</h3>
                                @if ($task->status == 'looming')
                                    <p class="text-sm text-green-600">Looming</p>
                                    {{-- @elseif ($task->status == 'ongoing')
                                    <p class="text-sm text-blue-600">Ongoing</p> --}}
                                @elseif ($task->status == 'waiting')
                                    <p class="text-sm text-yellow-600">Waiting</p>
                                @elseif ($task->status == 'done')
                                    <p class="text-sm text-gray-600">Done</p>
                                @endif
                            </div>
                            <div class="mt-4 flex items-center justify-start">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                                <p class="text-md text-gray-800 ml-1">{{ $task->place }}</p>
                            </div>
                            <div class="mt-4 flex items-center justify-start">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-md text-gray-800 ml-1">{{ $task->begin }} ~ {{ $task->end }}</p>
                            </div>
                            <div class="mt-4 flex items-center justify-end">
                                <a href="{{ route('edit', ['id' => $task->id]) }}"
                                    class="inline-flex items-center px-4 py-2 bg-indigo-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-600 focus:bg-indigo-600 active:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 transition ease-in-out duration-150">Edit</a>

                                <form method="POST" action="{{ route('destroy', ['id' => $task->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 focus:bg-red-600 active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 transition ease-in-out duration-150 ml-2">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
</x-app-layout>
