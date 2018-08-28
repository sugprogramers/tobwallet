<?php
	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the RestaurantCopy1 class.  It uses the code-generated
	 * RestaurantCopy1DataGrid control which has meta-methods to help with
	 * easily creating/defining RestaurantCopy1 columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both restaurant_copy_1_list.php AND
	 * restaurant_copy_1_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage FormBaseObjects
	 */
	abstract class RestaurantCopy1ListFormBase extends QForm {
		// Local instance of the Meta DataGrid to list RestaurantCopy1s
		/**
		 * @var RestaurantCopy1DataGrid dtgRestaurantCopy1s
		 */
		protected $dtgRestaurantCopy1s;

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
			$this->dtgRestaurantCopy1s = new RestaurantCopy1DataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgRestaurantCopy1s->CssClass = 'datagrid';
			$this->dtgRestaurantCopy1s->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgRestaurantCopy1s->Paginator = new QPaginator($this->dtgRestaurantCopy1s);
			$this->dtgRestaurantCopy1s->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/restaurant_copy1_edit.php';
			$this->dtgRestaurantCopy1s->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

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
		}
	}
?>
