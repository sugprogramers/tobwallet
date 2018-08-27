<?php

class DialogImageGeneral extends QDialogBox {

    public $UploadImage;
    public $btnUploadImage;
    public $folder;
    public $nameimage;
    public $anchoFinal;
    public $altoFinal;
    public $fileNameFinal;
    public $idUser;
    public $strClosePanelMethod;
    public $btnCancelUpload;

    public function __construct($objParentObject, $strClosePanelMethod, $intIdGrup = null, $strControlId = null) {
        // Call the Parent
        try {
            parent::__construct($objParentObject, $strControlId);
        } catch (QCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        $this->strTemplate = __DOCROOT__ . __SUBDIRECTORY__ . '/dialog/DialogImageGeneral.tpl.php';
        $this->strClosePanelMethod = $strClosePanelMethod;
        $this->Width = 500;
        $this->isAutosize = true;
        $this->UploadImage = new QFileControl($this);
        
        $this->Resizable = false;

        $this->btnUploadImage = new QButton($this, "btnUploadImage");
        $this->btnUploadImage->Text = '<i class="icon fa-check" aria-hidden="true"></i> Upload';
        $this->btnUploadImage->HtmlEntities = false;
        $this->btnUploadImage->CssClass = "btn btn-raised btn-primary";
        $this->btnUploadImage->AddAction(new QClickEvent(), new QServerControlAction($this, 'btnUploadImage_Click'));

        $this->btnCancelUpload = new QButton($this, "btnCancelUpload");
        $this->btnCancelUpload->Text = '<i class="icon fa-close" aria-hidden="true"></i> Cancel';
        $this->btnCancelUpload->HtmlEntities = false;
        $this->btnCancelUpload->CssClass = "btn btn-raised btn-danger";
        $this->btnCancelUpload->AddAction(new QClickEvent(), new QAjaxControlAction($this, "btnCancelUpload_Click"));
    }

    public function btnCancelUpload_Click($strFormId, $strControlId, $strParameter) {
        $this->CloseSelf(FALSE);
    }

    public function btnUploadImage_Click($strFormId, $strControlId, $strParameter) {

        if ($this->UploadImage->File != null) {
            $to1 = $this->folder . '/' . $this->nameimage . '_' . str_replace(' ', '', $this->UploadImage->FileName);
            $to2 = $this->folder . '/' . $this->nameimage . '_Resize_' . str_replace(' ', '', $this->UploadImage->FileName);

            $extensionG = pathinfo($this->UploadImage->FileName);
            $extension = $extensionG['extension'];
            if ($extension == "jpg" || $extension == "jpeg" || $extension == "JPG" || $extension == "png" || $extension == "gif") {

                if (copy($this->UploadImage->File, $to1)) {
                    $imagen = getimagesize($to1);
                    $ancho = $imagen[0];
                    $alto = $imagen[1];

                    if (($ancho == $this->anchoFinal && $alto == $this->altoFinal) || $this->anchoFinal == 0 && $this->altoFinal == 0) {
                        $this->fileNameFinal = basename($to1);
                    } else {
                        $this->resizeImage($this->anchoFinal, $this->altoFinal, $to1, $to2);
                        $this->fileNameFinal = basename($to2);
                    }
                    $this->CloseSelf(true);
                }
            } else {
                QApplication::DisplayAlert("Error extension image ");
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
        $this->anchoFinal = $anchoFinal;
        $this->altoFinal = $altoFinal;
        $this->idUser = $id;
    }

    protected function CloseSelf($blnChangesMade) {
        $strMethod = $this->strClosePanelMethod;
        $this->objForm->$strMethod($blnChangesMade);
        $this->HideDialogBox();
    }

    function resizeImage($anchoFinal, $altoFinal, $image, $newimage) {
        /* Tamaño Imagen */
        $imagen = getimagesize($image);
        $ancho = $imagen[0];
        $alto = $imagen[1];

        //$original = imagecreatefromjpeg($image);
        $extensionG = pathinfo($image);
        $extension = $extensionG['extension'];
        if ($extension == "jpg" || $extension == "jpeg" || $extension == "JPG") {
            $original = imagecreatefromjpeg($image);
        }

        if ($extension == "png") {
            $original = imagecreatefrompng($image);
            ImageAlphaBlending($original, true);
            ImageSaveAlpha($original, true);
        }

        if ($extension == "gif") {
            $original = imagecreatefromgif($image);

            $transparent_index = ImageColorTransparent($original);
            if ($transparent_index != (-1))
                $transparent_color = ImageColorsForIndex($original, $transparent_index);
            //ImageAlphaBlending($original,true); 
            //ImageSaveAlpha($original,true);
        }


        $lienzo = imagecreatetruecolor($anchoFinal, $altoFinal);

        if ($extension == "jpg" || $extension == "jpeg" || $extension == "JPG") {
            
        }

        if ($extension == "png") {
            ImageAlphaBlending($lienzo, false);
            ImageSaveAlpha($lienzo, true);
        }

        if ($extension == "gif") {
            //ImageAlphaBlending($lienzo,false); 
            //ImageSaveAlpha($lienzo,true);

            if (!empty($transparent_color)) {
                $transparent_new = ImageColorAllocate($lienzo, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
                $transparent_new_index = ImageColorTransparent($lienzo, $transparent_new);
                ImageFill($lienzo, 0, 0, $transparent_new_index);
            }
        }


        imagecopyresampled($lienzo, $original, 0, 0, 0, 0, $anchoFinal, $altoFinal, $ancho, $alto);
        ImageDestroy($original);
        $cal = 100;

        if ($extension == "jpg" || $extension == "jpeg" || $extension == "JPG") {
            imageJPEG($lienzo, $newimage, $cal);
        }

        if ($extension == "png") {
            $cal = 9;
            imagePNG($lienzo, $newimage, $cal);
        }

        if ($extension == "gif") {
            imageGIF($lienzo, $newimage, $cal);
        }
    }

}

?>
