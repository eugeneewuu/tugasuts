<x-template-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Data Game
    </h2>
    <div class="shadow px-6 py-4 bg-gray-200 rounded sm:px-1 sm:py-1">
        <div class="grid grid-cols-12">
            <div class="col-span-6 p-4">
                <a href="{{route ('game.create')}}">
                    <button
                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        Tambah Data Game
                    </button>
                </a>
            </div>
        </div>
        <nav class="navbar navbar-light"> 
                    <div class="container-fluid">
                        <div class="row">
                        <div class="row">
                        <div class="row">
                                <div class="form-group mx-sm-3 mb-2">
                                <form action="/cari" method="get">
                                  <input placeholder="Cari dengan Nama" type="search" name="search" placeholder="Search" class="border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none">
                                </div>
                                 <button type="submit" class="btn btn-primary mb-2">Cari!</button>
                                </form>
                        </div>
                        </div>
                        </div>
                </nav>
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 px-1 py-3">
                <thead class="bg-gray-50 text-left">
                    <tr class="py-3">
                        <th>No</th>
                        <th>Nama Game</th>
                        <th>platform</th>
                        <th>Tahun Rilis</th>
                        <th>Nama Kategori</th>
                        <th>Edit Or Delete</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-left py-32">
                    <?php $no=1;?>
                    @foreach($game as $gms)
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$gms->nama_game}}</td>
                        <td>{{$gms->platform_game}}</td>
                        <td>{{$gms->tahun_rilis}}</td>
                        <td>{{$gms->nama_kategori}}</td>
                        <td>

                            <form action=" {{route('game.destroy',$gms->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('game.edit',$gms->id)}}"
                                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-0.5 px- border border-blue-500 hover:border-transparent rounded">Edit</a>
                                <button type="submit"
                                    class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-0.5 px- border border-red-500 hover:border-transparent rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php $no++;?>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</x-template-layout>
