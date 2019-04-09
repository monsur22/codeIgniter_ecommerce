<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php foreach($showpro as $product) {?>
							
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="<?php echo base_url().$product->p_img ?>" height="200"width="200" alt="" />
											<h2>$56</h2>
											<p><?php echo $product->p_name?></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
										<a href="<?php echo base_url();?>welcome/product_details">
											<div class="overlay-content">
												<h2>$56</h2>
												<p><?php echo $product->p_name?></p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</a>
										</div>
								</div>
								
							</div>
						</div>

						<?php }?>
					</div><!--features_items-->