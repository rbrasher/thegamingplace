<div class="cart-block">
    <form action="<?php echo base_url();?>cart/update" method="post">
        <table cellpadding="6" cellspacing="1" style="width: 100%;" border="0">
            <tr>
                <th>QTY</th>
                <th>Item Description</th>
                <th style="text-align: right">Item Price</th>
            </tr>
            <?php $i = 1;?>
            <?php foreach($this->cart->contents() as $items) : ?>
            <input type="hidden" name="<?php echo $i . '[rowid]';?>" value="<?php echo $items['rowid'];?>" />
            <tr>
                <td><input type="text" name="<?php echo $i.'[qty]';?>" value="<?php echo $items['qty'];?>" maxlength="3" size="5" class="qty" /></td>
                <td><?php echo $items['name'];?></td>
                <td style="text-align: right;">$<?php echo $this->cart->format_number($items['price']);?></td>
            </tr>
            <?php $i++;?>
            <?php endforeach;?>
            <tr>
                <td></td>
                <td class="right"><strong>Total</strong></td>
                <td class="right" style="text-align:right;">$<?php echo $this->cart->format_number($this->cart->total());?></td>
            </tr>
        </table>
        <br />
        <p>
            <button class="btn btn-default" type="submit">Update Cart</button>
            <a class="btn btn-default" href="<?php echo base_url();?>cart">Go To Cart</a>
        </p>
    </form>
</div><!-- /.cart-block -->

<div class="panel panel-default panel-list">
    <div class="panel-heading panel-heading-dark">
        <h3 class="panel-title">Categories</h3>
    </div>
    <ul class="list-group">
        <?php foreach(get_categories_h() as $category) : ?>
        <li class="list-group-item"><a href="<?php echo base_url();?>products/category/<?php echo $category->id;?>"><?php echo $category->name;?></a></li>
        <?php endforeach;?>
    </ul>
</div>

<div class="panel panel-default panel-list">
    <div class="panel-heading">
        <h3 class="panel-title">Most Popular</h3>
    </div>
    <ul class="list-group">
        <?php foreach(get_popular_h() as $game): ?>
        <li class="list-group-item"><a href="<?php echo base_url();?>products/details/<?php echo $game->id;?>"><?php echo $game->title;?></a></li>
        <?php endforeach;?>
    </ul>
</div>