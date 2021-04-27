<x-template-layout>

    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{$title}}
    </h2>

    <div class="shadow px-6 py-4 bg-gray-200 rounded sm:px-1 sm:py-1">
        <form action="{{(isset($mahasiswa))?route('mahasiswa.update',$mahasiswa->id):route('mahasiswa.store')}}"
            method="POST">
            @csrf

            @if(isset($mahasiswa))
            @method('PUT')
            @endif
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div>
                        <label id="listbox-label" class="block text-sm font-medium text-gray-700">
                            Nama
                        </label>
                        <div class="mt-1 relative">
                            <input value="{{(isset($mahasiswa))?$mahasiswa->nama:old('nama')}}" type="text" name="nama"
                                id="company_website"
                                class="@error('nama') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                placeholder="Masukkan Nama">

                        </div>
                        <div class="text-xs text-red-600">@error('nama') {{$message}} @enderror</div>
                    </div>

                    <div>
                        <label id="listbox-label" class="block text-sm font-medium text-gray-700">
                            NIK
                        </label>
                        <div class="mt-1 relative">
                            <input value="{{(isset($mahasiswa))?$mahasiswa->nik:old('nik')}}" type="text" name="nik"
                                id="company_website"
                                class="@error('nik') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                placeholder="Masukkan NIK">

                        </div>
                        <div class="text-xs text-red-600">@error('nim') {{$message}} @enderror</div>
                    </div>
                    <div>
                        <label id="listbox-label" class="block text-sm font-medium text-gray-700">
                            Alamat
                        </label>
                        <div class="mt-1 relative">
                            <input value="{{(isset($mahasiswa))?$mahasiswa->alamat:old('alamat')}}" type="text"
                                name="alamat" id="company_website"
                                class="@error('alamat') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                placeholder="Masukkan Alamat">

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