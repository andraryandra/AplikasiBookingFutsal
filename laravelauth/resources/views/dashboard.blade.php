<x-app-layout>
    <x-slot name="header">
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} {{ (auth()->user()->name) }}
        </h2>
    </x-slot>
    <br>
    <h2>Ini Adalah Halaman <b>{{ (auth()->user()->name) }}</b>  </h2>
</x-app-layout>
