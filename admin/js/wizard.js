(function ($) {
    'use strict';
    var form            = $("#property-form");
    var edit_form       = $("#edit-property-form");
    var form_data       = new FormData();

    /**
    * New Form Wizard
    */
    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onFinished: function (event, currentIndex) {
            var features = $('.checkbox:checked').map(function() {
                return this.value;
            }).get();

            var featuresList =  features.join(', ');
            var totalFiles   = $('.files').length;

            for (var index = 0; index < totalFiles; index++) {
                form_data.append("img[]", $('#file'+index)[0].files[0]);
            }
            form_data.append('title',             $('#title').val());
            form_data.append('price',             $('.price').val());
            form_data.append('description',       $('.description').val());
            form_data.append('location',          $('.location').val());
            form_data.append('address',           $('.address').val());
            form_data.append('property_type',     $('.property_type').val());
            form_data.append('status',            $('.status').val());
            form_data.append('beds',              $('.beds').val());
            form_data.append('baths',             $('.baths').val());
            form_data.append('area',              $('.area').val());
            form_data.append('garages',           $('.garages').val());
            form_data.append('features',          featuresList);

            $.ajax({
                url: 'ajax/insert-data.php',
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                method: 'POST',
                success: function(data) {
                    console.log(data);
                    if (data == 'success') {
                        swal({
                          title: 'Success!',
                          text: 'Your property has been added',
                          icon: 'success',
                        }).then(
                            function () {
                                location.reload();
                            }
                        );
                    } else {
                        swal({
                          title: 'Error!',
                          text: 'Your property has not been added',
                          icon: 'error',
                          button: false
                        }).then(
                            function () {}
                        );
                    }
                }
            });
        }
    });

    /**
    * Edit Form Wizard
    */
    edit_form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onFinished: function (event, currentIndex) {
            var features = $('.checkbox:checked').map(function() {
                return this.value;
            }).get();

            var featuresList =  features.join(', ');
            var totalFiles   = $('.files').length;

            for (var index = 0; index < totalFiles; index++) {
                form_data.append("img[]", $('#file'+index)[0].files[0]);
            }
            form_data.append('propertyID',        $('#propertyID').val());
            form_data.append('title',             $('#title').val());
            form_data.append('price',             $('.price').val());
            form_data.append('description',       $('.description').val());
            form_data.append('location',          $('.location').val());
            form_data.append('address',           $('.address').val());
            form_data.append('property_type',     $('.property_type').val());
            form_data.append('status',            $('.status').val());
            form_data.append('beds',              $('.beds').val());
            form_data.append('baths',             $('.baths').val());
            form_data.append('area',              $('.area').val());
            form_data.append('garages',           $('.garages').val());
            form_data.append('img_file1',         $('.img_file1').val());
            form_data.append('img_file2',         $('.img_file2').val());
            form_data.append('img_file3',         $('.img_file3').val());
            form_data.append('features',          featuresList);

            $.ajax({
                url: 'ajax/edit-data.php',
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                method: 'POST',
                success: function(data) {
                    console.log(data);
                    if (data == 'success') {
                        swal({
                          title: 'Success!',
                          text: 'Your property has been updated',
                          icon: 'success',
                        }).then(
                            function () {}
                        );
                    } else {
                        swal({
                          title: 'Error!',
                          text: 'Your property has not been updated',
                          icon: 'error',
                          button: false
                        }).then(
                            function () {}
                        );
                    }
                }
            });
        }
    });
})(jQuery);
