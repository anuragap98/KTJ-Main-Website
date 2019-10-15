<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/EasePack.min.js'></script>
  <script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/rAF.js'></script>
  <script src='https://www.marcoguglie.it/Codepen/AnimatedHeaderBg/demo-1/js/TweenLite.min.js'></script>
	<script src="<?= base_url() ?>assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets/index.js"></script> 
<script>
$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
		autoWidth:true,
		loop:false,
    margin:15,
    nav:false,
    responsive:{
      0:{
      	items:2,
      },
      600:{
      	items:3,
      },
      1000:{
        items:6,
      }
    }
})
	});
</script>

</body>

</html>