<section id="contact" class="section-space-padding">
    <div class="container">
    </div>
</section>

<h2>Items.</h2>



<div class="row">
    <div class="col-sm-12" >

        <?php if (empty($itemsPages->items)) { ?>

            <div class="alert alert-danger" role="alert">

                Items not found

            </div>



        <?php } else { ?>

       

         
            <?php $v139029846864497478531iterator = $itemsPages->items; $v139029846864497478531incr = 0; $v139029846864497478531loop = new stdClass(); $v139029846864497478531loop->self = &$v139029846864497478531loop; $v139029846864497478531loop->length = count($v139029846864497478531iterator); $v139029846864497478531loop->index = 1; $v139029846864497478531loop->index0 = 1; $v139029846864497478531loop->revindex = $v139029846864497478531loop->length; $v139029846864497478531loop->revindex0 = $v139029846864497478531loop->length - 1; ?><?php foreach ($v139029846864497478531iterator as $item) { ?><?php $v139029846864497478531loop->first = ($v139029846864497478531incr == 0); $v139029846864497478531loop->index = $v139029846864497478531incr + 1; $v139029846864497478531loop->index0 = $v139029846864497478531incr; $v139029846864497478531loop->revindex = $v139029846864497478531loop->length - $v139029846864497478531incr; $v139029846864497478531loop->revindex0 = $v139029846864497478531loop->length - ($v139029846864497478531incr + 1); $v139029846864497478531loop->last = ($v139029846864497478531incr == ($v139029846864497478531loop->length - 1)); ?>


                <?php if ($v139029846864497478531loop->index == 1) { ?>

                    <div class="row">

                    <?php } ?>

                    <div class="col-sm-3">
                        <div class="card border-primary mb-3" >
                            <div class="card-body">
                                <div class="card-header">
                                    <h5 class="card-title"> <?= $item->item() ?></h5>
                                </div>
                                <div class="card-body text-primary">

                                    <h5 class="card-title">Price: <?= number_format($item->price(), 2, ',', '.') ?></h5>

                                    <a href="<?= $this->url->get('cart/add/' . $item->id() . '/' . $page) ?>" class="card-link card-text" style=" font-size:15px;"><span class="fas fa-cart-plus"></span> Add</a>


                                </div>
                            </div>
                        </div>
                    </div>



                    <?php if ($v139029846864497478531loop->index % 3 == 0 && $v139029846864497478531loop->index != 1) { ?>

                    </div>
                    <p></p>
                    <div class="row">

                    <?php } ?>

                <?php $v139029846864497478531incr++; } ?>
            </div>
            
            
            <div class="row">
                <nav aria-label="Page navigation">
                    <ul class="pagination" id="pagination">

                        <li class="page-item"><a class="page-link" href='<?= $this->url->get('index/0') ?>'>First</a></li>
                        <li class="page-item"><a class="page-link" href='<?= $this->url->get('index/' . $itemsPages->before) ?>'>Previous</a></li>

                        <?php $maxPage = $page + 3; ?>

                        <?php $v139029846864497478531iterator = range($page, $maxPage); $v139029846864497478531incr = 0; $v139029846864497478531loop = new stdClass(); $v139029846864497478531loop->self = &$v139029846864497478531loop; $v139029846864497478531loop->length = count($v139029846864497478531iterator); $v139029846864497478531loop->index = 1; $v139029846864497478531loop->index0 = 1; $v139029846864497478531loop->revindex = $v139029846864497478531loop->length; $v139029846864497478531loop->revindex0 = $v139029846864497478531loop->length - 1; ?><?php foreach ($v139029846864497478531iterator as $i) { ?><?php $v139029846864497478531loop->first = ($v139029846864497478531incr == 0); $v139029846864497478531loop->index = $v139029846864497478531incr + 1; $v139029846864497478531loop->index0 = $v139029846864497478531incr; $v139029846864497478531loop->revindex = $v139029846864497478531loop->length - $v139029846864497478531incr; $v139029846864497478531loop->revindex0 = $v139029846864497478531loop->length - ($v139029846864497478531incr + 1); $v139029846864497478531loop->last = ($v139029846864497478531incr == ($v139029846864497478531loop->length - 1)); ?>

                            <?php if ($itemsPages->total_pages >= $i) { ?>

                                <li class="page-item"><a class="page-link" href='<?= $this->url->get('index/' . $i) ?>'><?= $i ?></a></li>

                            <?php } ?>    

                        <?php $v139029846864497478531incr++; } ?>


                        <li class="page-item"><a class="page-link" href='<?= $this->url->get('index/' . $itemsPages->next) ?>'>Next</a></li>
                        <li class="page-item"><a class="page-link" href='<?= $this->url->get('index/' . $itemsPages->last) ?>'>...<?= $itemsPages->total_pages ?></a></li>

                    </ul>
                </nav>
            </div>
        <?php } ?>



    </div>
</div>





