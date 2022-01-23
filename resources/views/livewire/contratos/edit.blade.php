<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="text-center text-2xl font-semibold text-gray-600">Actualizar Contrato</h1>
            <div>
                <label for="email" class="block mb-1 text-gray-600 font-semibold">Nombre</label>
                <input type="text" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full @error('nombre') border-2 border-red-600 @enderror" wire:model.defer='nombre' />
                @error('nombre')
                    <span class="text-red-600 mt-2 mb-2 font-bold">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="email" class="block mb-1 text-gray-600 font-semibold">Descripción</label>
                <textarea class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full @error('descripcion') border-2 border-red-600 @enderror" name="" id="" cols="30" rows="10" wire:model.defer='descripcion'></textarea>
                @error('descripcion')
                    <span class="text-red-600 mt-2 mb-2 font-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-center space-x-2">
                <div class="w-2/3 mt-4 mb-2">
                    <button class="w-full py-2 bg-red-600 text-white rounded-lg hover:bg-red-900" wire:click='update'>
                        Actualizar
                    </button>
                </div>
                <div class="w-2/3 mt-4 mb-2">
                    <button class="w-full py-2 bg-gray-200 text-blue-600 hover:underline rounded-lg hover:bg-gray-300" wire:click='default'>
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
