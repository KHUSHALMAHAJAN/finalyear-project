function updatePrice() {
    var from = document.getElementById("from").value;
    var to = document.getElementById("to").value;
    var railname = document.getElementById("railname");
    var priceElement = document.getElementById("price");
    var price = 0;
    var fromnum;
    var tonum;


    const station = ["bhusaval", "jalgaon", "chalisgon", "manmad", "nashik", "devdali", "khandwa", "pune"];
    for (var i = 0; i < station.length; i++) {
        if (from == station[i]) {
            fromnum = i;
            break;
        }
    }
    for (var i = 0; i < station.length; i++) {
        if (to == station[i]) {
            tonum = i;
            break;
        }
    }

    if (fromnum < tonum) {
        price = (tonum - fromnum) * 50;
    } else {
        price = (fromnum - tonum) * 50;
    }
    priceElement.textContent = "Price: " + price;


    var railOptions = '<option value="not select">Select Rail</option>';
    if (fromnum <= 4 && tonum <= 4) {
        railOptions += '<option value="Geetanjali">Geetanjali</option>';
        railOptions += '<option value="Pavan">Pavan</option>';
    } else if (fromnum >= 4 && tonum >= 4) {
        railOptions += '<option value="Pushapak">Pushapak</option>';
        railOptions += '<option value="Pavan">Pavan</option>';
    } else {
        railOptions += '<option value="Pavan">Pavan</option>';
    }

    railname.innerHTML = railOptions;

}
