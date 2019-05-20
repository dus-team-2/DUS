

function filter_search() {
    var filter = document.getElementById('filter_content').value;
    if(filter == 1){
        document.getElementById('search_facility').style.display = 'block';
        document.getElementById('search_event').style.display = 'block';

    }else if(filter == 2){
        document.getElementById('search_facility').style.display = 'block';
        document.getElementById('search_event').style.display = 'none';
    }else if(filter == 3){
        document.getElementById('search_facility').style.display = 'none';
        document.getElementById('search_event').style.display = 'block';
    }

}

function update_form_check() {
    var check_tel = document.getElementById('update_tel').value;
    var i;

    //not stop the form submission if there is no tel input
    if (check_tel.length === 0){
        return true;
    }
    for(i=0; i<check_tel.length; i++){

        if(parseFloat(check_tel[i]).toString() == 'NaN'){
            alert('Tel need to be a 11-digits number start with 0, your input is not a number');
            return false;
        }
    }
    if (check_tel[0] !== '0'){
        alert('Tel need to be a 11-digits number start with 0, your input does not start with 0');
        return false;
    }else if(check_tel.length !== 11){
        alert('Tel need to be a 11-digits number start with 0, your input is not 11 digits');
        return false;
    }else{
        return true;
    }

}

function new_password_check() {
    var password1 = document.getElementById('new_password').value;
    var password2 = document.getElementById('new_password2').value;
    //password check
    if(password1.length === 0 ||  password2.length === 0){
        alert("Please enter password twice.");
        return false;
    }else{
        if(password1.length < 6){
            alert("Please set password more than 6 letters.");
            return false;

        }else{
            if(password1.length > 16){
                alert("Please set password less than 16 letters.");
                return false;

            }else{
                if(!/[A-Z]/.test(password1)){
                    alert("Include at least one upper case letter.");
                    return false;

                }else{
                    if(!/[0-9]/.test(password1)){
                        alert("Include at least one number.");
                        return false;

                    }else{
                        if(  password1 !==  password2){
                            alert("Please check your password.");
                            return false;

                        }else{
                             return true;
                        }
                    }
                }
            }
        }
    }

}
$(document).ready(function () {
    $("#booking_select_facility").change(function () {
        var current_facility = document.getElementById("booking_select_facility").value;
        if(current_facility == '12344571'){
            document.getElementById("booking_input_user").style = "display : block";

        }else {
            document.getElementById("booking_input_user").style = "display : none";
        }
    })
})





