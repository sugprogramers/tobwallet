<?php

require('includes/configuration/prepend.inc.php');
//require_once('dialog/DialogEditUser.php');
require_once('dialog/DialogEditRestaurant.php');
require_once('dialog/DialogConfirm.php');
require_once('dialog/DialogQR.php');
require('general.php');

class DashboardRestaurantForm extends QForm {

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
    protected $btnEraserFilter;
    protected $dlgQRConfirm;
    
    protected $btnViewOffers;

    protected function Form_Run() {

        $Datos1 = @unserialize($_SESSION['TobUser']);

        if ($Datos1 && $Datos1->UserType == "C") {
            $this->user = User::LoadByEmail($Datos1->Email);
        } else {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/login');
        }
        $this->items_Found();
    }

    protected function Form_Create() {
        $this->objDefaultWaitIcon = new QWaitIcon($this);
        
        $this->dtgRestaurants = new QDataRepeater($this);
        $this->dtgRestaurants->Paginator = new QPaginator($this->dtgRestaurants);
        $this->dtgRestaurants->ItemsPerPage = 12;
        $this->dtgRestaurants->CssClass = 'table table-bordered table-striped toggle-circle';
        $this->dtgRestaurants->UseAjax = true;
        
        $this->dtgRestaurants->Template = 'dgTemplates/dg_tplrestaurants.tpl.php';
        
        $this->dtgRestaurants->SetDataBinder('setDataSource');
        
        $this->lblWallet = new QLabel($this);
        $this->lblWallet->HtmlEntities = false;
        
        $this->txtNombre = new QTextBox($this);
        $this->txtNombre->Placeholder = "Restaurant Name";

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
        
        $this->btnViewOffers = new QButton($this);
        $this->btnViewOffers->CssClass = "btn btn-info";
        $this->btnViewOffers->AddAction(new QClickEvent(), new QAjaxAction('viewOffers_Click'));
    }
    
    public function Template_Render($objItem, $intIndex){
        $template = '<div class="col-sm-4"><div class="row" style="height:180px">'.
                '<div class="col-sm-12">'
                .'<img scr="'. __VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/upload/' . $objItem->Logo .'"/></div>'
                .'</div></div>';
    }
    
    public function viewOffers_Click($strFormId, $strControlId, $strParameter) {
        QApplication::ExecuteJavaScript("showSuccess('Funciona :v ');");
    }
    
    
    protected  function setDataSource(){
        $this->dtgRestaurants->TotalItemCount = Restaurant::CountAll();
        $this->dtgRestaurants->DataSource = Restaurant::LoadAll(QQ::Clause($this->dtgRestaurants->LimitClause));
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
        $this->txtNombre->Text = "";
        
        $searchTipo = QQ::All();
        $this->dtgRestaurants->AdditionalConditions = QQ::AndCondition($searchTipo);
        $this->dtgRestaurants->Refresh();
        
        QApplication::ExecuteJavaScript("showSuccess('Filter eraser correctly!');");
    }
    
    public function actionFilter_Click($strFormId, $strControlId, $strParameter) {
        if (trim($this->txtNombre->Text != "")) {
            $searchTipo = QQ::OrCondition(
                    QQ::Like(QQN::Restaurant()->RestaurantName, "%".trim($this->txtNombre->Text)."%")
             );
        }
        else {
            $searchTipo = QQ::All();
        }
        
        $this->dtgRestaurants->AdditionalConditions = QQ::AndCondition($searchTipo);
        $this->dtgRestaurants->Refresh();

        QApplication::ExecuteJavaScript("showSuccess('Filter correctly!');");
    }
    
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

DashboardRestaurantForm::Run('DashboardRestaurantForm');
?>