<?php

class QAccordionBootstrap extends QPanel {
    protected $arrayItems;
    protected $panelBody;
    protected $arrayServicers;
    protected $objUser;
    protected $actionCtrls;

    public function __construct($objParentObject, $arrayServicers, Users $objUser,$showActionCtrls = true, $strControlId = null) {
        parent::__construct($objParentObject, $strControlId);

        $this->objUser = $objUser;
        $this->arrayServicers = $arrayServicers;
        $this->AutoRenderChildren = true;
        
        $this->actionCtrls = $showActionCtrls;

        $this->getTotalItems();
    }

    public function getTotalItems() {
        $clientLoans = Loans::QueryArray(
                        QQ::Equal(QQN::Loans()->IdUsers, $this->objUser->IdUsers), QQ::Clause(
                                QQ::GroupBy(QQN::Loans()->Servicer), QQ::Count(QQN::Loans()->Servicer, 'loan_client_servicer')
        ));

        $this->arrayItems = array();
        foreach ($clientLoans as $groupServicer) {
            $servicerName = "";
            if (!is_null($groupServicer->Servicer)) {
                $cod = $groupServicer->Servicer;
                $servicerName = $this->arrayServicers->options->$cod;
            }
            //$datagridServicerLoan = $this->createDatagridLoans($groupServicer->Servicer);
            $this->arrayItems["_" . $groupServicer->Servicer] = array(
                'servicer' => $groupServicer->Servicer,
                'servicer_name' => $servicerName,
                'count' => $groupServicer->GetVirtualAttribute('loan_client_servicer'));
        }
    }

    public function GetControlHtml() {
        $accordion = "";
        $this->getTotalItems();
        if (count($this->arrayItems) > 0) {
            foreach ($this->arrayItems as $key => $data) {
                $tableLoans = $this->createDatagridLoans($data['servicer']);
                $id = 'headerCollapse' . md5($data['servicer']);
                $ctrlHeader = $this->GetChildControl($id);
                if (!$ctrlHeader) {
                    $ctrlHeader = new QLabel($this, $id);
                    $ctrlHeader->HtmlEntities = false;
                }
                $ctrlHeader->Text = "<h3><a class='panel-title' data-parent='#loanServicerAccordion' data-toggle='collapse' href='#loanServicerCollapse" . $key . "' aria-controls='loanServicerCollapse" . $key . "' aria-expanded='true'>" . $data['servicer_name'] . " <span class='label label-primary'>" . $data['count'] . "</span></a></h3>";


                $accordion .= "<div class='panel'><div class='panel-heading' id='loanServicerHeading" . $key . "' role='tab'>" . $ctrlHeader->Render(FALSE) . "
                                                    </div>
                                                    <div class='panel-collapse collapse' id='loanServicerCollapse" . $key . "' aria-labelledby='loanServicerHeading" . $key . "'
                                                         role='tabpanel'>
                                                        <div class='panel-body'>
                                                            <div class='table-responsive' style='margin-top:10px;'>
                                                                    " . $tableLoans->Render(false) . "              
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>";
            }
        } else {
            $accordion .= "<ul class='list-group list-group-gap'><li class='list-group-item bg-blue-grey-100'><h3><i class='icon fa-warning' aria-hidden='true'></i> No Loan Data Found</h3>Perhaps your FSA information is incorrect or you haven't pulled your loan data yet?</li></ul>";
        }

        return $accordion;
    }

    public function createDatagridLoans($servicer) {

        $idDtg = 'dtgLoansServicer' . md5($servicer);
        $dtgLoans = $this->GetChildControl($idDtg);
        if (!$dtgLoans) {
            $dtgLoans = new LoansDatagrid($this, $idDtg);
            $dtgLoans->CssClass = 'table table-bordered table-striped';
            $dtgLoans->UseAjax = true;
            $dtgLoans->Owner = $this;
            //$dtgLoans->WaitIcon = $this->objDefaultWaitIcon;
            $dtgLoans->ShowFilter = false;
            $dtgLoans->MetaAddColumn('IdLoans', 'Name=Id');
            $dtgLoans->MetaAddColumn('Type');
            //$dtgLoans->MetaAddColumn('DebtAmount');
            $dtgLoans->AddColumn(new QDataGridColumn('Debt Amount', '<?= $_OWNER->renderDebtAmount($_ITEM->DebtAmount); ?>', 'HtmlEntities=false', 'Width=150'));
            $dtgLoans->MetaAddColumn('LoanTerm');
            if($this->actionCtrls){
                $dtgLoans->AddColumn(new QDataGridColumn('', '<?= $_FORM->renderActionsLoans($_ITEM->IdLoans,$_ITEM->Servicer,$_CONTROL->ControlId); ?>', 'HtmlEntities=false', 'Width=80'));
            }else{
                $dtgLoans->AddColumn(new QDataGridColumn('', '<?= $_FORM->renderViewLoans($_ITEM->IdLoans,$_ITEM->Servicer,$_CONTROL->ControlId); ?>', 'HtmlEntities=false', 'Width=80'));
            }
            
            $dtgLoans->AdditionalConditions = QQ::AndCondition(QQ::Equal(QQN::Loans()->IdUsers, $this->objUser->IdUsers), QQ::Equal(QQN::Loans()->Servicer, $servicer));
        }


        return $dtgLoans;
    }
    
   public function renderDebtAmount($amount){
       if($amount == ''){
           return number_format(0.000, 3);
       }else{
           return number_format($amount, 3);
       }
   }

}

?>