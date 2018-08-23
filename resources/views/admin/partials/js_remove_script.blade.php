<script>
    //Script for removing News and FAQ items

    window.onload = function () {
        $('.alert-delete-item').click(function (e) {
            e.preventDefault();
            var self = $(this);
            var form = $('#car-edit-form');
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
                        form[0].action = carDeleteUrl;
                        form.submit();
                        // swal("Deleted!", "Item has been deleted.", "success");
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