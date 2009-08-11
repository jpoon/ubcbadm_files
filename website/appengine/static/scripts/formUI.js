function formOnLoad() {
    validateForm('memberRegistration');
    setInterval( function() { validateForm('memberRegistration') }, 1200);
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
