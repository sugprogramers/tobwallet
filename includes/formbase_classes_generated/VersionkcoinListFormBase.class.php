<?php
	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Versionkcoin class.  It uses the code-generated
	 * VersionkcoinDataGrid control which has meta-methods to help with
	 * easily creating/defining Versionkcoin columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both versionkcoin_list.php AND
	 * versionkcoin_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage FormBaseObjects
	 */
	abstract class VersionkcoinListFormBase extends QForm {
		// Local instance of the Meta DataGrid to list Versionkcoins
		/**
		 * @var VersionkcoinDataGrid dtgVersionkcoins
		 */
		protected $dtgVersionkcoins;

		// Create QForm Event Handlers as Needed

//		protected function Form_Exit() {}
//		protected function Form_Load() {}
//		protected function Form_PreRender() {}
//		protected function Form_Validate() {}

		protected function Form_Run() {
			parent::Form_Run();
		}

		protected function Form_Create() {
			parent::Form_Create();

			// Instantiate the Meta DataGrid
			$this->dtgVersionkcoins = new VersionkcoinDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgVersionkcoins->CssClass = 'datagrid';
			$this->dtgVersionkcoins->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgVersionkcoins->Paginator = new QPaginator($this->dtgVersionkcoins);
			$this->dtgVersionkcoins->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/versionkcoin_edit.php';
			$this->dtgVersionkcoins->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for versionkcoin's properties, or you
			// can traverse down QQN::versionkcoin() to display fields that are down the hierarchy)
			$this->dtgVersionkcoins->MetaAddColumn('IdVersionKcoin');
			$this->dtgVersionkcoins->MetaAddColumn('Name');
			$this->dtgVersionkcoins->MetaAddColumn('Path');
		}
	}
?>
