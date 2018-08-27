<?php
require('includes/configuration/prepend.inc.php');
require_once('dialog/DialogEditUser.php');
require_once('dialog/DialogConfirm.php');
require('general.php');

class KcoinVersionForm extends QForm {

    protected $user;
    protected $dtgUsuarios;
    protected $btnNewUsuario;
    protected $dlgConfirm;
    protected $dlgDialogEditUser;
    protected $dlgDialogPermit;

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

        $this->dlgDialogEditUser = new DialogEditUser($this, 'close_edit');
        $this->dlgConfirm = new DialogConfirm($this, "close_confirm");

        $this->dtgUsuarios = new UserDataGrid($this);
        $this->dtgUsuarios->Paginator = new QPaginator($this->dtgUsuarios);
        $this->dtgUsuarios->Paginator->strLabelForPrevious = '<i class="icon wb-chevron-left-mini"></i>';
        $this->dtgUsuarios->Paginator->strLabelForNext = '<i class="icon wb-chevron-right-mini"></i>';
        $this->dtgUsuarios->ItemsPerPage = 20;
        $this->dtgUsuarios->CssClass = 'table table-bordered table-striped toggle-circle';
        $this->dtgUsuarios->UseAjax = true;
        $this->dtgUsuarios->WaitIcon = $this->objDefaultWaitIcon;
        $this->dtgUsuarios->ShowFilter = false;
        $this->dtgUsuarios->SortColumnIndex = 0;
        $this->dtgUsuarios->SortDirection = true;


        $this->dtgUsuarios->MetaAddColumn('IdUser', "Name=ID");
        $this->dtgUsuarios->MetaAddColumn('Email');
        //$this->dtgUsuarios->MetaAddColumn('Password');
        $this->dtgUsuarios->MetaAddColumn('FirstName');
        $this->dtgUsuarios->MetaAddColumn('LastName');
        /*
          $this->dtgUsuarios->AddColumn(new QDataGridColumn('Permiso', '<?= $_FORM->permisoRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=50'));
          $this->dtgUsuarios->AddColumn(new QDataGridColumn('Login', '<?= $_FORM->loginRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=50'));
         */
        $this->dtgUsuarios->AddColumn(new QDataGridColumn('Plan', '<?= $_FORM->planRender($_ITEM); ?>', 'HtmlEntities=false'));

        $this->dtgUsuarios->AddColumn(new QDataGridColumn('Status', '<?= $_FORM->statusRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=100'));
        $this->dtgUsuarios->AddColumn(new QDataGridColumn('Images', '<?= $_FORM->imagesRender($_ITEM); ?>', 'HtmlEntities=false'));

        

        $this->dtgUsuarios->AddColumn(new QDataGridColumn('', '<?= $_FORM->actionsRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=100'));


        $this->btnNewUsuario = new QButton($this);
        $this->btnNewUsuario->Text = '<i class="icon wb-plus" aria-hidden="true"></i>';
        $this->btnNewUsuario->CssClass = "site-action-toggle btn-raised btn btn-primary btn-floating";
        $this->btnNewUsuario->HtmlEntities = false;
        $this->btnNewUsuario->AddAction(new QClickEvent(), new QAjaxAction('btnNewUsuario_Click'));
    }

    protected function items_Found() {
        $countProjects = User::CountAll();
        if ($countProjects == 0) {
            QApplication::ExecuteJavaScript("itemsFound(1);");
        } else {
            QApplication::ExecuteJavaScript("itemsFound(2);");
        }
    }

    public function btnNewUsuario_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogEditUser->Title = addslashes("<i class='icon wb-plus'></i> New User");
        $this->dlgDialogEditUser->createNew();
        $this->dlgDialogEditUser->ShowDialogBox();
    }

    public function planRender(User $obj) {

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
        $addCtrl = $this->dtgUsuarios->GetChildControl($controlID);
        if (!$addCtrl) {
            $addCtrl = new QLabel($this->dtgUsuarios, $controlID);
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
        $addCtrl = $this->dtgUsuarios->GetChildControl($controlID);
        if (!$addCtrl) {
            $addCtrl = new QLabel($this->dtgUsuarios, $controlID);
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
        $editCtrl = $this->dtgUsuarios->GetChildControl($controlID);
        if (!$editCtrl) {
            $editCtrl = new QLabel($this->dtgUsuarios, $controlID);
            $editCtrl->HtmlEntities = FALSE;
            $editCtrl->Cursor = QCursor::Pointer;
            $editCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Edit">
                            <i class="icon wb-edit" aria-hidden="true"></i>
                          </div>';
            $editCtrl->ActionParameter = $id->IdUser;
            $editCtrl->AddAction(new QClickEvent(), new QAjaxAction('edit_Click'));
        }

        $controlID2 = 'del' . $id->IdUser;
        $deleteCtrl = $this->dtgUsuarios->GetChildControl($controlID2);
        if (!$deleteCtrl) {
            $deleteCtrl = new QLabel($this->dtgUsuarios, $controlID2);
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
            $this->dtgUsuarios->Refresh();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showSuccess('Data updated correctly');");
        }
    }

    public function close_confirm($answer, $id) {
        if ($answer) {
            $this->delete($id);
        }
        $this->dtgUsuarios->Refresh();
    }

}

KcoinVersionForm::Run('KcoinVersionForm');
?>