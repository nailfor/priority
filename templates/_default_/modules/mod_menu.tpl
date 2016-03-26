<div class="header_left">
    <a href="/index.html" class="logo"></a>
    <nav class="menu">
        {foreach key=key item=item from=$items}
        {if $item.NSLevel > 1 && $item.NSLevel > $last_level}<ul>{/if}
            <a href="{$item.link}" target="{$item.target}" {if ($menuid==$item.id || $current_uri == $item.link)}class="selected"{/if} title="{$item.title|escape:'html'}">
                {$item.title}
            </a>
    {/foreach}
    </nav>
</div>