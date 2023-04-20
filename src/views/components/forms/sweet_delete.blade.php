<script>
    function sweetDelete() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn theme-btn mr-4',
                cancelButton: 'btn btn-outline-danger'
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            html: "Are you sure you dont want to just disable this ??<br/> You won't be able to revert this if you delete it!",
            type: 'warning',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#3085d6',
            confirmButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, Keep it!'
        }).then((result) => {
            if (result.value) {
                var urlDelete = "{{ $url }}";
                window.location.href = urlDelete;
            }
        });
    }
</script>

<v-btn href="#" class="{{ $class ?? 'mt-2' }}" color="error" onclick="sweetDelete()">Delete</v-btn>