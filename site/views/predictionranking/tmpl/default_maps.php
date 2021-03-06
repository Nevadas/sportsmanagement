<?php 
/** SportsManagement ein Programm zur Verwaltung f�r alle Sportarten
 * @version   1.0.05
 * @file      default_maps.php
 * @author    diddipoeler, stony, svdoldie und donclumsy (diddipoeler@gmx.de)
 * @copyright Copyright: � 2013 Fussball in Europa http://fussballineuropa.de/ All rights reserved.
 * @license   This file is part of SportsManagement.
 * @package   sportsmanagement
 * @subpackage predictionranking
 */

defined( '_JEXEC' ) or die( 'Restricted access' ); 

if ( COM_SPORTSMANAGEMENT_SHOW_DEBUG_INFO )
{
echo 'mapconfig<pre>',print_r($this->mapconfig,true),'</pre><br>';
}

//$kmlpath = JURI::root().'components'.DS.'com_sportsmanagement'.DS.'views'.DS.'ranking'.DS.'tmpl'.DS.'default_genkml3.php';
$kmlpath = JURI::root().'tmp'.DS.$this->predictionGame->id.'-prediction.kml';

//echo $kmlpath.'<br>';

?>
<div style="width: 100%; float: left">
	<div class="contentpaneopen">
		<div class="contentheading">
			<?php echo JText::_('COM_SPORTSMANAGEMENT_GMAP_DIRECTIONS'); ?>
		</div>
	</div>
	<?php
		$arrPluginParams = array();
		
		$arrPluginParams[] = "zoomWheel='1'";
		
		$param = 'default_map_type';
		if($this->mapconfig[$param]) {
			$arrPluginParams[] = "mapType='".$this->mapconfig[$param]."'";
		}
		$param = 'map_control';
		if($this->mapconfig[$param]) {
			$arrPluginParams[] = "zoomType='".$this->mapconfig[$param]."'";
		}
		$param = 'width';
		if($this->mapconfig[$param]) {
			$arrPluginParams[] = "$param='".$this->mapconfig[$param]."'";
		}
		$param = 'height';
		if($this->mapconfig[$param]) {
			$arrPluginParams[] = "$param='".$this->mapconfig[$param]."'";
		}
		
		/*
    foreach ( $this->allteams as $row )
    {
		if($row->address_string != '') {
			$arrPluginParams[] = "address='" .$row->address_string. "'";
			$arrPluginParams[] = "text='<div style=width:250px;height=30px;>".$row->address_string."</div>'";
		}
		$icon = '';
		if($row->logo_small != '')
		{
			$arrPluginParams[] = "tooltip='". $row->team_name . "'";
			$icon= $row->logo_small;
		}
		if($icon!='') {
			$arrPluginParams[] = "icon='".$icon."'";
		}
    
    }
    */
    
		$params  = '{mosmap ';
		$params .= implode('|', $arrPluginParams);
		$params .= "}";
		//echo JHTML::_('content.prepare', $params);
		
    $params  = "{mosmap mapType='HYBRID'|dir='1'|zoomWheel='1'|zoom='10'|corzoom='0'|minzoom='0'|maxzoom='19'|showEarthMaptype='1'|showNormalMaptype='1' |showSatelliteMaptype='1' |showTerrainMaptype='1' |showHybridMaptype='1'   |kml='".$kmlpath."'|kmlrenderer='geoxml'|controltype='user'|kmlsidebar='left'|kmlsbwidth='200'|lightbox='1'|width='100%'|height='".$this->mapconfig['height']."' |overview='1'  }";    
		echo JHTML::_('content.prepare', $params);		
		
		
	?>
</div>