<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="text-center text-2xl font-semibold text-gray-600">Añadir ingreso a contrato</h1>
            <div>
                <label for="email" class="block mb-1 text-gray-600 font-semibold">Concepto</label>
                <input type="text" class="bg-indigo-50 px-4 py-2 outline-none rounded-md w-full" wire:model.defer='concepto' />
            </div>
            <div class="flex flex-col w-full mb-3">
                <div class="w-full">
                    <label for="">Valor del ingreso</label>
                </div>
                <div class="w-full mt-2" id="form">
                    <div class="flex flex-wrap items-stretch w-full mb-4 relative">
                        <div class="flex">
                            <span class="flex items-center leading-normal bg-grey-lighter border-1 rounded-r-none border border-r-0 border-gray-300 px-3 whitespace-no-wrap text-grey-dark text-sm w-12 h-10 bg-gray-300 justify-center items-center  text-xl rounded-lg text-white">
                            $
                           </span>
                        </div>
                        <input id="amount" type="text" class="bg-gray-100 flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border-0 h-10 border-grey-light rounded-lg rounded-l-none px-3 relative focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent focus:shadow" wire:model.defer='valor'>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="w-2/3 mt-4 mb-2">
                    <button class="w-full py-2 bg-red-600 text-white rounded-lg hover:bg-blue-900" wire:click='store'>
                        Crear
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    (function($, undefined) {
        "use strict";
        // When ready.
        $(function() {
            var $form = $( "#form" );
            var $input = $form.find( "input" );
            $input.on( "keyup", function( event ) {
                // When user select text in the document, also abort.
                var selection = window.getSelection().toString();
                if ( selection !== '' ) {
                    return;
                }
                // When the arrow keys are pressed, abort.
                if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
                    return;
                }
                var $this = $( this );
                // Get the value.
                var input = $this.val();
                var input = input.replace(/[\D\s\._\-]+/g, "");
                        input = input ? parseInt( input, 10 ) : 0;
                        $this.val( function() {
                            return ( input === 0 ) ? "" : input.toLocaleString( "es-CO" );
                        } );
            } );
            /**
             * ==================================
             * When Form Submitted
             * ==================================
             */
            $form.on( "submit", function( event ) {
                var $this = $( this );
                var arr = $this.serializeArray();
                for (var i = 0; i < arr.length; i++) {
                        arr[i].value = arr[i].value.replace(/[($)\s\._\-]+/g, ''); // Sanitize the values.
                };
                console.log( arr );
                event.preventDefault();
            });
        });
    })(jQuery);
</script>
