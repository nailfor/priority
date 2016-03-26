<div class="exchange_rates">
    <div class="exchange_rates_head">
        Курс валют на {$date}
    </div>    

    <div class="exchange_rates_body">
        {foreach key=ticker item=data from=$output_tickers}
        <div class="exchange_rate">
            <div class="exchange_rate_img" style="background-image: url('images/ex_rates/{$data.ticker}.png')"></div>
            <div class="exchange_rate_abbr">{$data.ticker}</div>
            <div class="exchange_rate_val">{$data.cost} руб.</div>
        </div>
        {/foreach}
    </div>
</div>