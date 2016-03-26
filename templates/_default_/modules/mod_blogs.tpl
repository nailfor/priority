<div class="news_block">
    
    </div><div class="news_block_title">
        Новости
    </div>
    {foreach key=tid item=post from=$posts}
        <div class="news_item">
            <div class="news_item_date">
                {$post.fpubdate}
            </div>
            <a href="{$post.url}" class="news_item_title">
                {$post.title}
            </a>
        </div>
    {/foreach}
</div>
