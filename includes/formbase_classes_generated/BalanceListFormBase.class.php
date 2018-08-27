<?php
	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Balance class.  It uses the code-generated
	 * BalanceDataGrid control which has meta-methods to help with
	 * easily creating/defining Balance columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both balance_list.php AND
	 * balance_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage FormBaseObjects
	 */
	abstract class BalanceListFormBase extends QForm {
		// Local instance of the Meta DataGrid to list Balances
		/**
		 * @var BalanceDataGrid dtgBalances
		 */
		protected $dtgBalances;

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
			$this->dtgBalances = new BalanceDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgBalances->CssClass = 'datagrid';
			$this->dtgBalances->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgBalances->Paginator = new QPaginator($this->dtgBalances);
			$this->dtgBalances->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/balance_edit.php';
			$this->dtgBalances->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for balance's properties, or you
			// can traverse down QQN::balance() to display fields that are down the hierarchy)
			$this->dtgBalances->MetaAddColumn('IdBalance');
			$this->dtgBalances->MetaAddColumn('Date');
			$this->dtgBalances->MetaAddColumn(QQN::Balance()->IdClientObject);
			$this->dtgBalances->MetaAddColumn(QQN::Balance()->IdOrganizationObject);
			$this->dtgBalances->MetaAddColumn('AmountExchangedCoins');
		}
	}
?>
