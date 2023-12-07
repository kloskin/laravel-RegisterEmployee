<x-register_employee.layout>
    <x-slot:title>
        Employee
    </x-slot:title>

    <div class="my-12 flex flex-col">
        <div >
            <h3 class="text-4xl font-bold tracking-tighter mb-6">{{ $employee->first_name }} {{ $employee->last_name }}</h3>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg border">
            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class=" font-medium text-gray-500">
                            Full name
                        </dt>
                        <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $employee->first_name }} {{ $employee->last_name }}
                        </dd>
                    </div>
                    <hr>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class=" font-medium text-gray-500">
                            Email address
                        </dt>
                        <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $employee->email }}
                        </dd>
                    </div>
                    <hr>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class=" font-medium text-gray-500">
                            Role
                        </dt>
                        <dd class="mt-1  text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$employee->role}}
                        </dd>
                    </div>
                    <hr>
                    <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class=" font-medium text-gray-500">
                            Hours in month {{date('F')}}
                        </dt>
                        <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                            {{$workedHours->total_hours}}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

    </div>


</x-register_employee.layout>
