
<?php if (empty($carts)) { ?>
    <div class="container">
        <h2> Carts no Found.</h2>
    </div>

<?php } else { ?>




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

                <?php $v114596527292455920131iterator = $carts; $v114596527292455920131incr = 0; $v114596527292455920131loop = new stdClass(); $v114596527292455920131loop->self = &$v114596527292455920131loop; $v114596527292455920131loop->length = count($v114596527292455920131iterator); $v114596527292455920131loop->index = 1; $v114596527292455920131loop->index0 = 1; $v114596527292455920131loop->revindex = $v114596527292455920131loop->length; $v114596527292455920131loop->revindex0 = $v114596527292455920131loop->length - 1; ?><?php foreach ($v114596527292455920131iterator as $cart) { ?><?php $v114596527292455920131loop->first = ($v114596527292455920131incr == 0); $v114596527292455920131loop->index = $v114596527292455920131incr + 1; $v114596527292455920131loop->index0 = $v114596527292455920131incr; $v114596527292455920131loop->revindex = $v114596527292455920131loop->length - $v114596527292455920131incr; $v114596527292455920131loop->revindex0 = $v114596527292455920131loop->length - ($v114596527292455920131incr + 1); $v114596527292455920131loop->last = ($v114596527292455920131incr == ($v114596527292455920131loop->length - 1)); ?>

                    <tr>
                        <th scope="row"><?= $v114596527292455920131loop->index ?></th>
                        <td style="background-color: #fff;color: #000"><?= $cart['creation'] ?></td>
                        <td><?= number_format($cart['number'], 0,',','') ?></td>                       
                        <td><?= number_format($cart['price'], 2, ',', '.') ?></td>                      
                        <td>
                            <input type="hidden" value='<?= $cart['itemsJson'] ?>' id="item_<?= $cart['id'] ?>">


                            <button type="button" class="btn btn-danger fa fa-search" onclick='dialogoDetail("<?= $cart['id'] ?>")'></button></td>

                    </tr>

                <?php $v114596527292455920131incr++; } ?>


            </tbody>
        </table>



    </div>


<?php } ?>




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


