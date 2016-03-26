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

    function info_module_mod_menubottom(){

        //
        // Описание модуля
        //

        //Заголовок (на сайте)
        $_module['title']        = 'Нижнее меню';

        //Название (в админке)
        $_module['name']         = 'Нижнее меню';

        //описание
        $_module['description']  = 'Показывает нижнее меню';
        
        //ссылка (идентификатор)
        $_module['link']         = 'mod_menubottom';
        
        //позиция
        $_module['position']     = 'maintop';

        //автор
        $_module['author']       = 'Im';

        //текущая версия
        $_module['version']      = '1.0';

        //
        // Настройки по-умолчанию
        //
        $_module['config'] = array();

        return $_module;

    }

// ========================================================================== //

    function install_module_mod_menubottom(){

        return true;

    }

// ========================================================================== //

    function upgrade_module_mod_menubottom(){

        return true;
        
    }

// ========================================================================== //
