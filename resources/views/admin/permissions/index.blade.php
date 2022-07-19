<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex justify-end p-2 ">
                    <a href="{{ route('admin.permissions.create') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md">Create Permission</a>
                </div>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name</th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse ($permissions as $permission)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        {{ $permission->name }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex justify-end  mr-4">
                                                        <div class="flex space-x-3">
                                                            <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                                                                class="px-4 py-2 bg-blue-500 hover:bg-blue-300 text-white rounded-md">Edit</a>

                                                            <form
                                                                class="px-4 py-2 bg-red-500 hover:bg-red-300 text-white rounded-md"
                                                                action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Are your sure?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit">Delete</button>
                                                            </form>
                                                        </div>

                                                    </div>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2" class="p-4">Data not found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
