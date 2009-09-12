var isStudent= false;

function formOnLoad() {
    validateForm('memberRegistration');
    setInterval( function() { validateForm('memberRegistration') }, 800);
}

function formConfirmOnLoad() {
    validateForm('memberRegistrationConfirm')
    setInterval( function() { validateForm('memberRegistrationConfirm') }, 800);
}

function formRowHighlight(inputId) {
    obj = document.getElementById(inputId + "_tr");
    obj.bgColor = '#E0E0E0';
    obj.style.border = '1px solid #C7C7C7';
}

function formRowUnhighlight(inputId) {
    obj = document.getElementById(inputId + "_tr");
    obj.bgColor = '#ffffff';
    obj.style.border = '0px';
}

function checkStudentStatus() {
    ubcAffliation = document.memberRegistration.ubcAffliation;
    for ( i=0; i<ubcAffliation.length; i++ ) {
        if( ubcAffliation[i].checked == true ) {
            if( ubcAffliation[i].value == 'Student' ) {
                showTr('studentNo_tr');
                isStudent = true;
            } else {
                hideTr('studentNo_tr'); 
                isStudent = false;
            }
            break;
        }
    }
}

function hideTr(id) {
    row = document.getElementById(id);
    if (row)
        row.style.display = 'none';
}

function showTr(id) {
    row = document.getElementById(id);
    if (row)
        row.style.display = '';
}
