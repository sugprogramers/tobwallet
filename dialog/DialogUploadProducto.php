<?php

/**
 * Created by PhpStorm.
 * User: César Pantoja
 * Date: 9/20/17
 * Time: 11:03 PM
 */
class DialogUploadProducto extends QDialogBox
{

    public $UploadFile;
    public $btnUploadFile;
    public $folder;
    public $altoFinal;
    public $fileNameFinal;
    public $idUser;
    public $strClosePanelMethod;
    public $btnCancelUpload;

    public function __construct($objParentObject, $strClosePanelMethod, $strControlId = null) {
        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/dialog/DialogUploadProducto.tpl.php';
        $this->strClosePanelMethod = $strClosePanelMethod;
        $this->Width = 500;
        $this->isAutosize = true;
        $this->Title = "Upload Excel";
        $this->UploadFile = new QFileControl($this);
        
        $this->Resizable = false;

        $this->btnUploadFile = new QButton($this, "btnUploadFile");
        $this->btnUploadFile->Text = '<i class="icon fa-check" aria-hidden="true"></i> Upload';
        $this->btnUploadFile->HtmlEntities = false;
        $this->btnUploadFile->CssClass = "btn btn-raised btn-primary";
        $this->btnUploadFile->AddAction(new QClickEvent(), new QServerControlAction($this, 'btnUploadFile_Click'));

        $this->btnCancelUpload = new QButton($this, "btnCancelUpload");
        $this->btnCancelUpload->Text = '<i class="icon fa-close" aria-hidden="true"></i> Cancel';
        $this->btnCancelUpload->HtmlEntities = false;
        $this->btnCancelUpload->CssClass = "btn btn-raised btn-danger";
        $this->btnCancelUpload->AddAction(new QClickEvent(), new QAjaxControlAction($this, "btnCancelUpload_Click"));
    }

    public function btnCancelUpload_Click($strFormId, $strControlId, $strParameter) {
        $this->CloseSelf(FALSE);
    }

    public function btnUploadFile_Click($strFormId, $strControlId, $strParameter) {
       return;
        if ($this->UploadFile->File != null) {
            $to1 = $this->folder . '/' . $this->nameimage . '_' . $this->UploadFile->FileName;
           
            $extensionG = pathinfo($this->UploadFile->FileName);
            $extension = $extensionG['extension'];
            if ($extension == "csv") {

                if (copy($this->UploadFile->File, $to1)) {
                        $this->fileNameFinal = basename($to1);

                    //cargamos el archivo
                    $archivo = file_get_contents($this->fileNameFinal);
                    $lineas = explode("\n", $archivo);
                    $i=0;
                    foreach ($lineas as $linea) {

                        if ($i != 0 && trim($linea)!='') {
                            //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
                            /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá
                            leyendo hasta que encuentre un ; */
                            $datos = explode(";", trim($linea));


                            //Almacenamos los datos que vamos leyendo en una variable
                            //usamos la función utf8_encode para leer correctamente los caracteres especiales
                            $codigo = utf8_encode($datos[0]);
                            $nombre = utf8_encode($datos[1]);
                            $talla = (int)str_replace(' ', '', $datos[2]);
                            $stock = $datos[3];
                            $costo = $datos[4];
                            $modelo = utf8_encode($datos[5]);
                            $producto = new Producto();
                            $producto->Codigo = $codigo;
                            $producto->Nombre = $nombre;
                            $producto->Talla = $talla;
                            $producto->CantidadStock = $stock;
                            $producto->CostoUnitario = $costo;
                            $producto->IdModelo = $modelo;
                            $producto->Save();

                        }

                        $i++;
                    }
                    }
                    $this->CloseSelf(true);

            } else {
                QApplication::DisplayAlert("Archivo No Permitido");
                $this->CloseSelf(false);
            }
        }
    }

    public function setInfo($anchoFinal, $altoFinal, $folder, $name, $id) {

        if (!file_exists($folder)) {
            mkdir($folder, 0777, TRUE);
        }
        $this->folder = $folder;
        $this->nameimage = $name;

    }

    protected function CloseSelf($blnChangesMade) {
        $strMethod = $this->strClosePanelMethod;
        $this->objForm->$strMethod($blnChangesMade);
        $this->HideDialogBox();
    }

}
?>