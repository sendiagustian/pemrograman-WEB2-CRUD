<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-30">
                <div class="max-w-7xl mx-auto py-4 sm:px-6 lg:px-8">
                    <div class="pb-4">
                        <a href="#"> <button type="submit" class="btn btn-primary">Tambah Data</button> </a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <th scope="col">No</th>
                            <th scope="col">NIDIN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Keahlian</th>
                            <th scope="col">Action</th>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>19012830912</td>
                                <td>Otto</td>
                                <td>otto@gmail.com</td>
                                <td>Dosen</td>
                                <td>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                    |
                                    <a href="#" class="btn btn-success">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>