var fieldErrorColor = '#f28693';

function validateFormOnSubmit(theForm) {
	var reason = "";
	var eventSelected = new Boolean(false);

	if (theForm.name == "tournament_register" ) {
		reason += validateName(theForm.registrantName);
		reason += validateEmail(theForm.email);
		reason += validatePhone(theForm.phone);

		if (theForm.singles.checked == true) {
			eventSelected = true;
		}
		
		if (theForm.mixed.checked == true) {
			reason += validateName(theForm.mixedPartner);
			eventSelected = true;
		}
		
		if (theForm.doubles.checked == true) {
			reason += validateName(theForm.doublesPartner);
			eventSelected = true;
		}		
		
		if ( eventSelected == false ) {
			reason += "No event selected.\n";
		}
		
	}
	
	if (reason != "") {
		alert(reason);
		return false;
	}

	return true;
}

function validateName(fld) {
	var error = "";
	
    if (fld.value == "") {
	    fld.style.background = fieldErrorColor; 
	    error = "Missing " + fld.id + ".\n";
	} else if (!isAlpha(fld.value)) {
	    fld.style.background = fieldErrorColor;
	    error = "Name can only contain alpha letters.\n";
	} else {
	    fld.style.background = 'White';
	}
	return error;
}

function validateEmail(fld) {
    var error = "";
    var tfld = trim(fld.value);                        // value of field with whitespace trimmed off
    var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
    var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
   
    if (fld.value == "") {
        fld.style.background = fieldErrorColor;
        error = "Missing email address.\n";
    } else if (!emailFilter.test(tfld)) {              //test email for illegal characters
        fld.style.background = fieldErrorColor;
        error = "Please enter a valid email address.\n";
    } else if (fld.value.match(illegalChars)) {
        fld.style.background = fieldErrorColor;
        error = "The email address contains illegal characters.\n";
    } else {
        fld.style.background = 'White';
    }
    return error;
}

function validatePhone(fld) {
    var error = "";
    var stripped = fld.value.replace(/[\(\)\.\-\ ]/g, '');    

   if (fld.value == "") {
        error = "Missing phone number.\n";
        fld.style.background = fieldErrorColor;
    } else if (isNaN(parseInt(stripped))) {
        error = "The phone number contains illegal characters.\n";
        fld.style.background = fieldErrorColor;
    } else if (!(stripped.length == 10)) {
        error = "The phone number is the wrong length. Make sure you included an area code.\n";
        fld.style.background = fieldErrorColor;
    } else {
    	fld.style.background = 'White';
    }
    return error;
}

function isAlpha(str){
	var re = /[^a-zA-Z ]/g
	if (re.test(str)) return false;
	return true;
}

function trim(s)
{
	return s.replace(/^\s+|\s+$/, '');
}
