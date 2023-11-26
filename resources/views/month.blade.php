<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-end sm:items-center">
            <div class="flex justify-start items-end">
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                    <span class="hidden md:inline">{{ $year }} {{ $monthName }} Schedules</span>
                    <span class="inline md:hidden">{{ $year }} {{ $monthName }}</span>
                </h2>
                <a href="{{ route('movemonth', ['year' => $year, 'month' => $month, 'offset' => 'prev']) }}"
                    class="pr-1 pl-4 sm:px-4">←Prev</a>
                <a href="{{ route('movemonth', ['year' => $year, 'month' => $month, 'offset' => 'next']) }}"
                    class="pl-1 pr-4 sm:px-4">Next→</a>
            </div>
            <div class="flex items-center">
                <a href="{{ route('create') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Create') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="">
        <ul class="overflow-hidden sm:rounded-md max-w-md md:max-w-4xl mx-auto mt-16 md:grid md:grid-cols-2 md:gap-4">
            @if ($schedules->isNotEmpty())
                @foreach ($schedules as $schedule)
                    <li class="border-2 border-gray-200 rounded-md bg-white mx-2 mb-4 md:mb-0">
                        <div class="px-4 py-5 sm:px-6">
                            <div class="flex items-center justify-between">
                                <h3 class="text-xl leading-6 text-gray-900">{{ $schedule->context }}</h3>
                                @if ($schedule->status == 'done')
                                    <p class="text-sm text-gray-600">Done</p>
                                @elseif ($schedule->status == 'ongoing')
                                    <p class="text-sm text-blue-600">Ongoing</p>
                                @elseif ($schedule->status == 'approaching')
                                    <p class="text-sm text-yellow-600">Approaching</p>
                                @elseif ($schedule->status == 'upcoming')
                                    <p class="text-sm text-green-600">Upcoming</p>
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
                                <p class="text-md text-gray-800 ml-1">{{ $schedule->place }}</p>
                            </div>
                            <div class="mt-4 flex items-center justify-start">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-md text-gray-800 ml-1">{{ $schedule->begin }} ~ {{ $schedule->end }}
                                </p>
                            </div>
                            <div class="mt-4 flex items-center justify-end">
                                <a href="{{ route('edit', ['id' => $schedule->id]) }}"
                                    class="inline-flex items-center px-4 py-2 bg-indigo-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-600 focus:bg-indigo-600 active:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 transition ease-in-out duration-150">Edit</a>

                                <form method="POST" action="{{ route('destroy', ['id' => $schedule->id]) }}">
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
            @else
                <li class="bg-white border-2 border-gray-200 rounded-md mx-2 mb-4 md:mb-0">
                    <div class="px-4 py-[83px] sm:px-6">
                        <div class="flex items-center justify-center">
                            <p class="text-gray-700 text-lg">No {{ $year }} {{ $monthName }} Schedule</p>
                        </div>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</x-app-layout>
