$('form').parsley({
    errorClass: 'is-invalid text-danger',
    successClass: 'is-valid', 
    errorsWrapper: '<span class="form-text text-danger"></span>',
    errorTemplate: '<span></span>',
    trigger: 'change'
});
