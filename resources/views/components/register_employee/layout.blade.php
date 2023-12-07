<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>{{$title ?? null}}</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased">

{{-- container for all --}}
<div class="container mx-auto p-10">
    {{-- header --}}
    <header class="flex justify-between items-center">
        {{-- logo, search --}}
        <div class="flex items-center ">
            <a href="{{url('/')}}"></a>

                <div class="text-2xl block sm:text-3xl text-gray-600 font-medium ml-2 tracking-tight ">
                    <a href="{{url('/')}}">Employee Register</a>
                </div>
            @if(Auth::user()->role==='moderator' || Auth::user()->role==='admin')
                <div class="hidden lg:flex mr-3">
                    <livewire:search />
                </div>
            @endif
        </div>
        {{-- links --}}
        <div class=" hidden lg:flex space-x-6 items-center">
            @if (Auth::check())
                <p>Logged as: <a class="hover:text-stone-500" href="{{route('profile.edit')}}">{{Auth::user()->first_name}}</a></p>
                <x-register_employee.logout_form />

                @if(Auth::user()->role==='admin')
                    <a href="{{route('admin_dashboard')}}"
                       class=" hover:text-stone-500 font-medium">ADMIN</a>
               @endif

                @if(Auth::user()->role==='moderator' || Auth::user()->role==='admin')
                    <a href="{{route('employees.index')}}"
                       class=" hover:text-stone-500">All employees</a>
                @endif
                <a href="{{route('comments.create')}}"
                   class=" hover:text-stone-500">Add Comment</a>
                <a href="{{route('comments.my_comments')}}"
                   class=" hover:text-stone-500">My Comments</a>
                <button class=" inline font-bold text-sm px-6 py-2 text-white rounded-full bg-red-500 hover:bg-red-600 "><a href="{{route('home')}}">Comments</a></button>
            @else
                <a class="tracking-widest hover:text-stone-500" href="{{ route('login') }}">Login</a>
                <a class="tracking-widest hover:text-stone-500" href="{{ route('register') }}">Register</a>
            @endif
        </div>

        {{-- hamburger icon --}}
        <div id="hamburger-icon" class="space-y-2 cursor-pointer lg:hidden">
            <div class="w-8 h-0.5 bg-gray-600"></div>
            <div class="w-8 h-0.5 bg-gray-600"></div>
            <div class="w-8 h-0.5 bg-gray-600"></div>
        </div>
    </header>
    {{-- mobile menu --}}
    <div class="lg:hidden">
        <div id="mobile-menu"
             class="flex-col items-center hidden py-8 mt-10 space-y-6 bg-white left-6 right-6 drop-shadow-lg">
            @if (Auth::check())
                <p>Logged as: <a class="hover:text-stone-500" href="{{route('profile.edit')}}">{{Auth::user()->first_name}}</a></p>
                <x-register_employee.logout_form />

                @if(Auth::user()->role==='admin')
                    <a href="{{route('admin_dashboard')}}"
                       class=" hover:text-stone-500 font-medium">ADMIN</a>
                @endif

                @if(Auth::user()->role==='moderator' || Auth::user()->role==='admin')
                    <a href="{{route('employees.index')}}"
                       class=" hover:text-stone-500">All employees</a>
                @endif
                <a href="{{route('comments.create')}}"
                   class=" hover:text-stone-500">Add Comment</a>
                <a href="{{route('comments.my_comments')}}"
                   class=" hover:text-stone-500">My Comments</a>
                <a href="{{route('home')}}"
                   class="inline font-bold text-sm px-6 py-2 text-white rounded-full bg-red-500 hover:bg-red-600 ">Comments</a>
                <div class="">
                    <livewire:search />
                </div>
            @else
                <a class="tracking-widest hover:text-stone-500" href="{{ route('login') }}">Login</a>
                <a class="tracking-widest hover:text-stone-500" href="{{ route('register') }}">Register</a>
            @endif
        </div>
    </div>

    {{ $slot }}

    {{-- footer --}}
    <footer class="flex items-center justify-center mt-12">
        &copy; 2023 EmployeeRegister
    </footer>
</div>
@livewireScripts
</body>

</html>

