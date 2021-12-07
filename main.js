document.getElementById("rates_date").max = new Date().toISOString().split("T")[0]

function ratesUpdate(){
    let date = document.getElementById("rates_date").value
    let currency = currencies[document.getElementById("rates_currency").value]
    if(!date || !currency){
        return;
    }
    let request = new XMLHttpRequest();
    let link = 'https://www.nbrb.by/api/exrates/rates/' + currency + '?ondate=' + date
    $.getJSON(link)
    .done(function (data) {
        $.each(data, function (key, item) {
            exchange_rate = data.Cur_OfficialRate
            document.getElementById("exchange_rate").innerHTML = exchange_rate
        });
    }).error(function (err) {
        alert('error');
    });
}


const currencies = {
    "USD": 431,
    "EUR": 451,
    "RUB": 456
}
