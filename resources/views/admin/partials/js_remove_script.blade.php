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

        //car search for visits
        $('#state_number').on('keyup', function () {
            var self = $(this);
            var length = self.val().length;
            if (length == 4) {

                var url = '{{ route("visits.car.search") }}',
                    param = self.val();

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {'searchParam': param},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if(data.length > 0){
                            var car = data[0];
                            $('#car-info span').remove();
                            $('#car-info').parent('div').removeClass('has-error');
                            $('#car-info').append('<span>' +car.make+' '+car.model+' '+car.state_number+
                                '</span>');
                            $('#car_id').val(car.id);
                        }else{
                            $('#car-info span').remove();
                            $('#car-info').parent('div').addClass('has-error');
                            $('#car-info').append('<span class="red">' +'Автомобиль не найден'+
                                '</span>');
                            $('#add-car-button').append('<a href=\"{{ route('car.create') }}\" class="btn w-xs btn-success">'+
                                '<i class="fa fa-plus"></i>'+
                                '<span class="bold">Добавить автомобиль</span>'+
                            '</a>');
                            $('#car_id').val('');
                        }

                    },
                    dataType: 'json'
                });
            }



        });

        //car search
        $('#state_number_search').on('keyup', function () {

            var self = $(this);
            var length = self.val().length;
            if (length == 4) {

                var url = '{{ route("cars.search") }}',
                    param = self.val();

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {'searchParam': param},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if(data[0].length > 0){
                            var dataLength = data[0].length;
                            for(i=0; i <= dataLength; i++){
                                data[0][i];
                                var car = data[0][i],
                                    editUrl = '<?php echo e(route('car.edit', ['id' => 0])); ?>';
                                editUrl = editUrl.replace(0, car.id);
                                $('#car-info span').remove();
                                $('#car-info').parent('div').removeClass('has-error');
                                $('#car-info').append('<a href=\"'+ editUrl +'\">' +car.make+' '+car.model+' '+car.state_number+'</a><p></p>');
                                $('#car_id').val(car.id);
                            }
                        }else{
                            $('#car-info span').remove();
                            $('#car-info').parent('div').addClass('has-error');
                            $('#car-info').append('<span class="red">' +'Автомобиль не найден'+
                                '</span>');
                            $('#car_id').val('');
                        }

                    },
                    dataType: 'json'
                });
            }



        });

        $('#create-car').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });

        $('#create-visit').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });

    };



</script>