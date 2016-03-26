<?php

function mod_currency(array $mod, $cfg){

    $inCore = cmsCore::getInstance();
    $inDB = cmsDatabase::getInstance();
	$inUser	= cmsUser::getInstance();

	global $_LANG;

	// Читаем сегодняшние курсы
	$today = date("Y-m-d");
	// Смотрим последнюю дату в базе
    $result = $inDB->query("SELECT date FROM cms_currency ORDER BY date DESC LIMIT 1");
	$last = $inDB->fetch_assoc($result);
    if($last['date'] != $today) { // Eсли последняя дата не сегодняшняя, то читаем курсы
		list($y, $m, $d) = explode("-", $today);
		$url = "http://export.rbc.ru/free/cb.0/free.fcgi?period=DAILY&tickers=NULL&d1=".$d."&m1=".$m."&y1=".$y."&d2=".$d."&m2=".$m."&y2=".$y."&lastdays=0&separator=%3B&data_format=BROWSER";
        $getData = file($url);
	}
    
	if(count($getData)) { // Если появились сегодняшние курсы
		// Формируем основной массив
		foreach($getData as $getCurrency) {
			list($TICKER,$DATE,$OPEN,$HIGH,$LOW,$CLOSE,$VOL,$WAPRICE,$NOMINAL) = explode(';',trim($getCurrency));
			$currency[$DATE][$TICKER] = array( 'cost' => str_replace(',', '.', $CLOSE), 'nominal' => $NOMINAL );
		}
		// Читаем из базы предыдущие данные, и вычисляем разницу
        $result = $inDB->query("SELECT DISTINCT date FROM cms_currency ORDER BY date DESC LIMIT 1,1");
		$limit = $inDB->num_rows($result);
		$sql = "
                SELECT 
                    c.*, 
                    t.title 
                FROM cms_currency c
                INNER JOIN cms_tickers t ON c.ticker = t.ticker
                WHERE date = (
                    SELECT DISTINCT date 
                    FROM cms_currency 
                    ORDER BY date DESC 
                    LIMIT ".$limit.",1
                )
        ";
		$result = $inDB->query($sql);
        if ($inDB->num_rows($result)) { // Если в базе нет новых курсов
			while($row = $inDB->fetch_assoc($result)) {
				$currency[$today][$row['ticker']]['title'] = $row['title'];
				$diff = round(($currency[$today][$row['ticker']]['cost'] - $row['cost']),4);
				$currency[$today][$row['ticker']]['diff'] = str_replace(',', '.', $diff);
			}
		}
		// Записываем в базу сегодняшние значения
		$sql = "REPLACE INTO `cms_currency` (`ticker`, `date`, `cost`, `diff`, `nominal`) VALUES ";
		foreach($currency[$today] as $TICKER => $c) {
			$sqlrow[] = "('".$TICKER."','".$today."','".$c['cost']."','".$c['diff']."','".$c['nominal']."')";
		}
		$sql .= implode(",",$sqlrow).";";
	    $inDB->query($sql);
	} 
    else{
		$sql = "
                SELECT c.*, t.title 
                FROM cms_currency c
                INNER JOIN cms_tickers t ON c.ticker = t.ticker
                ORDER BY c.date DESC
        ";
		$result = $inDB->query($sql);
        if ($inDB->num_rows($result)) {
			while($row = $inDB->fetch_assoc($result)) {
				$currency[$row['date']][$row['ticker']]['ticker'] = $row['ticker'];
				$currency[$row['date']][$row['ticker']]['title'] = $row['title'];
				$currency[$row['date']][$row['ticker']]['cost'] = round($row['cost'],2);
				$currency[$row['date']][$row['ticker']]['diff'] = $row['diff'];
				$currency[$row['date']][$row['ticker']]['nominal'] = $row['nominal'];
			}
		}
	}
	$date = date("d.m.Y",strtotime(key($currency)));
	$currency = $currency[key($currency)];

	ksort($currency);

	$other_tickers = $currency;

	foreach($cfg['output_tickers'] as $ticker) {
		$output_tickers[$ticker] = $other_tickers[$ticker];
		unset($other_tickers[$ticker]);
	}

    $smarty = $inCore->initSmarty('modules', 'mod_currency.tpl');
	$smarty->assign('module_id', $module_id);
	$smarty->assign('date', $date);
	$smarty->assign('output_tickers', $output_tickers);
	$smarty->display('mod_currency.tpl');	

	return true;
}
?>
