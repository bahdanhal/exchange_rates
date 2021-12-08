<input type="date" name="ondate" id="rates_date" onchange="ratesUpdate();">

<select id="rates_currency" form="rates_form" name="cur_id" onchange="ratesUpdate();">
    <option value="USD">USD</option>
    <option value="EUR">EUR</option>
    <option value="RUB">RUB</option>
</select>
<div id="exchange_rate"></div>