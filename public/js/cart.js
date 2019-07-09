window.addEventListener("load", function() {

    // cambiar cantidad de productos
    var rows = document.getElementsByClassName("productorder");

    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        row.addEventListener("change", function(event) {
            var total = document.querySelector(".checkouttotal").innerHTML;
            var cantidadProductoNueva = event.target.value;

            if (cantidadProductoNueva <= 0 || isNaN(cantidadProductoNueva)) {
                cantidadProductoNueva = 1;
            }
            var precio = event.path[1].nextElementSibling.innerText;
            var cantidadProducto = event.target.defaultValue;
            var precioNuevo =
                (precio / cantidadProducto) * cantidadProductoNueva;

            event.target.value = cantidadProductoNueva;
            event.path[1].nextElementSibling.innerText = precioNuevo;
            event.target.defaultValue = cantidadProductoNueva;

            var total =
                parseInt(total) + parseInt(precioNuevo) - parseInt(precio);

            document.querySelector(".checkouttotal").innerHTML = total;

            var productId = event.path[2].children[0].value;

            // console.log( productId, cantidadProducto, cantidadProductoNueva);

            var product = {
                id: productId,
                cantidad: cantidadProductoNueva
            }

            if(cantidadProducto != cantidadProductoNueva){

                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: "POST",
                    url: '/updatecart',
                    data: product,
                    complete: function(){
                        console.log('todo ok');
                    }
                })
            }

        });
    }

    // eliminar una linea

    var deletebuttons = document.getElementsByClassName("btn-delete-out");

    for(var i = 0; i<deletebuttons.length; i++){
        button = deletebuttons[i];
        button.addEventListener('click', function(event){
            console.log(event);
        var buttonClicked = event.target;
        var button_parent = buttonClicked.parentElement.parentElement.parentElement;
        var productId = button_parent.getElementsByClassName("input-product-id")[0].value;
        var precio = button_parent.getElementsByClassName('precioporproducto')[0].innerHTML;
        buttonClicked.parentElement.parentElement.parentElement.remove();
        var total = document.querySelector(".checkouttotal").innerHTML;
        var totalActualizado = parseInt(total) - parseInt(precio);

        document.querySelector('.checkouttotal').innerHTML = totalActualizado;

        if(totalActualizado===0){

            document.querySelector('.divcheckout').innerHTML = "No tiene productos en su carrito";
            document.querySelector('.buttonssubmit').innerHTML = "";
        }

        var cantidad = 0;

        var product = {
            id: productId,
            cantidad: cantidad
        }

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: "POST",
            url: '/deletefromcart',
            data: product,
            complete: function(){
                console.log('todo ok');
            }
        })

        })
    }

});
