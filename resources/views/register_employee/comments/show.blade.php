<x-register_employee.layout>

<x-slot:title>
        Show comment
    </x-slot:title>


    <div class="my-12">
        <h1 class="text-3xl tracking-tighter font-medium mb-6">{{$comments->user->first_name}} {{$comments->user->last_name}} comment</h1>
        <hr/>
    </div>
    <div class="my-8 flex flex-col">
        <div class="text-center ">

            <p class="text-gray-500 mb-1">{{$comments->created_at->format('j M Y')}}</p>
            <p class="text-gray-500 mb-4">{{$comments->created_at->format('h:i A')}}</p>
            <h1 class="text-3xl font-bold tracking-tighter mb-2">{{$comments->user->first_name}} {{$comments->user->last_name}}</h1>
            <p class="text-gray-500 mb-5">{{$comments->user->email}}</p>


            <p class="text-xl leading-8 text-center mb-10 break-all">
                {{$comments->content}}
            </p>


            <hr>
        </div>




    </div>
</x-register_employee.layout>

