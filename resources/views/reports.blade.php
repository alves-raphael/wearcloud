<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('navigation.reports') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(session('message'))
                        <x-alert>
                            {{ session('message') }}
                        </x-alert>
                    @endif
                    <x-nav-link :href="route('reports.apparels')">
                        {{ __('buttons.generate_apparels_report') }}
                    </x-nav-link>
                    <h2>Relatórios de peças</h2>
                    <ul>
                        @foreach($reports as $report)
                            <li>{{ $report }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
