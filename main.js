document.getElementById("rates_date").max = new Date().toISOString().split("T")[0]

function ratesUpdate(){
    let date = document.getElementById("rates_date").value
    let currency = currencies[document.getElementById("rates_currency").value]
    if(!date || !currency){
        return;
    }
    let request = new XMLHttpRequest();
    let link = 'request.php?query=' + currency + '?ondate=' + date
    request.open('GET', link, true)
    request.send()

    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            if (request.status == 200 && request.status < 300) {
                try {
                    response = JSON.parse(request.responseText)
                } catch (e) {
                    alert("error")
                }
                exchange_rate = response.Cur_OfficialRate
                document.getElementById("exchange_rate").innerHTML = exchange_rate
            }
            else
                alert("error")
        }
    }
    //console.log(currencies[document.getElementById("rates_currency").value])
}


const currencies = {
    "USD": 431,
    "EUR": 451,
    "RUB": 456
}
