<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dosen') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-30">
            <div class="max-w-7xl mx-auto py-4 sm:px-6 lg:px-8">
                <div class="pb-4">
                    <a href="{{route('dosen.create')}}"> <button type="submit" class="btn btn-primary">Tambah Data</button> </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead id="table">
                            <th scope="col">No</th>
                            <th scope="col">NIDIN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mata Kuliah</th>
                            <th scope="col">Action</th>
                        </thead>
                        <tbody id="table">
                            @foreach($dosens as $key => $dosen)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $dosen->nidin }}</td>
                                <td>{{ $dosen->name }}</td>
                                <td>{{ $dosen->email }}</td>
                                <td>{{ $dosen->mata_kuliah }}</td>
                                <td>
                                    <form style='display:inline' , method="POST" action="{!! route('dosen.destroy', $dosen->id) !!} ">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Anda akan menghapus data?')" class="btn btn-danger">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                    |
                                    <a href="{{ route('dosen.edit', $dosen->id) }}" class="btn btn-success">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>