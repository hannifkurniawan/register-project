$('form').parsley({
    errorClass: 'is-invalid text-danger',
    successClass: 'is-valid', 
    errorsWrapper: '<span class="form-text text-danger"></span>',
    errorTemplate: '<span></span>',
    trigger: 'change',
    errorsContainer: function(el) {
        return el.$element.closest('.form-group');
    },
});

function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

