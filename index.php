
<?php include('header.php'); ?>


<div id="contentcolumn">
	


<?php 
	
	$page = $_GET['page'];
	echo $page;
	if(isset($page)){ ?>

<script type="text/javascript">
	
	loadPage("<?php echo $page; ?>")
	
</script>
    
    
   
<?php } else { ?>
    
    
    <script type="text/javascript">
	
	loadPage("images.php")
	
</script>
	
	
<?php } ?>



</div>


<?php include('footer.php'); ?>        
