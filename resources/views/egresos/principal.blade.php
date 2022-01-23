<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Egresos por Contrato') }}
        </h2>
    </x-slot>

    <livewire:egreso :contrato_id="$contrato_id" />
</x-app-layout>
