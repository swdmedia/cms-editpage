<?php
#CMS - CMS Made Simple
#(c)2004 by Ted Kulp (wishy@users.sf.net)
#This project's homepage is: http://www.cmsmadesimple.org
#
#This program is free software; you can redistribute it and/or modify
#it under the terms of the GNU General Public License as published by
#the Free Software Foundation; either version 2 of the License, or
#(at your option) any later version.
#
#This program is distributed in the hope that it will be useful,
#but WITHOUT ANY WARRANTY; without even the implied warranty of
#MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#GNU General Public License for more details.
#You should have received a copy of the GNU General Public License
#along with this program; if not, write to the Free Software
#Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

function smarty_function_editpage($params, &$template) 
{

	$smarty = $template->smarty;
	
	$gCms = cmsms();
	$config = $gCms->GetConfig();
	
  global $EDIT_PAGE;
  
	$sessionID = $_SESSION['_userkey_'];
	$rootUrl = $_SERVER['HTTP_HOST'];
	$contentID = $smarty->getTemplateVars('content_id');
	
	$EDIT_PAGE = '<p><a href="http://' . $rootUrl .'/' . $config['admin_dir'] . 
		'/editcontent.php?_sx_=' . $sessionID . '&amp;content_id=' . $contentID . '&amp;page=">' .
		'edit this page</a>' .
		'<span style="float:right;">' .
		'<a href="http://' .$rootUrl.'/'.$config['admin_dir'].'/logout.php?_sx_='.$sessionID.'">'.
		'X Logout</a></span></p>';

	return $EDIT_PAGE;
}

function smarty_cms_help_function_editpage() 
{
  echo ('
  	<p>Use within page templates to generate an \'edit this page\' and \'x Logout\' link.</p>
  	<p>Simply paste the following where you want it to appear within the template:</p>
  	<code>{editpage}</code>
  ');
}

function smarty_cms_about_function_editpage() 
{
?>
<p>Author: Gregory Prosser &lt;greg[at]stickywicketdesigns.com&gt;</p>
<p>Version: 1.0</p>
<p>
    Change History:<br/>
    None
</p>
<p>Taking a poke at a first plugin for CMSMS. Inspired by the likes of WP with the 'edit this page' when while logged in and viewing the frontend.</p>
<?php
}
?>