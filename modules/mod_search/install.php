<?php

// ========================================================================== //

    function info_module_mod_search() {

        //
        // Описание модуля
        //

        //Заголовок (на сайте)
        $_module['title']        = 'Поиск по сайту';

        //Название (в админке)
        $_module['name']         = 'Поиск по сайту';

        //описание
        $_module['description']  = 'Поиск по сайту';
        
        //ссылка (идентификатор)
        $_module['link']         = 'mod_search';
        
        //позиция
        $_module['position']     = 'sidebar';

        //автор
        $_module['author']       = 'instantCms';

        //текущая версия
        $_module['version']      = '1.0';

        //
        // Настройки по-умолчанию
        //
        $_module['config'] = array(
					'output_tickers' => array (
								'USD' => 'USD',
								'EUR' => 'EUR',
								'GBP' => 'GBP'
								),
					'show_other_tickers'	=> 1,
					'show_converter'	=> 1,
					'conv_output_tickers'	=> 0,
					'conv_from'	=>	'USD',
					'conv_to'	=>	'RUR'
				);

        return $_module;

    }

// ========================================================================== //

    function install_module_mod_search(){
       return true;
    }

// ========================================================================== //

    function upgrade_module_mod_search(){
        return true;
    }

// ========================================================================== //

?>
