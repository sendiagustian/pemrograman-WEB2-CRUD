<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Staff\Create')}}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <x-jet-section-title>
                    <x-slot name="title">
                        {{ __('Menambah data staff') }}
                    </x-slot>
                    <x-slot name="description">
                        {{ __('Tambah data staff dengan informasi yang lengkap, isi semua inputan dengan benar.') }}
                    </x-slot>
                </x-jet-section-title>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form method="POST" action="{{ route('staff.store')}}">
                        @csrf
                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="grid grid-cols-6 gap-6">
                                <!-- NIK -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="nik" value="{{ __('NIK') }}" />
                                    <x-jet-input id="nik" type="number" class="mt-1 block w-full" name="nik" :value="old('nik')" required autofocus />
                                    <x-jet-input-error for="name" class="mt-2" />
                                </div>

                                <!-- Name -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="name" value="{{ __('Name') }}" />
                                    <x-jet-input id="name" type="text" class="mt-1 block w-full" name="name" :value="old('name')" required />
                                    <x-jet-input-error for="name" class="mt-2" />
                                </div>

                                <!-- Jabatan -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="jabatan" value="{{ __('Jabatan') }}" />
                                    <x-jet-input id="jabatan" type="text" class="mt-1 block w-full" name="jabatan" :value="old('jabatan')" required />
                                    <x-jet-input-error for="jabatan" class="mt-2" />
                                </div>

                                <!-- Gaji Pokok -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="gaji_pokok" value="{{ __('Gaji Pokok') }}" />
                                    <x-jet-input id="gaji_pokok" type="number" class="mt-1 block w-full" name="gaji_pokok" :value="old('gaji_pokok')" required />
                                    <x-jet-input-error for="gaji_pokok" class="mt-2" />
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