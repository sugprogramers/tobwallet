'use strict';
var acceptTermsCheckbox = document.querySelector('#chkAcceptContractTerms');
acceptTermsCheckbox.onchange = function () {
    console.log('ocultando');
    console.log(this.checked);
    if (this.checked) {
        $('#lblAcceptTermsWarning').fadeOut("slow", "linear", function () {
            console.log('oculto');
        });
    } else {
        $('#lblAcceptTermsWarning').fadeIn("slow", "linear", function () {
            console.log('no oculto');
        });
    }

};

function openModalSignContracts() {
    $(".docufresh-contract-sign").modal();
}


function initHelloSign(urlHelloSign,value) {
    HelloSign.init("e76bfe88eb8ac1e454b11f8a0a1968dc");
    HelloSign.open({
        // Set Sign URL grabbed from User Model
        url: urlHelloSign,
        allowCancel: true,
        uxVersion: 2,
        container: document.getElementById("contract-container"),
        skipDomainVerification: true,
        debug: true,
        messageListener: function (e) {
            console.log(e);
            if (e.event == HelloSign.EVENT_SIGNED) {
                console.log('Contract Signed.');
                contractSigned(value);
            }
            
            if(e.event == HelloSign.EVENT_CANCELED){
                contractSignCancelled();
            }
        }
    });
}

function contractSigned(value){
    // We call a funtion from this form saying that this contract has been signed by the client! (true)
    qc.pA('ViewContractsForm', 'btnSignContracts', 'QClickEvent', value, 'objWaitIconContracts');
    $(".docufresh-contract-sign").modal("hide");
}


function contractSignCancelled(){
    $(".docufresh-contract-sign").modal("hide");
}