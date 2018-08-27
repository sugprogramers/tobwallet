<?php

require('includes/configuration/prepend.inc.php');
require('general.php');
class MiningOptionsForm extends QForm {

    protected $txtEmail;
    protected $btnLogin;
    protected $user;
    protected $chkOption1;
    protected $chkOption2;
    protected $btnNext;
    protected $btnFin;
    protected $btnBack1;
    protected $txtWalletAddress;


    protected function Form_Run() {
        
        $Datos1 = @unserialize($_SESSION['DatosUsuarioNoVerificado']);

        if ($Datos1) {
            $this->user = User::LoadByEmail($Datos1->Email);
        } else {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/login');
        }
    }

    protected function Form_Create() {
        
        $this->chkOption1 = new QCheckBox($this, 'inputCheckbox1'); 
        //$this->chkOption1->SetCustomAttribute('data-plugin', 'switchery');
        //$this->chkOption1->SetCustomAttribute('data-color', '#502581');
        //$this->chkOption1->SetCustomAttribute('data-size', "small");
       
        
        $this->chkOption1->AddAction(new QClickEvent(),new QJavaScriptAction("changeCheckboxValue('inputCheckbox1', 'inputCheckbox2');"));
        
        
      
       
        $this->chkOption2 = new QCheckBox($this,  'inputCheckbox2');
        //$this->chkOption2->SetCustomAttribute('data-plugin', 'switchery');
        //$this->chkOption2->SetCustomAttribute('data-color', '#502581');
        //$this->chkOption2->SetCustomAttribute('data-size', "small");
        
        $this->chkOption2->AddAction(new QClickEvent(),new QJavaScriptAction("changeCheckboxValue('inputCheckbox2', 'inputCheckbox1');"));

        $this->btnNext = new QButton($this);
        $this->btnNext->Text = 'Next';
        $this->btnNext->CssClass = "btn btn-raised btn-primary btn-block";
        $this->btnNext->AddAction(new QClickEvent(), new QAjaxAction('btnNext_Click'));
        $this->btnNext->Width =120;
        
        
        $this->btnFin = new QButton($this);
        $this->btnFin->Text = 'Finalize';
        $this->btnFin->CssClass = "btn btn-raised btn-success btn-block";
        $this->btnFin->AddAction(new QClickEvent(), new QAjaxAction('btnFin_Click'));
        $this->btnFin->Width =120;
        
        $this->btnBack1 = new QButton($this);
        $this->btnBack1->Text = 'Back';
        $this->btnBack1->CssClass = "btn btn-raised btn-default btn-block";
        $this->btnBack1->AddAction(new QClickEvent(),new QJavaScriptAction("iniDivs();"));

        $this->btnBack1->Width =120;
        
       
        
        
        $this->txtWalletAddress = new QTextBox($this);
        $this->txtWalletAddress->CssClass = "form-control input-sm";
        $this->txtWalletAddress->Placeholder = "Submit Wallet Address";
        $this->txtWalletAddress->Width = 200;
        
        
         $this->btnLogin = new QButton($this, 'idlogintext');
        $this->btnLogin->Text = '<i class="icon fa-save" aria-hidden="true"></i>';
        $this->btnLogin->HtmlEntities = false;
        $this->btnLogin->CssClass = "btn btn-raised btn-primary btn-block";
        $this->btnLogin->AddAction(new QClickEvent(), new QAjaxAction('btnSave_Click'));
        $this->btnLogin->Width = 50;
    }
    
     protected function btnFin_Click($strFormId, $strControlId, $strParameter) {
         
         $user =  User::LoadByEmail($this->user->Email);
         $user->StatusUser = 4 ;
         $user->Save();
         
         $_SESSION = array();
         @session_destroy();
         @session_start();
         
         $_SESSION['DatosUsuario'] = serialize($user);
         QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/miningoptions');                
        
         
         
     }
    
    protected function btnNext_Click($strFormId, $strControlId, $strParameter) {
        if($this->chkOption1->Checked== true || $this->chkOption2->Checked== true){
            if($this->chkOption1->Checked){
                QApplication::ExecuteJavaScript("showDiv(1);");
            }
            
             if($this->chkOption2->Checked){
                QApplication::ExecuteJavaScript("showDiv(2);");
            }
            
        }
        else{
             QApplication::ExecuteJavaScript("showWarning('" . htmlentities("You must select an option!") . "');");
        }
    }

    
     protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
         
         if(trim($this->txtWalletAddress->Text)!=''){
               $user =  User::LoadByEmail($this->user->Email);
                $user->WalletAddress = trim($this->txtWalletAddress->Text) ;
                $user->Save();
                QApplication::ExecuteJavaScript("showSuccess('Data save correctly, Now make the payment!');");
         }
         else{
              QApplication::ExecuteJavaScript("showWarning('" . htmlentities("Wallet Address, should not be empty.!") . "');");
         }
             
         
         
        
     }
   

   

}

MiningOptionsForm::Run('MiningOptionsForm');
?>