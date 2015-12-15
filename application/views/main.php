<div class="col-md-8">
    <?php if($this->session->flashdata('registered')) : ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('registered');?>
    </div>
    <?php endif;?>

    <?php if($this->session->flashdata('pass_login')) : ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('pass_login');?>
    </div>
    <?php endif;?>

    <?php if($this->session->flashdata('fail_login')) : ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('fail_login');?>
    </div>
    <?php endif;?>
    <?php echo $this->session->userdata('logged_in');?>
    <div class="panel panel-default">
        <div class="panel-heading panel-heading-green">
            <h3 class="panel-title">Latest Releases</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <?php foreach($products as $product) : ?>
                <div class="col-md-4 game">
                    <div class="game-price"><?php echo $product->price;?></div>
                    <a href="<?php echo base_url();?>products/details/<?php echo $product->id;?>">
                        <img src="<?php echo base_url();?>images/products/<?php echo $product->image;?>" />
                    </a>
                    <div class="game-title"><?php echo $product->title;?></div>
                    <div class="game-add">
                        <form method="post" action="<?php echo base_url();?>cart/add">
                            QTY: <input class="qty" type="text" name="qty" value="1" /><br />
                            <input type="hidden" name="item_number" value="<?php echo $product->id;?>" />
                            <input type="hidden" name="price" value="<?php echo $product->price;?>" />
                            <input type="hidden" name="title" value="<?php echo $product->title;?>" />
                            <button class="btn btn-primary" type="submit">Add To Cart</button>
                        </form>
                    </div>
                </div>
                <?php endforeach;?>
            </div><!-- /.row -->
        </div><!-- /.panel-body -->
    </div><!-- /.panel-default -->
</div><!-- /.col-md-8 -->