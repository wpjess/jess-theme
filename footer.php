<footer id="footer">
	<img src="<?php bloginfo('template_directory'); ?>/images/footer-logo.png" alt title id="footer-img"><br>
	<h1 class="footer-title">555-555-5555</h1>
	<span class="copyright">&copy;2024 COMPANY NAME | <a href="https://roguedesigngroup.com" target="_blank">Website by rogue design group</a>
</footer>
</div>
<?php do_action('wp_footer'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_directory") ?>/js/mobile-menu/js/jquery.fatNav.js"></script>
<script>
  
  $(".hamburger").click(function() {
            $('.fat-nav').toggleClass('active');
            //$('.fat-nav').show();
           // $('#header').toggleClass('active');
            $('#header .hamburger').toggleClass('active');
    });
  
</script>

<script src="<?php bloginfo('template_directory'); ?>/js/accordion.js"></script>
<script>
  $(document).ready(function() {
            $('.accordion').accordion(); //some_id section1 in demo
        });
 </script>


<script type="text/javascript" language="javascript" charset="utf-8" src="<?php bloginfo('template_directory'); ?>/js/equalheight.js"></script>

</body>
</html>