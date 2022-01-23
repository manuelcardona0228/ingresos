<div class="py-12 lg:flex">
    <div class="lg:w-1/3 mx-auto mb-10 lg:mb-0 sm:px-6 lg:px-8">
        @include("livewire.contratos.$view")
    </div>
    <div class="lg:w-2/3 mx-auto sm:px-6 lg:px-8">
        @include('livewire.contratos.index')
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        showConfirmButton: false,
        showCloseButton: true,
        timer: 5000,
        timerProgressBar:true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
    window.addEventListener('alert',({detail:{type,message}})=>{
        Toast.fire({
            icon:type,
            title:message
        })
    })
</script>
