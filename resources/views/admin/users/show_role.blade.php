<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex  p-2">
                    <a href="{{ route('admin.users.index') }}"
                        class="px-4 py-2 bg-green-700 text-slate-100 hover:bg-green-500 rounded-md">Role index page</a>
                </div>
                <div class="flex flex-col bg-slate-100">
                    <div class="p-2">

                       User name -  {{ $user->name }}
                    </div>
                    <div class="p-2">
                        User email  - {{ $user->email }}
                    </div>
                    <div class="mt-6 p-2 bg-slate-100">
                        <h2 class="text-2xl font-semibold ">
                            Roles
                        </h2>
                        <div class="flex space-x-2 mt-4 p-2">
                            @if ($user->roles)
                                @foreach ($user->roles as $role)
                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-300 text-white rounded-md"
                                        action="{{ route('admin.users.roles.remove', [$user->id, $role->id]) }}"
                                        method="POST" onsubmit="return confirm('Are your sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"> <span>{{ $role->name }}</span></button>
                                    </form>
                                @endforeach
                            @endif
                        </div>
                        <div class="max-w-xl">
                            <form action="{{ route('admin.users.roles', $user->id) }}" method="POST">
    
                                @csrf
                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-12 sm:col-span-2">
                                                <label for="permission" class="block text-sm font-medium text-gray-700">
                                                    Roles
                                                </label>
    
                                                <select
                                                    class="form-select appearance-none
                                                            block
                                                            w-full
                                                            px-3
                                                            py-1.5
                                                            text-base
                                                            font-normal
                                                            text-gray-700
                                                            bg-white bg-clip-padding bg-no-repeat
                                                            border border-solid border-gray-300
                                                            rounded
                                                            transition
                                                            ease-in-out
                                                            m-0
                                                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                    aria-label="Default select example" name="role">
                                                    <option selected>Select permission</option>
                                                    @foreach ($roles as $roless)
                                                        <option value="{{ $roless->name }}">{{ $roless->name }}
                                                        </option>
                                                    @endforeach
    
    
                                                </select>
    
                                                @error('name')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
    
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-left sm:px-6">
                                        <button type="submit"
                                            class="inline-flex btn btn-block justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Assign
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-6 p-2 bg-slate-100">
                        <h2 class="text-2xl font-semibold ">
                            Role permissions
                        </h2>
                        <div class="flex space-x-2 mt-4 p-2">
                            @if ($user->permissions)
                                @foreach ($user->permissions as $permission)
                              
                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-300 text-white rounded-md" 
                                    action="{{route('admin.users.permissions.revoke', [$user->id,$permission->id])}}" method="POST" onsubmit="return confirm('Are your sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" >   <span>{{ $permission->name }}</span></button>
                                    </form>
                                @endforeach
                            @endif
                        </div>
                        <div class="max-w-xl">
                            <form action="{{ route('admin.users.permissions', $user->id) }}" method="POST">
                         
                                @csrf
                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-12 sm:col-span-2">
                                                <label for="permission" class="block text-sm font-medium text-gray-700">
                                                    Permission
                                                </label>
        
                                                <select
                                                    class="form-select appearance-none
                                                            block
                                                            w-full
                                                            px-3
                                                            py-1.5
                                                            text-base
                                                            font-normal
                                                            text-gray-700
                                                            bg-white bg-clip-padding bg-no-repeat
                                                            border border-solid border-gray-300
                                                            rounded
                                                            transition
                                                            ease-in-out
                                                            m-0
                                                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                                    aria-label="Default select example" name="permission">
                                                    <option selected>Select permission</option>
                                                    @foreach ($permissions as $permissionss)
                                                        <option value="{{ $permissionss->name }}">{{ $permissionss->name }}
                                                        </option>
                                                    @endforeach
        
        
                                                </select>
        
                                                @error('name')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
        
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-left sm:px-6">
                                        <button type="submit"
                                            class="inline-flex btn btn-block justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Assign 
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</x-admin-layout>
