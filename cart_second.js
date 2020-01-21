var cart={};

function input () {
    $.getJSON("list.json", function(data) {
        var goods = data;
        var out="";
        var ballast_sigma = 0;
        //var sigma = new Array();
        for (var key in goods) {
            if (cart[key] != undefined) {
                var sigma = goods[key].cost * cart[key];
                //console.log(sigma[i]);
                //console.log(sigma[cart[key]]);
            out+='<div class="cart_block">'
            out+=`<button class="deleteGoods" data-id="${key}">X</button>`
            out+=`<div class="name_cart">${goods[key].name}<p>Total: ${sigma}</p></div> `;
            out+=`<div class="amount_cart">Amount: ${cart[key]}</div>`;
            //out+=`<div class="haribol">HARIBOL</div>`;
            out+='</div>'
            ballast_sigma+=sigma;
            }
        }
        out+=`<p class="total">Total Amount: ${ballast_sigma}</p>`
        $('.recycle').html(out);
        $('.deleteGoods').on('click', removeClass);
        //showCart();
    });
}

function removeClass() {
    var key = $(this).attr('data-id');
    delete cart[key]; 
    saveCart();
    input();
}

function saveCart() {
    localStorage.setItem(cart, JSON.stringify(cart));
}

function loadCart() {
    
        localStorage.getItem(cart);
        cart = JSON.parse(localStorage.getItem(cart));
        input();
    
   
}

function isEmpty(object) {
    for(var key in object) 
    if (object.hasOwnProperty(key)) {
    return true } else {
        return false;
    }
} 

function sendRequest () {
    var surname = $('.surname').val();
    var email = $('.email').val();
    var phone = $('.phone').val();
    if (surname != '' && email!='' && phone !='' ) {
        if (isEmpty(cart)) {
            $.post (
                "core/mail.php", 
                {
                    "surname": surname, 
                    "email": email, 
                    "phone": phone, 
                    "cart": cart
                },
                function (data) {
                    console.log(data);
                }
            );
        } else {
            alert('Empty!');
        }
    } else {
        alert('Correct input!');
    }
}

$(document).ready(function() {
    loadCart();
    $('.customer_button_request').on('click', sendRequest);
});
