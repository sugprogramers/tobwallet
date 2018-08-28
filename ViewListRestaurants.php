<?php

require('includes/configuration/prepend.inc.php');
//require_once('dialog/DialogEditUser.php');
require_once('dialog/DialogEditRestaurant.php');
require_once('dialog/DialogConfirm.php');
require_once('dialog/DialogQR.php');
require('general.php');

//require('qrcode/phpqrcode.php');

class ViewListRestaurantForm extends QForm {

    protected $user;
    protected $restaurant;
    
    protected $dtgUsuarios;
    protected $dtgRestaurants;
    
    protected $btnNewRestaurant;
    protected $dlgConfirm;
    protected $dlgDialogEditRestaurant;
    protected $dlgDialogPermit;
    protected $lblWallet;
    
    protected $txtNombre;
    protected $btnFilter;
    
    protected  $dlgQRConfirm;

    protected function Form_Run() {

        $Datos1 = @unserialize($_SESSION['DatosAdministrador']);

        if ($Datos1) {
            $this->user = Administrator::LoadByEmail($Datos1->Email);
        } else {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/login');
        }
        $this->items_Found();
    }

    protected function Form_Create() {
        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->dlgDialogEditRestaurant = new DialogEditRestaurant($this, 'close_edit');
        $this->dlgConfirm = new DialogConfirm($this, "close_confirm");
        $this->dlgQRConfirm = new DialogQR($this, "close_edit");
        
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
        
        $this->dtgRestaurants->MetaAddColumn('IdRestaurant', "Name=ID");
        //$this->dtgRestaurants->MetaAddColumn('Email');
        //$this->dtgRestaurants->MetaAddColumn('OwnerFirstName');
        //$this->dtgRestaurants->MetaAddColumn('OwnerLastName');
        //$this->dtgRestaurants->MetaAddColumn('OwnerMiddleName');
        $this->dtgRestaurants->MetaAddColumn('Country');
        $this->dtgRestaurants->MetaAddColumn('City');
        $this->dtgRestaurants->MetaAddColumn('Address');
        $this->dtgRestaurants->MetaAddColumn('RestaurantName');
        $this->dtgRestaurants->MetaAddColumn('Longitude');
        $this->dtgRestaurants->MetaAddColumn('Latitude');
        
        $this->dtgRestaurants->AddColumn(new QDataGridColumn('', '<?= $_FORM->actionsRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=100'));

        
        
        $this->lblWallet = new QLabel($this);
        $this->lblWallet->HtmlEntities = false;
        
        $this->btnNewRestaurant = new QButton($this);
        $this->btnNewRestaurant->Text = '<i class="icon wb-plus" aria-hidden="true"></i>';
        $this->btnNewRestaurant->CssClass = "site-action-toggle btn-raised btn btn-primary btn-floating";
        $this->btnNewRestaurant->HtmlEntities = false;
        $this->btnNewRestaurant->AddAction(new QClickEvent(), new QAjaxAction('btnNewRestaurant_Click'));
        
        $this->txtNombre = new QTextBox($this);
        $this->txtNombre->Placeholder = "Email or Firtname or Lastname";

        $this->btnFilter = new QButton($this);
        $this->btnFilter->CssClass = "btn btn-success";
        $this->btnFilter->HtmlEntities = false;
        $this->btnFilter->Text = '<i class="icon fa-filter" aria-hidden="true"></i>';
        $this->btnFilter->AddAction(new QClickEvent(), new QAjaxAction('actionFilter_Click'));
        
    }

    protected function items_Found() {
        $countProjects = Restaurant::CountAll();
        if ($countProjects == 0) {
            QApplication::ExecuteJavaScript("itemsFound(1);");
        } else {
            QApplication::ExecuteJavaScript("itemsFound(2);");
        }
    }
    
     public function actionFilter_Click($strFormId, $strControlId, $strParameter) {
        if (trim($this->txtNombre->Text != "")) {
            $searchTipo = QQ::OrCondition(
                    QQ::Like(QQN::Restaurant()->RestaurantName, "%".trim($this->txtNombre->Text)."%")/*,
                    QQ::Like(QQN::Restaurant()->OwnerLastName, "%".trim($this->txtNombre->Text)."%"),
                    QQ::Like(QQN::Restaurant()->Email, "%".trim($this->txtNombre->Text)."%")*/
                    
             );
        }
        else {
            $searchTipo = QQ::All();
        }

        /*$this->dtgUsuarios->AdditionalConditions = QQ::AndCondition(
            $searchTipo
        );*/
        
        $this->dtgRestaurants->AdditionalConditions = QQ::AndCondition($searchTipo);

        //$this->dtgUsuarios->Refresh();
        $this->dtgRestaurants->Refresh();

        QApplication::ExecuteJavaScript("showSuccess('Filter correctly!');");
    }

    public function btnNewRestaurant_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogEditRestaurant->Title = addslashes("<i class='icon wb-plus'></i> New Restaurant");
        $this->dlgDialogEditRestaurant->createNew();
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
        return  $addCtrl->Render(false) ;
    }
    
    protected function plan_Click($strFormId, $strControlId, $strParameter) {
        
        $Restaurant = Restaurant::LoadByIdRestaurant($strParameter);
        if($Restaurant && $Restaurant->MiningOption>0) {
            
            $this->lblWallet->Text = "<b>For the user:</b> $User->Email <br><br><b>The wallet Address is:</b> $Restaurant->Address";
            QApplication::ExecuteJavaScript("$('#ventaModal').modal('show');");
        }
        else{
             QApplication::ExecuteJavaScript("showWarning('" . htmlentities("Wallet Address is empty.") . "');");
        }
    }
    

    /*public function statusRender(User $obj) {

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
    }*/

    
    
     public function imagesRender(User $obj) {
         
         
         return   '<div style="font-size:12px;"><a href="'.__UPLOAD_PATH__."/".$obj->ImageDriver.'" target="_blank" >Driver License</a>'
                      . '<br>'
                      . '<a href="'.__UPLOAD_PATH__."/".$obj->ImagePhoto.'"  target="_blank">Photo</a></div>';
        
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
            $_SESSION['DatosUsuario'] = serialize($User);
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
        if (!$qrCtrl){
            $qrCtrl = new QLabel($this->dtgRestaurants, $controlID3);
            $qrCtrl->HtmlEntities=FALSE;
            $qrCtrl->Cursor = QCursor::Pointer;
            $qrCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="QR Code">
                            <i class="fas fa-qrcode" aria-hidden="true"></i>
                          </div>';
            $qrCtrl->ActionParameter = $id->IdRestaurant;
            $qrCtrl->AddAction(new QClickEvent(), new QAjaxAction('qr_Click'));
        }

        return "<center>" . $editCtrl->Render(false) . ' ' . $deleteCtrl->Render(false) . ' ' . $qrCtrl->Render(false) . "</center>";
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
    
    public function qr_Click($strFormId, $strControlId, $strParameter){
        $this->dlgQRConfirm->Title = addslashes("<i class='fas fa-qrcode'></i> QR Code");
        $this->dlgQRConfirm->txtMessage = "You want to generate QR code?";
        $this->dlgQRConfirm->ID = intval($strParameter);
        $this->dlgQRConfirm->ShowDialogBox();
    }

    protected function delete($id) {
        try {
            $restaurants = Restaurant::LoadByIdRestaurant(intval($id));
            $restaurants->Delete();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showSuccess('Deleted successfully!');");
        } catch (QMySqliDatabaseException $ex) {
            QApplication::ExecuteJavaScript("showWarning('Error " . str_replace("'", "\'", $ex->getMessage()) . "');");
        }
    }

    public function close_edit($update) {
        if ($update) {
            $this->dtgRestaurants->Refresh();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showSuccess('Data updated correctly');");
        }
    }

    public function close_confirm($answer, $id) {
        if ($answer) {
            $this->delete($id);
        }
        $this->dtgRestaurants->Refresh();
    }

}

ViewListRestaurantForm::Run('ViewListRestaurantForm');
?>