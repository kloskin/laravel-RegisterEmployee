<x-register_employee.layout>

    <x-slot:title>
        Work Hours
    </x-slot:title>

    <div class="my-12">
        <h1 class="text-4xl tracking-tighter font-medium font-bold mb-6">Worked hours in {{date('F')}}</h1>
        <hr/>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-10">

        <form class="max-w-2xl mx-auto" method="POST" action="{{ route('workedhours.store', $employee->id) }}">
        @csrf
            <div class="mb-5 font-medium">
                <h3 class="text-3xl text-center">{{$employee->first_name}} {{$employee->last_name}}</h3>
            </div>
            <div class="mb-5">
                <x-input-label for="date" :value="__('Date')" />
                <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required autofocus autocomplete="date" />
                <x-input-error :messages="$errors->get('date')" class="mt-2" />
            </div>
            <div class="mb-5">
                <x-input-label for="hours_worked" :value="__('Hours Worked')" />
                <x-text-input id="hours_worked" class="block mt-1 w-full" type="text" name="hours_worked" :value="old('last_name')" required autofocus autocomplete="hours_worked" />
                <x-input-error :messages="$errors->get('hours_worked')" class="mt-2" />
            </div>
            <input type="hidden" name="user_id" value="{{$employee->id}}">
            <div class="flex items-center justify-center mt-4">
                <x-primary-button class="flex w-2/3 justify-center">
                    {{ __('Add Hours') }}
                </x-primary-button>
            </div>
        </form>

    </div>

    <br/>

</x-register_employee.layout>
