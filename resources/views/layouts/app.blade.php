<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    {{-- filepond --}}
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
</head>

<body class="font-sans antialiased">

    <style>
        .flex-grow {
            flex-grow: 1;
        }

        .bg-blue-600 {
            background-color: #2563eb;
        }

        .font-bold {
            font-weight: bold;
        }

        .mr-4 {
            margin-right: 1rem;
        }

        .p-3 {
            padding: 0.75rem;
        }
        .text-blue-700 {
            color: #1d4ed8;
        }

    </style>
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
