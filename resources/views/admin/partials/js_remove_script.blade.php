<script>
    //Script for removing News and FAQ items

    window.onload = function () {
        $('.alert-delete-item').click(function (e) {
            e.preventDefault();
            var self = $(this);
            swal({
                    title: "Are you sure?",
                    text: "Your will not be able to recover this item!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        // swal("Deleted!", "Item has been deleted.", "success");
                        self.parent().submit()
                    } else {
                        swal("Cancelled", "Your item is safe :)", "error");
                    }
                });
        });


        @if (session('success'))

            toastr.options = {
            "debug": false,
            "newestOnTop": false,
            "positionClass": "toast-top-center",
            "closeButton": true,
            "toastClass": "animated fadeInDown"
        };

        toastr.success('{{ session('success') }}');
        @endif


    };

</script>