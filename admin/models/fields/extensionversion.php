<?php
/** SportsManagement ein Programm zur Verwaltung f�r alle Sportarten
* @version 1.0.58
* @file 
* @author diddipoeler, stony, svdoldie (diddipoeler@gmx.de)
* @copyright Copyright: ? 2013 Fussball in Europa http://fussballineuropa.de/ All rights reserved.
* @license This file is part of SportsManagement.
 */

// no direct access
defined('_JEXEC') or die ;

jimport('joomla.form.formfield');

/**
 * JFormFieldExtensionVersion
 * 
 * @package 
 * @author Dieter Pl�ger
 * @copyright 2017
 * @version $Id$
 * @access public
 */
class JFormFieldExtensionVersion extends JFormField {
		
	public $type = 'ExtensionVersion';
	
	protected $version;

	/**
	 * JFormFieldExtensionVersion::getLabel()
	 * 
	 * @return
	 */
	protected function getLabel() 
	{		
		$lang = JFactory::getLanguage();
        $extension = 'com_sportsmanagement';
        $base_dir = JPATH_ADMINISTRATOR;
        $language_tag = $lang->getTag();
        $reload = true;
        $lang->load($extension, $base_dir, $language_tag, $reload);
		$html = '';
		$html .= '<div style="clear: both;">'.JText::_('COM_SPORTSMANAGEMENT_VERSION_LABEL').'</div>';
		return $html;
	}

	/**
	 * JFormFieldExtensionVersion::getInput()
	 * 
	 * @return
	 */
	protected function getInput() 
	{
		$html = '<div style="padding-top: 5px; overflow: inherit">';
		$html .= '<span class="label">'.$this->version.'</span>';
		$html .= '</div>';
		return $html;
	}
	
	/**
	 * JFormFieldExtensionVersion::setup()
	 * 
	 * @param mixed $element
	 * @param mixed $value
	 * @param mixed $group
	 * @return
	 */
	public function setup(SimpleXMLElement $element, $value, $group = null)
	{
		$return = parent::setup($element, $value, $group);
	
		if ($return) {
			$this->version = isset($this->element['version']) ? $this->element['version'] : '';
		}
	
		return $return;
	}

}
?>
