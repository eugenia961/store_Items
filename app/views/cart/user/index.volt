
{% if carts is empty %}
    <div class="container">
        <h2> Carts no Found.</h2>
    </div>

{% else %}




    <div class="form-group">

        <table class="table text-center">
            <thead class='text-center'>
                <tr >
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Cart</th>                      
                    <th scope="col" class="text-center">Items</th>
                    <th scope="col" class="text-center">Price (€)</th>
                    <th scope="col" class="text-center"></th>


                </tr>
            </thead>
            <tbody>

                {%  for cart in carts %}

                    <tr>
                        <th scope="row">{{loop.index}}</th>
                        <td style="background-color: #fff;color: #000">{{cart["creation"]}}</td>
                        <td>{{ quantity_format(cart["number"]) }}</td>                       
                        <td>{{ number_format(cart["price"]) }}</td>                      
                        <td>
                            <input type="hidden" value='{{cart["itemsJson"]}}' id="item_{{cart["id"]}}">


                            <button type="button" class="btn btn-danger fa fa-search" onclick='dialogoDetail("{{cart["id"]}}")'></button></td>

                    </tr>

                {% endfor %}


            </tbody>
        </table>



    </div>


{% endif %}




<div id="dialog" title='Cart' >

    <table class="table text-center">
        <thead class='text-center'>
            <tr >
                <th scope="col" class="text-center">#</th>                    
                <th scope="col" class="text-center">Item</th>
                <th scope="col" class="text-center">Quantity</th>
                <th scope="col" class="text-center">Price (€)</th>

            </tr>
        </thead>

        <tbody id="cartItems"><tbody>

    </table>

    </br>
    <button type="button" class="btn btn-danger " onclick="closeDialogo()">Close</button>
</div>
<script>
    $(function () {
        $("#dialog").dialog({
            autoOpen: false,
            show: {
                effect: "blind",
                duration: 1000
            },
            hide: {
                effect: "explode",
                duration: 1000
            },
            closeOnEscape: false,
            resizable: false,
            modal: true,
            width: 'auto'
        });
        $("#dialog").dialog("widget")            // get the dialog widget element
                .find(".ui-dialog-titlebar-close") // find the close button for this dialog
                .hide();
    });
    closeDialogo = function () {
        $("#dialog").dialog("close")
    };
    dialogoDetail = function (id) {

        var jsonItems = JSON.parse($("#item_" + id).val());
        var table = "";
        var i = 0;
        for (var item in jsonItems) {
            i++;
            table += "<tr>";
            table += '<th scope="row">' + i + '</th>';
            table += '<td style="background-color: #fff;color: #000">' + jsonItems[item]["item"] + '</td>';
            table += '<td >' + $.number( jsonItems[item]["quantity"],0,",") + '</td>';
            table += '<td >' + $.number(jsonItems[item]["unit_price"],2,",",".") + '</td>';
            table += "</tr>";
        }
        $(".ui-dialog").find(".ui-widget-header").css("background", "#dc3b45");
        $(".ui-dialog").find(".ui-widget-header").css("color", "#FFF");
        $('#cartItems').html(table);
        $("#dialog").dialog("open");
    };


</script>


