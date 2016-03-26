<?php
/******************************************************************************/
//                                                                            //
//                             InstantCMS v1.9                                //
//                        http://www.instantcms.ru/                           //
//                                                                            //
//                   written by InstantCMS Team, 2007-2011                    //
//                produced by InstantSoft, (www.instantsoft.ru)               //
//                                                                            //
//                        LICENSED BY GNU/GPL v2                              //
//                                                                            //
/******************************************************************************/

    function info_module_mod_submenu(){

        //
        // Описание модуля
        //

        //Заголовок (на сайте)
        $_module['title']        = 'Подменю';

        //Название (в админке)
        $_module['name']         = 'Подменю';

        //описание
        $_module['description']  = 'Подменю';
        
        //ссылка (идентификатор)
        $_module['link']         = 'mod_submenu';
        
        //позиция
        $_module['position']     = 'maintop';

        //автор
        $_module['author']       = 'я';

        //текущая версия
        $_module['version']      = '1.7';

        //
        // Настройки по-умолчанию
        //
        $_module['config'] = array();

        return $_module;

    }

// ========================================================================== //

    function install_module_mod_blogs(){

        return true;

    }

// ========================================================================== //

    function upgrade_module_mod_blogs(){

        return true;
        
    }

// ========================================================================== //
