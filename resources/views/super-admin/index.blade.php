<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Organisations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 px-8">
            <div class="flex flex-wrap -mx-6">
                @foreach ($organisations as $organisation)
                    <div class="w-full md:w-1/3 px-6 mb-6">
                        <a href="{{ route('super-admin.organisation', $organisation->id) }}">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg">
                                <div class="p-6">
                                    <img class="h-32 w-32 mx-auto" src="{{ $organisation->image ?? '/img/organisation-default.png' }}" alt="{{ $organisation->name }}">
                                    <h2 class="mt-6 text-center text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">
                                        {{ $organisation->name }}
                                    </h2>
                                    <p class="mt-2 text-center text-sm leading-5 text-gray-600 dark:text-gray-400">
                                        {{ __('Number of users:') }} {{ $organisation->users->count() }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
