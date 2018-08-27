<?php
	// This is the HTML template include file (.tpl.php) for the administrator_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('Administrator') . ' - ' . $this->mctAdministrator->TitleVerb;
	require(__CONFIGURATION__ . '/header.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="titleBar">
		<h2><?php _p($this->mctAdministrator->TitleVerb); ?></h2>
		<h1><?php _t('Administrator')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblIdAdministrator->RenderWithName(); ?>

		<?php $this->txtName->RenderWithName(); ?>

		<?php $this->txtPassword->RenderWithName(); ?>

		<?php $this->txtFirstName->RenderWithName(); ?>

		<?php $this->txtLastName->RenderWithName(); ?>

		<?php $this->txtAddress->RenderWithName(); ?>

		<?php $this->txtPhone->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>

<?php require(__CONFIGURATION__ .'/footer.inc.php'); ?>