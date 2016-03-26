<?php

// ========================================================================== //

    function info_module_mod_currency() {

        //
        // Описание модуля
        //

        //Заголовок (на сайте)
        $_module['title']        = 'Курсы валют';

        //Название (в админке)
        $_module['name']         = 'Курсы и конвертер валют';

        //описание
        $_module['description']  = 'Курсы и конвертер валют';
        
        //ссылка (идентификатор)
        $_module['link']         = 'mod_currency';
        
        //позиция
        $_module['position']     = 'sidebar';

        //автор
        $_module['author']       = 'HolyGun';

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

    function install_module_mod_currency(){

        $inCore = cmsCore::getInstance();       //подключаем ядро
        $inDB   = cmsDatabase::getInstance();   //подключаем базу данных
        $inConf = cmsConfig::getInstance();

        include(PATH.'/includes/dbimport.inc.php');
        dbRunSQL(PATH.'/modules/mod_currency/sql/install.sql', $inConf->db_prefix);

	$firstday = date("Y-m-d", strtotime("now -1 day"));
	list($y, $m, $d) = explode("-", $firstday);
	$url = "http://export.rbc.ru/free/cb.0/free.fcgi?period=DAILY&tickers=NULL&d1=".$d."&m1=".$m."&y1=".$y."&d2=".$d."&m2=".$m."&y2=".$y."&lastdays=0&separator=%3B&data_format=BROWSER";
	$getData = file($url);
	if(count($getData)) {
		$sql = "REPLACE INTO `cms_currency` (`ticker`, `date`, `cost`, `nominal`) VALUES ";
		foreach($getData as $getCurrency) {
			list($TICKER,$DATE,$OPEN,$HIGH,$LOW,$CLOSE,$VOL,$WAPRICE,$NOMINAL) = explode(';',trim($getCurrency));
			$sqlrow[] = "('".$TICKER."','".$DATE."','".str_replace(',', '.', $CLOSE)."','".$NOMINAL."')";
		}
		$sql .= implode(",",$sqlrow).";";
	        $inDB->query($sql);
	}

        return true;

    }

// ========================================================================== //

    function upgrade_module_mod_currency(){

        return true;
        
    }

// ========================================================================== //

?>
