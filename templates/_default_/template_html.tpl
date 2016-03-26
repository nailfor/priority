<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=1280">
		{$inPage->printHead()}

	</head>
	<body>
		{$body}
		<script type="text/javascript">
			{literal}
			function __writeAdv(){
				//document.write('<div style="display: none;"><script type="text\/javascript">document.write("<a href=\'\/\/www.liveinternet.ru\/click\' "+"target=_blank><img src=\'\/\/counter.yadro.ru\/hit?t52.6;r"+escape(top.document.referrer)+((typeof(screen)=="undefined")?"":";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+";"+Math.random()+"\' alt=\'\' title=\'LiveInternet: показано число просмотров и"+" посетителей за 24 часа\' "+"border=\'0\' width=\'88\' height=\'31\'><\\/a>")<\/script><\/div>');
				document.write('<script src="/includes/yandMetrik.js"><\/script>');
				document.write('<script src="/includes/googleMetrik.js"><\/script>');
			}
			if (window === window.top) {
				if(sysInfo.profile.my.uid > 0) {
					function changeUrl(url) {
						var posQuestion = url.indexOf('?');
						if (posQuestion >= 0) {
							if (url.substring(url.length - 1) === '?') {
								url = url.substring(0, url.length - 1);
							} else {
								var ampPos = url.indexOf('&');
								if (ampPos >= 0 && url.substring(url.length - 1) === '&') {
									url = url.substring(0, url.length - 1);
								} else {
									url += '&';
								}
							}
						} else {
							url += '?';
						}
						return url;
					}

					function setUrl(win) {
						var title = win.document.getElementsByTagName("title")[0].innerHTML;
						history.replaceState({title: title, href: win.location.href}, null, win.location.href);
						document.getElementsByTagName("title")[0].innerHTML = title;
					}

					var title = document.getElementsByTagName('title')[0].innerHTML,
							url = document.location.href,
							posHash = url.indexOf('#');
					if (posHash >= 0) {
						var first = url.substring(0, posHash),
								second = url.substring(posHash);
						url = changeUrl(first) + second;
					} else {
						url = changeUrl(url);
					}
					var content = '<html><head><meta http-equiv="Content-Type" content="text\/html; charset=utf-8" \/><title>' + title + '<\/title><\/head>'+
							'<frameset rows="100,0" border="0">' +
								'<frame id="sufframainframe" name="sufframain" src="' + url +'" onload="setUrl(this.contentWindow)" \/>' +
								'<frame name="player" src="/includes/player/" \/>'+
							'<\/frameset><\/html>';
					document.getElementsByTagName('html')[0].innerHTML = content;
				} else {
					{/literal}
					{* ВЫКЛЮЧЕНИЕ МЕТРИК И ПРОЧЕЙ РЕКЛАМЫ В top-frame НА ГЛАВНОЙ*}
					{if $hideSeoCounter}
						<!-- hideSeoCounter is on -->
					{else}
						{* ВКЛЮЧЕНИЕ ЛИШЬ ТУТ *}
						__writeAdv();
					{/if}
					{literal}
				}
			} else {
				function hash_update() {
					window.parent.setUrl(window);
				}

				addEventListener('hashchange', function () {
					window.parent.setUrl(window);
				});
				{/literal}
				{* ВЫКЛЮЧЕНИЕ МЕТРИК И ПРОЧЕЙ РЕКЛАМЫ В sufframain-frame*}
				{if $hideSeoCounter}
					<!-- hideSeoCounter is on -->
				{else}
					{* ВКЛЮЧЕНИЕ ЛИШЬ ТУТ *}
					__writeAdv();
				{/if}
				document.write('<script type="text\/javascript" src="https:\/\/maps.googleapis.com\/maps\/api\/js?v=3.exp&libraries=places"><\/script>');
				{literal}
			}
			{/literal}
		</script>
		<script src="/includes/jquery/jquery.events.iframe.utils.js"></script>
	</body>
</html>