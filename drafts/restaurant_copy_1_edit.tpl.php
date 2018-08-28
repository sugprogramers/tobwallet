<?php
	// This is the HTML template include file (.tpl.php) for the restaurant_copy_1_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('RestaurantCopy1') . ' - ' . $this->mctRestaurantCopy1->TitleVerb;
	require(__CONFIGURATION__ . '/header.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="titleBar">
		<h2><?php _p($this->mctRestaurantCopy1->TitleVerb); ?></h2>
		<h1><?php _t('RestaurantCopy1')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblIdRestaurant->RenderWithName(); ?>

		<?php $this->txtEmail->RenderWithName(); ?>

		<?php $this->txtPassword->RenderWithName(); ?>

		<?php $this->txtOwnerFirstName->RenderWithName(); ?>

		<?php $this->txtOwnerLastName->RenderWithName(); ?>

		<?php $this->txtOwnerMiddleName->RenderWithName(); ?>

		<?php $this->txtCountry->RenderWithName(); ?>

		<?php $this->txtCity->RenderWithName(); ?>

		<?php $this->txtAddress->RenderWithName(); ?>

		<?php $this->txtRestaurantName->RenderWithName(); ?>

		<?php $this->txtLongitude->RenderWithName(); ?>

		<?php $this->txtLatitude->RenderWithName(); ?>

		<?php $this->txtQrcode->RenderWithName(); ?>

		<?php $this->txtQtycoins->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>

<?php require(__CONFIGURATION__ .'/footer.inc.php'); ?>