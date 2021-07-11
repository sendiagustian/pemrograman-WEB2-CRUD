<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student\Create')}}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <x-jet-section-title>
                    <x-slot name="title">
                        {{ __('Menambah data student') }}
                    </x-slot>
                    <x-slot name="description">
                        {{ __('Tambah data studet dengan informasi yang lengkap, isi semua inputan dengan benar.') }}
                    </x-slot>
                </x-jet-section-title>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form method="POST" action="{{ route('student.store')}}">
                        @csrf
                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="grid grid-cols-6 gap-6">
                                <!-- NPM -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="npm" value="{{ __('NPM') }}" />
                                    <x-jet-input id="npm" type="number" class="mt-1 block w-full" name="npm" :value="old('npm')" required autofocus />
                                    <x-jet-input-error for="name" class="mt-2" />
                                </div>

                                <!-- Name -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="name" value="{{ __('Name') }}" />
                                    <x-jet-input id="name" type="text" class="mt-1 block w-full" name="name" :value="old('name')" required />
                                    <x-jet-input-error for="name" class="mt-2" />
                                </div>

                                <!-- Kelas -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="kelas" value="{{ __('Kelas') }}" />
                                    <x-jet-input id="kelas" type="text" class="mt-1 block w-full" name="kelas" :value="old('kelas')" required />
                                    <x-jet-input-error for="kelas" class="mt-2" />
                                </div>

                                <!-- Jurusan -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="jurusan" value="{{ __('Mata Kuliah') }}" />
                                    <x-jet-input id="jurusan" type="text" class="mt-1 block w-full" name="jurusan" :value="old('jurusan')" required />
                                    <x-jet-input-error for="jurusan" class="mt-2" />
                                </div>

                                <!-- Asal Sekolah -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="asal_sekolah" value="{{ __('Mata Kuliah') }}" />
                                    <x-jet-input id="asal_sekolah" type="text" class="mt-1 block w-full" name="asal_sekolah" :value="old('asal_sekolah')" required />
                                    <x-jet-input-error for="asal_sekolah" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                            <x-jet-button>
                                {{ __('Save') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>