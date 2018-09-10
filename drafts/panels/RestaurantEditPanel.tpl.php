<?php
	// This is the HTML template include file (.tpl.php) for restaurantEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
	<div id="formControls">
		<?php $_CONTROL->lblIdRestaurant->RenderWithName(); ?>

		<?php $_CONTROL->txtCountry->RenderWithName(); ?>

		<?php $_CONTROL->txtCity->RenderWithName(); ?>

		<?php $_CONTROL->txtAddress->RenderWithName(); ?>

		<?php $_CONTROL->txtRestaurantName->RenderWithName(); ?>

		<?php $_CONTROL->txtLongitude->RenderWithName(); ?>

		<?php $_CONTROL->txtLatitude->RenderWithName(); ?>

		<?php $_CONTROL->txtQrCode->RenderWithName(); ?>

		<?php $_CONTROL->txtQtycoins->RenderWithName(); ?>

		<?php $_CONTROL->lstIdUserObject->RenderWithName(); ?>

		<?php $_CONTROL->txtType->RenderWithName(); ?>

		<?php $_CONTROL->txtLogo->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $_CONTROL->btnSave->Render(); ?></div>
		<div id="cancel"><?php $_CONTROL->btnCancel->Render(); ?></div>
		<div id="delete"><?php $_CONTROL->btnDelete->Render(); ?></div>
	</div>
