<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
    <tr>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
        <!-- Dodaj więcej nagłówków dla innych informacji użytkowników -->
    </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
    @foreach($users as $user)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>

            <td class="px-6 py-4 text-right ">
                <div class="flex justify-end">
                    <button class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><a href="{{ route('employees.edit', $user) }}" >Edit</a></button>

                    <form method="POST" action="{{ route('employees.destroy', $user->id) }}">
                        @csrf
                        @method('delete')
                        <td class="px-6 py-4 whitespace-nowrap"> <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Delete
                            </button></td>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

