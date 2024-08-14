<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ManagerDashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <!-- Display user's name and email -->
                    <p class="mt-4">
                        <strong>Name:</strong> {{ Auth::user()->name }}
                    </p>
                    <p>
                        <strong>Email:</strong> {{ Auth::user()->email }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
