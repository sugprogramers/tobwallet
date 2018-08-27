
(function (document, window, $) {
    'use strict';

    var Site = window.Site;

    $(document).ready(function ($) {
        Site.run();
    });


//    $('.pearls a').click(function () {
//        $(this).tab('show');
//    });
    $('.pearl a[href="#basicInformationTab"]').on('show.bs.tab', function () {
        $(".pearl").removeClass("current");
        $(this).parent().prevAll('.pearl').addClass("current");
        $(this).parent().addClass("current");
    });
    $('.pearl a[href="#loansTab"]').on('show.bs.tab', function () {
        $('.pearl').removeClass("current");
        $(this).parent().prevAll('.pearl').addClass("current");
        $(this).parent().addClass("current");

    });
    $('.pearl a[href="#contractsAndPaymentsTab"]').on('show.bs.tab', function () {
        $('.pearl').removeClass("current");
        $(this).parent().prevAll('.pearl').addClass("current");
        $(this).parent().addClass("current");
    });
    $('.pearl a[href="#stepsTab"]').on('show.bs.tab', function () {
        $('.pearl').removeClass("current");
        $(this).parent().prevAll('.pearl').addClass("current");
        $(this).parent().addClass("current");
    });



//    // Example Wizard Form Container
//    // -----------------------------
//    // http://formvalidation.io/api/#is-valid-container
//    (function () {
//        var defaults = $.components.getDefaults("wizard");
//        var options = $.extend(true, {}, defaults, {
//            onInit: function () {
//                $('#EditClientForm').formValidation({
//                    framework: 'bootstrap',
//                    fields: {
//                        inputFirstName: {
//                            validators: {
//                                notEmpty: {
//                                    message: 'The First name is required'
//                                }
//                            }
//                        },
//                        inputLastName: {
//                            validators: {
//                                notEmpty: {
//                                    message: 'The Last name is required'
//                                }
//                            }
//                        }
//
//                    }
//                });
//            },
//            onBeforeChange: function (step) {
//                console.log('click en before change');
//                var current = step.index + 1;
//                console.log(current);
//                if (current == 1) {
//
//                }
//
//            },
//            onFinish: function () {
//
//
//                // $('#EditClientForm').submit();
//            },
//            buttonsAppendTo: '.panel-body'
//        });
//
//        $("#editClientsInfoWizard").wizard(options);
//
//        // Let's validate if user email doesn't exists
//        var wizard = $("#editClientsInfoWizard").wizard(options).data('wizard');
//        wizard.get('#userBasicInfo').setValidator(function () {
//            var fv = $('#EditClientForm').data('formValidation');
//            var $this = $(this);
//            // Validate the container
//            fv.validateContainer($this);
//
//            var isValidStep = fv.isValidContainer($this);
//            if (isValidStep === false || isValidStep === null) {
//                return false;
//            } else {
//                qc.pA('EditClientForm', 'btnUpdateClientInfo', 'QClickEvent', '', 'waitIconRegister');
//                return true;
//            }
//        });
//        wizard.get('#loansWizardEditClient').setValidator(function () {
//            var fv = $('#EditClientForm').data('formValidation');
//            var $this = $(this);
//            // Validate the container
//            fv.validateContainer($this);
//
//            var isValidStep = fv.isValidContainer($this);
//            if (isValidStep === false || isValidStep === null) {
//                return false;
//            } else {
//                qc.pA('EditClientForm', 'btnUpdateClientData', 'QClickEvent', '', 'waitIconRegister');
//                return true;
//            }
//        });
//        wizard.get('#contractsWizardEditClient').setValidator(function () {
//            var fv = $('#EditClientForm').data('formValidation');
//            var $this = $(this);
//            // Validate the container
//            fv.validateContainer($this);
//
//            var isValidStep = fv.isValidContainer($this);
//            if (isValidStep === false || isValidStep === null) {
//                return false;
//            } else {
//                qc.pA('EditClientForm', 'btnUpdateClientData', 'QClickEvent', '', 'waitIconRegister');
//                return true;
//            }
//        });
//        wizard.get('#stepsWizardEditClients').setValidator(function () {
//            var fv = $('#EditClientForm').data('formValidation');
//            var $this = $(this);
//            // Validate the container
//            fv.validateContainer($this);
//
//            var isValidStep = fv.isValidContainer($this);
//            if (isValidStep === false || isValidStep === null) {
//                return false;
//            } else {
//                qc.pA('EditClientForm', 'btnUpdateClientData', 'QClickEvent', '', 'waitIconRegister');
//                return true;
//            }
//        });
//
//    })();
//
//    // Example Wizard Pager
//    // --------------------------
//    (function () {
//        var defaults = $.components.getDefaults("wizard");
//
//        var options = $.extend(true, {}, defaults, {
//            step: '.wizard-pane',
//            templates: {
//                buttons: function () {
//                    var options = this.options;
//                    var html = '<div class="btn-group btn-group-sm">' +
//                            '<a class="btn btn-default" href="#' + this.id + '" data-wizard="back" role="button">' + options.buttonLabels.back + '</a>' +
//                            '<a class="btn btn-success pull-right" href="#' + this.id + '" data-wizard="finish" role="button">' + options.buttonLabels.finish + '</a>' +
//                            '<a class="btn btn-default pull-right" href="#' + this.id + '" data-wizard="next" role="button">' + options.buttonLabels.next + '</a>' +
//                            '</div>';
//                    return html;
//                }
//            },
//            buttonLabels: {
//                next: '<i class="icon wb-chevron-right" aria-hidden="true"></i>',
//                back: '<i class="icon wb-chevron-left" aria-hidden="true"></i>',
//                finish: '<i class="icon wb-check" aria-hidden="true"></i>'
//            },
//            buttonsAppendTo: '.panel-actions'
//        });
//
//        $("#exampleWizardPager").wizard(options);
//    })();
//
//    // Example Wizard Progressbar
//    // --------------------------
//    (function () {
//        var defaults = $.components.getDefaults("wizard");
//
//        var options = $.extend(true, {}, defaults, {
//            step: '.wizard-pane',
//            onInit: function () {
//                this.$progressbar = this.$element.find('.progress-bar').addClass('progress-bar-striped');
//            },
//            onBeforeShow: function (step) {
//                step.$element.tab('show');
//
//            },
//            onFinish: function () {
//                this.$progressbar.removeClass('progress-bar-striped').addClass('progress-bar-success');
//            },
//            onAfterChange: function (prev, step) {
//                var total = this.length();
//                var current = step.index + 1;
//                var percent = (current / total) * 100;
//
//                this.$progressbar.css({
//                    width: percent + '%'
//                }).find('.sr-only').text(current + '/' + total);
//            },
//            buttonsAppendTo: '.panel-body'
//        });
//
//        $("#exampleWizardProgressbar").wizard(options);
//    })();
//
//    // Example Wizard Tabs
//    // -------------------
//    (function () {
//        var defaults = $.components.getDefaults("wizard");
//        var options = $.extend(true, {}, defaults, {
//            step: '> .nav > li > a',
//            onBeforeShow: function (step) {
//                step.$element.tab('show');
//
//            },
//            classes: {
//                step: {
//                    //done: 'color-done',
//                    error: 'color-error'
//                }
//            },
//            onFinish: function () {
//                alert('finish');
//            },
//            buttonsAppendTo: '.tab-content'
//        });
//
//        $("#exampleWizardTabs").wizard(options);
//    })();
//
//    // Example Wizard Accordion
//    // ------------------------
//    (function () {
//        var defaults = $.components.getDefaults("wizard");
//        var options = $.extend(true, {}, defaults, {
//            step: '.panel-title[data-toggle="collapse"]',
//            classes: {
//                step: {
//                    //done: 'color-done',
//                    error: 'color-error'
//                }
//            },
//            templates: {
//                buttons: function () {
//                    return '<div class="panel-footer">' + defaults.templates.buttons.call(this) + '</div>';
//                }
//            },
//            onBeforeShow: function (step) {
//                step.$pane.collapse('show');
//            },
//            onBeforeHide: function (step) {
//                step.$pane.collapse('hide');
//            },
//            onFinish: function () {
//                alert('finish');
//            },
//            buttonsAppendTo: '.panel-collapse'
//        });
//
//        $("#exampleWizardAccordion").wizard(options);
//    })();
//


})(document, window, jQuery);




