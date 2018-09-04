<?php

require('includes/configuration/prepend.inc.php');
require_once('dialog/DialogValidateOffer.php');
require_once('dialog/DialogConfirm.php');
require('general.php');

class ViewListBalanceClientForm extends QForm {

    protected $user;
    protected $dtgOffersToClient;
    protected $btnNewModelo;
    protected $dlgConfirm;
    protected $dlgDialogEditModelo;
    protected $txtModelo;
    protected $btnFilter;
    protected $btnExcel;
    protected $lblTotal;

    protected function Form_Run() {

        $Datos1 = @unserialize($_SESSION['DatosUsuario']);

        if ($Datos1 && $Datos1->UserType=="C") {
            $this->user = User::LoadByEmail($Datos1->Email);
        } else {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/login');
        }
        $this->items_Found();
    }

    protected function Form_Create() {

        $this->objDefaultWaitIcon = new QWaitIcon($this);

        $this->dlgDialogEditModelo = new DialogValidateOffer($this, 'close_edit', $this->user->IdUser);
        $this->dlgConfirm = new DialogConfirm($this, "close_confirm");

        $this->dtgOffersToClient = new BalanceDataGrid($this);
        $this->dtgOffersToClient->Paginator = new QPaginator($this->dtgOffersToClient);
        $this->dtgOffersToClient->Paginator->strLabelForPrevious = '<i class="icon wb-chevron-left-mini"></i>';
        $this->dtgOffersToClient->Paginator->strLabelForNext = '<i class="icon wb-chevron-right-mini"></i>';
        $this->dtgOffersToClient->ItemsPerPage = 20;
        $this->dtgOffersToClient->CssClass = 'table table-bordered table-striped toggle-circle';
        $this->dtgOffersToClient->UseAjax = true;
        $this->dtgOffersToClient->WaitIcon = $this->objDefaultWaitIcon;
        $this->dtgOffersToClient->ShowFilter = false;
        $this->dtgOffersToClient->SortColumnIndex = 0;
        $this->dtgOffersToClient->SortDirection = true;

        $this->dtgOffersToClient->MetaAddColumn('IdOffer', "Name=ID");
        $this->dtgOffersToClient->AddColumn(new QDataGridColumn('Offer', '<?= $_FORM->getOffer($_ITEM); ?>', 'HtmlEntities=false', 'Width=auto'));
        $this->dtgOffersToClient->AddColumn(new QDataGridColumn('Restaurant', '<?= $_FORM->getRestaurant($_ITEM); ?>', 'HtmlEntities=false', 'Width=auto'));
        $this->dtgOffersToClient->MetaAddColumn('Date');
        $this->dtgOffersToClient->MetaAddColumn('AmountExchangedCoins', "Name=Earned Coins");

        $user = @unserialize($_SESSION['DatosUsuario']);
        $searchTipo = QQ::Equal(QQN::Balance()->IdUser, $user->IdUser);
        $this->dtgOffersToClient->AdditionalConditions = QQ::AndCondition(
                        $searchTipo
        );

        $this->btnNewModelo = new QButton($this);
        $this->btnNewModelo->Text = '<i class="icon wb-plus" aria-hidden="true"></i>';
        $this->btnNewModelo->CssClass = "site-action-toggle btn-raised btn btn-primary btn-floating";
        $this->btnNewModelo->HtmlEntities = false;
        $this->btnNewModelo->AddAction(new QClickEvent(), new QAjaxAction('btnNewModelo_Click'));

        $this->txtModelo = new QTextBox($this);
        $this->txtModelo->Placeholder = "Nombre";

        $this->btnFilter = new QButton($this);
        $this->btnFilter->CssClass = "btn btn-success";
        $this->btnFilter->HtmlEntities = false;
        $this->btnFilter->Text = '<i class="icon fa-filter" aria-hidden="true"></i>';
        $this->btnFilter->AddAction(new QClickEvent(), new QAjaxAction('actionFilter_Click'));

        $this->lblTotal = new QLabel($this);
        $this->lblTotal->Text = "<b>Total Earned Coins: " . $this->getCurrentAmountCoins() . "</b>";
        $this->lblTotal->HtmlEntities = false;
    }

    public function getCurrentAmountCoins() {
        $user = @unserialize($_SESSION['DatosUsuario']);
        $query = "select AmountExchangedCoins as coins from balance where IdUser=$user->IdUser";

        $arrayFilter2 = array();
        $objDbResult = QApplication::$Database[1]->Query("$query");
        $total = 0;
        while (($report = $objDbResult->FetchAssoc())) {
            $total = $total + $report['coins'];
        }
        return $total;
    }

    public function actionFilter_Click($strFormId, $strControlId, $strParameter) {
        $user = @unserialize($_SESSION['DatosUsuario']);
        if (trim($this->txtModelo->Text != "")) {
            $searchTipo = QQ::Like(QQN::Offer()->Description, "%" . trim($this->txtModelo->Text) . "%");
        } else {
            $searchTipo = QQ::All();
        }

        $this->dtgOffersToClient->AdditionalConditions = QQ::AndCondition(
                        $searchTipo
        );

        $this->dtgOffersToClient->Refresh();
        QApplication::ExecuteJavaScript("showSuccess('Filter correctly!');");
    }

    public function btnNewModelo_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogEditModelo->strIdUser = $this->user->IdUser;
        $this->dlgDialogEditModelo->Title = addslashes("<i class='icon wb-plus'></i> Available Offers");
        $this->dlgDialogEditModelo->createNew();
        $this->dlgDialogEditModelo->ShowDialogBox();
    }

    public function getOffer(Balance $balance) {

        $offer = $balance->IdOfferObject->Description;

        return "<center>" . $offer . "</center>";
    }

    public function getRestaurant(Balance $balance) {

        $restaurant = $balance->IdOfferObject->IdRestaurantObject->RestaurantName;

        return "<center>" . $restaurant . "</center>";
    }

    public function actionsRender(Offer $id) {

        $controlID = 'edit' . $id->IdOffer;
        $editCtrl = $this->dtgOffersToClient->GetChildControl($controlID);
        if (!$editCtrl) {
            $editCtrl = new QLabel($this->dtgOffersToClient, $controlID);
            $editCtrl->HtmlEntities = FALSE;
            $editCtrl->Cursor = QCursor::Pointer;
            $editCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Editar">
                            <i class="icon wb-camera" aria-hidden="true"></i>
                          </div>';
            $editCtrl->ActionParameter = $id->IdOffer;
            $editCtrl->AddAction(new QClickEvent(), new QAjaxAction('validateoffer_Click'));
        }
        return "<center>" . $editCtrl->Render(false) . "</center>";
    }

    public function validateoffer_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogEditModelo->Title = addslashes("<i class='icon wb-edit'></i> Validating offer ...");
        $this->dlgDialogEditModelo->txtMessage = "";
        $this->dlgDialogEditModelo->ID = intval($strParameter);
        $this->dlgDialogEditModelo->ShowDialogBox();
    }

    public function edit_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogEditModelo->Title = addslashes("<i class='icon wb-edit'></i> Apply offer");
        $this->dlgDialogEditModelo->loadDefault($strParameter);
        $this->dlgDialogEditModelo->ShowDialogBox();
    }

    public function delete_Click($strFormId, $strControlId, $strParameter) {

        $this->dlgConfirm->Title = addslashes("<i class='icon wb-warning'></i> Confirmar Eliminar");
        $this->dlgConfirm->txtMessage = "¿Está seguro que desea eliminar este Producto?";
        $this->dlgConfirm->ID = intval($strParameter);
        $this->dlgConfirm->ShowDialogBox();
    }

    protected function delete($id) {
        try {
            $users = Offer::LoadByIdOffer(intval($id));
            $users->Delete();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showSuccess('Eliminado Correctamente!');");
        } catch (QMySqliDatabaseException $ex) {
            QApplication::ExecuteJavaScript("showWarning('Error " . str_replace("'", "\'", $ex->getMessage()) . "');");
        }
    }

    public function close_edit($update) {

        if ($update) {
            $this->dtgOffersToClient->Refresh();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showSuccess('¡Datos actualizados correctamente!');");
        }
    }

    public function close_confirm($answer, $id) {
        if ($answer) {
            $this->delete($id);
        }
        $this->dtgOffersToClient->Refresh();
    }

    //cuenta el numero de items de la tabla, debe inicializarse en el form_run
    protected function items_Found() {
        $countProjects = Offer::CountAll();
        if ($countProjects == 0) {
            QApplication::ExecuteJavaScript("itemsFound(1);");
        } else {
            QApplication::ExecuteJavaScript("itemsFound(2);");
        }
    }

}

ViewListBalanceClientForm::Run('ViewListBalanceClientForm');
?>