//Author: Nathan Hascup, Duck Nguyen, Jeremy Manalo, Sonie Moon
//Date: 10/16/17
//Filename: validate.js
//Description: javascript validation for home page.html submit button

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
        
        //empoyee id must be 10 characters
        var trackingNum = $("#trackingID").val();
        //console.log("trackingNum is: " + trackingNum);
        //console.log(typeof trackingNum);
        //console.log(trackingNum.length);
        
        //if tracking number is empty, it is considered false
        //so the following if statement will evaluate to true
        //if trackingNum is empty
        if (!trackingNum)
        {
            report("error", "The Tracking ID cannot be empty!");
            error = true;
        }
        else
        {
            if(trackingNum.length != 10)
            {
                report("error", "Please enter the 10 digit tracking number!");
                error = true;
            }
            else
            {
                trackingNum = parseInt(trackingNum, 10);
                //console.log(typeof trackingNum);
                if (trackingNum.isNaN || trackingNum <= 0)
                {
                    report("error", "Please enter a valid tracking number!");
                    error = true;
                }
                else
                {
                    console.log("Success!");
                    //change isError to false
                    //error = false;
                }
            }
        }
        
        if(!error)
        {
            $('#track').submit();
        }
	}
    
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