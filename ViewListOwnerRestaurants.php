<?php

require('includes/configuration/prepend.inc.php');
//require_once('dialog/DialogEditUser.php');
require_once('dialog/DialogEditRestaurant.php');
require_once('dialog/DialogConfirm.php');
require_once('dialog/DialogQR.php');
require_once('dialog/DialogDownloadPrint.php');
require('general.php');

class ViewListOwnerRestaurantForm extends QForm {

    protected $user;
    protected $restaurant;
    protected $dtgUsuarios;
    protected $dtgRestaurants;
    protected $btnNewRestaurant;
    protected $dlgConfirm;
    protected $dlgDialogEditRestaurant;
    protected $dlgDialogPermit;
    protected $lblWallet;
    protected $txtlocation;
    protected $txtNombre;
    protected $txtowner;
    protected $btnFilter;
    protected $btnEraserFilter;
    protected $dlgQRConfirm;
    protected $dlgDownloadPrintFile;
    
    protected $alertTypes;

    protected function Form_Run() {
        $Datos1 = @unserialize($_SESSION['TobUser']);

        if ($Datos1) {
            $this->user = User::LoadByEmail($Datos1->Email);
        } else {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/login');
        }
        $this->items_Found();
    }

    protected function Form_Create() {
        $this->strAction = __VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . "/ownerRestaurants";
        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->dlgDialogEditRestaurant = new DialogEditRestaurant($this, 'close_edit');
        $this->dlgConfirm = new DialogConfirm($this, "close_confirm");
        $this->dlgQRConfirm = new DialogQR($this, "close_edit");
        $this->dlgDownloadPrintFile = new DialogDownloadPrint($this, "close_edit");

        $this->dtgRestaurants = new RestaurantDataGrid($this);
        $this->dtgRestaurants->Paginator = new QPaginator($this->dtgRestaurants);
        $this->dtgRestaurants->Paginator->strLabelForPrevious = '<i class="icon wb-chevron-left-mini"></i>';
        $this->dtgRestaurants->Paginator->strLabelForNext = '<i class="icon wb-chevron-right-mini"></i>';
        $this->dtgRestaurants->ItemsPerPage = 20;
        $this->dtgRestaurants->CssClass = 'table table-bordered table-striped toggle-circle';
        $this->dtgRestaurants->UseAjax = true;
        $this->dtgRestaurants->WaitIcon = $this->objDefaultWaitIcon;
        $this->dtgRestaurants->ShowFilter = false;
        $this->dtgRestaurants->SortColumnIndex = 4;
        $this->dtgRestaurants->SortDirection = true;

        //$this->dtgRestaurants->MetaAddColumn('IdRestaurant', "Name=ID");
        $this->dtgRestaurants->MetaAddColumn('Country');
        $this->dtgRestaurants->MetaAddColumn('City');
        $this->dtgRestaurants->MetaAddColumn('Address');
        $this->dtgRestaurants->MetaAddColumn('RestaurantName');
        $this->dtgRestaurants->MetaAddColumn('Longitude');
        $this->dtgRestaurants->MetaAddColumn('Latitude');
        
        $this->dtgRestaurants->AddColumn(new QDataGridColumn('Logo', '<?= $_FORM->imagesRender($_ITEM); ?>', 'HtmlEntities=false'));

        $this->dtgRestaurants->AddColumn(new QDataGridColumn('', '<?= $_FORM->actionsRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=100'));

        $this->lblWallet = new QLabel($this);
        $this->lblWallet->HtmlEntities = false;

        $this->btnNewRestaurant = new QButton($this);
        $this->btnNewRestaurant->Text = '<i class="icon wb-plus" aria-hidden="true"></i>';
        $this->btnNewRestaurant->CssClass = "site-action-toggle btn-raised btn btn-primary btn-floating";
        $this->btnNewRestaurant->HtmlEntities = false;
        $this->btnNewRestaurant->AddAction(new QClickEvent(), new QAjaxAction('btnNewRestaurant_Click'));

        $this->txtlocation = new QTextBox($this);
        $this->txtlocation->Placeholder = "Country or City";
        
        $this->txtNombre = new QTextBox($this);
        $this->txtNombre->Placeholder = "Restaurant Name";
        
        $this->txtowner = new QTextBox($this);
        $this->txtowner->Placeholder = "Owner";

        $this->btnFilter = new QButton($this);
        $this->btnFilter->CssClass = "btn btn-success";
        $this->btnFilter->HtmlEntities = false;
        $this->btnFilter->Text = '<i class="icon fa-filter" aria-hidden="true"></i>';
        $this->btnFilter->AddAction(new QClickEvent(), new QAjaxAction('actionFilter_Click'));

        $this->btnEraserFilter = new QButton($this);
        $this->btnEraserFilter->CssClass = "btn btn-success";
        $this->btnEraserFilter->HtmlEntities = false;
        $this->btnEraserFilter->Text = '<i class="fas fa-eraser" aria-hidden="true"></i>';
        $this->btnEraserFilter->AddAction(new QClickEvent(), new QAjaxAction('eraseFilter_Click'));

        $searchTipo = QQ::AndCondition(
                        QQ::Equal(QQN::Restaurant()->IdUser, $this->user->IdUser)
        );
        $this->dtgRestaurants->AdditionalConditions = QQ::AndCondition($searchTipo);
        $this->dtgRestaurants->Refresh();
    }
    
    

    protected function items_Found() {
        $countProjects = Restaurant::CountAll();
        if ($countProjects == 0) {
            QApplication::ExecuteJavaScript("itemsFound(1);");
        } else {
            QApplication::ExecuteJavaScript("itemsFound(2);");
        }
    }

    public function eraseFilter_Click($strFormId, $strControlId, $strParameter) {
        $this->txtlocation->Text = "";
        $this->txtNombre->Text = "";
        $this->txtowner->Text = "";
        
        $searchTipo = QQ::All();
        $this->dtgRestaurants->AdditionalConditions = QQ::AndCondition($searchTipo);
        $this->dtgRestaurants->Refresh();
        
        QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['success']."','Filter eraser correctly!');");
        //QApplication::ExecuteJavaScript("showSuccess('Filter eraser correctly!');");
    }

    public function actionFilter_Click($strFormId, $strControlId, $strParameter) {
        $cond1= QQ::NotEqual(QQN::Restaurant()->IdRestaurant, null);
        $cond2= QQ::NotEqual(QQN::Restaurant()->IdRestaurant, null);
        $cond3= QQ::NotEqual(QQN::Restaurant()->IdRestaurant, null);
        
        if(trim($this->txtlocation->Text) != ""){
            $cond1 = QQ::OrCondition(QQ::Like(QQN::Restaurant()->Country, "%".$this->txtlocation->Text."%"),
            QQ::Like(QQN::Restaurant()->City, "%".$this->txtlocation->Text."%"));
        }
        
        if(trim($this->txtNombre->Text) != ""){
            QApplication::ExecuteJavaScript("showSuccess('".$this->txtNombre->Text."');");
            $cond2 = QQ::OrCondition(QQ::Like(QQN::Restaurant()->RestaurantName, "%".$this->txtNombre->Text."%"));
        }
        
        $this->dtgRestaurants->AdditionalConditions = QQ::AndCondition($cond1,$cond2);
        $this->dtgRestaurants->Refresh();
        
        QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['success']."','Filter correctly!');");
    }

    public function btnNewRestaurant_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogEditRestaurant->Title = addslashes("<i class='icon wb-plus'></i> New Restaurant");
        $this->dlgDialogEditRestaurant->createNew();
        $this->dlgDialogEditRestaurant->strIdUser = $this->user->IdUser;
        $this->dlgDialogEditRestaurant->ShowDialogBox();
    }

    public function planRenderLabel(User $obj) {

        if ($obj->MiningOption == 1) {
            return '<div class="label label-table label-primary">Light</div>';
        } else if ($obj->MiningOption == 2) {
            return '<div class="label label-table label-success">Standard</div>';
        } elseif ($obj->MiningOption == 3) {
            return '<div class="label label-table label-info">Power</div>';
        } elseif ($obj->MiningOption == 4) {
            return '<div class="label label-table label-warning">Super Power</div>';
        } elseif ($obj->MiningOption == 5) {
            return '<div class="label label-table label-dark">Pro Plus</div>';
        } else {
            return '<div class="label label-table label-default">None</div>';
        }
    }

    public function planRender(Restaurant $obj) {
        $controlID = 'plan' . $obj->IdRestaurant;
        $addCtrl = $this->dtgRestaurants->GetChildControl($controlID);
        if (!$addCtrl) {
            $addCtrl = new QLabel($this->dtgRestaurants, $controlID);
            $addCtrl->HtmlEntities = FALSE;
            $addCtrl->Cursor = QCursor::Pointer;
            $addCtrl->ActionParameter = $obj->IdRestaurant;
            $addCtrl->AddAction(new QClickEvent(), new QAjaxAction('plan_Click'));
        }
        $addCtrl->Text = $this->planRenderLabel($obj);
        return $addCtrl->Render(false);
    }

    protected function plan_Click($strFormId, $strControlId, $strParameter) {

        $Restaurant = Restaurant::LoadByIdRestaurant($strParameter);
        if ($Restaurant && $Restaurant->MiningOption > 0) {

            $this->lblWallet->Text = "<b>For the user:</b> $User->Email <br><br><b>The wallet Address is:</b> $Restaurant->Address";
            QApplication::ExecuteJavaScript("$('#ventaModal').modal('show');");
        } else {
            QApplication::ExecuteJavaScript("showWarning('" . htmlentities("Wallet Address is empty.") . "');");
        }
    }

    /* public function statusRender(User $obj) {

      if ($obj->StatusUser == 1) {
      return '<div class="label label-table label-warning">Register</div>';
      } else if ($obj->StatusUser == 2) {
      return '<div class="label label-table label-success">Approved</div>';
      } if ($obj->StatusUser == 3) {
      return '<div class="label label-table label-danger">Rejected</div>';
      } if ($obj->StatusUser == 4) {
      return '<div class="label label-table label-primary">Mining</div>';
      } else {
      return '<div class="label label-table label-default">None</div>';
      }
      } */

    public function imagesRender(Restaurant $obj) {
        $template='';
        if($obj->Logo == null || $obj->Logo==''){
            $template = '<div style="font-size:12px;"> not found logo! </div>';
        }else{
            $template = '<div style="font-size:12px;">'
                      . '<a href="'.__UPLOAD_PATH__."/".$obj->Logo.'"  target="_blank">Logo</a></div>';
        }
         
         
         return   /*'<div style="font-size:12px;">'
                      . '<a href="'.__UPLOAD_PATH__."/".$obj->ImagePhoto.'"  target="_blank">Photo</a></div>';*/
        $template;
        
    }

    public function loginRender(Restaurant $obj) {
        $controlID = 'login' . $obj->IdRestaurant;
        $addCtrl = $this->dtgRestaurants->GetChildControl($controlID);
        if (!$addCtrl) {
            $addCtrl = new QLabel($this->dtgRestaurants, $controlID);
            $addCtrl->HtmlEntities = FALSE;
            $addCtrl->Cursor = QCursor::Pointer;
            $addCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Login">
                            <i class="icon fa-sign-in" aria-hidden="true"></i>
                          </div>';
            $addCtrl->ActionParameter = $obj->IdRestaurant;
            $addCtrl->AddAction(new QClickEvent(), new QAjaxAction('login_Click'));
        }
        return '<center>' . $addCtrl->Render(false) . '</center>';
    }

    protected function login_Click($strFormId, $strControlId, $strParameter) {
        $User = Usuario::LoadByIdUsuario($strParameter);

        if ($User) {
            $User->Password = 'NULL';
            $_SESSION['TobUser'] = serialize($User);
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/profileuser');
            return;
        }
    }

    public function permisoRender(Restaurant $obj) {
        $controlID = 'perm' . $obj->IdRestaurant;
        $addCtrl = $this->dtgRestaurants->GetChildControl($controlID);
        if (!$addCtrl) {
            $addCtrl = new QLabel($this->dtgRestaurants, $controlID);
            $addCtrl->HtmlEntities = FALSE;
            $addCtrl->Cursor = QCursor::Pointer;
            $addCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Permiso">
                            <i class="icon fa-check" aria-hidden="true"></i>
                          </div>';
            $addCtrl->ActionParameter = $obj->IdRestaurant;
            $addCtrl->AddAction(new QClickEvent(), new QAjaxAction('permiso_Click'));
        }
        return '<center>' . $addCtrl->Render(false) . '</center>';
    }

    protected function permiso_Click($strFormId, $strControlId, $strParameter) {

        $this->dlgDialogPermit->Title = addslashes("<i class='icon wb-edit'></i> Permisos Usuario");
        $this->dlgDialogPermit->loadDefault($strParameter);
        $this->dlgDialogPermit->ShowDialogBox();

        //$strJavaScript ="$('[data-plugin=\"switchery\"]').load();";
        //QApplication::ExecuteJavaScript($strJavaScript);
    }

    public function actionsRender(Restaurant $id) {
        $controlID = 'edit' . $id->IdRestaurant;
        $editCtrl = $this->dtgRestaurants->GetChildControl($controlID);
        if (!$editCtrl) {
            $editCtrl = new QLabel($this->dtgRestaurants, $controlID);
            $editCtrl->HtmlEntities = FALSE;
            $editCtrl->Cursor = QCursor::Pointer;
            $editCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                            <i class="icon wb-edit" aria-hidden="true"></i>
                          </div>';
            $editCtrl->ActionParameter = $id->IdRestaurant;
            $editCtrl->AddAction(new QClickEvent(), new QAjaxAction('edit_Click'));
        }

        $controlID2 = 'del' . $id->IdRestaurant;
        $deleteCtrl = $this->dtgRestaurants->GetChildControl($controlID2);
        if (!$deleteCtrl) {
            $deleteCtrl = new QLabel($this->dtgRestaurants, $controlID2);
            $deleteCtrl->HtmlEntities = FALSE;
            $deleteCtrl->Cursor = QCursor::Pointer;
            $deleteCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Delete">
                            <i class="icon wb-trash" aria-hidden="true"></i>
                          </div>';
            $deleteCtrl->ActionParameter = $id->IdRestaurant;
            $deleteCtrl->AddAction(new QClickEvent(), new QAjaxAction('delete_Click'));
        }

        $controlID3 = 'qr' . $id->IdRestaurant;
        $qrCtrl = $this->dtgRestaurants->GetChildControl($controlID3);
        if (!$qrCtrl) {
            $qrCtrl = new QLabel($this->dtgRestaurants, $controlID3);
            $qrCtrl->HtmlEntities = FALSE;
            $qrCtrl->Cursor = QCursor::Pointer;
            $qrCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="QR Code">
                            <i class="fas fa-qrcode" aria-hidden="true"></i>
                          </div>';
            $qrCtrl->ActionParameter = $id->IdRestaurant;
            $qrCtrl->AddAction(new QClickEvent(), new QAjaxAction('qr_Click'));
        }

        return "<center>" . $editCtrl->Render(false) . ' ' . $deleteCtrl->Render(false) . ' ' . $qrCtrl->Render(false)  . "</center>";
    }

    public function printQr_Click($strFormId, $strControlId, $strParameter) {

        $ruta = __VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/qrimages/' . $strParameter . '.png';

        QApplication::ExecuteJavaScript("printQrImage('" . $ruta . "');");

//        $this->dlgQRConfirm->Title = addslashes("<i class='fas fa-qrcode'></i> QR Code");
//        $this->dlgQRConfirm->txtMessage = $ruta;
//        $this->dlgQRConfirm->loadDefault($strParameter);
//        $this->dlgQRConfirm->ShowDialogBox();
    }

    public function edit_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogEditRestaurant->Title = addslashes("<i class='icon wb-edit'></i> Edit Restaurant");
        $this->dlgDialogEditRestaurant->loadDefault($strParameter);
        $this->dlgDialogEditRestaurant->ShowDialogBox();
    }

    public function delete_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgConfirm->Title = addslashes("<i class='icon wb-warning'></i> Confirm Delete");
        $this->dlgConfirm->txtMessage = "Are you sure you want to delete this user?";
        $this->dlgConfirm->ID = intval($strParameter);
        $this->dlgConfirm->ShowDialogBox();
    }

    public function qr_Click($strFormId, $strControlId, $strParameter) {

        $pathToRender = __VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/qrimages/' . $strParameter . '.png';
        $filePath = __QR_IMAGES__ . "/" . $strParameter . '.png';
        
        if (file_exists($filePath)) {
            $this->dlgDownloadPrintFile->Title = addslashes("<i class='fas fa-qrcode'></i> QR Code");
            $this->dlgDownloadPrintFile->txtMessage = "What do you want to do?";
            $this->dlgDownloadPrintFile->loadDefault($strParameter);
            $this->dlgDownloadPrintFile->strPathFile = $pathToRender ;
            $this->dlgDownloadPrintFile->ShowDialogBox();
        } else {
            $this->dlgQRConfirm->Title = addslashes("<i class='fas fa-qrcode'></i> QR Code");
            $this->dlgQRConfirm->txtMessage = "Do you want generate QR code?";
            $this->dlgQRConfirm->loadDefault($strParameter);
            $this->dlgQRConfirm->ShowDialogBox();
        }
    }

    protected function delete($id) {
        try {
            $restaurants = Restaurant::LoadByIdRestaurant(intval($id));
            $restaurants->Delete();
            $this->items_Found();
            //QApplication::ExecuteJavaScript("showSuccess('Deleted successfully!');");
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['success']."','Deleted successfully!');");
        } catch (QMySqliDatabaseException $ex) {
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['warning']."','".str_replace("'", "\'", $ex->getMessage())."');");
            //QApplication::ExecuteJavaScript("showWarning('Error " . str_replace("'", "\'", $ex->getMessage()) . "');");
        }
    }

    public function close_edit($update) {
        if ($update) {
            $this->dtgRestaurants->Refresh();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['success']."','Data updated correctly!');");
        }
    }

    public function close_confirm($answer, $id) {
        if ($answer) {
            $this->delete($id);
        }
        $this->dtgRestaurants->Refresh();
    }

}

ViewListOwnerRestaurantForm::Run('ViewListOwnerRestaurantForm');
?>