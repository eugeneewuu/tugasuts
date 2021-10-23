<x-template-layout>

    

    <div class="shadow px-6 py-4 bg-gray-200 rounded sm:px-1 sm:py-1">
        <form action="{{(isset($game))?route('game.update',$game->id):route('game.store')}}"
            method="POST">
            @csrf

            @if(isset($game))
            @method('PUT')
            @endif
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div>
                        <label id="listbox-label" class="block text-sm font-medium text-gray-700">
                            Nama Game
                        </label>
                        <div class="mt-1 relative">
                            <input value="{{(isset($game))?$game->nama:old('nama')}}" type="text" name="nama"
                                id="company_website"
                                class="@error('nama') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                placeholder="Masukkan Nama">

                        </div>
                        <div class="text-xs text-red-600">@error('nama') {{$message}} @enderror</div>
                    </div>

                    <div>
                        <label id="listbox-label" class="block text-sm font-medium text-gray-700">
                            Platform
                        </label>
                        <div class="mt-1 relative">
                            <input value="{{(isset($game))?$game->Platform:old('Platform')}}" type="text" name="Platform"
                                id="company_website"
                                class="@error('Platform') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                placeholder="Masukkan Platform">

                        </div>
                        <div class="text-xs text-red-600">@error('Platform') {{$message}} @enderror</div>
                    </div> 
                    <div>
                        <label id="listbox-label" class="block text-sm font-medium text-gray-700">
                           Tahun Rilis
                        </label>
                        <div class="mt-1 relative">
                            <input value="{{(isset($game))?$game->tahun_rilis:old('tahun_rilis')}}" type="text"
                                name="tahun_rilis" id="company_website"
                                class="@error('tahun_rilis') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                placeholder="Masukkan Tahun Rilis"> 

                        </div> 
                        <div class="text-xs text-red-600">@error('title') {{$message}} @enderror</div>
                    </div>
                    <div> 
                        <label id="listbox-label" class="block text-sm font-medium text-gray-700">
                           Nama Kategori
                        </label>
                        <div class="mt-1 relative">
                            <input value="{{(isset($game))?$game->nama_kategori:old('nama_kategori')}}" type="text"
                                name="nama_kategori" id="company_website"
                                class="@error('tahun_rilis') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                placeholder="Masukkan Nama Kategori">

                        </div>
                        <div class="text-xs text-red-600">@error('title') {{$message}} @enderror</div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                        </button>
                    </div>
                </div>
        </form>
    </div>



</x-template-layout>