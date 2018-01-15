<!-- banner -->
	<div class="banner">
		<div class="container">
			<div class="banner-info animated wow zoomIn" data-wow-delay=".5s">
				<h3>Free Online Shopping</h3>
				<h4>Up to <span>50% <i>Off/-</i></span></h4>
				<div class="wmuSlider example1">
					<div class="wmuSliderWrapper">
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<div class="banner-info1">
									<p>T-Shirts + Formal Pants + Jewellery + Cosmetics</p>
								</div>
							</div>
						</article>
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<div class="banner-info1">
									<p>Toys + Furniture + Lighting + Watches</p>
								</div>
							</div>
						</article>
						<article style="position: absolute; width: 100%; opacity: 0;"> 
							<div class="banner-wrap">
								<div class="banner-info1">
									<p>Tops + Books & Media + Sports</p>
								</div>
							</div>
						</article>
					</div>
				</div>
					<script src="<?php echo base_url('assets/main/');?>js/jquery.wmuSlider.js"></script> 
					<script>
						$('.example1').wmuSlider();         
					</script> 
			</div>
		</div>
	</div>
	<div class="new-collections">
		<div class="container">
			<h3 class="animated wow zoomIn" data-wow-delay=".5s">Koleksi Terbaru</h3>
			<?php if (empty($categoryLabel)):?>
			<p class="est animated wow zoomIn" data-wow-delay=".5s">Ini merupakan koleksi barang yang dimiliki oleh situs kami, nantikan juga update tiap harinya</p>
			<?php else:?>
			<p class="est animated wow zoomIn" data-wow-delay=".5s">Ini merupakan koleksi barang dari kategori <strong><?php echo $categoryLabel;?>x</strong> yang dimiliki oleh situs kami, nantikan juga update tiap harinya</p>
			<?php endif;?>
			<div class="new-collections-grids">
				<?php if (empty($products)):?>
				
				<?php else:?>
				<?php foreach ($products as $row):?>
				<div class="col-md-3 new-collections-grid" style="margin-bottom: 2em;">
					<div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
						<div class="new-collections-grid1-image">
							<a href="<?php echo base_url('main/detail');?>" class="product-image"><img src="<?php echo base_url($row['photos']);?>" alt=" " class="img-responsive" style="min-height: 250px;" /></a>
							<div class="new-collections-grid1-image-pos">
								<a href="<?php echo base_url('main/detail/'.$row['ID']);?>">Ringkasan</a>
							</div>
						</div>
						<h4><a href="<?php echo base_url('main/detail/'.$row['ID']);?>"><?php echo $row['name'];?></a></h4>
						<p><?php echo $row['summary'];?></p>
						<div class="new-collections-grid1-left simpleCart_shelfItem">
							<p>Rp.<span class="item_price" style="margin-left: 5px;"><?php echo $row['price'];?>,-</span></p>
						</div>
					</div>
				</div>
				<?php endforeach;?>
				<?php endif;?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<div class="container text-center">
		<ul class="pagination">
			<?php echo $pagination;?>
		</ul>
	</div>
