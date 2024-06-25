<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 10 Task List App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn{
            @apply rounded-md px-2 py-1 font-medium text-center text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 
        }
        
        .link{
            @apply font-medium text-gray-600 underline decoration-pink-600
        }

        label{
            @apply block uppercase text-slate-700 mb-2
        }
        input,textarea{
            @apply shadow-sm appearance-none border w-full px-3 py-2 text-slate-700 leading-tight focus:outline-none
        }
        .error{
            @apply text-red-500 text-sm
        }
    </style>
    {{-- blade-formatter-enable --}}
    @yield('styles')
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="text-2xl mb-4"> @yield('title') </h1>

    @if (session()->has('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    
    <div>
        @yield('content')
    </div>
</body>
</html>