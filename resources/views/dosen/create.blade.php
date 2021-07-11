<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dosen\Create')}}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <x-jet-section-title>
                    <x-slot name="title">
                        {{ __('Menambah data dosen') }}
                    </x-slot>
                    <x-slot name="description">
                        {{ __('Tambah data dosen dengan informasi yang lengkap, isi semua inputan dengan benar.') }}
                    </x-slot>
                </x-jet-section-title>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form method="POST" action="{{ route('dosen.store')}}">
                        @csrf
                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="grid grid-cols-6 gap-6">
                                <!-- NIDIN -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="nidin" value="{{ __('NIDIN') }}" />
                                    <x-jet-input id="nidin" type="number" class="mt-1 block w-full" name="nidin" :value="old('nidin')" required autofocus />
                                    <x-jet-input-error for="name" class="mt-2" />
                                </div>

                                <!-- Name -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="name" value="{{ __('Name') }}" />
                                    <x-jet-input id="name" type="text" class="mt-1 block w-full" name="name" :value="old('name')" required />
                                    <x-jet-input-error for="name" class="mt-2" />
                                </div>

                                <!-- Email -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                    <x-jet-input id="email" type="email" class="mt-1 block w-full" name="email" :value="old('email')" required />
                                    <x-jet-input-error for="email" class="mt-2" />
                                </div>

                                <!-- Email -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="mata_kuliah" value="{{ __('Mata Kuliah') }}" />
                                    <x-jet-input id="mata_kuliah" type="text" class="mt-1 block w-full" name="mata_kuliah" :value="old('mata_kuliah')" required />
                                    <x-jet-input-error for="mata_kuliah" class="mt-2" />
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