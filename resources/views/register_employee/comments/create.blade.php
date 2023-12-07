<x-register_employee.layout>
    <x-slot:title>
        Create post
    </x-slot:title>

    <div class="my-14">
        <div class="my-12">
            <h1 class="text-4xl tracking-tighter ">New comment <b>{{date('d F Y')}}</b></h1>
        </div>
        <div class="w-full">
            <form method="POST" action="{{ route('comments.store') }}"
                  class="bg-white shadow-md rounded px-8 pb-8 mb-4">
                @csrf
                <div class="mb-6">
                    <label class="block text-gray-700 font-bold mb-2" for="post-content">
                        comment content
                    </label>
                    <textarea name="content" required id="post-content" rows="6"
                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 {{$errors->first('content') ? 'border-red-500' : null}} focus:outline-none focus:shadow-outline"
                              placeholder="write comment here">{{old('content')}}</textarea>
                    <p class="text-red-500 text-xs italic">{{$errors->first('content')}}</p>
                </div>
                <div class="flex items-center justify-center mt-4">
                    <x-primary-button class="flex w-1/2 justify-center">
                        {{ __('Add comment') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-register_employee.layout>

