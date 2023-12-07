<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 pt-0 text-gray-900">
                    <div class="mt-6" x-data="{ tab:1 }">
                        <div class="flex mx-2 mb-4 space-x-4 text-xl border-b border-gray-300">
                            <div class="hover:text-indigo-600 py-2 cursor-pointer" :class="{ 'text-indigo-600 border-b border-indigo-600': tab == 1}" @click="tab = 1">
                                Edit or Delete User</div>

                            <div class="hover:text-indigo-600 py-2 pl-2 cursor-pointer" :class="{ 'text-indigo-600 border-b border-indigo-600': tab == 2}" @click="tab = 2">
                                Add User</div>

                        </div>
                        <div  x-show="tab === 1">
                            <x-register_employee.table-allusers :users="$users"/>
                            {{ $users->onEachSide(1)->links() }}
                        </div>
                        <div x-show="tab === 2">
                            @include('register_employee.admin.add-form')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

