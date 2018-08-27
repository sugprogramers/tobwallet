<?php

require('includes/configuration/prepend.inc.php');

class DashboardAdmin extends QForm {

    public $user;
    public $selectYearIni = 0;
    public $selectYearFin = 0;
    public $lstYear;
    
    public $lstTienda;
     public $selectTienda = 0;

    protected function Form_Run() {

   
        $Datos1 = @unserialize($_SESSION['DatosAdministrador']);
       
        if ($Datos1) {
            $this->user = Administrador::LoadByEmail($Datos1->Email);
        
        } else {
            QApplication::Redirect(__VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ .  '/login');
        }
        
    }

    protected function Form_Create() {

        $this->strAction = __VIRTUAL_DIRECTORY__ . __SUBDIRECTORY__ . "/dashboardadmin";
        
        $this->lstTienda = new QListBox($this);
        //$this->lstTienda->CssClass = "form-control";
        $tiendas = Sucursal::LoadAll();
        $this->lstTienda->AddItem(new QListItem("-- Todos --", 0));
        foreach ($tiendas as $value1) {
            $this->lstTienda->AddItem(new QListItem($value1->Nombre, $value1->IdSucursal));
        }        
        $this->lstTienda->SelectedValue = 0;        
        $this->selectTienda = 0;
        $this->lstTienda->AddAction(new QChangeEvent(), new QServerAction("lstTienda_Change"));


        
        $this->lstYear = new QListBox($this);
        $this->lstYear->Width = 150;
        //$this->lstYear->CssClass = "form-control";
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

     protected function lstTienda_Change($strFormId, $strControlId, $strParameter) {
         
           $this->selectTienda = $this->lstTienda->SelectedValue;
       
    }

}

DashboardAdmin::Run('DashboardAdmin');
?>