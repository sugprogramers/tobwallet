<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the Restaurant class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of Restaurant objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this RestaurantListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 *
	 * @package My QCubed Application
	 * @subpackage Drafts
	 *
	 */
	class RestaurantListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list Restaurants
		/**
		 * @var RestaurantDataGrid
		 */
		public $dtgRestaurants;

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
			$this->Template = __DOCROOT__ . __PANEL_DRAFTS__ . '/RestaurantListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgRestaurants = new RestaurantDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgRestaurants->CssClass = 'datagrid';
			$this->dtgRestaurants->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgRestaurants->Paginator = new QPaginator($this->dtgRestaurants);
			$this->dtgRestaurants->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgRestaurants->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for restaurant's properties, or you
			// can traverse down QQN::restaurant() to display fields that are down the hierarchy)
			$this->dtgRestaurants->MetaAddColumn('IdRestaurant');
			$this->dtgRestaurants->MetaAddColumn('Country');
			$this->dtgRestaurants->MetaAddColumn('City');
			$this->dtgRestaurants->MetaAddColumn('Address');
			$this->dtgRestaurants->MetaAddColumn('RestaurantName');
			$this->dtgRestaurants->MetaAddColumn('Longitude');
			$this->dtgRestaurants->MetaAddColumn('Latitude');
			$this->dtgRestaurants->MetaAddColumn('QrCode');
			$this->dtgRestaurants->MetaAddColumn('Qtycoins');
			$this->dtgRestaurants->MetaAddColumn('IdUser');
			$this->dtgRestaurants->MetaAddColumn('Type');
			$this->dtgRestaurants->MetaAddColumn('Logo');
			$this->dtgRestaurants->MetaAddColumn('Status');

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('Restaurant');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new RestaurantEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new RestaurantEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>