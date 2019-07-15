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

            var precio = event.path[1].nextElementSibling.innerText.substr(1);
            var cantidadProducto = event.target.defaultValue;
            var precioNuevo =
                (precio / cantidadProducto) * cantidadProductoNueva;

            event.target.value = cantidadProductoNueva;
            event.path[1].nextElementSibling.innerText = "$"+precioNuevo;
            event.target.defaultValue = cantidadProductoNueva;

            var total =
                parseInt(total) + parseInt(precioNuevo) - parseInt(precio);

            document.querySelector(".checkouttotal").innerHTML = total;

            var productId = event.path[2].children[1].value;
            var userId = document.querySelector(".currentuser").value;

            if (!userId) {
                var product = {
                    id: productId,
                    cantidad: cantidadProductoNueva
                };
            } else {
                var product = {
                    id: productId,
                    cantidad: cantidadProductoNueva,
                    user_id: userId
                };
            }

            console.log(
                event,
                productId,
                cantidadProductoNueva,
                userId,
                product
            );

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "POST",
                url: "/updatecart",
                data: product,
                complete: function() {
                    console.log("todo ok");
                }
            });
        });
    }

    // eliminar una linea

    var deletebuttons = document.getElementsByClassName("btn-delete-out");

    for (var i = 0; i < deletebuttons.length; i++) {
        button = deletebuttons[i];
        button.addEventListener("click", function(event) {
            console.log(event);
            var buttonClicked = event.target;
            var button_parent =
                buttonClicked.parentElement.parentElement.parentElement;
            var productId = button_parent.getElementsByClassName(
                "input-product-id"
            )[0].value;
            var userId = document.querySelector(".currentuser").value;
            var precio = button_parent.getElementsByClassName(
                "precioporproducto"
            )[0].innerHTML.substr(1);
            buttonClicked.parentElement.parentElement.parentElement.remove();
            var total = document.querySelector(".checkouttotal").innerHTML;
            var totalActualizado = parseInt(total) - parseInt(precio);

            document.querySelector(
                ".checkouttotal"
            ).innerHTML = totalActualizado;

            if (totalActualizado === 0) {

                document.querySelector("table").style.display = "none";
                document.querySelector(".divcheckout").style.display = "none";
                document.querySelector(".buttonssubmit").innerHTML = "";
                document.querySelector(".none-display").style.display = "block";
            }

            var product = {
                id: productId,
                user_id: userId
            };

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "POST",
                url: "/deletefromcart",
                data: product,
                complete: function() {
                    console.log("todo ok");
                }
            });
        });
    }
});
