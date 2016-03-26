{add_lang_js file="common"}

{*Шаблон диалога "Необходима регистрация"*}
	{if !$USER->id}
		<div class="js_registration_required_content displayNone">
			<div class="registration_required">{$LANG.REG_REQUIRED_1}</div>
			<div class="big_registration_required">{$LANG.REG_REQUIRED_2}</div>
		</div>
	{/if}
{*Конец*}

{*Блок главного меню*}
	<div id="topmenu"{if $timer} class="user_no_activate"{/if}>
		<div id="mainblock">
			{$inPage->printModules('topmenu')}
		</div>
	
		{if $timer}
			{*Модуль активации профиля*}
			{include file="../modules/activate_profile.tpl"}
		{/if}
	
	</div>
{*Конец*}

<div id="wrapper">
	{*404 и т.д.*}
		{if $special}
			<div id="page">
				{$special}
			</div>
			
			<div class="displayNone">
				{$body}
			</div>
		{else}
	{*Конец*}
		
		{*Правый фиксированный блок*}
			{if !$is_start}
				<div id="rightfix">		
					{$inPage->printModules('rightfix')}
				</div>
			{/if}
		{*Конец*}
		
		{*Страница*}
		
		<div id="page">
			
			<div id="mainbody">
				{if $is_start}
					{$body}
				{else}
					
					{*Левое боковое меню*}
						{if $mod_count.leftbar}
							{$inPage->printModules('leftbar')}
						{/if}
					{*Конец*}
					
					<div id="main" {if !$mod_count.leftbar}class="wide_main"{/if}>

						{if $messages}
							<div class="sess_messages">
								{foreach item=message from=$messages}
									{$message}
								{/foreach}
							</div>
						{/if}

						{$body}

					</div>
				{/if}
			</div>
			
		</div>
		{*Конец*}
		
		{*Левые боковые кнопки*}
		{if $USER->id}
			<div class="left_fix_buttons">
				<a href="/goods/add" class="left_fix_button votes">{$LANG.LEFT_VOTES}</a>
				<a href="/articles/add" class="left_fix_button articles">{$LANG.LEFT_ARTICLES}</a>
				<a href="/market/add_new_file.html" class="left_fix_button files">{$LANG.LEFT_FILES}</a>
			</div>
		{/if}
		{*Конец*}
		
	{/if}
	
	{*Подвал страницы*}
		<div id="footer">
			<div id="footblock">
				<div class="leftfoot">
					{php} echo cmsCore::callEvent('PRINT_FOOTER_LINKS', ''); {/php}
				</div>
				<div class="rightfoot">
					<div id="copyright">{$copyright}</div>
				</div>
			</div>
		</div>
	{*Конец*}
	
</div>
