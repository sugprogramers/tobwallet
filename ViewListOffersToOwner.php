<?php

require('includes/configuration/prepend.inc.php');
//require_once('dialog/DialogEditUser.php');
require_once('dialog/DialogEditRestaurant.php');
require_once('dialog/DialogConfirm.php');
require_once('dialog/DialogEditOffer.php');
require_once('dialog/DialogQR.php');
require('general.php');

//require('qrcode/phpqrcode.php');

class ViewListOffersToOwnerForm extends QForm {

    protected $user;
    protected $restaurant;
    protected $dtgUsuarios;
    protected $dtgOffers;
    protected $btnNewOffer;
    protected $dlgConfirm;
    protected $dlgDialogEditOffer;
    protected $dlgDialogPermit;
    protected $lblWallet;
    protected $txtNombre;
    protected $btnFilter;
    protected  $dlgQRConfirm;
    
    
    protected $btnEraserFilter;
    
    protected $calCalendarPopup;
    protected $txtFilterFrom;
    protected $btnFilterFrom;
    
    protected $txtFilterTo;
    
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
        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->dlgDialogEditOffer = new DialogEditOffer($this, 'close_edit', NULL, $this->user->IdUser);
        $this->dlgConfirm = new DialogConfirm($this, "close_confirm");
        $this->dlgQRConfirm = new DialogQR($this, "close_edit");
        
        $this->dtgOffers = new OfferDataGrid($this);
        $this->dtgOffers->Paginator = new QPaginator($this->dtgOffers);
        $this->dtgOffers->Paginator->strLabelForPrevious = '<i class="icon wb-chevron-left-mini"></i>';
        $this->dtgOffers->Paginator->strLabelForNext = '<i class="icon wb-chevron-right-mini"></i>';
        $this->dtgOffers->ItemsPerPage = 20;
        $this->dtgOffers->CssClass = 'table table-bordered table-striped toggle-circle';
        $this->dtgOffers->UseAjax = true;
        $this->dtgOffers->WaitIcon = $this->objDefaultWaitIcon;
        $this->dtgOffers->ShowFilter = false;
        $this->dtgOffers->SortColumnIndex = 4;
        $this->dtgOffers->SortDirection = true;
        
        //$this->dtgOffers->MetaAddColumn('IdOffer', "Name=ID");
        $this->dtgOffers->MetaAddColumn('Description');
        $this->dtgOffers->MetaAddColumn('OfferedCoins', "Name=Coins per Person");
        $this->dtgOffers->MetaAddColumn('MaxOffers', "Name=Total Offers");
        //$this->dtgOffers->MetaAddColumn('AppliedOffers', "Name=Available Offers");
        
        $this->dtgOffers->AddColumn(new QDataGridColumn('Available Offers', '<?= $_FORM->getAvailableOffersRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=100'));
        
        $this->dtgOffers->AddColumn(new QDataGridColumn('Restaurant', '<?= $_FORM->getRestaurantInfoRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=100'));
        
        $this->dtgOffers->MetaAddColumn('DateFrom', "Name=Valid From");
        $this->dtgOffers->MetaAddColumn('DateTo', "Name=Valid To");
        
        $this->dtgOffers->AddColumn(new QDataGridColumn('', '<?= $_FORM->actionsRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=100'));
        
        $this->lblWallet = new QLabel($this);
        $this->lblWallet->HtmlEntities = false;
        
        $this->btnNewOffer = new QButton($this);
        $this->btnNewOffer->Text = '<i class="icon wb-plus" aria-hidden="true"></i>';
        $this->btnNewOffer->CssClass = "site-action-toggle btn-raised btn btn-primary btn-floating";
        $this->btnNewOffer->HtmlEntities = false;
        $this->btnNewOffer->AddAction(new QClickEvent(), new QAjaxAction('btnNewOffer_Click'));
        
        $this->txtNombre = new QTextBox($this);
        $this->txtNombre->Placeholder = "Description";

        $this->btnFilter = new QButton($this);
        $this->btnFilter->CssClass = "btn btn-success";
        $this->btnFilter->HtmlEntities = false;
        $this->btnFilter->Text = '<i class="icon fa-filter" aria-hidden="true"></i>';
        $this->btnFilter->AddAction(new QClickEvent(), new QAjaxAction('actionFilter_Click'));
        
        /*
        $this->calCalendarPopup = new QCalendar($this);
        $this->txtFilterFrom = new QDateTimeTextBox($this);
        $this->btnFilterFrom = new QCalendar($this, $this->txtFilterFrom);
        $this->txtFilterFrom->AddAction(new QFocusEvent(), new QBlurControlAction($this->txtFilterFrom));
        $this->txtFilterFrom->AddAction(new QClickEvent(), new QShowCalendarAction($this->btnFilterFrom));
        */
        
        
        //$this->txtFilterTo = new QDateTimeTextBox($this);
        
        $this->btnEraserFilter = new QButton($this);
        $this->btnEraserFilter->CssClass = "btn btn-success";
        $this->btnEraserFilter->HtmlEntities = false;
        $this->btnEraserFilter->Text = '<i class="fas fa-eraser" aria-hidden="true"></i>';
        $this->btnEraserFilter->AddAction(new QClickEvent(), new QAjaxAction('eraseFilter_Click'));
        
        $this->alertTypes = getAlertTypes();
        
    }

    protected function items_Found() {
        $countProjects = Offer::CountAll();
        if ($countProjects == 0) {
            QApplication::ExecuteJavaScript("itemsFound(1);");
        } else {
            QApplication::ExecuteJavaScript("itemsFound(2);");
        }
    }
    
    public function eraseFilter_Click($strFormId, $strControlId, $strParameter) {
        //$this->txtFilterFrom->Text = "";
        //$this->txtFilterTo->Text = "";
        $this->txtNombre->Text = "";
        
        $searchTipo = QQ::All();
        $this->dtgOffers->AdditionalConditions = QQ::AndCondition($searchTipo);
        $this->dtgOffers->Refresh();
        
        QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['success']."','Filter eraser correctly!');");
        //QApplication::ExecuteJavaScript("showSuccess('Filter eraser correctly!');");
    }
    
     public function actionFilter_Click($strFormId, $strControlId, $strParameter) {
        if (trim($this->txtNombre->Text != "")) {
            $searchTipo = QQ::OrCondition(
                    QQ::Like(QQN::Offer()->Description, "%".trim($this->txtNombre->Text)."%")
             );
        }
        else {
            $searchTipo = QQ::All();
        }
        
        $this->dtgOffers->AdditionalConditions = QQ::AndCondition($searchTipo);
        
        $this->dtgOffers->Refresh();
        QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['success']."','Filter correctly!');");
        //QApplication::ExecuteJavaScript("showSuccess('Filter correctly!');");
    }

    public function btnNewOffer_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogEditOffer->Title = addslashes("<i class='icon wb-plus'></i> New Offer");
        $this->dlgDialogEditOffer->createNew();
        $this->dlgDialogEditOffer->ShowDialogBox();
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
    
    public function planRender(Offer $obj) {
        $controlID = 'plan' . $obj->IdRestaurant;
        $addCtrl = $this->dtgOffers->GetChildControl($controlID);
        if (!$addCtrl) {
            $addCtrl = new QLabel($this->dtgOffers, $controlID);
            $addCtrl->HtmlEntities = FALSE;
            $addCtrl->Cursor = QCursor::Pointer;            
            $addCtrl->ActionParameter = $obj->IdOffer;
            $addCtrl->AddAction(new QClickEvent(), new QAjaxAction('plan_Click'));
        }
        $addCtrl->Text = $this->planRenderLabel($obj);
        return  $addCtrl->Render(false) ;
    }
    
    protected function plan_Click($strFormId, $strControlId, $strParameter) {
        
        $offer = Offer::LoadByIdOffer($strParameter);
        
    }
    
     public function imagesRender(User $obj) {
         return   '<div style="font-size:12px;"><a href="'.__UPLOAD_PATH__."/".$obj->ImageDriver.'" target="_blank" >Driver License</a>'
                      . '<br>'
                      . '<a href="'.__UPLOAD_PATH__."/".$obj->ImagePhoto.'"  target="_blank">Photo</a></div>';
        
     }

    public function loginRender(Restaurant $obj) {
        $controlID = 'login' . $obj->IdRestaurant;
        $addCtrl = $this->dtgOffers->GetChildControl($controlID);
        if (!$addCtrl) {
            $addCtrl = new QLabel($this->dtgOffers, $controlID);
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
        $addCtrl = $this->dtgOffers->GetChildControl($controlID);
        if (!$addCtrl) {
            $addCtrl = new QLabel($this->dtgOffers, $controlID);
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
    
    public function getAvailableOffersRender(Offer $obj){
        $availableqty=(int)$obj->MaxOffers - (int)$obj->AppliedOffers;
        $template = "";
        
        try{
            $template = "<span>".$availableqty."</span>";
        } catch (Exception $ex) {
            $template="";
        }
        return $template;
    }
    
    public function getRestaurantInfoRender(Offer $obj){
        $restaurant = Restaurant::LoadByIdRestaurant($obj->IdRestaurant);
        $template = "";
        
        try{
            $template = "<span>".$restaurant->RestaurantName." / Address: ".$restaurant->Address."</span>";
        } catch (Exception $ex) {
            $template="";
        }
        
        return $template;
    }

    public function actionsRender(Offer $id) {
        $controlID = 'edit' . $id->IdOffer;
        $editCtrl = $this->dtgOffers->GetChildControl($controlID);
        if (!$editCtrl) {
            $editCtrl = new QLabel($this->dtgOffers, $controlID);
            $editCtrl->HtmlEntities = FALSE;
            $editCtrl->Cursor = QCursor::Pointer;
            $editCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                            <i class="icon wb-edit" aria-hidden="true"></i>
                          </div>';
            $editCtrl->ActionParameter = $id->IdOffer;
            $editCtrl->AddAction(new QClickEvent(), new QAjaxAction('edit_Click'));
        }

        $controlID2 = 'del' . $id->IdOffer;
        $deleteCtrl = $this->dtgOffers->GetChildControl($controlID2);
        if (!$deleteCtrl) {
            $deleteCtrl = new QLabel($this->dtgOffers, $controlID2);
            $deleteCtrl->HtmlEntities = FALSE;
            $deleteCtrl->Cursor = QCursor::Pointer;
            $deleteCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Delete">
                            <i class="icon wb-trash" aria-hidden="true"></i>
                          </div>';
            $deleteCtrl->ActionParameter = $id->IdOffer;
            $deleteCtrl->AddAction(new QClickEvent(), new QAjaxAction('delete_Click'));
        }

        return "<center>" . $editCtrl->Render(false) . ' ' . $deleteCtrl->Render(false) . "</center>";
    }

    public function edit_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogEditOffer->Title = addslashes("<i class='icon wb-edit'></i> Edit Restaurant");
        $this->dlgDialogEditOffer->loadDefault($strParameter);
        $this->dlgDialogEditOffer->ShowDialogBox();
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
        $this->dlgQRConfirm->loadDefault($strParameter);
        $this->dlgQRConfirm->ShowDialogBox();
    }

    protected function delete($id) {
        try {
            $offers = Restaurant::LoadByIdRestaurant(intval($id));
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
            $this->dtgOffers->Refresh();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['success']."','Data updated correctly!');");
            //QApplication::ExecuteJavaScript("showSuccess('Data updated correctly');");
        }
    }

    public function close_confirm($answer, $id) {
        if ($answer) {
            $this->delete($id);
        }
        $this->dtgOffers->Refresh();
    }

}

ViewListOffersToOwnerForm::Run('ViewListOffersToOwnerForm');
?>