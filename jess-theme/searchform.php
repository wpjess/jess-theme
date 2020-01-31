<form method="get" class="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div>
<input type="text"  class="s" name="s" value="Search..." onblur="if(this.value=='')this.value='Search...';" onfocus="if(this.value=='Search...')this.value='';" />
<input type="submit" value="Search" id="searchsubmit" />
</div>
</form>