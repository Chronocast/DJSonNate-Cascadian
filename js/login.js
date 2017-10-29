//Author: Nathan Hascup, Duck Nguyen, Jeremy Manalo, Sonie Moon
//Date: 10/28/17
//Filename: login.js
//Description: javascript validation for home login.js

$(document).ready(function()
    {
        $('input[type="submit"]').on("click", validate);
    });

    // Perform validation logic on form inputs
    function validate(event)
    {
        //prevent the form from submitting
        event.preventDefault();
        
        //remove old error messages
        //removeErrors();
        var error = false;
        
        //tracking id must be 10 characters
        var email = $("#email").val();
        var password = $("#password").val();
        
        //if tracking number is empty, it is considered false
        //so the following if statement will evaluate to true
        //if trackingNum is empty
        
        if (!email || !password)
        {
            report("error", "Email or password cannot be empty");
            error = true;
        }
        else {            
            if (validateEmail(email) === false)
            {
                report("error", "please enter valid email");
                error = true;
            }
            else if (password.length <=5)
            {
                report("error", "password can't be less than 5");
                error = true;
            }
            else
            {
                document.getElementById("login-form").submit();
            }
        }
    }
        
    function validateEmail(emailInput)
    {     
        var atpos = emailInput.indexOf("@");
        var dotpos = emailInput.lastIndexOf(".");
        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=emailInput.length)
        {
            return false;
        }
    }
    

        
        //if (!trackingNum)
        //{
        //    report("error", "The Tracking ID cannot be empty!");
        //    error = true;
        //}
        //else if(trackingNum.length != 10)
        //    {
        //        report("error", "Please enter the 10 digit tracking number!");
        //        error = true;
        //    }
        //    else
        //    {
        //        trackingNum = parseInt(trackingNum, 10);
        //        //console.log(typeof trackingNum);
        //        if (trackingNum.isNaN)
        //        {
        //            report("error", "Please enter a valid tracking number!");
        //            error = true;
        //        }
        //        else
        //        {
        //            console.log("youre in");
        //            document.getElementById("tracking-form").submit();
        //        }
        //    }
    
    
    function report (id, message)
    {
        $("#" + id).html(message);
        $("#" + id).parent().show();
        $("#" + id).prev().show();
        console.log(message);
    }
		
    // Clear any previous errors
    //function removeErrors()
    //{
    //	$("#emp-id-error").parent().hide();
    //	$("#hours-error").parent().hide();
    //	$("#payrate-error").parent().hide();
    //}