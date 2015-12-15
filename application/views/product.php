<div class="col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading panel-heading-green">
            <h3 class="panel-title"><?php echo $product->title;?></h3>
        </div>
        <div class="panel-body">
            <div class="row details">
                <div class="col-md-4">
                    <img src="<?php echo base_url();?>images/products/<?php echo $product->image;?>" />
                </div>
                <div class="col-md-8">
                    <h3><?php echo $product->title;?></h3>
                    <div class="details-price">
                        Price: <?php echo $product->price;?>
                    </div>
                    <div class="details-description">
                        <p><?php echo $product->description;?></p>
                    </div>

                    <div class="details-buy">
                        <form method="post" action="<?php echo base_url(); ?>cart/add/<?php echo $product->id;?>">
                            QTY: <input class="qty" type="text" name="qty" value="1" /><br />
                            <input type="hidden" name="item_number" value="<?php echo $product->id;?>" />
                            <input type="hidden" name="price" value="<?php echo $product->price;?>" />
                            <input type="hidden" name="title" value="<?php echo $product->title;?>" />
                            <button type="submit" name="buy_submit" class="btn btn-primary">Add To Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>