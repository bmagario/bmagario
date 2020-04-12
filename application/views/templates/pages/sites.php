<section id="sites" class="pd-75"  data-scroll-item-index=4>
	<div class='container flex'>
		<div class='animatedParent animateOnce' data-sequence='500'>
      <h1 class='section-title-separator animated fadeInLeft slower' data-id='1'>Work</h1>
    </div>
    <div class='section-line-separator'></div>
	          
		<div class="container pd-25 sites">
			<div class="filters filter-button-group">
				<ul>
					<li class="active" data-filter="*">All</li>
					<li data-filter=".webdesign">Web Design</li>
					<li data-filter=".webdev">Web Development</li>
					<li data-filter=".brand">Brand Identity</li>
				</ul>

				<div class="row grid">
					<?php foreach ($sites as $site): ?>
					<?php
					// Check the images of the site and add them to the original array of the site.
					$images = array();
					$directory = "static/images/sites/{$site['id_site']}";
					$dirint = dir($directory);
					$allowed =  array('gif','png' ,'jpg');
					while (($file = $dirint->read()) !== false) {
						$ext = pathinfo($file, PATHINFO_EXTENSION);
						if (in_array($ext, $allowed)) {
							array_push($images, $file);
						}
					}
					$dirint->close();
					$site["images"] = $images;
					?>

					<div class="grid-item col-md-lg col-md-4 col-sm-4 col-xs-6 <?php echo $site['filter'];?>">
						<div class="siteDetails" id="<?php echo $site["id_site"];?>"
							data-site='<?php echo json_encode($site); ?>'>
							<img src="data:image/jpg;base64,<?php echo base64_encode(file_get_contents("static/images/sites/{$site['id_site']}/{$site['image_url']}")); ?>">
						</div>
					</div>
					<?php endforeach; ?>
				</div>

			</div>
		</div>
	</div>

</section>




        
  