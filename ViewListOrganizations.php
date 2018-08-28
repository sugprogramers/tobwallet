<?php

require('includes/configuration/prepend.inc.php');
//require_once('dialog/DialogEditOrganzation.php');
require_once('dialog/DialogConfirm.php');
require('general.php');

class ViewListUsuarioForm extends QForm {

    protected $organization;
    protected $dtgOrganizations;
    protected $btnNewOrganization;
    protected $dlgConfirm;
    protected $dlgDialogEditOrganization;
    protected $dlgDialogPermit;
    protected $lblWallet;
    
    protected $txtNombre;
    protected $btnFilter;
    

    protected function Form_Run() {

        $Datos1 = @unserialize($_SESSION['DatosAdministrador']);

        if ($Datos1) {
            $this->organization = Administrator::LoadByEmail($Datos1->Email);
        } else {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/login');
        }
        $this->items_Found();
    }

    protected function Form_Create() {
        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->dlgDialogEditOrganization = new DialogEditOrganization($this, 'close_edit');
        $this->dlgConfirm = new DialogConfirm($this, "close_confirm");

        $this->dtgOrganizations = new OrganizationDataGrid($this);
        $this->dtgOrganizations->Paginator = new QPaginator($this->dtgOrganizations);
        $this->dtgOrganizations->Paginator->strLabelForPrevious = '<i class="icon wb-chevron-left-mini"></i>';
        $this->dtgOrganizations->Paginator->strLabelForNext = '<i class="icon wb-chevron-right-mini"></i>';
        $this->dtgOrganizations->ItemsPerPage = 20;
        $this->dtgOrganizations->CssClass = 'table table-bordered table-striped toggle-circle';
        $this->dtgOrganizations->UseAjax = true;
        $this->dtgOrganizations->WaitIcon = $this->objDefaultWaitIcon;
        $this->dtgOrganizations->ShowFilter = false;
        $this->dtgOrganizations->SortColumnIndex = 4;
        $this->dtgOrganizations->SortDirection = true;


        $this->dtgOrganizations->MetaAddColumn('IdOrganization', "Name=ID");
        $this->dtgOrganizations->MetaAddColumn('Name');
        $this->dtgOrganizations->MetaAddColumn('Phone');
        $this->dtgOrganizations->MetaAddColumn('QrCode');
        $this->dtgOrganizations->MetaAddColumn('OrganizationImage');
        /*
          $this->dtgUsuarios->AddColumn(new QDataGridColumn('Permiso', '<?= $_FORM->permisoRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=50'));
          $this->dtgUsuarios->AddColumn(new QDataGridColumn('Login', '<?= $_FORM->loginRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=50'));
         */
        $this->dtgOrganizations->AddColumn(new QDataGridColumn('Plan', '<?= $_FORM->planRender($_ITEM); ?>', 'HtmlEntities=false',
              array('OrderByClause' => QQ::OrderBy(QQN::User()->MiningOption), 'ReverseOrderByClause' => QQ::OrderBy(QQN::User()->MiningOption, false))
                
                ));
        $this->dtgOrganizations->AddColumn(new QDataGridColumn('Status', '<?= $_FORM->statusRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=100',
              array('OrderByClause' => QQ::OrderBy(QQN::User()->StatusUser), 'ReverseOrderByClause' => QQ::OrderBy(QQN::User()->StatusUser, false))
                
                ));
        $this->dtgOrganizations->MetaAddColumn('NumberMasterNode',"Name=Master<br>Nodes");
        
        $this->dtgOrganizations->AddColumn(new QDataGridColumn('Images', '<?= $_FORM->imagesRender($_ITEM); ?>', 'HtmlEntities=false'));

        

        $this->dtgOrganizations->AddColumn(new QDataGridColumn('', '<?= $_FORM->actionsRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=100'));


        
        $this->lblWallet = new QLabel($this);
        $this->lblWallet->HtmlEntities = false;
        
        
        $this->btnNewOrganization = new QButton($this);
        $this->btnNewOrganization->Text = 'hola';
        $this->btnNewOrganization->CssClass = "site-action-toggle btn-raised btn btn-primary btn-floating";
        $this->btnNewOrganization->HtmlEntities = false;
        $this->btnNewOrganization->AddAction(new QClickEvent(), new QAjaxAction('btnNewUsuario_Click'));
        
        
        
        
        
        $this->txtNombre = new QTextBox($this);
        $this->txtNombre->Placeholder = "Email or Firtname or Lastname";

        $this->btnFilter = new QButton($this);
        $this->btnFilter->CssClass = "btn btn-success";
        $this->btnFilter->HtmlEntities = false;
        $this->btnFilter->Text = '<i class="icon fa-filter" aria-hidden="true"></i>';
        $this->btnFilter->AddAction(new QClickEvent(), new QAjaxAction('actionFilter_Click'));
        
        
        
    }

    protected function items_Found() {
        $countProjects = User::CountAll();
        if ($countProjects == 0) {
            QApplication::ExecuteJavaScript("itemsFound(1);");
        } else {
            QApplication::ExecuteJavaScript("itemsFound(2);");
        }
    }
    
    
     public function actionFilter_Click($strFormId, $strControlId, $strParameter) {
        if (trim($this->txtNombre->Text != "")) {
            $searchTipo = QQ::OrCondition(
                    QQ::Like(QQN::User()->FirstName, "%".trim($this->txtNombre->Text)."%"),
                    QQ::Like(QQN::User()->LastName, "%".trim($this->txtNombre->Text)."%"),
                    QQ::Like(QQN::User()->Email, "%".trim($this->txtNombre->Text)."%")
                    
             );
        }
        else {
            $searchTipo = QQ::All();
        }

        $this->dtgOrganizations->AdditionalConditions = QQ::AndCondition(
            $searchTipo
        );

        $this->dtgOrganizations->Refresh();


        QApplication::ExecuteJavaScript("showSuccess('Filter correctly!');");
    }

    public function btnNewUsuario_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogEditOrganization->Title = addslashes("<i class='icon wb-plus'></i> Nuevo usuario ");
        $this->dlgDialogEditOrganization->createNew();
        $this->dlgDialogEditOrganization->ShowDialogBox();
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
        $addCtrl = $this->dtgOrganizations->GetChildControl($controlID);
        if (!$addCtrl) {
            $addCtrl = new QLabel($this->dtgOrganizations, $controlID);
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
    
    
    
    
    

    public function statusRender(User $obj) {

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
    }

    
    
     public function imagesRender(User $obj) {
         
         
         return   '<div style="font-size:12px;"><a href="'.__UPLOAD_PATH__."/".$obj->ImageDriver.'" target="_blank" >Driver License</a>'
                      . '<br>'
                      . '<a href="'.__UPLOAD_PATH__."/".$obj->ImagePhoto.'"  target="_blank">Photo</a></div>';
        
     }




    public function loginRender(Usuario $obj) {
        $controlID = 'login' . $obj->IdUsuario;
        $addCtrl = $this->dtgOrganizations->GetChildControl($controlID);
        if (!$addCtrl) {
            $addCtrl = new QLabel($this->dtgOrganizations, $controlID);
            $addCtrl->HtmlEntities = FALSE;
            $addCtrl->Cursor = QCursor::Pointer;
            $addCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Login">
                            <i class="icon fa-sign-in" aria-hidden="true"></i>
                          </div>';
            $addCtrl->ActionParameter = $obj->IdUsuario;
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

    public function permisoRender(Usuario $obj) {
        $controlID = 'perm' . $obj->IdUsuario;
        $addCtrl = $this->dtgOrganizations->GetChildControl($controlID);
        if (!$addCtrl) {
            $addCtrl = new QLabel($this->dtgOrganizations, $controlID);
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

        //$strJavaScript ="$('[data-plugin=\"switchery\"]').load();";
        //QApplication::ExecuteJavaScript($strJavaScript);
    }

    public function actionsRender(User $id) {
        $controlID = 'edit' . $id->IdUser;
        $editCtrl = $this->dtgOrganizations->GetChildControl($controlID);
        if (!$editCtrl) {
            $editCtrl = new QLabel($this->dtgOrganizations, $controlID);
            $editCtrl->HtmlEntities = FALSE;
            $editCtrl->Cursor = QCursor::Pointer;
            $editCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                            <i class="icon wb-edit" aria-hidden="true"></i>
                          </div>';
            $editCtrl->ActionParameter = $id->IdUser;
            $editCtrl->AddAction(new QClickEvent(), new QAjaxAction('edit_Click'));
        }

        $controlID2 = 'del' . $id->IdUser;
        $deleteCtrl = $this->dtgOrganizations->GetChildControl($controlID2);
        if (!$deleteCtrl) {
            $deleteCtrl = new QLabel($this->dtgOrganizations, $controlID2);
            $deleteCtrl->HtmlEntities = FALSE;
            $deleteCtrl->Cursor = QCursor::Pointer;
            $deleteCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Delete">
                            <i class="icon wb-trash" aria-hidden="true"></i>
                          </div>';
            $deleteCtrl->ActionParameter = $id->IdUser;
            $deleteCtrl->AddAction(new QClickEvent(), new QAjaxAction('delete_Click'));
        }

        return "<center>" . $editCtrl->Render(false) . ' ' . $deleteCtrl->Render(false) . "</center>";
    }

    public function edit_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogEditOrganization->Title = addslashes("<i class='icon wb-edit'></i> Edit User");
        $this->dlgDialogEditOrganization->loadDefault($strParameter);
        $this->dlgDialogEditOrganization->ShowDialogBox();
    }

    public function delete_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgConfirm->Title = addslashes("<i class='icon wb-warning'></i> Confirm Delete");
        $this->dlgConfirm->txtMessage = "Are you sure you want to delete this user?";
        $this->dlgConfirm->ID = intval($strParameter);
        $this->dlgConfirm->ShowDialogBox();
    }

    protected function delete($id) {
        try {
            $users = User::LoadByIdUser(intval($id));
            $users->Delete();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showSuccess('Deleted successfully!');");
        } catch (QMySqliDatabaseException $ex) {
            QApplication::ExecuteJavaScript("showWarning('Error " . str_replace("'", "\'", $ex->getMessage()) . "');");
        }
    }

    public function close_edit($update) {
        if ($update) {
            $this->dtgOrganizations->Refresh();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showSuccess('Data updated correctly');");
        }
    }

    public function close_confirm($answer, $id) {
        echo $answer;
        if ($answer) {
            $this->delete($id);
        }
        $this->dtgOrganizations->Refresh();
    }

}

ViewListUsuarioForm::Run('ViewListUsuarioForm');
?>