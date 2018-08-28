<?php
	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Offer class.  It uses the code-generated
	 * OfferDataGrid control which has meta-methods to help with
	 * easily creating/defining Offer columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both offer_list.php AND
	 * offer_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage FormBaseObjects
	 */
	abstract class OfferListFormBase extends QForm {
		// Local instance of the Meta DataGrid to list Offers
		/**
		 * @var OfferDataGrid dtgOffers
		 */
		protected $dtgOffers;

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
			$this->dtgOffers = new OfferDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgOffers->CssClass = 'datagrid';
			$this->dtgOffers->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgOffers->Paginator = new QPaginator($this->dtgOffers);
			$this->dtgOffers->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/offer_edit.php';
			$this->dtgOffers->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

			// Create the Other Columns (note that you can use strings for offer's properties, or you
			// can traverse down QQN::offer() to display fields that are down the hierarchy)
			$this->dtgOffers->MetaAddColumn('IdOffer');
			$this->dtgOffers->MetaAddColumn('Description');
			$this->dtgOffers->MetaAddColumn('OfferedCoins');
			$this->dtgOffers->MetaAddColumn('DateFrom');
			$this->dtgOffers->MetaAddColumn('DateTo');
			$this->dtgOffers->MetaAddColumn(QQN::Offer()->IdRestaurantObject);
			$this->dtgOffers->MetaAddColumn('MaxOffers');
			$this->dtgOffers->MetaAddColumn('AppliedOffers');
			$this->dtgOffers->MetaAddColumn('MaxCoins');
		}
	}
?>
