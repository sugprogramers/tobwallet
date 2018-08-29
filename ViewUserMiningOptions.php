<?php

require('includes/configuration/prepend.inc.php');
require('general.php');

class ViewUserMiningOptions extends QForm {

    protected $user;
    protected $txtWalletAddress;
    protected $btnSave;
    protected $lblPlan;
    protected $lblDownload;
    
    protected function Form_Run() {

        $Datos1 = @unserialize($_SESSION['DatosUsuario']);

        if ($Datos1) {
            $this->user = User::LoadByEmail($Datos1->Email);
        } else {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/login');
        }
    }
    
    protected function Form_Create() {
        $this->objDefaultWaitIcon = new QWaitIcon($this);
        
        $this->txtWalletAddress = new QTextBox($this);
        $this->txtWalletAddress->CssClass = "form-control input-sm";
        $this->txtWalletAddress->Placeholder = "Submit Wallet Address";
        $this->txtWalletAddress->Width = 200;
        $this->txtWalletAddress->Text = $this->user->WalletAddress;
        
        
        $this->btnSave = new QButton($this, 'idlogintext');
        $this->btnSave->Text = '<i class="icon fa-save" aria-hidden="true"></i>';
        $this->btnSave->HtmlEntities = false;
        $this->btnSave->CssClass = "btn btn-raised btn-primary btn-block";
        $this->btnSave->AddAction(new QClickEvent(), new QAjaxAction('btnSaveWallet_Click'));
        $this->btnSave->Width = 50;
        
        
        $this->lblPlan = new QLabel($this);
        $this->lblPlan->HtmlEntities = false;
        $this->planRender($this->user);


        $this->lblDownload = new QLabel($this);
        $this->lblDownload->HtmlEntities = false;
        $this->downloadRender($this->user);
     
    }
    
    
     protected function btnSaveWallet_Click($strFormId, $strControlId, $strParameter) {
         
         if(trim($this->txtWalletAddress->Text)!=''){
               $user =  User::LoadByEmail($this->user->Email);
                $user->WalletAddress = trim($this->txtWalletAddress->Text) ;
                $user->Save();
                QApplication::ExecuteJavaScript("showSuccess('Data save correctly');");
                $this->user =  $user;
         }
         else{
              QApplication::ExecuteJavaScript("showWarning('" . htmlentities("Wallet Address, should not be empty.!") . "');");
         }
             
         
         
        
     }
     
     
      public function planRender(User $obj) {
            /*if ($obj->MiningOption == 1) {
                $this->lblPlan->Text = 'Plan for mining <br> <div class="label label-table label-primary">Light</div>';
            } else if ($obj->MiningOption == 2) {
                $this->lblPlan->Text = 'Plan for mining <br> <div class="label label-table label-success">Standard</div>';
            } elseif ($obj->MiningOption == 3) {
                $this->lblPlan->Text = 'Plan for mining <br> <div class="label label-table label-info">Power</div>';
            } elseif ($obj->MiningOption == 4) {
                $this->lblPlan->Text = 'Plan for mining <br> <div class="label label-table label-warning">Super Power</div>';
            } elseif ($obj->MiningOption == 5) {
                $this->lblPlan->Text = 'Plan for mining <br> <div class="label label-table label-dark">Pro Plus</div>';
            } else {
                $this->lblPlan->Text = '';
            }*/
        
    }

     public function downloadRender(User $obj) {
        
             $this->lblDownload->Text = '<div style="line-height: 2.1">'.
                     '<span class="label label-success">NEW VERSION 18/08/2018</span><br>'.
                     '<code > <a href="'.__DOMAIN_BASE__."/upload/version/kcoin-v10-windows.exe".'" TARGET="_blank"  >Kcoin for windows v10m</a></code><br>'.
                     '<code > <a href="'.__DOMAIN_BASE__."/upload/version/kcoin-v10-Linux".'" TARGET="_blank"  >Kcoin for linux  v10m</a></code><br>'.
                     '<code > <a href="'.__DOMAIN_BASE__."/upload/version/kcoin-v10-mac.app.zip".'" TARGET="_blank"  >Kcoin for macos  v10m</a></code><br>'.
                     '</div>';
        
    }
    

}

ViewUserMiningOptions::Run('ViewUserMiningOptions');
?>