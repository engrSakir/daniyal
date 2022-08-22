
<!-- latest jquery-->
<script src="{{ asset('assets/frontend/js/jquery-3.3.1.min.js') }}"></script>

<!-- slick js-->
<script src="{{ asset('assets/frontend/js/slick.js') }}"></script>

<!-- tool tip js -->
<script src="{{ asset('assets/frontend/js/tippy-popper.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/tippy-bundle.iife.min.js') }}"></script>

<!-- popper js-->
<script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>

<!-- popper js-->
<script src="{{ asset('assets/frontend/js/menu.js') }}"></script>

<!-- father icon -->
<script src="{{ asset('assets/frontend/js/feather.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/feather-icon.js') }}"></script>

<!-- tool tip js-->
<script src="{{ asset('assets/frontend/js/tippy-bundle.iife.min.js') }}"></script>

<!-- Bootstrap js-->
<script src="{{ asset('assets/frontend/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap-notify.min.js') }}"></script>

<!-- Theme js-->
<script src="{{ asset('assets/frontend/js/script.js') }}"></script>

@livewireScripts
@stack('scripts')
{{-- toster alert code --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    window.addEventListener('alert',({detail:{type,message}})=>{
        Toast.fire({
            icon:type,
            title:message
        })
    })
</script>
