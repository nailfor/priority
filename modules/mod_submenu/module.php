<?php
/******************************************************************************/
//                                                                            //
//                           InstantCMS v1.10.6                               //
//                        http://www.instantcms.ru/                           //
//                                                                            //
//                   written by InstantCMS Team, 2007-2015                    //
//                produced by InstantSoft, (www.instantsoft.ru)               //
//                                                                            //
//                        LICENSED BY GNU/GPL v2                              //
//                                                                            //
/******************************************************************************/

function mod_submenu($mod, $cfg){

	$inDB = cmsDatabase::getInstance();
    
    $sql = "
        SELECT 
            s.id,
            s.name,
            i.name as iname,
            i.url,
            i.img
        FROM cms_submenu s
        LEFT JOIN cms_submenuitems i ON i.menu_id = s.id
        ORDER BY s.id, i.id
    ";
    $result = $inDB->query($sql) ;

    $menu = []; $id=0;
    if ($inDB->num_rows($result)){
        while($row = $inDB->fetch_assoc($result)){
            $id = $row['id'];
            $menu[$id]['name'] = $row['name'];
            if ($row['iname']) {
                $menu[$id]['items'][] = [
                    'name' => $row['iname'],
                    'url' => $row['url'],
                    'img' => $row['img']
                ];
            }
        }
    }
    
	$tpl = 'mod_submenu.tpl';
    cmsPage::initTemplate('modules', $tpl)->
            assign('menu', $menu)->
            display($tpl);

	return true;

}