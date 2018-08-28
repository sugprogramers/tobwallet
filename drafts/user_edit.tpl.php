<?php
	// This is the HTML template include file (.tpl.php) for the user_edit.php
	// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

	// Be sure to move this out of the generated/ subdirectory before modifying to ensure that subsequent
	// code re-generations do not overwrite your changes.

	$strPageTitle = QApplication::Translate('User') . ' - ' . $this->mctUser->TitleVerb;
	require(__CONFIGURATION__ . '/header.inc.php');
?>

	<?php $this->RenderBegin() ?>

	<div id="titleBar">
		<h2><?php _p($this->mctUser->TitleVerb); ?></h2>
		<h1><?php _t('User')?></h1>
	</div>

	<div id="formControls">
		<?php $this->lblIdUser->RenderWithName(); ?>

		<?php $this->txtEmail->RenderWithName(); ?>

		<?php $this->txtPassword->RenderWithName(); ?>

		<?php $this->txtFirstName->RenderWithName(); ?>

		<?php $this->txtMiddleName->RenderWithName(); ?>

		<?php $this->txtLastName->RenderWithName(); ?>

		<?php $this->txtCountry->RenderWithName(); ?>

		<?php $this->txtCity->RenderWithName(); ?>

		<?php $this->txtPhone->RenderWithName(); ?>

		<?php $this->calBirthday->RenderWithName(); ?>

		<?php $this->txtImagePhoto->RenderWithName(); ?>

		<?php $this->txtStatusUser->RenderWithName(); ?>

		<?php $this->txtWalletAddress->RenderWithName(); ?>

		<?php $this->txtUserType->RenderWithName(); ?>

	</div>

	<div id="formActions">
		<div id="save"><?php $this->btnSave->Render(); ?></div>
		<div id="cancel"><?php $this->btnCancel->Render(); ?></div>
		<div id="delete"><?php $this->btnDelete->Render(); ?></div>
	</div>

	<?php $this->RenderEnd() ?>

<?php require(__CONFIGURATION__ .'/footer.inc.php'); ?>