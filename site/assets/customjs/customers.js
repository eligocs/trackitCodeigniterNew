jQuery(document).ready(function($) {
    //export btn click
    $(document).on("click", ".export_btn", function(e) {
        e.preventDefault();
        //get filtered perameters
        var filter = $("#filter_val").val(),
            d_from = $("#date_from").attr("data-date_from"),
            end = $("#date_to").attr("data-date_to"),
            todayStatus = $("#todayStatus").val(),
            agent_id = $("#sales_user_id").val();

        var export_url = "<?php echo base_url('export/export_cus_merge_fiter_data?filter='); ?>" +
            filter + "&d_from=" + d_from + "&end=" + end + "&todayStatus=" + todayStatus +
            "&agent_id=" + agent_id;
        //redirect to export
        if (confirm("Are you sure to export data ?")) {
            window.location.href = export_url;
        }
    });



    var ajaxReq;
    var resp = $("#pack_response");
    //ajax request if predefined package choose
    $("#createIti").validate({
        submitHandler: function() {
            if (ajaxReq) {
                ajaxReq.abort();
            }
            $("#continue_package, #readyForQuotation").addClass("disabledBtn");
            var package_id = $("#pkg_id").val();
            var customer_id = $("#cust_id").val();
            if (package_id == '' || customer_id == '') {
                resp.html("Please Choose Package First");
                resp.html(
                    '<div class="alert alert-danger"><strong>Error! </strong>Please Choose Package First</div>'
                );
                return false;
            }
            //resp.html( "Package Id: " + package_id + "Customer Id: " + customer_id );
            ajaxReq = $.ajax({
                type: "POST",
                url: "<?php echo base_url('packages/createItineraryFromPackageId'); ?>",
                data: {
                    package_id: package_id,
                    customer_id: customer_id
                },
                dataType: "json",
                beforeSend: function() {
                    resp.html(
                        '<p><i class="fa fa-spinner fa-spin"></i> Please wait...</p>'
                    );
                },
                success: function(res) {
                    if (res.status == true) {
                        resp.html(
                            '<div class="alert alert-success"><strong>Success! </strong>' +
                            res.msg + '</div>');
                        window.location.href =
                            "<?php echo site_url('itineraries/edit/');?>" + res.iti_id +
                            "/" + res.temp_key;
                    } else {
                        resp.html(
                            '<div class="alert alert-danger"><strong>Error! </strong>' +
                            res.msg + '</div>');
                        //console.log("error");
                    }
                },
                error: function(e) {
                    console.log(e);
                    resp.html(
                        '<div class="alert alert-danger"><strong>Error!</strong> Please Try again later! </div>'
                    );
                }
            });
        }
    });

    //Open Modal On ready to quotation click
    $(document).on("click", ".ajax_additi_table", function(e) {
        e.preventDefault();
        $("#pakcageModal").show();
        var customer_id = $(this).attr("data-id");
        var temp_key = $(this).attr("data-temp_key");
        var _this_href = $(this).attr("href");

        //If user not select package
        $("#cust_id").val(customer_id);
        $("#readyForQuotation").attr("href", _this_href);

    });
    jQuery(document).on("click", ".close", function() {
        jQuery("#pakcageModal").fadeOut();
    });

    $(document).on('change', 'select#pkg_cat_id', function() {
        $("#state_id, #pkg_id").val("");
        $("#state_id").removeAttr("disabled");
    });

    var date_from = $("#date_from").attr("data-date_from");
    if (date_from != "") {
        $('#daterange').val($("#date_from").attr("data-date_from") + '-' + $("#date_to").attr("data-date_to"));
    } else {
        $('#daterange').val("");
    }
    //Date range
    $("#daterange").daterangepicker({
            locale: {
                format: 'DD/MM/YYYY'
            },
            // autoUpdateInput: false,
            showDropdowns: true,
            minDate: new Date(2016, 10 - 1, 25),
            //singleDatePicker: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf('month')
                ]
            },
        },
        function(start, end, label) {
            $('#daterange').val(start.format('D MMMM, YYYY') + ' to ' + end.format('D MMMM, YYYY'));
            $("#date_from").val(start.format('YYYY-MM-DD'));
            $("#date_to").attr(end.format('YYYY-MM-DD'));
            $("#todayStatus").val("");
            console.log("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format(
                'YYYY-MM-DD'));
        });


    // $(function() {
    //     $('input[name="dateFilter"]').on('apply.daterangepicker', function(ev, picker) {
    //         $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    //     });

    //     $('input[name="dateFilter"]').on('cancel.daterangepicker', function(ev, picker) {
    //         $(this).val('');
    //     });

    // });

    /************************************show customer offcanvas***************************************/
    $(document).on("click", '.add-edit-customer', function(e) {
        e.preventDefault();
        var resp = $("#addCustomerFormres");
        var cust_id = $(this).data('id');
        console.log(cust_id);
        $.ajax({
            type: "POST",
            url: BASE_URL + 'customers/renderModel',
            cache: true,
            dataType: "html",
            async: false,
            data: {
                id: cust_id
            },
            beforeSend: function() {
                $(".fullpage_loader").show();
                resp.html(
                    '<p><i class="fa fa-spinner fa-spin"></i> Please wait...</p>'
                );
            },
            success: function(res) {
                $(".fullpage_loader").hide();
                $(".edit-add-cust").html(res);
                if (cust_id != '') {
                    $(".headerData").html('Edit Customer');
                } else {
                    $(".headerData").html('Add Customer');
                }
            },
            error: function(e) {
                $(".fullpage_loader").hide();
                alert("error");
            }
        });
    });

    /************************************************Show reference_section*******************************/
    $(document).on('change', '#cus_type', function() {
        var _this_val = $(this).val();
        if (_this_val == 2) {
            $('.reference_section_div').show();
            $(".reference_section_field").attr("required", "true");
        } else {
            $('.reference_section_div').hide();
            $(".reference_section_field input").val('');
        }
    });

    /***********************************************Save Customer************************************** */
    $(document).on("submit", '#customer_form', function(e) {
        $(".add_Customer").attr("disabled", "disabled");
        e.preventDefault();
        var resp = $("#customerRes");
        var formData = $("#customer_form").serializeArray();
        if (ajaxReq) {
            ajaxReq.abort();
        }
        ajaxReq = $.ajax({
            type: "POST",
            url: BASE_URL + 'customers/savecustomer',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                resp.html('<p><i class="fa fa-spinner fa-spin"></i> Please wait...</p>');
            },
            success: function(data) {
                if (data == "success") {
                    resp.html(
                        '<div class="alert alert-success"><strong>Success: </strong> Customer add successfully!</div>'
                    );
                    $("#customer_form")[0].reset();
                    $("#customer_form").removeClass('needs-validation')
                    $("#customer_form").removeClass('was-validated')
                    setTimeout(function() {
                        location.reload(true);
                    }, 3000);
                } else {
                    resp.html(data);
                }
            },
            error: function(e) {
                resp.html(
                    '<div class="alert alert-danger"><strong>Error!</strong>Please Try again later! </div>'
                );
            }
        });
        return false;
    });

    /*****************************************/
    $(".customer_name_text").text(function() {
        return $(this).text().length > 75 ? $(this).text().substr(0, 75) + '...' : $(this).text();
    });

    $(".email_text").text(function() {
        return $(this).text().length > 75 ? $(this).text().substr(0, 75) + '...' : $(this).text();
    });


    $(document).on("click", ".ajax_delete_customer", function() {
        var res = $("#res");
        var user_id = $(this).attr("data-id");
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>" + "AjaxRequest/delete_customer",
                        type: "POST",
                        dataType: "json",
                        data: {
                            id: user_id
                        },
                        cache: false,
                        beforeSend: function() {
                            res.html("Please wait....");
                        },
                        success: function(r) {
                            if (r.status = true) {
                                res.hide();
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                });
                                setTimeout((function() {
                                    window.location.reload();
                                }), 3000);

                            } else {
                                alert("Error! Please try again.");
                            }
                        }
                    });

                } else {
                    swal("Your imaginary file is safe!");
                    setTimeout((function() {
                        window.location.reload();
                    }), 3000);
                }
            });
    });


    $("#customer_id").on("blur", function() {
        var url = window.location.href;
        var value = $(this).val();
        if (value.length > 4) {
            $('#search_customer_data').submit();
        }
    });

    $("#filterReset").click(function() {
        window.location.href = 'http://localhost/trackitCodeigniterNew/customers';
    })

});