$(document).ready(function(){
    $("#company_signup").click(function(e){
        var error = 0;
        var password = $("#company_password").val();
        var password_confirm = $("#company_password_confirm").val();
        var phone = validate_phone($("#company_phone_compulsory").val());
        e.preventDefault();
        $("#employer-form").find(":text, :file, :password, number, :checkbox,select, textarea").each(function() {
            if($(this).val() === ""){
                $(this).addClass("red-border");
                error = 1;
            }
            // alert_failure("Please fill the required form fields and uploads");
        });
            if($("#company_employees, #company_city").val() ===""){
                $('#company_employees').addClass("red-border");
                $('#company_city').addClass("red-border");

                error = 1;
                alert_failure("Please fill the required form fields and uploads");
            }
            else if($("#company_terms").is(":not(:checked)")){
                error = 1;
                alert_failure("Please accept terms and condition");
            }
            else if(password.length < 8){
                error = 1
                alert_failure("Password must be 8 characters long");
            }
            else if(password != password_confirm){
                error = 1
                alert_failure("Passwords do not match");
            }
            else if(!validateEmail($('#company_email').val())){
                error = 1
                alert_failure("Enter a valid email address");
            }
            else if(phone.success == false){
                error = 1
                alert_failure(phone.msg);
            }
            else{
                var company_form = new FormData(document.getElementById('employer-form'));
                $.ajax({
                    type: 'POST',
                    url: 'backend/company_signup.php',
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: company_form,
                    beforeSend: function(){
                        $("#company_signup").addClass("hide");
                        $("#company-loader").removeClass("hide");
                    }
                })
                .done(function(response){
                    console.log(response);
                    if(response == "success"){
                        $("#signup-form").hide(1000);
                        $('#signup-success').removeClass("hide");
                    }
                    else if(response == "duplicate mail"){
                      alert_failure("Email address already exists!");
                      $("#company_signup").removeClass("hide");
                      $("#company-loader").addClass("hide");

                    }
                    else if(response == "duplicate phone"){
                      alert_failure("Phone number already exists!");
                      $("#company_signup").removeClass("hide");
                      $("#company-loader").addClass("hide");

                    }
                    else{
                      alert_failure("An error has occured please try again!")
                        $("#company_signup").removeClass("hide");
                        $("#company-loader").addClass("hide");
                    }
                })
                .fail(function(xhr, textStatus, errorThrown){
                    console.log(xhr.responseText);
           })
        }
    });

    $("#employee_signup").click(function(e){
        e.preventDefault();
        var error = 0;
        var password = $("#employee_password").val();
        var password_confirm = $("#employee_password_confirm").val();
        var phone = validate_phone($("#employee_phone_compulsory").val());
        // if($("#employee_phone_optional").val() != ""){
        //     var phone_option = validate_phone($("#employee_phone_optional").val());
        // }
        var employee_previous_phone = validate_phone($("#employee_previous_phone").val());

        $("#employee-form").find(":text, :file, :password, number, :checkbox, select, textarea").each(function() {
            if($(this).val() == ""){
                $(this).addClass("red-border");
                error = 1;
            }
        });
        if($("#employee_city, #employee_gender, #employee_dob, #file-upload4, #file-upload3, #file-upload5").val() ===""){
            $("#employee_city").addClass("red-border");
            $("#employee_gender").addClass("red-border");
            $("#employee_dob").addClass("red-border");
            error = 1;
            alert_failure("Please fill the required form fields and uploads");
        }
        else if(password.length < 8){
            error = 1;
            alert_failure("Password must be 8 characters long");
        }
        else if($("#employee_terms").is(":not(:checked)")){
            error = 1;
            alert_failure("Please accept terms and condition");
        }
        else if(password != password_confirm){
            error = 1;
            alert_failure("Passwords do not match");
        }
        else if(!validateEmail($('#employee_email').val())){
            error = 1;
            alert_failure("Enter a valid email address");
        }
        else if(phone.success == false){
            error = 1;
            alert_failure(phone.msg);
        }

        else{
                var employee_form = new FormData(document.getElementById("employee-form"));
                $.ajax({
                    type: 'POST',
                    url: 'backend/employee_signup.php',
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: employee_form,
                    beforeSend: function(){
                        $("#employee_signup").addClass("hide");
                        $("#employee-loader").removeClass("hide");
                    }
                })
                .done(function(response){
                    console.log(response);
                    $("#employee_signup").removeClass("hide");
                    $("#employee-loader").addClass("hide");
                    if(response == "success"){
                        $("#signup-form").hide(1000);
                        $('#signup-success').removeClass("hide");
                    }
                    else if(response == "duplicate mail"){
                      alert_failure("Email address already exists!");
                      $("#company_signup").removeClass("hide");
                      $("#company-loader").addClass("hide");

                    }
                    else if(response == "duplicate phone"){
                      alert_failure("Phone number already exists!");
                      $("#company_signup").removeClass("hide");
                      $("#company-loader").addClass("hide");

                    }
                    else{
                        alert_failure("An error has occured please try again!")
                        $("#employee_signup").removeClass("hide");
                        $("#employee-loader").addClass("hide");
                    }
                })
                .fail(function(xhr, textStatus, errorThrown){
                    console.log(xhr.responseText);
                })
            }
    });
});
