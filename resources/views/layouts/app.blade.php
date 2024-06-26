<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 10 Task List App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    
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

        <!-- If the Session is Success then it will display the flash message that is modified by the alpine.js which has an variable of x-data and x-show and addedd a click handler or event listener to the svg for setting the flash
            message to false since the flash message is always set to true in the x-data within this div block element. The flash : false is makes the flash in this div block to disappear or the <div x-data = "{flash: true}"></div> -->
    <div x-data = "{flash: true}">
            <!-- The success in the session is in the web.php in each route for POST, PUT and DELETE in the return which is this one with('success', 'Task Deleted or Created or Updated Successfully'), it will read the success first
                    and return those success and the message which is the 2nd property in the with() method in the return in web.php routes. 
                AND THIS WILL BE RENDERED IF IT HAS A FLASH MESSAGE OR with('success', 'flash messages message edited') --> 
    @if (session()->has('success'))
    <div x-show = "flash" 
    class="relative mb-10 border rounded border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700 " role="alert">
        <strong class ="font-bold">Success!</strong>
        <div>
        This is Success  {{ session('success') }}
        </div> 
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
            stroke-width="1.5" @click="flash = false" @click="{flash: false}"
            stroke="currentColor" class="h-6 w-6 cursor-pointer">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </span>
    </div>
       @endif
    </div>
    <div>
        @yield('content')
    </div>
</body>
</html>