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
    /*
     * Доступны объекты $inCore $inUser $inPage($this) $inConf $inDB
     */

    // Получаем количество модулей на нужные позиции
    $mod_count['top']     = $this->countModules('top');
    $mod_count['topmenu'] = $this->countModules('topmenu');
    $mod_count['sidebar'] = $this->countModules('sidebar');

    // подключаем jQuery и js ядра в самое начало
    $this->prependHeadJS('core/js/common.js');
    $this->prependHeadJS('includes/jquery/jquery.js');
    // Подключаем стили шаблона
    $this->addHeadCSS('templates/'.TEMPLATE.'/css/reset.css');
    $this->addHeadCSS('templates/'.TEMPLATE.'/css/text.css');
    $this->addHeadCSS('templates/'.TEMPLATE.'/css/960.css');
    $this->addHeadCSS('templates/'.TEMPLATE.'/css/styles.css');
    // Подключаем colorbox (просмотр фото)
    $this->addHeadJS('includes/jquery/colorbox/jquery.colorbox.js');
    $this->addHeadCSS('includes/jquery/colorbox/colorbox.css');
    $this->addHeadJS('includes/jquery/colorbox/init_colorbox.js');
    // LANG фразы для colorbox
    $this->addHeadJsLang(array('CBOX_IMAGE','CBOX_FROM','CBOX_PREVIOUS','CBOX_NEXT','CBOX_CLOSE','CBOX_XHR_ERROR','CBOX_IMG_ERROR', 'CBOX_SLIDESHOWSTOP', 'CBOX_SLIDESHOWSTART'));

?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?php $this->printHead(); ?>
    <?php if($inUser->is_admin){ ?>
        <script src="/admin/js/modconfig.js" type="text/javascript"></script>
        <link href="/templates/<?php echo TEMPLATE; ?>/css/modconfig.css" rel="stylesheet" type="text/css" />
    <?php } ?>
</head>

<body>
<?php if ($inConf->siteoff && $inUser->is_admin) { ?>
<div class="siteoff"><?php echo $_LANG['SITE_IS_DISABLE']; ?></div>
<?php } ?>
    <div class="page">
        <header class="header">
            <?php $this->printModules('header'); ?>
			<div class="header_contacts">
				<span>Амурская обл., г.Благовещенск</span><br><span>8-962-294-6-294, 555-085</span>
			</div>
        </header>

        <div class="top">
topmenu
            <?php if($mod_count['topmenu']) { ?>
            <div class="topmenu">
                <?php $this->printModules('topmenu'); ?>
            </div>
            <?php } ?>

top
            <?php if ($mod_count['top']){ ?>
            <div class="topwide">
                <?php $this->printModules('top'); ?>
            </div>
            <?php } ?>
        </div>

        <div class="body">
            <div class="mainbody">
                <div class="maintop">
maintop
                    <?php $this->printModules('maintop'); ?>
                </div>

                <?php if ($mod_count['sidebar']) { ?>
                    <?php $this->printModules('sidebar'); ?>
                <?php } ?>

                <?php if($this->page_body){ ?>
                    <div class="component">
                         <?php $this->printBody(); ?>
                    </div>
                <?php } ?>
                <?php $this->printModules('mainbottom'); ?>
            </div>

        </div>

    </div>

    <footer class="footer">
        <div class="footer_left">
            <div class="footer_copyright">
                &copy; <?php echo date('Y').' '; $this->printSitename(); echo ', '.$inConf->city;?><br>
                <?php echo $inConf->telephon?>
            </div>
            <?php echo $inConf->metadesc;?>
        </div>
        
        <?php $this->printModules('footer'); ?>
    </footer>


    <?php if($inConf->debug && $inUser->is_admin){ cmsPage::includeTemplateFile('special/debug.php'); } ?>
</body>
</html>