<?php

/**
 * Created by PhpStorm.
 * User: César Pantoja
 * Date: 9/20/17
 * Time: 11:03 PM
 */
class DialogEditProductoDefecto extends QDialogBox
{

    public $mctProductodefecto;

    public $txtNombre;
    public $txtTalla;

    public $lstTalla;
    public $chkTallas;

    public $btnSave;
    public $btnCancel;
    public $strClosePanelMethod;

    public function __construct($objParentObject, $strClosePanelMethod, $strControlId = null) {
        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->Width = 500;
        $this->Resizable = false;
        $this->isAutosize = true;
        $this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/dialog/DialogEditProductoDefecto.tpl.php';
        $this->strClosePanelMethod = $strClosePanelMethod;

        // controles generados
        $this->mctProductodefecto = ProductodefectoMetaControl::CreateFromPathInfo($this);


        $this->txtNombre = $this->mctProductodefecto->txtNombre_Create();
        $this->txtNombre->Placeholder = "Nombre";

        $this->txtTalla = $this->mctProductodefecto->txtTalla_Create();
        $this->txtTalla->Placeholder = "Talla";

        //4 6 8 10 12 14 16 S M L XL XXL XXXL
        $this->lstTalla = new QListBox($this);
        $this->lstTalla->CssClass = "form-control input-sm editHidden";
        $this->lstTalla->AddItem(new QListItem('4', 1));
        $this->lstTalla->AddItem(new QListItem('6', 2));
        $this->lstTalla->AddItem(new QListItem('8', 3));
        $this->lstTalla->AddItem(new QListItem('10', 4));
        $this->lstTalla->AddItem(new QListItem('12', 5));
        $this->lstTalla->AddItem(new QListItem('14', 6));
        $this->lstTalla->AddItem(new QListItem('16', 7));
        $this->lstTalla->AddItem(new QListItem('S', 8));
        $this->lstTalla->AddItem(new QListItem('M', 9));
        $this->lstTalla->AddItem(new QListItem('L', 10));
        $this->lstTalla->AddItem(new QListItem('XL', 11));
        $this->lstTalla->AddItem(new QListItem('XXL', 12));
        $this->lstTalla->AddItem(new QListItem('XXXL', 13));


        //buttons
        $this->btnSave = new QButton($this);
        $this->btnSave->HtmlEntities = FALSE;
        $this->btnSave->Text = '<i class="icon fa-check" aria-hidden="true"></i> Guardar';
        $this->btnSave->CssClass = "btn btn-primary btn-raised ";
        $this->btnSave->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnSave_Click'));

        $this->btnCancel = new QButton($this);
        $this->btnCancel->HtmlEntities = FALSE;
        $this->btnCancel->Text = '<i class="icon fa-close" aria-hidden="true"></i> Cancelar';
        $this->btnCancel->CssClass = "btn btn-danger btn-raised ";
        $this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCancel_Click'));
        
        $this->chkTallas = new QCheckBox($this, 'Tallas');
        $this->chkTallas->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnTallas_Click'));
    }

     public function btnTallas_Click($strFormId, $strControlId, $strParameter) {
         if($this->chkTallas->Checked==false){
          
            $this->lstTalla->Enabled = true;
         }
         else{
           $this->lstTalla->Enabled = false;
         }
         
     }
     
    // eventos buttons
    public function btnSave_Click($strFormId, $strControlId, $strParameter) {

        try {
            $this->txtTalla->Text = $this->lstTalla->SelectedValue;
            $this->txtNombre->Text = trim($this->txtNombre->Text);
            
            //salvar
            if($this->chkTallas->Checked==true){
                for($i=1 ; $i<=13 ; $i++)
                {$new = new Productodefecto();
                 $new->Nombre =   $this->txtNombre->Text;
                 $new->Talla = $i;
                 $new->Save();
                }
            }            
            else{
            $this->mctProductodefecto->SaveProductodefecto();
            }
            $this->CloseSelf(TRUE);
        } catch (Exception $exc) {
            QApplication::ExecuteJavaScript("showWarning('Error: " . str_replace("'", "\'", $exc->getMessage()) . "');");
        }
    }

    public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
        $this->CloseSelf(FALSE);
    }

    //funciones de carga
    public function createNew() {
        $this->mctProductodefecto->objProductodefecto= new Productodefecto();
        $this->mctProductodefecto->Refresh();
        
        $this->chkTallas->Checked = false;
        $this->lstTalla->Enabled = true;
    }

    public function loadDefault($idp) {
        try {
            $obj = Productodefecto::LoadByIdProductodefecto(intval($idp));
            $this->mctProductodefecto->objProductodefecto = $obj;
            $this->mctProductodefecto->blnEditMode = TRUE;
            $this->mctProductodefecto->Refresh();
            $this->lstTalla->SelectedValue =  $obj->Talla;
            $this->chkTallas->Checked = false;
            $this->lstTalla->Enabled = true;
        } catch (Exception $exc) {
            QApplication::ExecuteJavaScript("showWarning('Error " . str_replace("'", "\'", $exc->getMessage()) . "');");
        }
    }

    // aditional funciones
    public function CloseSelf($blnChangesMade) {
        $strMethod = $this->strClosePanelMethod;
        $this->objForm->$strMethod($blnChangesMade);
        $this->HideDialogBox();
    }

}
?>