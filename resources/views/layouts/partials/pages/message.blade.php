<script src="//cdn.bootcss.com/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
    @if(notify()->ready())
        swal({
        title: "{{ notify()->option('title') }}",
        text: "{{ notify()->message() }}!",
        type: "{{ notify()->type() }}",
        @if(notify()->type() !== 'success')
            confirmButtonText: "确定",
        @else
        timer: "{{ notify()->option('timer') }}",
        showConfirmButton: false
        @endif
    });
    @endif
</script>

