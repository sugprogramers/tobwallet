<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the RestaurantCopy1 class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of RestaurantCopy1 objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this RestaurantCopy1ListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 *
	 * @package My QCubed Application
	 * @subpackage Drafts
	 *
	 */
	class RestaurantCopy1ListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list RestaurantCopy1s
		/**
		 * @var RestaurantCopy1DataGrid
		 */
		public $dtgRestaurantCopy1s;

		// Other public QControls in this panel
		/**
		 * @var QButton CreateNew
		 */
		public $btnCreateNew;
		/**
		 * @var QControlProxy ProxyEdit
		 */
		public $pxyEdit;

		// Callback Method Names
		/**
		 * @var string SetEditPanelMethod
		 */
		protected $strSetEditPanelMethod;
		/**
		 * @var string CloseEditPanelMethod
		 */
		protected $strCloseEditPanelMethod;

		public function __construct($objParentObject, $strSetEditPanelMethod, $strCloseEditPanelMethod, $strControlId = null) {
			// Call the Parent
			try {
				parent::__construct($objParentObject, $strControlId);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Record Method Callbacks
			$this->strSetEditPanelMethod = $strSetEditPanelMethod;
			$this->strCloseEditPanelMethod = $strCloseEditPanelMethod;

			// Setup the Template
			$this->Template = __DOCROOT__ . __PANEL_DRAFTS__ . '/RestaurantCopy1ListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgRestaurantCopy1s = new RestaurantCopy1DataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgRestaurantCopy1s->CssClass = 'datagrid';
			$this->dtgRestaurantCopy1s->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgRestaurantCopy1s->Paginator = new QPaginator($this->dtgRestaurantCopy1s);
			$this->dtgRestaurantCopy1s->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgRestaurantCopy1s->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for restaurant_copy1's properties, or you
			// can traverse down QQN::restaurant_copy1() to display fields that are down the hierarchy)
			$this->dtgRestaurantCopy1s->MetaAddColumn('IdRestaurant');
			$this->dtgRestaurantCopy1s->MetaAddColumn('Email');
			$this->dtgRestaurantCopy1s->MetaAddColumn('Password');
			$this->dtgRestaurantCopy1s->MetaAddColumn('OwnerFirstName');
			$this->dtgRestaurantCopy1s->MetaAddColumn('OwnerLastName');
			$this->dtgRestaurantCopy1s->MetaAddColumn('OwnerMiddleName');
			$this->dtgRestaurantCopy1s->MetaAddColumn('Country');
			$this->dtgRestaurantCopy1s->MetaAddColumn('City');
			$this->dtgRestaurantCopy1s->MetaAddColumn('Address');
			$this->dtgRestaurantCopy1s->MetaAddColumn('RestaurantName');
			$this->dtgRestaurantCopy1s->MetaAddColumn('Longitude');
			$this->dtgRestaurantCopy1s->MetaAddColumn('Latitude');
			$this->dtgRestaurantCopy1s->MetaAddColumn('Qrcode');
			$this->dtgRestaurantCopy1s->MetaAddColumn('Qtycoins');

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('RestaurantCopy1');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new RestaurantCopy1EditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new RestaurantCopy1EditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>