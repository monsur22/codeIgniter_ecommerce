
<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
						
							<?php
						$variable=$this->Admin_model->getcat();
							foreach ($variable as $value) {
								
							

							?>							


							
						
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#"><?php echo $value->category_name; ?></a></h4>
								</div>
							</div>
<?php }?>
								
						</div><!--/category-products-->