// noinspection JSJQueryEfficiency

// Get the button:
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.documentElement.scrollTo(0 , 0) // For Chrome, Firefox, IE and Opera
}


$(document).ready(function() {
    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 0 ? 0 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });
});


//fetch api
async function getUsers() {
    let url = 'dane/dania.json';
    try {
        let res = await fetch(url);
        return await res.json();
    } catch (error) {
        console.log(error);
    }
}

async function renderUsers() {
    let users = await getUsers();
    let html = '';
    users.forEach(user => {
        let htmlSegment = `<div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="http://localhost/projekt/${user.profileURL}" class="img-fluid rounded-start" alt="${user.nazwa}">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">${user.nazwa}</h5>
                            <p class="card-text">${user.cena} zl</p>                   
                        </div>
                    </div>
                </div>
            </div>`;

        html += htmlSegment;
    });

    let container = document.querySelector('.container');
    container.innerHTML = html;
}
renderUsers();

function ceilPrecised(number, precision) {
    var power = Math.pow(10, precision);

    return Math.ceil(number * power) / power;
}

//koszyk
function setCart() {
    var item = {};
    item.id = document.getElementById('floatingSelect').value;
    item.name = document.getElementById('floatingSelect').value;
    item.cena = document.getElementById('floatingSelect').value;
    if(item.id === 1){
        item.name = "Maly Zestaw";
        item.cena = 69.99;
    }
    switch (item.id){
        case "1":
            item.name = "Maly Zestaw";
            item.cena = 69.99;
            break;
        case "2":
            item.name = "Sredni Zestaw";
            item.cena = 129.99;
            break;
        case "3":
            item.name = "Duzy Zestaw";
            item.cena = 169.99;
            break;
        case "4":
            item.name = "Krewetka Zestaw";
            item.cena = 129.99;
            break;
        case "5":
            item.name = "Łosos Zestaw";
            item.cena = 139.99;
            break;
        case "6":
            item.name = "Tori Zestaw";
            item.cena = 119.99;
            break;
    }
    item.ilosc = document.getElementById('ilosc').value;
    item.wartosc = ceilPrecised( parseFloat(item.ilosc) * parseFloat(item.cena), 2 )

    var lista = JSON.parse(localStorage.getItem('lista'));
    if (lista === null) {
        lista = [];
    }
    lista.push(item);
    localStorage.setItem('lista', JSON.stringify(lista));

    getCart(lista);
}

function getCart(lista2){
    var content = '',
        startTab = "<table>",
        startCol = "<tr>",
        startRow = "<td>",
        endRow = "</td>",
        endCol = "</tr>",
        endTab = "</table>";
    var lista2 = JSON.parse(localStorage.getItem('lista'));
    if (lista2 === null) {
        alert("Koszyk jest pusty!");
    } else {
        document.getElementById('cart').style.visibility = "visible";
        content += startTab + startRow + "Nazwa Produktu: " + endRow + startRow + "Cena: " + endRow + startRow + "liczba sztuk: " + endRow + endTab;
        for (var i = 0; i < lista2.length; i++) {
            content +=  startTab + startRow + lista2[i].name + endRow;
            content += startRow + lista2[i].wartosc + endRow;
            content += startRow + lista2[i].ilosc + endRow + endTab;

        }
        var suma= 0
        for (var i = 0; i < lista2.length; i++)
            suma += lista2[i].wartosc;
        content +=  startTab + startRow + "cena razem : " + endRow;
        content += startRow + suma.toFixed(2) + endRow;
        content += startRow + " " + endRow + endTab;
        document.getElementById("cart").innerHTML = content;
    }
}

function deleteCart() {

    localStorage.clear();
    location.href="http://localhost/projekt/zamowienie.html";
}