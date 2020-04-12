  <footer class="footer-section">
    <div class="container-fluid">
      <div class="row">
          <div class="col-sm-12 col-lg-12 text-center">
              © Copyright 
              <?php 
                $date = new DateTime(); 
                echo date_format($date, 'Y');
              ?>
              Brian Magario - All Rights Reserved         
          </div>
        </div>
      </div>
    </div>
  </footer>

  

  <!--====== Javascripts & Jquery ======-->
  <script src="<?php echo base_url('static/js/libs/jquery-2.1.4.min.js'); ?>"></script>	
  <script src="<?php echo base_url('static/js/libs/smooth-scroll.js'); ?>"></script>	
  <script src="<?php echo base_url('static/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('static/js/libs/bootstrap-validator/js/validator.js'); ?>"></script>	       
  <script defer src="<?php echo base_url('static/fontawesome/js/all.js'); ?>"></script>
  <script src="<?php echo base_url('static/js/libs/particles.min.js'); ?>"></script>	       
  <script src="<?php echo base_url('static/js/libs/isotope.pkgd.min.js'); ?>"></script>	       
  <script src="<?php echo base_url('static/js/libs/css3-animate-it.js'); ?>"></script>	       
  <script src="<?php echo base_url('static/js/libs/OwlCarousel/owl.carousel.min.js'); ?>"></script>	       
  <script src="<?php echo base_url('static/js/libs/typed.min.js'); ?>"></script>	       
  <script src="<?php echo base_url('static/js/autotyping.js'); ?>"></script>	       
  <script src="<?php echo base_url('static/js/main.js'); ?>"></script>	       
  <script src="<?php echo base_url('static/js/canvas.js'); ?>"></script>	       
  <script src="<?php echo base_url('static/js/modal_service.js'); ?>"></script>	       

</body>
</html>