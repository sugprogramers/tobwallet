<?php

class QContractList extends QPanel {

    protected $panelBody;
    protected $arrayServicers;
    protected $objUserData;
    protected $actionCtrls;
    protected $arrayData;
    protected $arrayCtrls = array();

    public function __construct($objParentObject, Userdata $userData, $arrayData = null, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);

        $this->objUserData = $userData;

        $this->AutoRenderChildren = true;

        //if (!empty($arrayData)) {
        $this->arrayData = $arrayData;

        //}
    }

    public function GetControlHtml() {

        $listBox = '<ul class="list-group list-group-gap">';
        foreach ($this->arrayData as $key => $c) {

            if (count($c) > 0) {
                $listBox .= '<li class="list-group-item bg-blue-grey-100">
                <h4 class="inline-block vertical-align-middle" style="color: #76838f; font-weight: 300;"><i class="icon wb-file" aria-hidden="true"></i> ' . ucfirst($key) . '</h4>';
                $listBox .= '<p>';
                foreach ($c as $contract) {
                    if (!is_null($contract) && ($contract instanceof Contracts)) {
                        $signed = $contract->isSigned();
                        $name = (is_null($contract->Servicer)) ? ucfirst($key) : $contract->Servicer;
                        $btnControl = $this->createControls($key, $name, $signed, $contract);
                        $listBox .= ' '.$btnControl->Render(FALSE);
                    }
                }

                $listBox .= "</p></li>";
            }
        }
        $listBox .= '</ul>';

        return $listBox;
    }

    public function createControls($value, $servicer, $signed, Contracts $contract) {
        $cod = str_replace("-", "", ucfirst(strtolower($value)));
        $serv = str_replace("-", "", ucfirst(strtolower($servicer)));
        $id = 'btnDownload' . $cod . $serv;
        $lblDownload = $this->GetChildControl($id);
        if (!$lblDownload) {
            $lblDownload = new QButton($this, $id);
            $lblDownload->HtmlEntities = false;
            $lblDownload->Cursor = QCursor::Pointer;
        }
        $lblDownload->RemoveAllActions(QClickEvent::EventName);
        if ($signed) {
            $lblDownload->SetCustomAttributes(array("data-toggle" => "tooltip", "data-placement" => "top", "data-original-title" => "Click to download", "title" => "", "aria-describedby" => "tooltipDownloadContract"));
            $lblDownload->CssClass = 'btn btn-icon btn-success';
            $lblDownload->Text = '<i class="icon wb-download" aria-hidden="true"></i> ' . $servicer;
            $lblDownload->ActionParameter = $contract->IdContracts;
            $lblDownload->AddAction(new QClickEvent(), new QAjaxAction('btnDownloadContract_Click'));
            
        } else {
            $lblDownload->SetCustomAttributes(array("data-toggle" => "tooltip", "data-placement" => "top", "data-original-title" => "Click to sign", "title" => "", "aria-describedby" => "tooltipDownloadContract"));
            $lblDownload->CssClass = 'btn btn-icon btn-primary';
            $lblDownload->Text = '<i class="icon fa-pencil" aria-hidden="true"></i> ' . $servicer;
            $lblDownload->ActionParameter = $contract->IdContracts;
            $lblDownload->AddAction(new QClickEvent(), new QAjaxAction('btnSignContract_Click'));
        }

        return $lblDownload;
    }

}

?>