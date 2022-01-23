<div wire:init="loadEgresos">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex">
                        <div class="flex-1">
                            <div class="flex relative mx-auto w-full">
                                <input class="border-2 border-primary bg-red transition h-12 px-5 pr-16 rounded-md focus:outline-none w-full text-black text-lg " type="search" placeholder="Buscar por (Concepto)" wire:model="search" />
                                <button class="absolute right-2 top-3 mr-4">
                                  <svg class="text-black h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                                    <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                  </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(count($egresos))
                <div class="flex justify-center mt-4">
                    <div>
                        @isset($total)
                            @if($total->valor > 0)
                                <span class="font-bold">Valor actual total del contrato: </span><span class="text-green-600 font-bold">{{ \Numeral::number($total->valor)->format('$0,0') }}</span>
                            @else
                                <span class="font-bold">Valor actual total del contrato: </span><span class="text-red-600 font-bold">{{ \Numeral::number($total->valor)->format('$0,0') }}</span>
                            @endif
                        @endisset
                    </div>
                </div>
                @foreach ($egresos as $egreso)
                <div class="lg:flex shadow rounded-lg mt-2 mb-2">
                    {{-- <div class="bg-blue-600 rounded-lg lg:w-2/12 py-4 block h-full shadow-inner">
                    <div class="text-center tracking-wide">
                        <div class="text-white font-bold text-4xl ">24</div>
                        <div class="text-white font-normal text-2xl">Sept</div>
                    </div>
                    </div> --}}
                    <div class="w-full  lg:w-11/12 xl:w-full px-1 bg-white py-5 lg:px-2 lg:py-2 tracking-wide">
                    <div class="flex flex-row lg:justify-start justify-center">
                        <div class="text-gray-700 font-medium text-sm text-center lg:text-left px-2">
                        <i class="far fa-clock"></i> {{ \Carbon\Carbon::parse($egreso->created_at)->isoFormat('MMMM DD YYYY, hh:mm:ss') }}
                        </div>
                        <div class="text-gray-700 font-medium text-sm text-center lg:text-left px-2">

                        </div>
                    </div>
                    <div class="font-semibold text-gray-800 text-xl text-center lg:text-left px-2">
                        {{ $egreso->concepto }}
                    </div>

                    <div class="text-gray-600 font-medium text-sm pt-1 text-center lg:text-left px-2">
                        {{ \Numeral::number($egreso->valor)->format('$0,0') }}
                    </div>
                    </div>
                    <div class="flex flex-row items-center w-full lg:w-1/3 bg-white lg:justify-end justify-center px-2 py-4 lg:px-0">
                        <div>
                            <span class="tracking-wider text-gray-200 bg-red-500 py-1 px-2 text-sm rounded-lg leading-loose mx-2 font-semibold">
                                Egresos
                            </span>
                        </div>
                        <div x-data="{ show: false }"  @click.away="show = false" class="pr-2">
                            <button @click="show = ! show" type="button" class="flex bg-gray-300 text-gray-600 rounded-lg px-4 py-0.5 focus:outline-none focus:border-white text-sm">
                            <span class="pr-2 mt-0.5">Opciones</span>
                                <svg class="fill-current text-gray-200" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>
                            </button>
                            <div x-show="show" class="absolute bg-gray-100 z-10 shadow-md" style="min-width:10rem">
                                <a class="block px-3 py-2" href="#">Link 1</a>
                                <a class="block px-3 py-2" href="#">Link 2</a>
                                <a class="block px-3 py-2" href="#">Link 3</a>
                                <hr class="border-t border-gray-200 my-0">
                                <a class="block px-3 py-2" href="#">Another Link</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{ $egresos->links() }}
            @else
                @if($toLoad === true && count($egresos) === 0)
                    <div class="flex justify-center">
                        <div class="mt-6">
                            <p class="text-lg font-semibold text-gray-900">No se han encontrado elementos...</p>
                        </div>
                    </div>
                @else
                    <div class="flex justify-center">
                        <div class="mt-6">
                            <svg class="animate-spin -ml-1 mr-3 h-10 w-10 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
