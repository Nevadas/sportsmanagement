<?php
/**
 * @copyright	Copyright (C) 2006-2013 JoomLeague.net. All rights reserved.
 * @license		GNU/GPL,see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License,and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

/**
 * HTML View class for the Joomleague component
 *
 * @static
 * @package	JoomLeague
 * @since	0.1
 */
class sportsmanagementViewprojectreferees extends JView
{

	function display($tpl=null)
	{
		$option = JRequest::getCmd('option');
		$mainframe = JFactory::getApplication();
		$uri = JFactory::getURI();
        $model	= $this->getModel();

		$filter_state		= $mainframe->getUserStateFromRequest($option.'.'.$model->_identifier.'p_filter_state',		'filter_state',		'',				'word');
		$filter_order		= $mainframe->getUserStateFromRequest($option.'.'.$model->_identifier.'p_filter_order',		'filter_order',		'p.ordering',	'cmd');
		$filter_order_Dir	= $mainframe->getUserStateFromRequest($option.'.'.$model->_identifier.'p_filter_order_Dir',	'filter_order_Dir',	'',				'word');
		$search				= $mainframe->getUserStateFromRequest($option.'.'.$model->_identifier.'p_search',			'search',			'',				'string');
		$search_mode		= $mainframe->getUserStateFromRequest($option.'.'.$model->_identifier.'p_search_mode',		'search_mode',		'',				'string');
		$search				= JString::strtolower($search);

		$items =& $this->get('Items');
		$total =& $this->get('Total');
		$pagination =& $this->get('Pagination');
        
        $this->project_id	= $mainframe->getUserState( "$option.pid", '0' );
        $mdlProject = JModel::getInstance("Project", "sportsmanagementModel");
	    $project = $mdlProject->getProject($this->project_id);
        
        //build the html options for position
		$position_id[]=JHTML::_('select.option','0',JText::_('COM_SPORTSMANAGEMENT_GLOBAL_SELECT_REFEREE_FUNCTION'));
        $mdlPositions = JModel::getInstance("Positions", "sportsmanagementModel");
	    $project_ref_positions = $mdlPositions->getRefereePositions($this->project_id);
        $position_id = array_merge($position_id,$project_ref_positions);
		$lists['project_position_id'] = $position_id;
		unset($position_id);

		// table ordering
		$lists['order_Dir']=$filter_order_Dir;
		$lists['order']=$filter_order;

		// search filter
		$lists['search']=$search;
		$lists['search_mode']=$search_mode;

		$this->assignRef('user',JFactory::getUser());
		$this->assignRef('config',JFactory::getConfig());
		$this->assignRef('lists',$lists);
		$this->assignRef('items',$items);
		$this->assignRef('pagination',$pagination);
		$this->assignRef('request_url',$uri->toString());
        $this->assignRef('project',$project);
		$this->addToolbar();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.7
	 */
	protected function addToolbar()
	{
		
        JToolBarHelper::title(JText::_('COM_SPORTSMANAGEMENT_ADMIN_PREF_TITLE'),'Referees');
		
		JToolBarHelper::apply('projectreferee.saveshort',JText::_('COM_SPORTSMANAGEMENT_ADMIN_PREF_APPLY'));
		JToolBarHelper::custom('projectreferee.assign','upload.png','upload_f2.png',JText::_('COM_SPORTSMANAGEMENT_ADMIN_PREF_ASSIGN'),false);
		JToolBarHelper::custom('projectreferee.unassign','cancel.png','cancel_f2.png',JText::_('COM_SPORTSMANAGEMENT_ADMIN_PREF_UNASSIGN'),false);
		JToolBarHelper::divider();
		
		//JLToolBarHelper::onlinehelp();
		JToolBarHelper::preferences(JRequest::getCmd('option'));
        
        
        
       

		//JToolBarHelper::onlinehelp();
	}
}
?>