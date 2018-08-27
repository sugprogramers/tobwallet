<?php
	/**
	 * QControl.class.php contains QControl Class
	 * @package Controls
	 */
	/**
	 * QControl is the user overridable Base-Class for all Controls. 
	 * 
	 * This class is intended to be modified.  Please place any custom modifications to QControl in the file.  
	 * The RenderWithName function provided here is a basic rendering.  Feel free to make your own modifcations.
	 * Please note: All custom render methods should start with a RenderHelper call and end with a RenderOutput call.
	 * 
	 * @package Controls
	 */
	abstract class QControl extends QControlBase {
		/**
		 * Renders the control with an attached name
		 * 
		 * This will call {@link QControlBase::GetControlHtml()} for the bulk of the work, but will add layout html as well.  It will include
		 * the rendering of the Controls' name label, any errors or warnings, instructions, and html before/after (if specified).
		 * As this is the parent class of all controls, this method defines how ALL controls will render.  If you need certain
		 * controls to display differently, override this function in that control's class. 
		 * 
		 * @param boolean $blnDisplayOutput true to send to display buffer, false to just return then html
		 * @return string HTML of rendered Control
		 */
		public function RenderWithName($blnDisplayOutput = true) {
			////////////////////
			// Call RenderHelper
			$this->RenderHelper(func_get_args(), __FUNCTION__);
			////////////////////

			// Custom Render Functionality Here

			// Because this example RenderWithName will render a block-based element (e.g. a DIV), let's ensure
			// that IsBlockElement is set to true
			$this->blnIsBlockElement = false;//true;

			// Render the Control's Dressing
			$strToReturn = '<div class="renderWithName">';

			// Render the Left side
			$strLeftClass = "left";
			if ($this->blnRequired)
				$strLeftClass .= ' required';
			if (!$this->blnEnabled)
				$strLeftClass .= ' disabled';

			if ($this->strInstructions)
				$strInstructions = '<br/><span class="instructions">' . $this->strInstructions . '</span>';
			else
				$strInstructions = '';



                        if ($this->blnRequired)
				$strLeft=$this->strName.'<font color="#ff0000"> (*)</font>';
			else
				{ if($this->strName=='')
                                     $strLeft=''; 
                                  else      
                                    $strLeft=$this->strName.'<font color="#08088A">&nbsp;</font>';

                                }

                     

			/*$strToReturn .= sprintf('<table border="0"><tr><td align="right" style="width:100px">  <div class="%s"><label style="font-size:11px" for="%s">%s</label>%s</div></td>' , $strLeftClass, $this->strControlId,$strLeft, $strInstructions);*/
                        
                        $strToReturn .= sprintf('<table border="0"><tr><td align="right" style="width:150px">  <div class="%s"><label style="font-size:11px" for="%s">%s</label>%s</div></td>' , $strLeftClass, $this->strControlId,$strLeft, $strInstructions);

			// Render the Right side
			if ($this->strValidationError)
				$strMessage = sprintf('<span class="error">%s</span>', $this->strValidationError);
			else if ($this->strWarning)
				$strMessage = sprintf('<span class="error">%s</span>', $this->strWarning);
			else
				$strMessage = '';

                           

                  try {
				$strToReturn .= sprintf('<td><div  class="right"> %s %s %s %s</div></td> </tr> </table> ',
					$this->strHtmlBefore, $this->GetControlHtml(), $this->strHtmlAfter, '<font color="#ff0000" size = 1.5>'.$strMessage.'</font>');

                    
                                
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			$strToReturn .= '</div>';

			////////////////////////////////////////////
			// Call RenderOutput, Returning its Contents
			return $this->RenderOutput($strToReturn, $blnDisplayOutput);
			////////////////////////////////////////////
		}
	}
?>