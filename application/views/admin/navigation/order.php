<section>
	<h2>Navigation Order</h2>
	<p class="alert alert-info">Drog to order navigation and then click 'Save'</p>
	<div id="orderResult"></div>
	<input type="button" id="save" value="Save" class="btn btn-primary" />
</section>

<script>
	$(document).ready(function() {
		$url = '<?php echo site_url('admin/navigation/order_ajax'); ?>';
		
		$.post($url, {}, 
			function(data) {
				$('#orderResult').html(data);
		}); // post end

		$('#save').click(function() {
			oSortable = $('.sortable').nestedSortable('toArray');

			$('#orderResult').slideUp(function() {
				$.post($url, {sortable: oSortable}, 
					function(data) {
						$('#orderResult').html(data);
					}); // post - 2 end
				
				$('#orderResult').slideDown();
			}); // slide up end
			
		}); // save click end
	});
</script>
