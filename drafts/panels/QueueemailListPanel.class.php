<?php
	/**
	 * This is the abstract Panel class for the List All functionality
	 * of the Queueemail class.  This code-generated class
	 * contains a datagrid to display an HTML page that can
	 * list a collection of Queueemail objects.  It includes
	 * functionality to perform pagination and sorting on columns.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QPanel which extends this QueueemailListPanelBase
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent re-
	 * code generation.
	 *
	 * @package My QCubed Application
	 * @subpackage Drafts
	 *
	 */
	class QueueemailListPanel extends QPanel {
		// Local instance of the Meta DataGrid to list Queueemails
		/**
		 * @var QueueemailDataGrid
		 */
		public $dtgQueueemails;

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
			$this->Template = __DOCROOT__ . __PANEL_DRAFTS__ . '/QueueemailListPanel.tpl.php';

			// Instantiate the Meta DataGrid
			$this->dtgQueueemails = new QueueemailDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgQueueemails->CssClass = 'datagrid';
			$this->dtgQueueemails->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgQueueemails->Paginator = new QPaginator($this->dtgQueueemails);
			$this->dtgQueueemails->ItemsPerPage = 8;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$this->pxyEdit = new QControlProxy($this);
			$this->pxyEdit->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'pxyEdit_Click'));
			$this->dtgQueueemails->MetaAddEditProxyColumn($this->pxyEdit, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for queueemail's properties, or you
			// can traverse down QQN::queueemail() to display fields that are down the hierarchy)
			$this->dtgQueueemails->MetaAddColumn('IdQueueEmail');
			$this->dtgQueueemails->MetaAddColumn('To');
			$this->dtgQueueemails->MetaAddColumn('Subject');
			$this->dtgQueueemails->MetaAddColumn('Body');
			$this->dtgQueueemails->MetaAddColumn('Status');
			$this->dtgQueueemails->MetaAddColumn('Log');
			$this->dtgQueueemails->MetaAddColumn('IdUser');
			$this->dtgQueueemails->MetaAddColumn('CreateDateTime');

			// Setup the Create New button
			$this->btnCreateNew = new QButton($this);
			$this->btnCreateNew->Text = QApplication::Translate('Create a New') . ' ' . QApplication::Translate('Queueemail');
			$this->btnCreateNew->AddAction(new QClickEvent(), new QAjaxControlAction($this, 'btnCreateNew_Click'));
		}

		public function pxyEdit_Click($strFormId, $strControlId, $strParameter) {
			$strParameterArray = explode(',', $strParameter);
			$objEditPanel = new QueueemailEditPanel($this, $this->strCloseEditPanelMethod, $strParameterArray[0]);

			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}

		public function btnCreateNew_Click($strFormId, $strControlId, $strParameter) {
			$objEditPanel = new QueueemailEditPanel($this, $this->strCloseEditPanelMethod, null);
			$strMethodName = $this->strSetEditPanelMethod;
			$this->objForm->$strMethodName($objEditPanel);
		}
	}
?>