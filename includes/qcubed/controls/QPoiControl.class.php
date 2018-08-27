<?php

/**
 * Description of QPoiControl
 *
 * @author Harold
 */
class QPoiControl extends QPanel {

    protected $btnUploadPoi;
    protected $txtDescription;
    protected $dtgPoi;
    protected $UploadPoi;
    protected $clientId;
    protected $user;
    public $dlgConfirmDelete;
    protected $btnReloadDatagrid;
    protected $parentForm;

    /**
     * Constructor for this control
     * @param mixed $objParentObject Parent QForm or QControl that is responsible for rendering this control
     * @param string $strControlId optional control ID
     */
    public function __construct($objParentObject, $clientId = null, $user = null, $strControlId = null) {

        parent::__construct($objParentObject, $strControlId);
        $this->parentForm = $objParentObject;
        $this->AutoRenderChildren = true;
        if ($user instanceof Users) {
            $this->user = $user;
        }
        $this->clientId = $clientId;

        //$this->dlgConfirmDelete = new DialogConfirm($objParentObject, "close_confirm_deletePoi");
        // Let's create a btn for uploading POIs
        $this->createBtnUploadPoi();

        // Let's create a textbox for input file description
        $this->createTxtPoiDescription();

        // Let's create a Datagrid for showing the Client's POIs
        $this->createPoiDatagrid();

        $this->btnReloadDatagrid = new QButton($this, 'reloadDatagridPoi');
        $this->btnReloadDatagrid->AddAction(new QClickEvent(), new QAjaxControlAction($this, "reloadDatagrid"));
    }

    /**
     * If this control needs to update itself from the $_POST data, the logic to do so
     * will be performed in this method.
     */
    public function ParsePostData() {
        
    }

    /**
     * If this control has validation rules, the logic to do so
     * will be performed in this method.
     * @return boolean
     */
    public function Validate() {
        return true;
    }

    /**
     * Get the HTML for this Control.
     * @return string
     */
    public function GetControlHtml() {
        // Pull any Attributes
        $strAttributes = $this->GetAttributes();

        // Pull any styles
        if ($strStyle = $this->GetStyleAttributes())
            $strStyle = 'style="' . $strStyle . '"';


        // Return the HTML.
        return sprintf('<div id="%s" %s%s>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="margin-bottom-15"> %s</div>            
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 col-sm-6">
            <div class="margin-bottom-15"> %s</div>            
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="margin-bottom-15"> %s</div>            
        </div>            
    </div>
    <div class="row" style="overflow-y: scroll;max-height: 280px;">
        <div class="col-md-12 col-sm-12">
            <div class="table-responsive" > %s</div>
        </div> 
    </div>
</div>', $this->strControlId, $strAttributes, $strStyle, $this->UploadPoi->Render(false), $this->txtDescription->Render(false), $this->btnUploadPoi->Render(false), $this->dtgPoi->Render(false));
    }

    public function createTxtPoiDescription() {
        $this->txtDescription = new QTextBox($this, 'txtPoiDescription');
        $this->txtDescription->Placeholder = "File description";
        $this->txtDescription->CssClass = "form-control";
        $this->txtDescription->ReadOnly = false;
    }

    public function createBtnUploadPoi() {
        $this->UploadPoi = new QFileControl($this, 'poiUpload');
        $this->UploadPoi->CssClass = "filestyle";


        $this->btnUploadPoi = new QButton($this);
        $this->btnUploadPoi->CssClass = "btn btn-primary btn-outline";
        $this->btnUploadPoi->HtmlEntities = false;
        $this->btnUploadPoi->Text = '<i class="icon fa-upload"></i> Upload';
        $this->btnUploadPoi->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnUploadImage_Click'));
    }

    public function createPoiDatagrid() {
        $this->dtgPoi = new PoiDataGrid($this);
        $this->dtgPoi->ShowFilter = false;
        $this->dtgPoi->CssClass = "table table-bordered";
        $this->dtgPoi->Owner = $this;
        $this->dtgPoi->AddColumn(new QDataGridColumn('', '<?= $_OWNER->renderPoiPreview($_ITEM); ?>', 'HtmlEntities=false', 'Width=150'));
        $this->dtgPoi->MetaAddColumn('Name', 'Name=Description');

        $this->dtgPoi->MetaAddColumn('UploadDateTime', 'Name=Uploaded at', 'Width=100');

        $this->dtgPoi->AddColumn(new QDataGridColumn('', '<?= $_OWNER->renderDeletePoi($_ITEM); ?>', 'HtmlEntities=false'));
        $this->dtgPoi->AdditionalConditions = QQ::AndCondition(QQ::Equal(QQN::Poi()->IdUserData, $this->clientId));
        $this->dtgPoi->UseAjax = true;
    }

    public function renderUploadedBy(Poi $Poi) {
        $user = Users::LoadByIdUsers($Poi->IdUser);
        $fullName = $user->FirstName . " " . $user->LastName . "<br>";
    }

    public function renderPoiPreview(Poi $Poi) {
        $url_path = __UPLOAD_PATH__ . '/poi/' . md5($Poi->IdUserData) . '/' . $Poi->NameFile;
        $img = '<figure class="overlay overlay-hover">
                    <img class="overlay-figure" src="' . $url_path . '" alt="...">
                    <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                      <a class="icon wb-search poi-popup-link" href="' . $url_path . '"></a>
                      <a class="icon wb-download" href="' . $url_path . '"  download="' . $Poi->NameFile . '"></a>
                    </figcaption>
                  </figure>';
        return $img;
    }

    public function renderDeletePoi(Poi $Poi) {
        $ctrlId = "deletePoi" . md5($Poi->IdPoi);
        $ctrl = $this->dtgPoi->GetChildControl($ctrlId);
        if (!$ctrl) {
            $ctrl = new QLabel($this->dtgPoi);
            $ctrl->HtmlEntities = false;
            $ctrl->Cursor = QCursor::Pointer;
            $ctrl->Text = '<span data-toggle="tooltip" data-placement="top" data-original-title="Delete POI" title="" aria-describedby="tooltipDeletePoi' . $Poi->IdPoi . '"><i class="icon wb-trash" aria-hidden="true"></i></span>';
            $ctrl->ActionParameter = $Poi->IdPoi;
            $ctrl->AddAction(new QClickEvent(), new QAjaxControlAction($this, "confirm_delete_poi"));
        }
        return "<center>" . $ctrl->Render(false) . "</center>";
    }

    public function confirm_delete_poi($strFormId, $strControlId, $strParameter) {
//        $this->dlgConfirmDelete->ShowDialogBox();
//        $this->dlgConfirmDelete->ID = intval($strParameter);
//        $this->dlgConfirmDelete->setMessage("Are you sure you want to remove this file?");

        $this->deletePoi($strParameter);
        $this->dtgPoi->Refresh();
        QApplication::ExecuteJavaScript("reloadJsLibraries();initialize_popup();");
    }

    public function deletePoi($idPoi) {
        try {
            $poi = Poi::LoadByIdPoi(intval($idPoi));

            $file_path = __UPLOAD__ . '/poi/' . md5($poi->IdUserData) . '/' . $poi->NameFile;

            $poi->Delete();

            // Remove from server            
            @unlink($file_path);
        } catch (Exception $ex) {
            $msg = "Exception: " . addslashes($ex->getMessage());
            QApplication::ExecuteJavaScript("showWarning('$msg');");
            return false;
        }
    }

    public function close_confirm_deletePoi($answer, $id) {
        if ($answer) {
            $this->deletePoi($id);
            $this->dtgPoi->Refresh();
            QApplication::ExecuteJavaScript("reloadJsLibraries();initialize_popup();");
        }
    }

    public function btnUploadImage_Click() {
        $url = __SUBDIRECTORY__ . '/upload_poi.php';
        $desc = trim($this->txtDescription->Text);
        $uploadedBy = $this->user->IdUsers;

        $formParentID = $this->parentForm->FormId;
        if ($desc == '') {
            $this->txtDescription->Blink();
            QApplication::ExecuteJavaScript("showWarning('You must provide a description for this file!');");
            return false;
        }

        QApplication::ExecuteJavaScript("uploadPoi($this->clientId,'$url','$desc',$uploadedBy,'$formParentID');");
    }

    public function reloadDatagrid($strFormId, $strControlId, $strParameter) {
        $this->dtgPoi->Refresh();
        $this->txtDescription->Text = "";
        $this->UploadPoi->Refresh();
        QApplication::ExecuteJavaScript("reloadJsLibraries();initialize_popup();");
    }

}

?>