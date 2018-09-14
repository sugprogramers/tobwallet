<?php

require('includes/configuration/prepend.inc.php');
require_once('dialog/DialogValidateOffer.php');
require_once('dialog/DialogValidateOfferPhoto.php');
require_once('dialog/DialogConfirm.php');
require('general.php');

require('utilities.php');

class ViewListOffersToClientForm extends QForm {

    protected $user;
    protected $dtgOffersToClient;
    protected $btnNewModelo;
    protected $dlgConfirm;
    protected $dlgDialogEditModelo;
    protected $dlgValidateOfferPhoto;
    protected $txtModelo;
    protected $btnFilter;
    protected $btnExcel;
    
    protected $alertTypes;

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

        $this->dlgDialogEditModelo = new DialogValidateOffer($this, 'close_edit', $this->user->IdUser);
        $this->dlgValidateOfferPhoto = new DialogValidateOfferPhoto($this, 'close_edit');

        $this->dlgConfirm = new DialogConfirm($this, "close_confirm");

        $this->dtgOffersToClient = new OfferDataGrid($this);
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
//        $this->dtgOffersToClient->FilterInfo = true;
//        $this->dtgOffersToClient->MetaAddColumn('IdOffer', "Name=ID");
        $this->dtgOffersToClient->AddColumn(new QDataGridColumn('Restaurant', '<?= $_FORM->getRestaurantName($_ITEM); ?>', 'HtmlEntities=false', 'Width=100', array('OrderByClause' => QQ::OrderBy(QQN::Offer()->IdRestaurantObject->RestaurantName), 'ReverseOrderByClause' => QQ::OrderBy(QQN::Offer()->IdRestaurantObject->RestaurantName, false))));
        $this->dtgOffersToClient->MetaAddColumn('Description');
        $this->dtgOffersToClient->MetaAddColumn('OfferedCoins', "Name=Coins per Person");
        $this->dtgOffersToClient->MetaAddColumn('MaxOffers', "Name=Total Offers");
        $this->dtgOffersToClient->AddColumn(new QDataGridColumn('Remaing Offers', '<?= $_FORM->actionsCalculateRemainOffer($_ITEM); ?>', 'HtmlEntities=false', 'Width=100'));
        $this->dtgOffersToClient->AddColumn(new QDataGridColumn('', '<?= $_FORM->actionsRender($_ITEM); ?>', 'HtmlEntities=false', 'Width=100'));



        $user = @unserialize($_SESSION['TobUser']);
        $searchTipo = QQ::NotIn(QQN::Offer()->IdOffer, QQ::SubSql("SELECT  IdOffer from balance where iduser = " . $user->IdUser));
        $searchTipo2 = QQ::LessThan(QQN::Offer()->AppliedOffers, QQN::Offer()->MaxOffers);
        $searchTipo3 = QQ::LessOrEqual(QQN::Offer()->DateFrom, QDateTime::Now());

        $orElemento1 = QQ::IsNull(QQN::Offer()->DateTo);
        $orElemento2 = QQ::GreaterOrEqual(QQN::Offer()->DateTo, QDateTime::Now());
        $orCondicion = QQ::OrCondition($orElemento1, $orElemento2);

        if (isset($_GET['value']) && !empty($_GET['value'])) {
            $filter = QQ::Equal(QQN::Offer()->IdRestaurant, $_GET['value']);

            $this->dtgOffersToClient->AdditionalConditions = QQ::AndCondition(
                            $searchTipo, $searchTipo2, $searchTipo3, $searchTipo3, $orCondicion, $filter
            );
        } else {
            $this->dtgOffersToClient->AdditionalConditions = QQ::AndCondition(
                            $searchTipo, $searchTipo2, $searchTipo3, $searchTipo3, $orCondicion
            );
        }



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
        
        $this->alertTypes = getAlertTypes();
    }

    public function actionFilter_Click($strFormId, $strControlId, $strParameter) {
        $user = @unserialize($_SESSION['TobUser']);

        $searchTipo = QQ::NotIn(QQN::Offer()->IdOffer, QQ::SubSql("SELECT  IdOffer from balance where iduser = " . $user->IdUser));
        $searchTipo2 = QQ::LessThan(QQN::Offer()->AppliedOffers, QQN::Offer()->MaxOffers);
        $searchTipo3 = QQ::LessOrEqual(QQN::Offer()->DateFrom, QDateTime::Now());

        $orElemento1 = QQ::IsNull(QQN::Offer()->DateTo);
        $orElemento2 = QQ::GreaterOrEqual(QQN::Offer()->DateTo, QDateTime::Now());
        $orCondicion = QQ::OrCondition($orElemento1, $orElemento2);

        if (trim($this->txtModelo->Text != "")) {
            $filtro = QQ::Like(QQN::Offer()->Description, "%" . trim($this->txtModelo->Text) . "%");
            $this->dtgOffersToClient->AdditionalConditions = QQ::AndCondition(
                            $filtro, $searchTipo, $searchTipo2, $searchTipo3, $searchTipo3, $orCondicion
            );
        } else {
            $this->dtgOffersToClient->AdditionalConditions = QQ::AndCondition(
                            $searchTipo, $searchTipo2, $searchTipo3, $searchTipo3, $orCondicion
            );
        }

        $this->dtgOffersToClient->Refresh();

        //QApplication::ExecuteJavaScript("showSuccess('Filter correctly!');");
        QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['success']."','Filter correctly!');");
    }

    public function btnNewModelo_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogEditModelo->strIdUser = $this->user->IdUser;
        $this->dlgDialogEditModelo->Title = addslashes("<i class='icon wb-plus'></i> Available Offers");
        $this->dlgDialogEditModelo->createNew();
        $this->dlgDialogEditModelo->ShowDialogBox();
    }

    public function actionsCalculateRemainOffer(Offer $id) {

        $maxOffer = $id->MaxOffers;
        $apliedOffers = $id->AppliedOffers;

        return "<center>" . ($maxOffer - $apliedOffers) . "</center>";
    }

    public function getRestaurantName(Offer $offer) {

        $restaurantName = $offer->IdRestaurantObject->RestaurantName;

        return "<left>" . $restaurantName . "</left>";
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


        $controlID = 'photo' . $id->IdOffer;
        $validatePhotoCtrl = $this->dtgOffersToClient->GetChildControl($controlID);
        if (!$validatePhotoCtrl) {
            $validatePhotoCtrl = new QLabel($this->dtgOffersToClient, $controlID);
            $validatePhotoCtrl->HtmlEntities = FALSE;
            $validatePhotoCtrl->Cursor = QCursor::Pointer;
            $validatePhotoCtrl->Text = '<div  class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Editar">
                            <i class="icon wb-camera" aria-hidden="true"></i>
                          </div>';
            $validatePhotoCtrl->ActionParameter = $id->IdOffer;
            $validatePhotoCtrl->AddAction(new QClickEvent(), new QAjaxAction('validateofferphoto_Click'));
        }
        return "<center>" . $editCtrl->Render(false) . " " . $validatePhotoCtrl->Render(false) . "</center>";
    }

    public function validateoffer_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgDialogEditModelo->Title = addslashes("<i class='icon wb-edit'></i> Validating offer ...");
        $this->dlgDialogEditModelo->txtMessage = "";
        $this->dlgDialogEditModelo->ID = intval($strParameter);
        $this->dlgDialogEditModelo->ShowDialogBox();
    }

    public function validateofferphoto_Click($strFormId, $strControlId, $strParameter) {
        $this->dlgValidateOfferPhoto->Title = addslashes("<i class='icon wb-edit'></i> Validating offer ...");
        $this->dlgValidateOfferPhoto->txtMessage = "aaaaaaaaaa";
        $this->dlgValidateOfferPhoto->ID = intval($strParameter);
        $this->dlgValidateOfferPhoto->ShowDialogBox();
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
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['success']."','Deleted successfully!');");
            //QApplication::ExecuteJavaScript("showSuccess('Eliminado Correctamente!');");
        } catch (QMySqliDatabaseException $ex) {
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['warning']."','".str_replace("'", "\'", $ex->getMessage())."');");
            //QApplication::ExecuteJavaScript("showWarning('Error " . str_replace("'", "\'", $ex->getMessage()) . "');");
        }
    }

    public function close_edit($update) {

        if ($update) {
            $this->dtgOffersToClient->Refresh();
            $this->items_Found();
            QApplication::ExecuteJavaScript("showAlert('".$this->alertTypes['success']."','Data updated correctly!');");
            //QApplication::ExecuteJavaScript("showSuccess('¡Datos actualizados correctamente!');");
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

ViewListOffersToClientForm::Run('ViewListOffersToClientForm');
?>