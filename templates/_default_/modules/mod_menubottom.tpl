<div class="footer_menu">
    <div class="footer_menuitem">
        <a href="/index.html">Главная</a>
    </div>

    {foreach key=key item=item from=$items}
    {if $item.NSLevel > 1 && $item.NSLevel > $last_level}<ul>{/if}
    <div class="footer_menuitem">
        <a href="{$item.link}" target="{$item.target}" title="{$item.title|escape:'html'}">
            {$item.title}
        </a>
    </div>
    {/foreach}
</div>
