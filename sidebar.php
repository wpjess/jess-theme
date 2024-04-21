<div id="sidebar">
 <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>
  <h3>About</h3>
  <p>This is my blog.</p>
  
  <h3>Links</h3>
  <ul>
   <li><a href="http://example.com">Example</a></li>
  </ul>
<?php endif; ?>
</div>