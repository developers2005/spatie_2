<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex  p-2">
                    <a href="{{ route('admin.roles.index') }}"
                        class="px-4 py-2 bg-green-700 text-slate-100 hover:bg-green-500 rounded-md">Role index page</a>
                </div>
                <div class="flex flex-col">

                        <div class="md:grid md:grid-cols-0 md:gap-6">
             
                          <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="{{route('admin.roles.store')}}" method="POST">
                                @csrf
                              <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                  <div class="grid grid-cols-3 gap-6">
                                    <div class="col-span-12 sm:col-span-2">
                                      <label for="company_website" class="block text-sm font-medium text-gray-700">
                                        Poast name
                                      </label>
                                      <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="name" id="name" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="Post name">
                                      </div>
                                      @error('name') <span class="text-red-500 text-sm">{{$message}}</span> @enderror
                                    </div>
                                  </div>
                      
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-left sm:px-6">
                                  <button type="submit" class="inline-flex btn btn-block justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save
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
