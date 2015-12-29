<?php
	echo get_ol($navigations);
?>

<script>
	$(document).ready(function(){
	
	    $('.sortable').nestedSortable({
	        handle: 'div',
	        items: 'li',
	        toleranceElement: '> div',
	        maxLevels: 2
	    });
	
	});
</script>
