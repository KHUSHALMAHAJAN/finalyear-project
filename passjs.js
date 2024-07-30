// Function to update the price based on selected pass validity and route
function updatePrice() {
    var from = document.getElementById("from").value;
    var to = document.getElementById("to").value;
    var railname = document.getElementById("railname");
    var priceElement = document.getElementById("price");

    var oneMonth = document.querySelector('input[name="month"][value="one"]');
    var threeMonths = document.querySelector('input[name="month"][value="three"]');
    var sixMonths = document.querySelector('input[name="month"][value="six"]');

    var price = 0;
    var fromnum;
    var tonum;

    const stations = ["bhusaval", "jalgaon", "chalisgon", "manmad", "nashik", "devdali", "khandwa", "pune"];

    for (var i = 0; i < stations.length; i++) {
        if (from == stations[i]) {
            fromnum = i;
            break;
        }
    }
    for (var i = 0; i < stations.length; i++) {
        if (to == stations[i]) {
            tonum = i;
            break;
        }
    }

    if (oneMonth.checked) {
        price = Math.abs(tonum - fromnum) * 80 * 26;
    }
    else if (threeMonths.checked) {
        price = Math.abs(tonum - fromnum) * 60 * 78;
    }
    else if (sixMonths.checked) {
        price = Math.abs(tonum - fromnum) * 40 * 156;
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

document.addEventListener('DOMContentLoaded', () => {
    const radios = document.querySelectorAll('input[name="month"]');
    radios.forEach(radio => {
        radio.addEventListener('change', updatePrice);
    });

    const selects = document.querySelectorAll('select[name="from"], select[name="to"]');
    selects.forEach(select => {
        select.addEventListener('change', updatePrice);
    });
});
function calculateExpiryDate() {
    const radios = document.getElementsByName('month');
    let validity;
    for (let i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            validity = radios[i].value;
            break;
        }
    }

    const currentDate = new Date();
    let expiryDate = new Date(currentDate);

    switch (validity) {
        case 'one':
            expiryDate.setMonth(currentDate.getMonth() + 1);
            break;
        case 'three':
            expiryDate.setMonth(currentDate.getMonth() + 3);
            break;
        case 'six':
            expiryDate.setMonth(currentDate.getMonth() + 6);
            break;
        default:
            expiryDate = null;
    }

    const expiryDateElement = document.getElementById('expiry-date');
    if (expiryDate) {
        const formattedDate = expiryDate.toISOString().split('T')[0];
        expiryDateElement.textContent = 'Expiry Date: ' + formattedDate;
    } else {
        expiryDateElement.textContent = 'Expiry Date: Invalid validity period';
    }
}
