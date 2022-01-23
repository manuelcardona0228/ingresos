<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="text-center text-2xl font-semibold text-gray-600">Crear Contrato</h1>
            <div>
                <label for="nombre" class="block mb-1 text-gray-600 font-semibold">Nombre</label>
                <input type="text" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full @error('nombre') border-2 border-red-600 @enderror" name="nombre" wire:model.defer='nombre' />
                @error('nombre')
                    <span class="text-red-600 mt-2 mb-2 font-bold">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="descripcion" class="block mb-1 text-gray-600 font-semibold">Descripción</label>
                <textarea class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full @error('descripcion') border-2 border-red-600 @enderror" name="descripcion" id="" cols="30" rows="10" wire:model.defer='descripcion'></textarea>
                @error('descripcion')
                    <span class="text-red-600 mt-2 mb-2 font-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-center">
                <div class="w-2/3 mt-4 mb-2">
                    <button class="w-full py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-900" wire:click='store'>
                        Crear
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
