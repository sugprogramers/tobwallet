(function (document, window, $) {
    'use strict';

    var Site = window.Site;

    $(document).ready(function ($) {
        Site.run();
    });

    // Example Wizard Form Container
    // -----------------------------
    // http://formvalidation.io/api/#is-valid-container
    (function () {
        var defaults = $.components.getDefaults("wizard");
        var options = $.extend(true, {}, defaults, {
            onInit: function () {
                $('#RegisterClientForm').formValidation({
                    framework: 'bootstrap',
                    excluded: ':disabled',
                    fields: {
                        inputEmail: {
                            validators: {
                                notEmpty: {
                                    message: 'The email is required'
                                },
                                emailAddress: {
                                    message: 'The email address is not valid'
                                },
                                remote: {
                                    message: 'The email address is not available',
                                    url: 'http://192.168.0.223/docufresh/Validator.php',
                                    data: {
                                        type: 'email'
                                    },
                                    type: 'POST',
                                    delay: 1500
                                }

                            }
                        },
                        inputConfirmEmail: {
                            validators: {
                                notEmpty: {
                                    message: 'The email confirmation is required'
                                },
                                identical: {
                                    field: 'inputEmail',
                                    message: 'The confirmation email is not the same'
                                }
                            }
                        },
                        inputPass: {
                            validators: {
                                notEmpty: {
                                    message: 'The password is required'
                                }
                            }
                        },
                        inputConfirmPass: {
                            validators: {
                                notEmpty: {
                                    message: 'The password confirmation is required'
                                },
                                identical: {
                                    field: 'inputPass',
                                    message: 'The password and its confirm are not the same'
                                }
                            }
                        },
                        chkAcceptTerms: {
                            validators: {
                                notEmpty: {
                                    message: 'You must accept the terms'
                                }
                            }
                        },
                        inputFirstName: {
                            validators: {
                                notEmpty: {
                                    message: 'Please enter your first name'
                                }
                            }
                        },
                        inputLastName: {
                            validators: {
                                notEmpty: {
                                    message: 'Please enter your last name'
                                }
                            }
                        },
                        inputApproxDebt: {
                            validator: {
                                notEmpty: {
                                    message: 'You must enter your aprox debt amount'
                                }
                            }
                        },
                        inputAnualIncome: {
                            validator: {
                                notEmpty: {
                                    message: 'You must enter your anual income amount'
                                }
                            }
                        },
                        radioBtnFsaAccount: {
                            validators: {
                                notEmpty: {
                                    message: 'You must choose an option'
                                }
                            }
                        },
                        txtFsaUsername: {
                            validators: {
                                notEmpty: {
                                    message: 'The FSA username is required'
                                }
                            }
                        },
                        txtFsaPassword: {
                            validators: {
                                notEmpty: {
                                    message: 'The FSA password is required'
                                }
                            }
                        },
                        txtFsaConfirmPass: {
                            validators: {
                                notEmpty: {
                                    message: 'The FSA password confirmation is required'
                                },
                                identical: {
                                    field: 'txtFsaPassword',
                                    message: 'The FSA password and its confirm are not the same'
                                }
                            }
                        },
                        chkAcceptFsaTerms: {
                            validators: {
                                notEmpty: {
                                    message: 'You must accept the terms'
                                }
                            }
                        },
                        inputSsn: {
                            validators: {
                                notEmpty: {
                                    message: 'The SSN is required and cannot be empty'
                                },
                                callback: {
                                    message: 'The SSN is not valid',
                                    callback: function (value, validator, $field) {

                                        if (value === '') {
                                            return true;
                                        }

                                        // Check the password strength
                                        console.log('length: ' + value.length);
                                        if (value.length !== 11) {
                                            return {
                                                valid: false,
                                                message: 'SSN must be 9 characters long'
                                            };
                                        }

                                        validator.updateStatus('inputSsn', validator.STATUS_VALID, 'callback');
                                        return true;
                                    }
                                }


                            }
                        }
                    }
                }).find('[name="inputSsn"]').mask('999-99-9999');

            },
            onNext: function (from, to) {
                console.log('onNext From: ' + from.index);
                console.log('onNext To: ' + to.index);

                $('.wizard-buttons a.btn-default').show();

                // Validator for each STEP
                if (from.index === 0 && to.index === 1) {
                    $('.wizard-buttons a.btn-default').hide();
                    qc.pA('RegisterClientForm', 'btnSubmitClientInfo', 'QClickEvent', '1', 'waitIconRegister');
                }

                if (from.index === 1 && to.index === 2) {
                    qc.pA('RegisterClientForm', 'btnSubmitClientInfo', 'QClickEvent', '2', 'waitIconRegister');
                }

                if (from.index === 2 && to.index === 3) {
                    qc.pA('RegisterClientForm', 'btnSubmitClientInfo', 'QClickEvent', '3', 'waitIconRegister');
                }
                if (from.index === 3 && to.index === 4) {
                    if (FSA_ACCOUNT == 'createfsa') {
                        $('#modal-how-to-create-fsa-account').modal("show");
                        console.log("vamos a mostrar los tabs" + FSA_ACCOUNT);
                    }
                }

                if (from.index === 4 && to.index === 5) {
                    qc.pA('RegisterClientForm', 'btnSubmitClientInfo', 'QClickEvent', '5', 'waitIconRegister');
                }

            },
            onBack: function (from, to) {
                console.log('onBack From: ' + from.index);
                console.log('onBack To: ' + to.index);

                // Second step, we disable BTN BACK to Step 1
                if (from.index === 2 && to.index === 1) {
                    $('.wizard-buttons a.btn-default').hide();
                }
            },
            validator: function (step) {
                console.log('step to be validadte' + step.index);

                var fv = $('#RegisterClientForm').data('formValidation');
                console.log(fv);
                var $this = $(this);

                // Validate the container
                fv.validateContainer($this);

                var isValidStep = fv.isValidContainer($this);
                if (isValidStep === false || isValidStep === null) {
                    return false;
                }

                return true;


            },
            onFinish: function () {
                qc.pA('RegisterClientForm', 'btnSubmitClientInfo', 'QClickEvent', '6', '');
                $('#success-register').modal("show");
            },
            buttonsAppendTo: '.panel-body'
        });


        $("#clientRegistrationFormContainer").wizard(options);

    })();





})(document, window, jQuery);



