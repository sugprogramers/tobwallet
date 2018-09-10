<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the User class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of User objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this UserListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 *
	 * @package My QCubed Application
	 * @subpackage Drafts
	 *
	 */
	class UserListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list Users
		/**
		 * @var UserDataGrid
		 */
		public $dtgUsers;

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
			$this->Template = __DOCROOT__ . __PANEL_DRAFTS__ . '/UserListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgUsers = new UserDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgUsers->CssClass = 'datagrid';
			$this->dtgUsers->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgUsers->Paginator = new QPaginator($this->dtgUsers);
			$this->dtgUsers->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgUsers->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for user's properties, or you
			// can traverse down QQN::user() to display fields that are down the hierarchy)
			$this->dtgUsers->MetaAddColumn('IdUser');
			$this->dtgUsers->MetaAddColumn('Email');
			$this->dtgUsers->MetaAddColumn('Password');
			$this->dtgUsers->MetaAddColumn('FirstName');
			$this->dtgUsers->MetaAddColumn('MiddleName');
			$this->dtgUsers->MetaAddColumn('LastName');
			$this->dtgUsers->MetaAddColumn('Country');
			$this->dtgUsers->MetaAddColumn('City');
			$this->dtgUsers->MetaAddColumn('Phone');
			$this->dtgUsers->MetaAddColumn('Birthday');
			$this->dtgUsers->MetaAddColumn('ImagePhoto');
			$this->dtgUsers->MetaAddColumn('StatusUser');
			$this->dtgUsers->MetaAddColumn('WalletAddress');
			$this->dtgUsers->MetaAddColumn('UserType');
			$this->dtgUsers->MetaAddColumn('Totalqtycoins');

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('User');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new UserEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new UserEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>