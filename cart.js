var product_id = document.getElementsByClassName("cart_btn1");
for (var i = 0; i<product_id.length; i++){
    product_id[i].addEventListener("click", function(event){
        var target = event.target;
        var id = target.getAttribute("data-id");
        var group = target.getAttribute("group-id");
        var category = target.getAttribute("category-id");

        var price1 = target.getAttribute("price");

        var url = 'connection.php' + '?id=' + encodeURIComponent(id) + '&group=' + encodeURIComponent(group) + '&category=' + encodeURIComponent(category) + '&price=' + encodeURIComponent(price1);

        var xml = new XMLHttpRequest()
        xml.onload = function() {
            var data = JSON.parse(this.responseText);
            target.innerHTML = data.in_cart;
            document.getElementById("count").innerHTML = data.num_cart + 1;
        }

        xml.open("GET",url,true);
        xml.send();

        
    });
}


var Remove = document.getElementsByClassName("remove-btn");
        for(var i = 0; i<Remove.length; i++){
            Remove[i].addEventListener("click", function(event){
                var target = event.target;
                var cart_id = target.getAttribute("data-id");
                var group = target.getAttribute("group-id");
                var category = target.getAttribute("category-id");


                var url = 'connection.php' + '?cart_id=' + encodeURIComponent(cart_id) + '&group=' + encodeURIComponent(group) + '&category=' + encodeURIComponent(category);

                var xml = new XMLHttpRequest();
                xml.onload =function(){
                    target.innerHTML = this.responseText;
                    target.style.opacity = .3;
                    window.location.reload();
                    
                }
                xml.open("GET",url,true);
                xml.send();
            })
        }
function pay(){
    var myHeaders = new Headers();
    myHeaders.append("Authorization", "Bearer CHASECK_TEST-3yoSebvcaGiJJzlRwiZx0wsmbkN4q87n");
    myHeaders.append("Content-Type", "application/json");

var raw = JSON.stringify({
    "amount": "100",
    "currency": "ETB",
    "email": "firaolbekele00@gmail.com",
    "first_name": "Firaol",
    "last_name": "Bekele",
    "phone_number": "0904846321",
    "tx_ref": "firashoping-5434",
    "callback_url": "https://webhook.site/077164d6-29cb-40df-ba29-8a00e59a7e60",
    "return_url": "https://www.google.com/",
    "customization[title]": "Payment for my favourite merchant",
    "customization[description]": "I love online payments"
});

var requestOptions = {
    method: 'post',
    headers: myHeaders,
    body: raw,
    redirect: 'follow'
};

fetch("proxy.php?url=https://api.chapa.co/v1/transaction/initialize", requestOptions)
    .then(response => response.text())
    .then(result => console.log(result))
    .catch(error => console.log('error', error));
}