<?php
/** SportsManagement ein Programm zur Verwaltung für alle Sportarten
* @version         1.0.05
* @file                agegroup.php
* @author                diddipoeler, stony, svdoldie und donclumsy (diddipoeler@arcor.de)
* @copyright        Copyright: © 2013 Fussball in Europa http://fussballineuropa.de/ All rights reserved.
* @license                This file is part of SportsManagement.
*
* SportsManagement is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* SportsManagement is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with SportsManagement.  If not, see <http://www.gnu.org/licenses/>.
*
* Diese Datei ist Teil von SportsManagement.
*
* SportsManagement ist Freie Software: Sie können es unter den Bedingungen
* der GNU General Public License, wie von der Free Software Foundation,
* Version 3 der Lizenz oder (nach Ihrer Wahl) jeder späteren
* veröffentlichten Version, weiterverbreiten und/oder modifizieren.
*
* SportsManagement wird in der Hoffnung, dass es nützlich sein wird, aber
* OHNE JEDE GEWÄHRLEISTUNG, bereitgestellt; sogar ohne die implizite
* Gewährleistung der MARKTFÄHIGKEIT oder EIGNUNG FÜR EINEN BESTIMMTEN ZWECK.
* Siehe die GNU General Public License für weitere Details.
*
* Sie sollten eine Kopie der GNU General Public License zusammen mit diesem
* Programm erhalten haben. Wenn nicht, siehe <http://www.gnu.org/licenses/>.
*
* Note : All ini files need to be saved as UTF-8 without BOM
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');




/**
 * sportsmanagementViewjlextlmoimports
 * 
 * @package   
 * @author 
 * @copyright diddi
 * @version 2013
 * @access public
 */
class sportsmanagementViewjlextlmoimports extends sportsmanagementView
{
	/**
	 * sportsmanagementViewjlextlmoimports::init()
	 * 
	 * @return void
	 */
	public function init ()
	{
		$app = JFactory::getApplication();
		$jinput = $app->input;
		$option = $jinput->getCmd('option');
		$lang = JFactory::getLanguage();
		document	= JFactory::getDocument();
    
	
    
		
		//JLToolBarHelper::onlinehelp();

		$uri = JFactory::getURI();
		$config = JComponentHelper::getParams('com_media');
		$post = $jinput->post->getArray(array());
		$files = $jinput->getArray(array('files'));

		$this->request_url	= $uri->toString();
		$this->config	= $config;
		$teile = explode("-",$lang->getTag());
    $country = JSMCountries::convertIso2to3($teile[1]);
    $this->country	= $country;
		$countries = JSMCountries::getCountryOptions();
		$lists['countries'] = JHtml::_('select.genericlist', $countries, 'country', 'class="inputbox" size="1"', 'value', 'text', $country);
		$this->countries	= $lists['countries'];
    

    
	}
    
    /**
     * sportsmanagementViewjlextlmoimports::addToolbar()
     * 
     * @return void
     */
    protected function addToolbar() 
    {
        // Get a refrence of the page instance in joomla
		$app = JFactory::getApplication();
		$jinput = $app->input;
		$option = $jinput->getCmd('option');
		
        
//        // Get a refrence of the page instance in joomla
//		$document	= JFactory::getDocument();
//        // Set toolbar items for the page
//        $stylelink = '<link rel="stylesheet" href="'.JURI::root().'administrator/components/com_sportsmanagement/assets/css/jlextusericons.css'.'" type="text/css" />' ."\n";
//        $document->addCustomTag($stylelink);
        
        parent::addToolbar();

	}
    



  
}
?>
