<?php

require('includes/configuration/prepend.inc.php');
require_once('dialog/DialogEditSucursal.php');
require_once('dialog/DialogConfirm.php');
require('general.php');

class ViewListTiendaForm extends QForm {

    protected $user;
    protected $dtgSucursals;
    protected $btnNewSucursal;
    protected $dlgConfirm;
    protected $dlgDialogEditSucursal;

    protected function Form_Run() {

        $Datos1 = @unserialize($_SESSION['DatosAdministrador']);

        if ($Datos1) {
            $this->user = Administrador::LoadByEmail($Datos1->Email);
        } else {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/login');
        }
        $this->items_Found();
    }

    protected function Form_Create() {
        $this->objDefaultWaitIcon = new QWaitIcon($this);
        
        $this->dlgDialogEditSucursal = new DialogEditSucursal($this, 'close_edit');
        $this->dlgConfirm = new DialogConfirm($this, "close_confirm");

        $this->dtgSucursals = new SucursalDataGrid($this);
        $this->dtgSucursals->Paginator = new QPaginator($this->dtgSucursals);
        $this->dtgSucursals->Paginator->strLabelForPrevious ='<i class="icon wb-chevron-left-mini"></i>';
        $this->dtgSucursals->Paginator->strLabelForNext ='<i class="icon wb-chevron-right-mini"></i>';
        $this->dtgSucursals->ItemsPerPage = 20;
        $this->dtgSucursals->CssClass = 'table table-bordered table-striped toggle-circle';
        $this->dtgSucursals->UseAjax = true;
        $this->dtgSucursals->WaitIcon = $this->objDefaultWaitIcon;
        $this->dtgSucursals->ShowFilter = false;
        $this->dtgSucursals->SortColumnIndex = 0;
        $this->dtgSucursals->SortDirection = true;
        

        $this->dtgSucursals->MetaAddColumn('IdSucursal',"Name=ID");
        $this->dtgSucursals->MetaAddColumn('Nombre');        
        $this->dtgSucursals->MetaAddColumn('Telefono');
        $this->dtgSucursals->MetaAddColumn('Direccion');
        $this->dtgSucursals->AddColumn(new QDataGridColumn('', '<?= $_FORM->actionsRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=100'));


        $this->btnNewSucursal = new QButton($this);
        $this->btnNewSucursal->Text = '<i class="icon wb-plus" aria-hidden="true"></i>';
        $this->btnNewSucursal->CssClass = "site-action-toggle btn-raised btn btn-primary btn-floating";
        $this->btnNewSucursal->HtmlEntities = false;
        $this->btnNewSucursal->AddAction(new QClickEvent(), new QAjaxAction('btnNewSucursal_Click'));
    }

    protected function items_Found() {
        $countProjects = Sucursal::CountAll();
        if ($countProjects == 0) {
            QApplication::ExecuteJavaScript("itemsFound(1);");
        } else {
            QApplication::ExecuteJavaScript("itemsFound(2);");
        }
    }

    public function btnNewSucursal_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogEditSucursal->Title = addslashes("<i class='icon wb-plus'></i> Nueva Tienda");
        $this->dlgDialogEditSucursal->createNew();
        $this->dlgDialogEditSucursal->ShowDialogBox();
    }
    

    public function actionsRender(Sucursal $id) {
        $controlID = 'edit' . $id->IdSucursal;
        $editCtrl = $this->dtgSucursals->GetChildControl($controlID);
        if (!$editCtrl) {
            $editCtrl = new QLabel($this->dtgSucursals, $controlID);
            $editCtrl->HtmlEntities = FALSE;
            $editCtrl->Cursor = QCursor::Pointer;
            $editCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Editar">
                            <i class="icon wb-edit" aria-hidden="true"></i>
                          </div>';
            $editCtrl->ActionParameter = $id->IdSucursal;
            $editCtrl->AddAction(new QClickEvent(), new QAjaxAction('edit_Click'));
        }

        $controlID2 = 'del' . $id->IdSucursal;
        $deleteCtrl = $this->dtgSucursals->GetChildControl($controlID2);
        if (!$deleteCtrl) {
            $deleteCtrl = new QLabel($this->dtgSucursals, $controlID2);
            $deleteCtrl->HtmlEntities = FALSE;
            $deleteCtrl->Cursor = QCursor::Pointer;
            $deleteCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Eliminar">
                            <i class="icon wb-trash" aria-hidden="true"></i>
                          </div>';
            $deleteCtrl->ActionParameter = $id->IdSucursal;
            $deleteCtrl->AddAction(new QClickEvent(), new QAjaxAction('delete_Click'));
        }

        return "<center>" . $editCtrl->Render(false) . ' ' . $deleteCtrl->Render(false) . "</center>";
    }

    public function edit_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogEditSucursal->Title = addslashes("<i class='icon wb-edit'></i> Edit Tienda");
        $this->dlgDialogEditSucursal->loadDefault($strParameter);
        $this->dlgDialogEditSucursal->ShowDialogBox();
    }

    public function delete_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgConfirm->Title = addslashes("<i class='icon wb-warning'></i> Confirmar Eliminar");
        $this->dlgConfirm->txtMessage = "¿Está seguro que desea eliminar esta tienda?";
        $this->dlgConfirm->ID = intval($strParameter);
        $this->dlgConfirm->ShowDialogBox();
    }

    protected function delete($id) {
        try {
            $users = Sucursal::LoadByIdSucursal(intval($id));
            $users->Delete();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showSuccess('Eliminado Correctamente!');");
        } catch (QMySqliDatabaseException $ex) {
            QApplication::ExecuteJavaScript("showWarning('Error " . str_replace("'", "\'", $ex->getMessage()) . "');");
        }
    }

    public function close_edit($update) {
        if ($update) {
            $this->dtgSucursals->Refresh();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showSuccess('¡Datos actualizados correctamente!');");
        }
    }

    public function close_confirm($answer, $id) {
        if ($answer) {
            $this->delete($id);
        }
        $this->dtgSucursals->Refresh();
    }

}

ViewListTiendaForm::Run('ViewListTiendaForm');
?>