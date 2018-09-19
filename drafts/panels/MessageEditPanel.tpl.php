<?php
	// This is the HTML template include file (.tpl.php) for messageEditPanel.
	// Remember that this is a DRAFT.  It is MEANT to be altered/modified.
	// Be sure to move this out of the drafts/dashboard subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.
?>
	<div id="formControls">
		<?php $_CONTROL->lblIdMessage->RenderWithName(); ?>

		<?php $_CONTROL->lstIdUserObject->RenderWithName(); ?>

		<?php $_CONTROL->txtType->RenderWithName(); ?>

		<?php $_CONTROL->txtBody->RenderWithName(); ?>

		<?php $_CONTROL->calCreatedDate->RenderWithName(); ?>

		<?php $_CONTROL->chkIsRead->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $_CONTROL->btnSave->Render(); ?></div>
		<div id="cancel"><?php $_CONTROL->btnCancel->Render(); ?></div>
		<div id="delete"><?php $_CONTROL->btnDelete->Render(); ?></div>
	</div>
