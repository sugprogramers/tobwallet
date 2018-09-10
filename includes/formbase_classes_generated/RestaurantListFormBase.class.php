<?php
	/**
	 * This is a quick-and-dirty draft QForm object to do the List All functionality
	 * of the Restaurant class.  It uses the code-generated
	 * RestaurantDataGrid control which has meta-methods to help with
	 * easily creating/defining Restaurant columns.
	 *
	 * Any display customizations and presentation-tier logic can be implemented
	 * here by overriding existing or implementing new methods, properties and variables.
	 * 
	 * NOTE: This file is overwritten on any code regenerations.  If you want to make
	 * permanent changes, it is STRONGLY RECOMMENDED to move both restaurant_list.php AND
	 * restaurant_list.tpl.php out of this Form Drafts directory.
	 *
	 * @package My QCubed Application
	 * @subpackage FormBaseObjects
	 */
	abstract class RestaurantListFormBase extends QForm {
		// Local instance of the Meta DataGrid to list Restaurants
		/**
		 * @var RestaurantDataGrid dtgRestaurants
		 */
		protected $dtgRestaurants;

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
			$this->dtgRestaurants = new RestaurantDataGrid($this);

			// Style the DataGrid (if desired)
			$this->dtgRestaurants->CssClass = 'datagrid';
			$this->dtgRestaurants->AlternateRowStyle->CssClass = 'alternate';

			// Add Pagination (if desired)
			$this->dtgRestaurants->Paginator = new QPaginator($this->dtgRestaurants);
			$this->dtgRestaurants->ItemsPerPage = 20;

			// Use the MetaDataGrid functionality to add Columns for this datagrid

			// Create an Edit Column
			$strEditPageUrl = __VIRTUAL_DIRECTORY__ . __FORM_DRAFTS__ . '/restaurant_edit.php';
			$this->dtgRestaurants->MetaAddEditLinkColumn($strEditPageUrl, 'Edit', 'Edit');

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
			$this->dtgRestaurants->MetaAddColumn(QQN::Restaurant()->IdUserObject);
			$this->dtgRestaurants->MetaAddColumn('Type');
			$this->dtgRestaurants->MetaAddColumn('Logo');
		}
	}
?>
