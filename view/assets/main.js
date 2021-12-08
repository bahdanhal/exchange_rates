document.getElementById("rates_date").max = new Date().toISOString().split("T")[0]

const currencies = {
    "USD": 431,
    "EUR": 451,
    "RUB": 456
}

function ratesUpdate(){
    let date = document.getElementById("rates_date").value
    let currency = currencies[document.getElementById("rates_currency").value]
    if(!date || !currency){
        return;
    }
    let request = new XMLHttpRequest();
    let link = '/rate&currency=' + currency + '&ondate=' + date
    request.open('GET', link, true);
    request.onload = function() {
        if (request.status >= 200 && request.status < 400) {
            // Success!
            try{
                var data = JSON.parse(request.responseText);
            } catch(e) {
                alert("error");
                return;
            }
            exchange_rate = data.Cur_OfficialRate
            document.getElementById("exchange_rate").innerHTML = exchange_rate    
        } else {

        }
    };

    request.onerror = function() {
        alert("error");
    };

    request.send();

}
