<x-slot name="header">
    <h2 class="text-center">Menu Pelaporan Admin</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <button wire:click="create()" class="bg-green-700 text-white font-bold py-2 px-4 rounded my-3">Tambah</button>
            @if($isModalOpen)
            @include('livewire.create-pelaporan')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">ID Pesanan</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Jam Booking</th>
                        <th class="px-4 py-2">Lapangan</th>
                        <th class="px-4 py-2">Total Uang</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pelaporans as $pelaporan)
                    <tr>
                        <td class="border px-4 py-2">{{ $pelaporan->id }}</td>
                        <td class="border px-4 py-2">{{ $pelaporan->idpes }}</td>
                        <td class="border px-4 py-2">{{ $pelaporan->nama2 }}</td>
                        <td class="border px-4 py-2">{{ $pelaporan->jambooking2}}</td>
                        <td class="border px-4 py-2">{{ $pelaporan->lapangan2 }}</td>
                        <td class="border px-4 py-2">{{ $pelaporan->uang2 }}</td>
                        
                         <td class="border px-4 py-2">
                            <button wire:click="edit({{ $pelaporan->id }})"
                                class="bg-blue-500  text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $pelaporan->id }})"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>