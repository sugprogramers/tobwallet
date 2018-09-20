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
    protected $admin;
    protected $dtgMessages;
    protected $btnNewMessage;
    protected $dlgConfirm;
    protected $dlgDialogMessage;
    protected $txtNombre;
    protected $lstIsRead;
    protected $lstFilterType;
    protected $btnFilter;
    protected $btnEraserFilter;
    protected $alertTypes;

    protected function Form_Run() {

        $Datos1 = @unserialize($_SESSION['TobAdmin']);
        $Datos2 = @unserialize($_SESSION['TobUser']);

        if ($Datos1 || $Datos2) {
            if($Datos1){
                $this->user = User::LoadByEmail($Datos1->Email);
            }
            if($Datos2){
                $this->admin = Administrator::LoadByEmail($Datos2->Email);
            }
        } else {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/login');
        }
        $this->items_Found();
    }

    protected function Form_Create() {
        $this->objDefaultWaitIcon = new QWaitIcon($this);
        
        $this->dlgDialogMessage = new DialogMessage($this, 'close_edit');
        
        $this->dlgConfirm = new DialogConfirm($this, "close_confirm");
        $this->dtgMessages = new MessageDataGrid($this);
        $this->dtgMessages->Paginator = new QPaginator($this->dtgMessages);
        $this->dtgMessages->Paginator->strLabelForPrevious = '<i class="icon wb-chevron-left-mini"></i>';
        $this->dtgMessages->Paginator->strLabelForNext = '<i class="icon wb-chevron-right-mini"></i>';
        $this->dtgMessages->ItemsPerPage = 20;
        $this->dtgMessages->CssClass = 'table table-bordered table-striped toggle-circle';
        $this->dtgMessages->UseAjax = true;
        $this->dtgMessages->WaitIcon = $this->objDefaultWaitIcon;
        $this->dtgMessages->ShowFilter = false;
        $this->dtgMessages->SortColumnIndex = 2;
        $this->dtgMessages->SortDirection = true;
        
        $this->dtgMessages->MetaAddColumn('Type');
        $this->dtgMessages->AddColumn(new QDataGridColumn('Date', '<?= date_format($_ITEM->CreatedDate, \'m-d-Y H:i:s\') ?>'));
        $this->dtgMessages->AddColumn(new QDataGridColumn('Read?', '<?= $_ITEM->IsRead == 0 ? "No" : "Yes" ?>'));
        
        if(@unserialize($_SESSION['TobAdmin'])){
            //es administrador: mostrar columna de usuario
            $this->dtgMessages->AddColumn(new QDataGridColumn('User', '<?= $_FORM->userRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=100'));
        }
        
        if(@unserialize($_SESSION['TobUser'])){
            //si es usuario: mostrar columna de eliminar mensaje
            $this->dtgMessages->AddColumn(new QDataGridColumn('', '<?= $_FORM->actionsRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=100'));
        }
        
        $this->btnNewMessage = new QButton($this);
        $this->btnNewMessage->Text = '<i class="icon wb-plus" aria-hidden="true"></i>';
        $this->btnNewMessage->CssClass = "site-action-toggle btn-raised btn btn-primary btn-floating";
        $this->btnNewMessage->HtmlEntities = false;
        $this->btnNewMessage->AddAction(new QClickEvent(), new QAjaxAction('btnNewMessage_Click'));
        
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
        
        $this->lstFilterType = new QListBox($this);
        $this->lstFilterType->CssClass = "form-control input-sm editHidden";
        $this->lstFilterType->AddItem(new QListItem("Type", 0));
        foreach(getMessageTypeToAdmin() as $x => $x_value) {
            $this->lstFilterType->AddItem(new QListItem($x_value, $x));
        }
    }

    protected function items_Found() {
        $countProjects = Message::CountAll();
        if ($countProjects == 0) {
            QApplication::ExecuteJavaScript("itemsFound(1);");
        } else {
            QApplication::ExecuteJavaScript("itemsFound(2);");
        }
    }
    
    public function userRender(Message $id) {
        $user = User::LoadByIdUser($id->IdUser);
        
        $template = "";
        
        try{
            $template = "<span>". $user->FirstName ." ". $user->LastName ."</span>";
        } catch (Exception $ex) {
        }
        return $template;
    }
    
    public function eraseFilter_Click($strFormId, $strControlId, $strParameter) {
        $this->lstFilterType->SelectedValue = 0;
        $searchTipo = QQ::All();
        $this->dtgMessages->AdditionalConditions = QQ::AndCondition($searchTipo);
        $this->dtgMessages->Refresh();
        
        QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['success']."','Filter eraser correctly!');");
    }
    
     public function actionFilter_Click($strFormId, $strControlId, $strParameter) {
        /*$cond1= QQ::NotEqual(QQN::Message()->IdMessage, null);
        $cond2= QQ::NotEqual(QQN::Message()->IdMessage, null);
        $cond3= QQ::NotEqual(QQN::Message()->IdMessage, null);
        
        if($this->lstFilterUserType->SelectedValue != "S"){
            $cond1 = QQ::Equal(QQN::User()->UserType, $this->lstFilterUserType->SelectedValue);
        }else{
            $cond1= QQ::NotEqual(QQN::User()->IdUser, null);
        }
        
        if($this->lstFilterUserStatus->SelectedValue != 0){
            $cond2 = QQ::Equal(QQN::Message()->StatusUser, $this->lstFilterUserStatus->SelectedValue);
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
         * */
    }

    public function btnNewMessage_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogMessage->Title = addslashes("<i class='icon wb-plus'></i> New Message");
        $this->dlgDialogMessage->createNew();
        $this->dlgDialogMessage->ShowDialogBox();
    }
    

    public function actionsRender(Message $id) {

        $controlID2 = 'del' . $id->IdMessage;
        $deleteCtrl = $this->dtgMessages->GetChildControl($controlID2);
        if (!$deleteCtrl) {
            $deleteCtrl = new QLabel($this->dtgMessages, $controlID2);
            $deleteCtrl->HtmlEntities = FALSE;
            $deleteCtrl->Cursor = QCursor::Pointer;
            $deleteCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Delete">
                            <i class="icon wb-trash" aria-hidden="true"></i>
                          </div>';
            $deleteCtrl->ActionParameter = $id->IdMessage;
            $deleteCtrl->AddAction(new QClickEvent(), new QAjaxAction('delete_Click'));
        }
        
        return "<center>" . $deleteCtrl->Render(false) . "</center>";
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
            $messages = Message::LoadByIdMessage(intval($id));
            $messages->Delete();
            $this->items_Found();
            
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['success']."','Deleted successfully!');");
        } catch (QMySqliDatabaseException $ex) {
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['warning']."','".str_replace("'", "\'", $ex->getMessage())."');");
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
}

ViewListMessage::Run('ViewListMessage');
?>