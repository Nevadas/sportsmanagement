<?php
/**
 * @copyright	Copyright (C) 2006-2013 JoomLeague.net. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// Check to ensure this file is included in Joomla!
defined( '_JEXEC' ) or die( 'Restricted access' );

// import Joomla table library
jimport('joomla.database.table');

// Include library dependencies
jimport('joomla.filter.input');

/**
 * Statistic Table class
 *
 * @package	Joomleague
 * @since	1.5
 */
class sportsmanagementTableStatistic extends JTable
{
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 * @since 1.0
	 */
	function __construct(& $db)
	{
		parent::__construct('#__sportsmanagement_statistic', 'id', $db);
	}

	/**
	 * Overloaded check method to ensure data integrity
	 *
	 * @access public
	 * @return boolean True on success
	 * @since 1.0
	 */
	function check()
	{
		if (empty($this->name)) {
			$this->setError(JText::_('NAME REQUIRED'));
			return false;
		}
		
		if (empty($this->short)) {
			$this->short = strtoupper(substr($this->name, 0, 4));
		}
	
		// setting alias
		if ( empty( $this->alias ) )
		{
			$this->alias = JFilterOutput::stringURLSafe( $this->name );
		}
		else {
			$this->alias = JFilterOutput::stringURLSafe( $this->alias ); // make sure the user didn't modify it to something illegal...
		}
		
		return true;
	}
	
	/**
	 * Overloaded bind function
	 *
	 * @param       array           named array
	 * @return      null|string     null is operation was satisfactory, otherwise returns an error
	 * @see JTable:bind
	 * @since 1.5
	 */
	function bind($array, $ignore = '')
	{
		if (key_exists( 'baseparams', $array ) && is_array( $array['baseparams'] ))
		{
			$registry = new JRegistry();
			$registry->loadArray($array['baseparams']);
			$array['baseparams'] = (string) $registry;
		}
		if (key_exists( 'params', $array ) && is_array( $array['params'] ))
		{
			$registry = new JRegistry();
			$registry->loadArray($array['params']);
			$array['params'] = (string) $registry;
		}
		return parent::bind($array, $ignore);
	}
}
