<?php
/**
 * There is maybe a better way to include this but for now, this are my custom hacks: 
 */
class BC_CUSTOM {
		
	/**
	 * Returns the Path of the Theme:
	 */
	public static function getThisTheme($subPath=null)
	{
		$themepath = OC::$WEBROOT.'/themes/'.OC_Util::getTheme();
		switch ($subPath) {
			case 'css':
				return $themepath.'/core/css';
				break;
			case 'js':
				return $themepath.'/core/js';
				break;		
			default:
				return $themepath;	
			break;
		}	
		
	}
	
	
	/**
	 * Returns the fontawesome icon correlating to a setting ap name:
	 */	
	public static function getSetNavIcons($id) 
	{													 
		switch ($id) 
		{
		    case "personal":
		        return "user";
		        break;
		    case "core_users":
		        return "group";
		        break;
		    case "core_apps":
		        return "list";
		        break;
		    case "admin":
		        return "cogs";
		        break;
		    case "help":
		        return "info";
		        break;
		}
	}
	
	/**
	 * Returns the fontawesome icon correlating to a main navigation:
	 */	
	public static function getNavIcons($id) 
	{													 
		switch ($id) 
		{
		    case "files_index":
		        return "folder-close-alt";
		        break;
		    case "media_index":
		        return "music";
		        break;
		    case "calendar_index":
		        return "calendar";
		        break;
		    case "contacts_index":
		        return "group";
		        break;
		    case "gallery_index":
		        return "picture";
		        break;
		}
	}
}