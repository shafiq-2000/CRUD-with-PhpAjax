
jQuery(document).ready(function () {

    jQuery(document).on("click", ".save", function () {   //click even diye korle sudu aktai kaj korbe ajonno on use kora hoise
        let name = jQuery(".myname").val();
        let email = jQuery(".myemail").val();
        let phone = jQuery(".myphone").val();
        let status = jQuery(".status").val();
        //validation start
        if (name === "") {
            jQuery(".myname").addClass('is-invalid');
        } else {
            jQuery(".myname").addClass('is-valid');
        }


        if (email === "") {
            jQuery(".myemail").addClass('is-invalid');
        } else {
            jQuery(".myemail").addClass('is-valid');
        }


        if (phone === "") {
            jQuery(".myphone").addClass('is-invalid');
        } else {
            jQuery(".myphone").addClass('is-valid');
        }


        if (status === "") {
            jQuery(".status").addClass('is-invalid');
        } else {
            jQuery(".status").addClass('is-valid');
        }
        //validation end

        jQuery.ajax({
            url: "proccess2.php",
            type: "POST",
            data: {
                'name': name,
                'email': email,
                'phone': phone,
                'status': status,
                call: "insert",
            },

            success: function (resp) {
                show();
                jQuery(".msg").html(resp);
                //insert hower por faka hoye jabe----
                jQuery(".myname").val('');
                jQuery(".myemail").val('');
                jQuery(".myphone").val('');
                jQuery(".status").val('');
                //------------
                jQuery(".msg").fadeOut(3000);
            }
        })

    });


    jQuery(document).on("click", "#save", function () {   //click even diye korle sudu aktai kaj korbe ajonno on use kora hoise
        let name = jQuery("#myname").val();
        let email = jQuery("#myemail").val();
        let phone = jQuery("#myphone").val();
        let status = jQuery("#status").val();
        //validation start
        if (name === "") {
            jQuery("#myname").addClass('is-invalid');
        } else {
            jQuery("#myname").addClass('is-valid');
        }


        if (email === "") {
            jQuery("#myemail").addClass('is-invalid');
        } else {
            jQuery("#myemail").addClass('is-valid');
        }


        if (phone === "") {
            jQuery("#myphone").addClass('is-invalid');
        } else {
            jQuery("#myphone").addClass('is-valid');
        }


        if (status === "") {
            jQuery("#status").addClass('is-invalid');
        } else {
            jQuery("#status").addClass('is-valid');
        }
        //validation end
        jQuery.ajax({
            url: "proccess2.php",
            type: "POST",
            data: {
                'name': name,
                'email': email,
                'phone': phone,
                'status': status,
                call: "insert",
            },

            success: function (resp) {
                show();
                jQuery(".msg").html(resp);

                jQuery("#myname").val('');
                jQuery("#myemail").val('');
                jQuery("#myphone").val('');
                jQuery("#status").val('');

                jQuery(".msg").fadeOut(3000);
                jQuery("#insertModal").modal('hide');
            }
        })

    });

    show();
    function show() {
        jQuery.ajax({
            url: "proccess2.php",
            type: "POST",
            data: {
                'call': "show"
            },

            success: function (resp) {
                jQuery(".tableData").html(resp);


            }
        })

    }


    //active ---
    jQuery(document).on("click", ".inactive", function () {
        let id = jQuery(this).val();
        jQuery.ajax({
            url: "proccess2.php",
            type: "POST",
            data: {
                'call': "active", //akahen active holo process2.php er akta method
                'id': id
            },

            success: function (resp) {
                alert("In-active success")
                show();
            }
        })
    });
    //------

    //inctive ---
    jQuery(document).on("click", ".active", function () {
        let id = jQuery(this).val();
        jQuery.ajax({
            url: "proccess2.php",
            type: "POST",
            data: {
                'call': "inactive", //akahen active holo process2.php er akta method
                'id': id
            },

            success: function (resp) {
                alert("Active success")
                show();
            }
        })
    });
    //------

    //delete----

    jQuery(document).on("click", ".delete", function () {
        let id = jQuery(this).val();
        jQuery(".mdelete").val(id);

    })

    //modal theke delete
    jQuery(document).on("click", ".mdelete", function () {
        let id = jQuery(this).val();
        jQuery.ajax({
            url: "proccess2.php",
            type: "POST",
            data: {
                'call': "delete", //akahen active holo process2.php er akta method
                'id': id
            },

            success: function (resp) {
                //    alert("Data delete successfully");
                show();
            }
        });
    });

    //-----


    //akahen update field a database theke data tule ance ------

    jQuery(document).on("click", ".update", function () {
        let id = jQuery(this).val();
        jQuery.ajax({
            url: "proccess2.php",
            type: "POST",
            dataType: "json",
            data: {
                'call': "find", //akahen active holo process2.php er akta method
                'id': id
            },

            success: function (resp) {
                jQuery(".save").hide()
                jQuery(".updateinfo").show();
                jQuery(".updateinfo").val(resp.id);

                jQuery(".myname").val(resp.name);
                jQuery(".myemail").val(resp.email);
                jQuery(".myphone").val(resp.phone);
                jQuery(".status").val(resp.status);

            }
        });
    })

    //--------
    //update
    jQuery(document).on("click", ".updateinfo", function () {
        let id = jQuery(this).val();

        let name = jQuery(".myname").val();
        let email = jQuery(".myemail").val();
        let phone = jQuery(".myphone").val();
        let status = jQuery(".status").val();
        jQuery.ajax({
            url: "proccess2.php",
            type: "POST",

            data: {
                'id': id,
                'name': name,
                'email': email,
                'phone': phone,
                'status': status,
                'call': 'update',

            },

            success: function (resp) {
                show();
                jQuery(".msg").html(resp);
                jQuery(".myname").val('');
                jQuery(".myemail").val('');
                jQuery(".myphone").val('');
                jQuery(".status").val('');

                jQuery(".msg").fadeOut(3000);

                jQuery(".save").show()    //update kore insert korar je buttonseta show korabe 
                jQuery(".updateinfo").hide();  //change kore update field er button k hide kore felbe
            }
        });

    })


    //modal diye update
    jQuery(document).on("click", ".updateModal", function () {
        let id = jQuery(this).val();
        jQuery("#insertModal").modal('show');
        jQuery("#updateinfo").show();
        jQuery("#save").hide();

        jQuery.ajax({
            url: "proccess2.php",
            type: "POST",
            dataType: "json",
            data: {
                'call': "find", //akahen active holo process2.php er akta method
                'id': id
            },

            success: function (resp) {


                jQuery("#updateinfo").val(resp.id);

                jQuery("#myname").val(resp.name);
                jQuery("#myemail").val(resp.email);
                jQuery("#myphone").val(resp.phone);
                jQuery("#status").val(resp.status);

            }
        });
    })

    //modal diye data update
    jQuery(document).on("click", "#updateinfo", function () {
        let id = jQuery(this).val();

        let name = jQuery("#myname").val();
        let email = jQuery("#myemail").val();
        let phone = jQuery("#myphone").val();
        let status = jQuery("#status").val();


        jQuery.ajax({
            url: "proccess2.php",
            type: "POST",

            data: {
                'id': id,
                'name': name,
                'email': email,
                'phone': phone,
                'status': status,
                'call': 'update'

            },

            success: function (resp) {
                show();
                jQuery(".msg").html(resp);
                jQuery("#myname").val('');
                jQuery("#myemail").val('');
                jQuery("#myphone").val('');
                jQuery("#status").val('');

                jQuery(".msg").fadeOut(3000);

                jQuery("#save").show()    //update kore insert korar je buttonseta show korabe 
                jQuery("#updateinfo").hide();  //change kore update field er button k hide kore felbe
                jQuery("#insertModal").modal('hide');
            }
        });

    })

});