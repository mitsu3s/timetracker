<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Mode') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">

                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Edit Schedule') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Change to any value. Don\'t forget to save it!') }}
                        </p>
                    </header>

                    <form method="post" action="{{ route('update', ['id' => $task->id]) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="context" :value="__('Context')" />
                            <x-text-input id="context" name="context" type="text" class="mt-1 block w-full"
                                :value="old('context', $task->context)" required autofocus autocomplete="off" />
                            {{-- <x-input-error class="mt-2" :messages="$errors->get('context')" /> --}}
                        </div>

                        <div>
                            <x-input-label for="place" :value="__('Place')" />
                            <x-text-input id="place" name="place" type="text" class="mt-1 block w-full"
                                :value="old('place', $task->place)" required autocomplete="off" />
                            {{-- <x-input-error class="mt-2" :messages="$errors->get('place')" /> --}}
                        </div>

                        <div>
                            <x-input-label for="begin" :value="__('Begin')" />
                            <x-text-input id="begin" name="begin" type="datetime-local" class="mt-1 block w-full"
                                :value="old('begin', $task->begin)" required autocomplete="off" />
                            {{-- <x-input-error class="mt-2" :messages="$errors->get('date')" /> --}}
                        </div>

                        <div>
                            <x-input-label for="end" :value="__('End')" />
                            <x-text-input id="end" name="end" type="datetime-local" class="mt-1 block w-full"
                                :value="old('end', $task->end)" required autocomplete="off" />
                            <x-input-error class="mt-2" :messages="$errors->get('end')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            {{-- @if (session('status') === 'profile-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                                @endif --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
