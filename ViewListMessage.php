<?php
require('includes/configuration/prepend.inc.php');
require_once('dialog/DialogMessage.php');

require_once('dialog/DialogEditUser.php');
require_once('dialog/DialogConfirm.php');
require_once('dialog/DialogAddCoins.php');
require('general.php');
require('utilities.php');

class ViewListMessage extends QForm {

    protected $user;
    protected $dtgMessages;
    protected $btnNewMessage;
    protected $dlgConfirm;
    
    protected $dlgDialogAddCoins;
    
    protected $dlgDialogMessage;
    protected $lblWallet;
    
    protected $txtNombre;
    protected $lstFilterUserType;
    protected $lstFilterUserStatus;
    protected $btnFilter;
    
    protected $alertTypes;
    
    protected $btnEraserFilter;

    protected function Form_Run() {

        $Datos1 = @unserialize($_SESSION['TobAdmin']);

        if ($Datos1) {
            $this->user = Administrator::LoadByEmail($Datos1->Email);
        } else {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/login');
        }
        $this->items_Found();
    }

    protected function Form_Create() {
        $this->objDefaultWaitIcon = new QWaitIcon($this);
        
        $this->dlgDialogMessage = new DialogMessage($this, 'close_edit');
        
        $this->dlgConfirm = new DialogConfirm($this, "close_confirm");
        $this->dtgMessages = new UserDataGrid($this);
        $this->dtgMessages->Paginator = new QPaginator($this->dtgMessages);
        $this->dtgMessages->Paginator->strLabelForPrevious = '<i class="icon wb-chevron-left-mini"></i>';
        $this->dtgMessages->Paginator->strLabelForNext = '<i class="icon wb-chevron-right-mini"></i>';
        $this->dtgMessages->ItemsPerPage = 20;
        $this->dtgMessages->CssClass = 'table table-bordered table-striped toggle-circle';
        $this->dtgMessages->UseAjax = true;
        $this->dtgMessages->WaitIcon = $this->objDefaultWaitIcon;
        $this->dtgMessages->ShowFilter = false;
        $this->dtgMessages->SortColumnIndex = 4;
        $this->dtgMessages->SortDirection = true;
        
        $this->dtgMessages->AddColumn(new QDataGridColumn('Email', '<?= $_ITEM->Email ?>', 'Width=120'));
        
        //$this->dtgMessages->MetaAddColumn('Password');
        $this->dtgMessages->MetaAddColumn('FirstName');
        $this->dtgMessages->MetaAddColumn('LastName');
        
        $this->dtgMessages->AddColumn(new QDataGridColumn('User Type', '<?= $_FORM->userTypeRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=100',
                array('OrderByClause' => QQ::OrderBy(QQN::User()->UserType), 'ReverseOrderByClause' => QQ::OrderBy(QQN::User()->UserType, false))));
        
        $this->dtgMessages->AddColumn(new QDataGridColumn('Status', '<?= $_FORM->statusRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=100',
              array('OrderByClause' => QQ::OrderBy(QQN::User()->StatusUser), 'ReverseOrderByClause' => QQ::OrderBy(QQN::User()->StatusUser, false))));
        
        $this->dtgMessages->MetaAddColumn('Totalqtycoins');
        
        $this->dtgMessages->AddColumn(new QDataGridColumn('Images', '<?= $_FORM->imagesRender($_ITEM); ?>', 'HtmlEntities=false'));
        
        $this->dtgMessages->AddColumn(new QDataGridColumn('', '<?= $_FORM->actionsRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=100'));
        
        $this->lblWallet = new QLabel($this);
        $this->lblWallet->HtmlEntities = false;
        
        $this->btnNewMessage = new QButton($this);
        $this->btnNewMessage->Text = '<i class="icon wb-plus" aria-hidden="true"></i>';
        $this->btnNewMessage->CssClass = "site-action-toggle btn-raised btn btn-primary btn-floating";
        $this->btnNewMessage->HtmlEntities = false;
        $this->btnNewMessage->AddAction(new QClickEvent(), new QAjaxAction('btnNewMessage_Click'));
        
        $this->txtNombre = new QTextBox($this);
        $this->txtNombre->Placeholder = "Email or Firtname or Lastname";

        $this->btnFilter = new QButton($this);
        $this->btnFilter->CssClass = "btn btn-success";
        $this->btnFilter->HtmlEntities = false;
        $this->btnFilter->Text = '<i class="icon fa-filter" aria-hidden="true"></i>';
        $this->btnFilter->AddAction(new QClickEvent(), new QAjaxAction('actionFilter_Click'));
        
        $this->alertTypes = getAlertTypes();
        
        $this->btnEraserFilter = new QButton($this);
        $this->btnEraserFilter->CssClass = "btn btn-success";
        $this->btnEraserFilter->HtmlEntities = false;
        $this->btnEraserFilter->Text = '<i class="fas fa-eraser" aria-hidden="true"></i>';
        $this->btnEraserFilter->AddAction(new QClickEvent(), new QAjaxAction('eraseFilter_Click'));
        
        $this->lstFilterUserType = new QListBox($this);
        $this->lstFilterUserType->CssClass = "form-control input-sm editHidden";
        $this->lstFilterUserType->AddItem(new QListItem("User Type", "S"));
        foreach(getUserTypes() as $x => $x_value) {
            $this->lstFilterUserType->AddItem(new QListItem($x_value, $x));
        }
        
        $this->lstFilterUserStatus = new QListBox($this);
        $this->lstFilterUserStatus->CssClass = "form-control input-sm editHidden";
        $this->lstFilterUserStatus->AddItem(new QListItem("User Status", 0));
        foreach(getStatusUsers() as $x => $x_value) {
            $this->lstFilterUserStatus->AddItem(new QListItem($x_value, $x));
        }
    }

    protected function items_Found() {
        $countProjects = User::CountAll();
        if ($countProjects == 0) {
            QApplication::ExecuteJavaScript("itemsFound(1);");
        } else {
            QApplication::ExecuteJavaScript("itemsFound(2);");
        }
    }
    
    public function eraseFilter_Click($strFormId, $strControlId, $strParameter) {
        $this->lstFilterUserType->SelectedValue = "S";
        $this->lstFilterUserStatus->SelectedValue = 0;
        $this->txtNombre->Text = "";
        $searchTipo = QQ::All();
        $this->dtgMessages->AdditionalConditions = QQ::AndCondition($searchTipo);
        $this->dtgMessages->Refresh();
        
        QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['success']."','Filter eraser correctly!');");
        //QApplication::ExecuteJavaScript("showSuccess('Filter eraser correctly!');");
    }
    
     public function actionFilter_Click($strFormId, $strControlId, $strParameter) {
        $cond1= QQ::NotEqual(QQN::User()->IdUser, null);
        $cond2= QQ::NotEqual(QQN::User()->IdUser, null);
        $cond3= QQ::NotEqual(QQN::User()->IdUser, null);
        
        if($this->lstFilterUserType->SelectedValue != "S"){
            $cond1 = QQ::Equal(QQN::User()->UserType, $this->lstFilterUserType->SelectedValue);
        }else{
            $cond1= QQ::NotEqual(QQN::User()->IdUser, null);
        }
        
        if($this->lstFilterUserStatus->SelectedValue != 0){
            $cond2 = QQ::Equal(QQN::User()->StatusUser, $this->lstFilterUserStatus->SelectedValue);
        }else{
            $cond2= QQ::NotEqual(QQN::User()->IdUser, null);
        }
        
        if(trim($this->txtNombre->Text) != ""){
            $cond3 = QQ::OrCondition(
                    QQ::Like(QQN::User()->FirstName, "%".trim($this->txtNombre->Text)."%"),
                    QQ::Like(QQN::User()->LastName, "%".trim($this->txtNombre->Text)."%"),
                    QQ::Like(QQN::User()->Email, "%".trim($this->txtNombre->Text)."%")
             );
        }else{
            $cond3= QQ::NotEqual(QQN::User()->IdUser, null);
        }

        $this->dtgMessages->AdditionalConditions = QQ::AndCondition($cond1, $cond2, $cond3);
        $this->dtgMessages->Refresh();

        //QApplication::ExecuteJavaScript("showSuccess('Filter correctly!');");
        QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['success']."','Filter correctly!');");
    }

    public function btnNewMessage_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogEditUser->Title = addslashes("<i class='icon wb-plus'></i> New User");
        $this->dlgDialogEditUser->createNew();
        $this->dlgDialogEditUser->ShowDialogBox();
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
    
    public function planRender(User $obj) {
        $controlID = 'plan' . $obj->IdUser;
        $addCtrl = $this->dtgMessages->GetChildControl($controlID);
        if (!$addCtrl) {
            $addCtrl = new QLabel($this->dtgMessages, $controlID);
            $addCtrl->HtmlEntities = FALSE;
            $addCtrl->Cursor = QCursor::Pointer;            
            $addCtrl->ActionParameter = $obj->IdUser;
            $addCtrl->AddAction(new QClickEvent(), new QAjaxAction('plan_Click'));
        }
        $addCtrl->Text = $this->planRenderLabel($obj);
        return  $addCtrl->Render(false) ;
    }
    
    protected function plan_Click($strFormId, $strControlId, $strParameter) {
        $User = User::LoadByIdUser($strParameter);
        if($User && $User->MiningOption>0) {
            
            $this->lblWallet->Text = "<b>For the user:</b> $User->Email <br><br><b>The wallet Address is:</b> $User->WalletAddress";
            QApplication::ExecuteJavaScript("$('#ventaModal').modal('show');");
        }
        else{
             QApplication::ExecuteJavaScript("showWarning('" . htmlentities("Wallet Address is empty.") . "');");
        }
    }
    
    protected function changeStatus_Click($strFormId, $strControlId, $strParameter) {
        try{
            $obj = User::LoadByIdUser($strControlId);
            $obj->StatusUser = 2;
            $obj->Save();
            $this->dtgMessages->Refresh();
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['success']."','Status Updated Correctly');");
            
        } catch (Exception $ex) {
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['warning']."','".str_replace("'", "\'", $ex->getMessage())."');");

        }
    }
    
    public function userTypeRender(User $obj) {
        if ($obj->UserType == 'C') {
            return '<div class="label label-table label-info">Customer</div>';
        } else if ($obj->UserType == 'O') {
            return '<div class="label label-table label-info">Owner</div>';
        } 
    }

    public function statusRender(User $obj) {
        
        $controlID = $obj->IdUser;
        $editCtrl = $this->dtgMessages->GetChildControl($controlID);
        
        $strTemplate = '';
        
        if ($obj->StatusUser == 1) {
            $strTemplate = 
            '<div class="btn btn-xs btn-warning" data-toggle="tooltip" data-original-title="pending approval"> Register </div>';
        } else if ($obj->StatusUser == 2) {
            $strTemplate = '<div class="label label-table label-success">Approved</div>';
            
        } else if ($obj->StatusUser == 3) {
            $strTemplate = '<div class="label label-table label-danger">Rejected</div>';
            
        } else if ($obj->StatusUser == 4) {
            $strTemplate = '<div class="label label-table label-primary">Mining</div>';
            
        } else {
            $strTemplate = '<div class="label label-table label-default">None</div>';
        }
        
        if (!$editCtrl) {
            $editCtrl = new QLabel($this->dtgMessages, $controlID);
            $editCtrl->HtmlEntities = FALSE;
            $editCtrl->Cursor = QCursor::Pointer;
           
            $editCtrl->ActionParameter = $obj->IdUser;
            $editCtrl->AddAction(new QClickEvent(), new QAjaxAction('changeStatus_Click'));
        }
        $editCtrl->Text = $strTemplate;
        return "<center>" . $editCtrl->Render(false) . "</center>";
    }
    
     public function imagesRender(User $obj) {
        $template='';
        if($obj->ImagePhoto == null || $obj->ImagePhoto==''){
            $template = '<div style="font-size:12px;"> not found photo! </div>';
        }else{
            $template = '<div style="font-size:12px;">'
                      . '<a href="'.__UPLOAD_PATH__."/".$obj->ImagePhoto.'"  target="_blank">Photo</a></div>';
        }
        
        return $template;
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

    public function permisoRender(Usuario $obj) {
        $controlID = 'perm' . $obj->IdUsuario;
        $addCtrl = $this->dtgMessages->GetChildControl($controlID);
        if (!$addCtrl) {
            $addCtrl = new QLabel($this->dtgMessages, $controlID);
            $addCtrl->HtmlEntities = FALSE;
            $addCtrl->Cursor = QCursor::Pointer;
            $addCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Permiso">
                            <i class="icon fa-check" aria-hidden="true"></i>
                          </div>';
            $addCtrl->ActionParameter = $obj->IdUsuario;
            $addCtrl->AddAction(new QClickEvent(), new QAjaxAction('permiso_Click'));
        }
        return '<center>' . $addCtrl->Render(false) . '</center>';
    }

    protected function permiso_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogPermit->Title = addslashes("<i class='icon wb-edit'></i> Permisos Usuario");
        $this->dlgDialogPermit->loadDefault($strParameter);
        $this->dlgDialogPermit->ShowDialogBox();
    }

    public function actionsRender(User $id) {
        $controlID = 'edit' . $id->IdUser;
        $editCtrl = $this->dtgMessages->GetChildControl($controlID);
        if (!$editCtrl) {
            $editCtrl = new QLabel($this->dtgMessages, $controlID);
            $editCtrl->HtmlEntities = FALSE;
            $editCtrl->Cursor = QCursor::Pointer;
            $editCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                            <i class="icon wb-edit" aria-hidden="true"></i>
                          </div>';
            $editCtrl->ActionParameter = $id->IdUser;
            $editCtrl->AddAction(new QClickEvent(), new QAjaxAction('edit_Click'));
        }

        $controlID2 = 'del' . $id->IdUser;
        $deleteCtrl = $this->dtgMessages->GetChildControl($controlID2);
        if (!$deleteCtrl) {
            $deleteCtrl = new QLabel($this->dtgMessages, $controlID2);
            $deleteCtrl->HtmlEntities = FALSE;
            $deleteCtrl->Cursor = QCursor::Pointer;
            $deleteCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Delete">
                            <i class="icon wb-trash" aria-hidden="true"></i>
                          </div>';
            $deleteCtrl->ActionParameter = $id->IdUser;
            $deleteCtrl->AddAction(new QClickEvent(), new QAjaxAction('delete_Click'));
        }
        
        $controlID3 = 'add' . $id->IdUser;
        $addCtrl = $this->dtgMessages->GetChildControl($controlID3);
        if (!$addCtrl) {
            $addCtrl = new QLabel($this->dtgMessages, $controlID3);
            $addCtrl->HtmlEntities = FALSE;
            $addCtrl->Cursor = QCursor::Pointer;
            $addCtrl->Text = '<div class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Add coins">
                            <i class="far fa-credit-card"></i>
                          </div>';
            $addCtrl->ActionParameter = $id->IdUser;
            $addCtrl->AddAction(new QClickEvent(), new QAjaxAction('add_Click'));
        }
        
        return "<center>" . $editCtrl->Render(false) . ' ' . $deleteCtrl->Render(false) . ' ' . $addCtrl->Render(false) . "</center>";
    }

    public function edit_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogEditUser->Title = addslashes("<i class='icon wb-edit'></i> Edit User");
        $this->dlgDialogEditUser->loadDefault($strParameter);
        $this->dlgDialogEditUser->ShowDialogBox();
    }

    public function delete_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgConfirm->Title = addslashes("<i class='icon wb-warning'></i> Confirm Delete");
        $this->dlgConfirm->txtMessage = "Are you sure you want to delete this user?";
        $this->dlgConfirm->ID = intval($strParameter);
        $this->dlgConfirm->ShowDialogBox();
    }
    
    public function add_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogAddCoins->Title = addslashes("<i class='icon wb-plus'></i> Add coins");
        $this->dlgDialogAddCoins->loadDefault($strParameter);
        $this->dlgDialogAddCoins->ShowDialogBox();
    }

    protected function delete($id) {
        try {
            $users = User::LoadByIdUser(intval($id));
            $users->Delete();
            $this->items_Found();
            
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['success']."','Deleted successfully!');");
            //QApplication::ExecuteJavaScript("showSuccess('Deleted successfully!');");
        } catch (QMySqliDatabaseException $ex) {
            
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['warning']."','".str_replace("'", "\'", $ex->getMessage())."');");
            //QApplication::ExecuteJavaScript("showWarning('Error " . str_replace("'", "\'", $ex->getMessage()) . "');");
        }
    }

    public function close_edit($update) {
        if ($update) {
            $this->dtgMessages->Refresh();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['success']."','Data updated correctly');");
        }
    }

    public function close_confirm($answer, $id) {
        if ($answer) {
            $this->delete($id);
        }
        $this->dtgMessages->Refresh();
    }
    
    
    public function close_add($answer) {
        /*if ($answer) {
            $this->delete($id);
        }*/
        $this->dtgMessages->Refresh();
        QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['success']."','Added coins!');");
    }

}

ViewListMessage::Run('ViewListMessage');
?>