CREATE TABLE IF NOT EXISTS `cms_tickers` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`ticker` varchar(5) NOT NULL,
`title` varchar(100) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `cms_currency` (
  `id` int(11) NOT NULL auto_increment,
  `ticker` varchar(5) NOT NULL default '',
  `date` date NOT NULL default '0000-00-00',
  `cost` float(10,4) NOT NULL default '0.0000',
  `diff` float(10,4) NOT NULL default '0.0000',
  `nominal` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `ticker` (`ticker`,`date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


INSERT INTO `cms_tickers` (`ticker`, `title`) VALUES
('AUD', 'Австралийский доллар, AUD'),
('AZN', 'Азербайджанский манат, AZN'),
('AMD', 'Армянский драм, AMD'),
('BYR', 'Белорусский рубль, BYR'),
('BGN', 'Болгарский лев, BGN'),
('BRL', 'Бразильский реал, BRL'),
('HUF', 'Венгерский форинт, HUF'),
('KRW', 'Вона Республики Корея, KRW'),
('DKK', 'Датская крона, DKK'),
('USD', 'Доллар США, USD'),
('EUR', 'ЕВРО, EUR'),
('INR', 'Индийская рупия, INR'),
('KZT', 'Казахский тенге, KZT'),
('CAD', 'Канадский доллар, CAD'),
('KGS', 'Киргизский сом, KGS'),
('CNY', 'Китайский юань, CNY'),
('LVL', 'Латвийский лат, LVL'),
('LTL', 'Литовский лит, LTL'),
('MDL', 'Молдавский лей, MDL'),
('RON', 'Новый румынский лей, RON'),
('TMT', 'Новый туркменский манат, TMT'),
('NOK', 'Норвежская крона, NOK'),
('PLN', 'Польский злотый, PLN'),
('XDR', 'СДР (спец. права заимствования), XDR'),
('SGD', 'Сингапурский доллар, SGD'),
('TJS', 'Таджикский сомони, TJS'),
('TRY', 'Турецкая лира, TRY'),
('UZS', 'Узбекский сум, UZS'),
('UAH', 'Украинская гривна, UAH'),
('GBP', 'Фунт стерлингов Соед. Корол-ва, GBP'),
('CZK', 'Чешская крона, CZK'),
('SEK', 'Шведская крона, SEK'),
('CHF', 'Швейцарский франк, CHF'),
('EEK', 'Эстонская крона, EEK'),
('ZAR', 'Южноафриканский рэнд, ZAR'),
('JPY', 'Японская иена, JPY');

