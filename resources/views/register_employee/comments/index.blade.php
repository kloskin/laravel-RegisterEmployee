<x-register_employee.layout>

    <x-slot:title>
        Comments
    </x-slot:title>

    <div class="my-12">
        <div class="flex justify-center items-center mb-6">
            <a href="{{ route('comments.index', ['date' => $previousDate]) }}" class="text-4xl tracking-tighter font-medium text-red-500 mr-2">🢀</a>
            <h1 class="text-4xl tracking-tighter font-medium ">
                Comments <b>{{ $currentDate }}</b>
            </h1>
            <a href="{{ route('comments.index', ['date' => $nextDate]) }}" class="text-4xl tracking-tighter font-medium text-red-500 ml-2">🢂</a>
        </div>

        <hr/>
    </div>
    <form id="dateForm" action="{{ route('comments.index') }}" method="GET">
        <input type="hidden" name="date" value="{{ $currentDate }}">
    </form>
    {{-- posts --}}
    @foreach($comments as $comment)

        <div class="my-8 flex flex-col md:flex-row">
            <p class="mb-8 text-gray-500 mr-20">{{$comment->created_at->format('h:i A')}}</p>
            <div class="space-y-4 ">
                <h1 class="text-2xl font-bold tracking-tighter">{{$comment->user->first_name}} {{$comment->user->last_name}}</h1>
                <p class="text-gray-500 break-all">{{Str::limit($comment->content,100,'...')}}</p>
                <p><a class="text-red-500 hover:text-red-900 mt-8" href="{{ route('comments.show', $comment->id) }}">Read more</a>
                </p>

                @if($comment->user->is(auth()->user()))
                    <div class="flex">
                        <a href="{{ route('comments.edit', $comment->id) }}" title="edit" class="mr-2 cursor-pointer text-gray-500 hover:text-gray-900">
                            Edit
                        </a>

                        <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" href="{{ route('comments.destroy', $comment->id) }}"
                                    onclick="return confirm('Are you sure?')" title="delete" class="cursor-pointer text-gray-500 hover:text-gray-900">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
        <hr />
    @endforeach
    <br>
    {{$comments->appends(['date' => $currentDate])->links()}}

</x-register_employee.layout>


<script>
    const currentDate = '{{ $currentDate }}';
    const previousDate = '{{ $previousDate }}';
    const nextDate = '{{ $nextDate }}';


</script>
