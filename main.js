var cart = {};
function init() {
    $.getJSON("list.json", goodsOut);
}

function goodsOut(data) {
        //var goods = JSON.parse();
        //console.log(data);
        var out='';
        //var out_recycle ='';
        for (var key in data) {
            out+=`<div class ="card">`;
            out+=`<p class="name">${data[key].name}</p>`;
            out+=`<div class="cost">${data[key].cost}</div>`;
            out+=`<span class="description">${data[key].description}</span>`;
            out+=`<p class ="order">${data[key].order}</p>`;
            out+=`<button class="card_items_button" data-id="${key}">Purchase</button>`;
            out+=`</div>`;
        }
        $('.goods-out').html(out);
        $('.card_items_button').on('click', addCard);
}

function addCard() {
    var id = $(this).attr('data-id');
    if(cart[id] == undefined) {
        cart[id] = 1;
        
    } else {
        $.getJSON("list.json", goods);
        function goods(data){
        if (cart[id] < data[id].cost){
        cart[id]++;
        }
    }
    }
    showRecycle();
    saveCart();
    //loadCart();
}

function saveCart() {
    localStorage.setItem(cart, JSON.stringify(cart));
}

function showRecycle() {
    var out="";
    for (var key in cart) {
        out+='<div class="recycle_delta">'+key+':' +`<button class="minus" data-amount="${key}"> - </button>`+ '<span class="amount">'+cart[key]+'</span>'+`<button class="plus" data-amount="${key}"> + </button>`+'</div>';
    }
    $('.recycle-bin').html(out);
    $('.minus').on('click', removeAmount);
    $('.plus').on('click', increaseAmount);
}

function increaseAmount(data) {
    var id = $(this).attr('data-amount');
    $.getJSON("list.json", goods)
    function goods (data) {
    //var goods = data;
    if (cart[id] < data[id].cost) {
        cart[id]++;
        saveCart();
        loadCart();
    }    
 }
}
function removeAmount (){
    var key = $(this).attr('data-amount');
    if (cart[key] > 1){
    cart[key]--;
    saveCart();
    loadCart();
    }
    else {
        //delete cart[key];
        delete cart[key];
        saveCart();
        loadCart();
    }
}

function loadCart() {
    if(localStorage.getItem(cart)) {
        cart = JSON.parse(localStorage.getItem(cart));
        showRecycle();
    }
}

$(document).ready(function() {
    init();
    loadCart();
});
