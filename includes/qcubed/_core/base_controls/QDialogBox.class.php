<?php
	/**
	 * This file contains the QDialogBox class.
	 *
	 * @package Controls
	 */

	/**
	 * @package Controls
	 *
         * @property string $Title
	 * @property string $MatteColor
	 * @property string $MatteOpacity
	 * @property string $MatteClickable
	 * @property boolean $Modal
         * @property boolean $Resizable
	 * @property string $AnyKeyCloses
	 */
	class QDialogBox extends QPanel {
		protected $strTitle = "";		
		protected $strJavaScripts = __JQUERY_EFFECTS__;
		protected $strStyleSheets = __JQUERY_CSS__;

		// APPEARANCE
		protected $strMatteColor = '#000000';
		protected $intMatteOpacity = 50;
		protected $strDialogWidth = '350';
		/* protected $strCssClass = 'dialogbox';  this is now handled through jQuery UI */

		// BEHAVIOR
		protected $blnMatteClickable = true;
		protected $blnAnyKeyCloses = false;
		
		protected $blnModal = true;
                protected $blnResizable = true;

		public function  __construct($objParentObject, $strControlId = null) {
			parent::__construct($objParentObject, $strControlId);
			$this->blnDisplay = false;
		}
                
                public $isAutosize = false;

		public function GetShowDialogJavaScript() {
                    //closeOnEscape: false , 
			$strOptions = 'autoOpen: false, hide: {effect: "fade", duration: 500}, show: {effect: "fade", duration: 100}';/*effect: "fade", duration: 0 300*/
			
                        $strOptions .= ', modal: '.($this->blnModal ? 'true' : 'false');
                        
                        if(!$this->blnResizable)
                            $strOptions .= ', resizable: false';
                        
			if ($this->strTitle)
				$strOptions .= ', title: "'.$this->strTitle.'"';
                        
			if ($this->strCssClass)
				$strOptions .= ', dialogClass: "'.$this->strCssClass.'",position: "center",';
                        
                        if($this->isAutosize)
                                $strOptions .= ', width: '.'  $j(window).width()-40';
			else if (null === $this->strDialogWidth)
				$strOptions .= ", width: 'auto'";
			else if ($this->strDialogWidth)
				$strOptions .= ', width: '. $this->strDialogWidth;
//                        
                        
                        
                        if($this->isAutosize)
                                //$strOptions .= ', height: '.'$j(window).height()-40';
                                $strOptions .= ", height: 'auto'";
			else if (null === $this->strHeight)
				$strOptions .= ", height: 'auto'";
			else if ($this->strHeight)
				$strOptions .= ', height: '. $this->strHeight;
                        
                        
                        
//                        if($this->strMaxWidth != 0)
//                        $maxWidth = '$j(this).parent().css("max-width",'.$this->strMaxWidth.');';
//                        else
//                        $maxWidth = '';
			$strParentId = $this->ParentControl ? $this->ParentControl->ControlId : $this->Form->FormId;
			//move both the dialog and the matte back into the form, to ensure they continue to function
			$strOptions .= sprintf(',create: function() {$j(this).parent().css("max-width", %s);var custom_height=$j(window).height()-40; $j(this).css("max-height", custom_height);},open: function() { $j(this).parent().appendTo("#%s"); $j(".ui-widget-overlay").appendTo("#%s");}',  $this->strDialogWidth, $strParentId, $strParentId);

			return sprintf('$j(qc.getW("%s")).dialog({%s}); $j(qc.getW("%s")).dialog("open");$(".ui-dialog-content input:visible").css("z-index",9999);', $this->strControlId, $strOptions, $this->strControlId);
		}

		public function GetHideDialogJavaScript() {
			return sprintf('$j(qc.getW("%s")).dialog("close");', $this->strControlId);
		}

		public function ShowDialogBox() {
			if (!$this->blnVisible)
				$this->Visible = true;
			if (!$this->blnDisplay)
				$this->Display = true;
			QApplication::ExecuteJavaScript($this->GetShowDialogJavaScript());
			$this->blnWrapperModified = false;
		}

		public function HideDialogBox() {
			$this->blnDisplay = false;
			QApplication::ExecuteJavaScript($this->GetHideDialogJavaScript());
			$this->blnWrapperModified = false;
		}

		/////////////////////////
		// Public Properties: GET
		/////////////////////////
		public function __get($strName) {
			switch ($strName) {
				// APPEARANCE
				case "Title": return $this->strTitle;
				case "MatteColor": return $this->strMatteColor;
				case "MatteOpacity": return $this->intMatteOpacity;

				// BEHAVIOR
				case "MatteClickable": return $this->blnMatteClickable;
				case "AnyKeyCloses": return $this->blnAnyKeyCloses;
				case "Modal": return $this->blnModal;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		public function __set($strName, $mixValue) {
			$this->blnModified = true;

			switch ($strName) {
				case "Title":
					try {
						$this->strTitle = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					
				case "MatteColor":
					try {
						$this->strMatteColor = QType::Cast($mixValue, QType::String);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "MatteOpacity":
					try {
						$this->intMatteOpacity = QType::Cast($mixValue, QType::Integer);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "MatteClickable":
					try {
						$this->blnMatteClickable = QType::Cast($mixValue, QType::Boolean);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "AnyKeyCloses":
					try {
						$this->blnAnyKeyCloses = QType::Cast($mixValue, QType::Boolean);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "Modal":
					try { 
						$this->blnModal = QType::Cast($mixValue, QType::Boolean);
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "Width":
					try {
						if (null === $mixValue || 'auto' === $mixValue) {
							$this->strDialogWidth = null;
						} else {
							$mixValue = str_replace("px", "", strtolower($mixValue)); // Replace the text "px" (pixels) with empty string if it's there
							
							// for now, jQuery dialog only accepts integers as width
							$this->strDialogWidth = QType::Cast($mixValue, QType::Integer);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case "Height":
					try {
						if (null === $mixValue || 'auto' === $mixValue) {
							$this->strHeight = null;
						} else {
							$mixValue = str_replace("px", "", strtolower($mixValue)); // Replace the text "px" (pixels) with empty string if it's there

							// for now, jQuery dialog only accepts integers as height
							$this->strHeight = QType::Cast($mixValue, QType::Integer);
						}
						break;
					} catch (QInvalidCastException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				default:
					try {
						parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					break;
			}
		}
	}
?>