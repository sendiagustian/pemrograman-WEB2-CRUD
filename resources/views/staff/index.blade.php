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
                    <a href="{{route('staff.create')}}"> <button type="submit" class="btn btn-primary">Tambah Data</button> </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead id="table">
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Staff</th>
                            <th>Jabatan</th>
                            <th>Gaji Pokok</th>
                            <th scope="col">Action</th>
                        </thead>
                        <tbody id="table">
                            @foreach($staffs as $key => $staff)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $staff->nik }}</td>
                                <td>{{ $staff->name }}</td>
                                <td>{{ $staff->jabatan }}</td>
                                <td>{{ $staff->gaji_pokok }}</td>
                                <td>
                                    <form style='display:inline' , method="POST" action="{!! route('staff.destroy', $staff->nik) !!} ">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Anda akan menghapus data?')" class="btn btn-danger">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                    |
                                    <a href="{{ route('staff.edit', $staff->nik) }}" class="btn btn-success">
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