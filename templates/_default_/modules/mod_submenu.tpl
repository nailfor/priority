<div class="services_menu">
    {foreach key=id item=submenu from=$menu}
    <div class="services_menuitem">
        <div class="services_menuitem_name">{$submenu.name}</div>
        <div class="services_submenu">
        {foreach key=id item=item from=$submenu.items}
            <a class="services_submenuitem" href="{$item.name}">
                <span style="background-image: url('/images/submenu/{$item.img}')" class="services_submenuitem_img"></span>
                <span class="services_submenuitem_name">{$item.name}</span>
            </a>
        {/foreach}
        </div>
    </div>
    {/foreach}
</div>