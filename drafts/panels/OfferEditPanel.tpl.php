<?php
	// This is the HTML template include file (.tpl.php) for offerEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
	<div id="formControls">
		<?php $_CONTROL->lblIdOffer->RenderWithName(); ?>

		<?php $_CONTROL->txtDescription->RenderWithName(); ?>

		<?php $_CONTROL->txtOfferedCoins->RenderWithName(); ?>

		<?php $_CONTROL->calDateFrom->RenderWithName(); ?>

		<?php $_CONTROL->calDateTo->RenderWithName(); ?>

		<?php $_CONTROL->lstIdRestaurantObject->RenderWithName(); ?>

		<?php $_CONTROL->txtMaxOffers->RenderWithName(); ?>

		<?php $_CONTROL->txtAppliedOffers->RenderWithName(); ?>

		<?php $_CONTROL->txtMaxCoins->RenderWithName(); ?>

		<?php $_CONTROL->txtStatus->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $_CONTROL->btnSave->Render(); ?></div>
		<div id="cancel"><?php $_CONTROL->btnCancel->Render(); ?></div>
		<div id="delete"><?php $_CONTROL->btnDelete->Render(); ?></div>
	</div>
