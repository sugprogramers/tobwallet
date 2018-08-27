<?php

require('includes/configuration/prepend.inc.php');

class DashboardUser extends QForm {

    public $user;
    public $selectYearIni = 0;
    public $selectYearFin = 0;
    public $lstYear;

    protected function Form_Run() {

        $Datos1 = @unserialize($_SESSION['DatosUsuario']);

        if ($Datos1) {
            $this->user = Usuario::LoadByEmail($Datos1->Email);
        } else {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . '/login');
        }
    }

    protected function Form_Create() {

        $this->strAction = __VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . "/dashboarduser";
        
        $this->lstYear = new QListBox($this);
        $this->lstYear->Width = 150;
        $this->lstYear->CssClass = "form-control";

        $this->lstYear->AddItem(new QListItem("2017", 2017));
        $this->lstYear->AddItem(new QListItem("2018", 2018));
        $this->lstYear->AddItem(new QListItem("2019", 2019));
        $this->lstYear->AddItem(new QListItem("2020", 2020));
        $this->lstYear->AddItem(new QListItem("2021", 2021));
        $this->lstYear->AddItem(new QListItem("2022", 2022));
        $this->lstYear->SelectedValue = 2017;        
        $this->selectYearIni = 2017;
        $this->selectYearFin = 2017;
        $this->lstYear->AddAction(new QChangeEvent(), new QServerAction("lstYear_Change"));

        QApplication::ExecuteJavaScript("showSuccess('Data loaded correctly!');");
    }

    protected function lstYear_Change($strFormId, $strControlId, $strParameter) {
         
           $this->selectYearIni = $this->lstYear->SelectedValue;
           $this->selectYearFin = $this->lstYear->SelectedValue;
       
    }

}

DashboardUser::Run('DashboardUser');
?>