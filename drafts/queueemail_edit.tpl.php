<?php
	// This is the HTML template include file (.tpl.php) for the queueemail_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('Queueemail') . ' - ' . $this->mctQueueemail->TitleVerb;
	require(__CONFIGURATION__ . '/header.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="titleBar">
		<h2><?php _p($this->mctQueueemail->TitleVerb); ?></h2>
		<h1><?php _t('Queueemail')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblIdQueueEmail->RenderWithName(); ?>

		<?php $this->txtTo->RenderWithName(); ?>

		<?php $this->txtSubject->RenderWithName(); ?>

		<?php $this->txtBody->RenderWithName(); ?>

		<?php $this->txtStatus->RenderWithName(); ?>

		<?php $this->txtLog->RenderWithName(); ?>

		<?php $this->txtIdUser->RenderWithName(); ?>

		<?php $this->calCreateDateTime->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>

<?php require(__CONFIGURATION__ .'/footer.inc.php'); ?>