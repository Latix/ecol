(function ($) {
    'use strict';
    var form       = $("#property-form");
    var form_data  = new FormData();
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
            form_data.append('title',             $('.title').val());
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

    var validationForm = $("#example-validation-form");
    validationForm.val({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });

    validationForm.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex) {
            validationForm.val({
                ignore: [":disabled",":hidden"]
            })
            return validationForm.val();
        },
        onFinishing: function (event, currentIndex) {
            validationForm.val({
                ignore: [':disabled']
            })
            return validationForm.val();
        },
        onFinished: function (event, currentIndex) {
            alert("Submitted!");
        }
    });

    var verticalForm = $("#example-vertical-wizard");
    verticalForm.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        stepsOrientation: "vertical",
        onFinished: function (event, currentIndex) {
            alert("Submitted!");
        }
    });
})(jQuery);
