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

    function info_module_mod_blogs(){

        //
        // Описание модуля
        //

        //Заголовок (на сайте)
        $_module['title']        = 'Блоги';

        //Название (в админке)
        $_module['name']         = 'Блоги';

        //описание
        $_module['description']  = 'Блоги';
        
        //ссылка (идентификатор)
        $_module['link']         = 'mod_blogs';
        
        //позиция
        $_module['position']     = 'maintop';

        //автор
        $_module['author']       = 'Instant CMS';

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
