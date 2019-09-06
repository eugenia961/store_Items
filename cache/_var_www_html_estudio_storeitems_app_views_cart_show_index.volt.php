<h2>Cart.</h2>

<?php if (empty($items)) { ?>
    <div class="container">
        <h2> Add some items.</h2>
    </div>

<?php } else { ?>



    <form method="POST" name='myForm' id='Form' action="" >

        <div class="form-group">

            <table class="table text-center">
                <thead class='text-center'>
                    <tr >
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Item</th>
                        <th scope="col" class="text-center">Quantity</th>
                        <th scope="col" class="text-center">Price (€)</th>
                        <th scope="col" class="text-center"></th>



                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    <?php $v132510155035266474391iterator = $items; $v132510155035266474391incr = 0; $v132510155035266474391loop = new stdClass(); $v132510155035266474391loop->self = &$v132510155035266474391loop; $v132510155035266474391loop->length = count($v132510155035266474391iterator); $v132510155035266474391loop->index = 1; $v132510155035266474391loop->index0 = 1; $v132510155035266474391loop->revindex = $v132510155035266474391loop->length; $v132510155035266474391loop->revindex0 = $v132510155035266474391loop->length - 1; ?><?php foreach ($v132510155035266474391iterator as $item) { ?><?php $v132510155035266474391loop->first = ($v132510155035266474391incr == 0); $v132510155035266474391loop->index = $v132510155035266474391incr + 1; $v132510155035266474391loop->index0 = $v132510155035266474391incr; $v132510155035266474391loop->revindex = $v132510155035266474391loop->length - $v132510155035266474391incr; $v132510155035266474391loop->revindex0 = $v132510155035266474391loop->length - ($v132510155035266474391incr + 1); $v132510155035266474391loop->last = ($v132510155035266474391incr == ($v132510155035266474391loop->length - 1)); ?>

                        <tr>
                            <th scope="row"><?= $v132510155035266474391loop->index ?></th>
                            <td style="background-color: #fff;color: #000"><?= $item['item'] ?></td>
                            <td><?= number_format($item['quantity'], 0,',','') ?></td>                       
                            <td><?= number_format($item['price'], 2, ',', '.') ?></td>
                            <td >
                                <a href='<?= $this->url->get('cart/delete/' . $item['id']) ?>'>
                                    <span  class="text-center fa fa-trash fa-2x" style="background-color: #fff;color: red" ></span>
                                </a>

                            </td>

                            <?php $total = $total + $item['price']; ?>
                        </tr>

                    <?php $v132510155035266474391incr++; } ?>

                    <tr>

                        <th colspan="4" >Total (€)</th>
                        <td  ><?= number_format($total, 2, ',', '.') ?></td>

                    </tr>

                </tbody>
            </table>


            <?php if ($isLogin) { ?>
                </br>
                <p><button type="submit" class="btn btn-primary">Submit</button></p>
            <?php } ?>

            <div class="container">
                </br>
                <?= $this->flashSession->output() ?>
            </div>

        </div>


    </form>
<?php } ?>

