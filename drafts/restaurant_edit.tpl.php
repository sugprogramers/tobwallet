<?php
	// This is the HTML template include file (.tpl.php) for the restaurant_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('Restaurant') . ' - ' . $this->mctRestaurant->TitleVerb;
	require(__CONFIGURATION__ . '/header.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="titleBar">
		<h2><?php _p($this->mctRestaurant->TitleVerb); ?></h2>
		<h1><?php _t('Restaurant')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblIdRestaurant->RenderWithName(); ?>

		<?php $this->txtCountry->RenderWithName(); ?>

		<?php $this->txtCity->RenderWithName(); ?>

		<?php $this->txtAddress->RenderWithName(); ?>

		<?php $this->txtRestaurantName->RenderWithName(); ?>

		<?php $this->txtLongitude->RenderWithName(); ?>

		<?php $this->txtLatitude->RenderWithName(); ?>

		<?php $this->txtQrCode->RenderWithName(); ?>

		<?php $this->txtQtycoins->RenderWithName(); ?>

		<?php $this->txtIdUser->RenderWithName(); ?>

		<?php $this->txtType->RenderWithName(); ?>

		<?php $this->txtLogo->RenderWithName(); ?>

		<?php $this->txtStatus->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>

<?php require(__CONFIGURATION__ .'/footer.inc.php'); ?>