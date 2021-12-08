<x-app-layout>
    <x-slot name="header">
        
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard-') }} {{ (auth()->user()->name) }}
        </h2>
    </x-slot>
    <br>

                        
                  <center> <h1>Ini adalah dashboard <b>{{ (auth()->user()->name) }}</b> </h1> </center>

                    </table>
                </div>
            </div>
        </div>
</x-app-layout>
