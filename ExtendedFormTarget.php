<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Christopher Bölter 2012
 * @author     Christopher Bölter <http://www.aevo.co>
 * @package    xExtendedFormTarget
 * @license    LGPL
 * @filesource
 */
 
class ExtendedFormTarget extends Frontend {
 	
	/**
	 * modify the form template output change the action and the form target
	 */	
	public function parseFrontendTemplate($strContent, $strTemplate)
	{
	    if ($strTemplate == 'form')
	    {
	    	// get the form id from the form tag
	        preg_match('/id="(.*?)"/i', $strContent, $result);
			$formId = $result[1];
			
			// select the form with the formId and check for the external jumpTo flag
			$objForm = $this->Database->prepare("SELECT * FROM tl_form tf Where tf.formID = ? AND tf.externalJumpTo = ?")->execute($formId, 1);
			
			// if there is a form and a external target do something			
			if($objForm->numRows && strlen($objForm->externalTarget)) {
				
				// replace the action with the external target
				$strContent = preg_replace('/action="(.*?)"/i', 'action="' . $objForm->externalTarget . '"', $strContent);
				
				// if there is a form target insert a target attribute into the form tag
				if(strlen($objForm->formTarget)) {
					$strContent = str_replace('<form', '<form target="' . $objForm->formTarget . '"', $strContent);
				}
			}

	    }
	 	
		// return the modified template
	    return $strContent;
	}
}
