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

/**
 * modify the palettes and subpalettes
 */

$GLOBALS['TL_DCA']['tl_form']['palettes']['__selector__'][] = 'externalJumpTo';
$GLOBALS['TL_DCA']['tl_form']['palettes']['default'] = str_replace('jumpTo', 'jumpTo;externalJumpTo', $GLOBALS['TL_DCA']['tl_form']['palettes']['default']);

$GLOBALS['TL_DCA']['tl_form']['subpalettes']['externalJumpTo'] = 'externalTarget,formTarget';

/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_form']['fields']['externalJumpTo'] = array
(
	'label'	=> &$GLOBALS['TL_LANG']['tl_form']['externalJumpTo'],
	'inputType'	=> 'checkbox',
	'eval'	=> array('tl_class'=>'w50','submitOnChange' => true)
);

$GLOBALS['TL_DCA']['tl_form']['fields']['externalTarget'] = array
(
	'label'	=> &$GLOBALS['TL_LANG']['tl_form']['externalTarget'],
	'inputType'	=> 'text',
	'eval'	=> array('tl_class'=>'clr w50','maxlength' => 255,'rgxp' =>'url')
);

$GLOBALS['TL_DCA']['tl_form']['fields']['formTarget'] = array
(
	'label'	=> &$GLOBALS['TL_LANG']['tl_form']['formTarget'],
	'inputType'	=> 'select',
	'options' => array('_blank'),
	'eval'	=> array('tl_class'=>'w50','includeBlankOption' => true)
);

?>