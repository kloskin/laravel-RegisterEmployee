<x-register_employee.layout>

    <x-slot:title>
        All employees
    </x-slot:title>

    <div class="my-12">
        <h1 class="text-4xl tracking-tighter font-bold mb-6">Employees</h1>
        <hr/>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3">
                    <a href="#">
                        <div class="flex items-center">
                            First name
                        </div>
                    </a>
                </th>
                <th scope="col" class="px-6 py-3">
                    <a href="#">
                        <div class="flex items-center">
                            Last name
                        </div>
                    </a>
                </th>
                <th scope="col" class="px-6 py-3" >
                    <a href="#">
                        <div class="flex items-center">
                            Email
                        </div>
                    </a>
                </th>
                <th scope="col" class="px-6 py-3" >
                    <a href="#">
                        <div class="flex items-center">
                            Role
                        </div>
                    </a>
                </th>
                <th scope="col" class=" py-3" >
                    <a href="#">
                        <div class="text-center">
                            Hours in {{date('F')}}
                        </div>
                    </a>
                </th>
                <th scope="col" class="px-6 py-3" >
                    <a href="#">
                        <div class="flex items-center">
                        </div>
                    </a>
                </th>
                <th scope="col" class="px-6 py-3" >
                    <a href="#">
                        <div class="flex items-center">
                        </div>
                    </a>
                </th>
            </tr>
            </thead>

            <tbody>
            @foreach($employees as $employee)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4 ">
                        {{$employee->first_name}}
                    </td>
                    <td class="px-6 py-4 ">
                        {{$employee->last_name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$employee->email}}
                    </td>
                    <td class="px-6 py-4">
                        {{$employee->role}}
                    </td>
                    <td class="text-center">
                        {{$employee->total_hours_worked}}
                    </td>
                    <td class="px-6 py-4 text-right ">
                            <button class="cursor-pointer bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">  <a href="{{ route('employees.show', $employee) }}"> Info</a></button>
                    </td>
                    <td>
                        <button class="cursor-pointer bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">  <a href="{{ route('workedhours.create', $employee->id) }}"> Add hours</a></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <br/>

    {{$employees->links()}}

</x-register_employee.layout>
