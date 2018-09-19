<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the Organization class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of Organization objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this OrganizationListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 *
	 * @package My QCubed Application
	 * @subpackage Drafts
	 *
	 */
	class OrganizationListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list Organizations
		/**
		 * @var OrganizationDataGrid
		 */
		public $dtgOrganizations;

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
			$this->Template = __DOCROOT__ . __PANEL_DRAFTS__ . '/OrganizationListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgOrganizations = new OrganizationDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgOrganizations->CssClass = 'datagrid';
			$this->dtgOrganizations->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgOrganizations->Paginator = new QPaginator($this->dtgOrganizations);
			$this->dtgOrganizations->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgOrganizations->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for organization's properties, or you
			// can traverse down QQN::organization() to display fields that are down the hierarchy)
			$this->dtgOrganizations->MetaAddColumn('IdOrganization');
			$this->dtgOrganizations->MetaAddColumn('Name');
			$this->dtgOrganizations->MetaAddColumn('Phone');
			$this->dtgOrganizations->MetaAddColumn('QrCode');
			$this->dtgOrganizations->MetaAddColumn('OrganizationImage');
			$this->dtgOrganizations->MetaAddColumn('Latitude');
			$this->dtgOrganizations->MetaAddColumn('Longitude');
			$this->dtgOrganizations->MetaAddColumn('Country');
			$this->dtgOrganizations->MetaAddColumn('City');
			$this->dtgOrganizations->MetaAddColumn('Address');
			$this->dtgOrganizations->MetaAddColumn(QQN::Organization()->IdOrganizationTypeObject);
			$this->dtgOrganizations->MetaAddColumn(QQN::Organization()->IdOwnerObject);

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('Organization');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new OrganizationEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new OrganizationEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>