<section>
	 <div class="input-group">
      <input type="text" class="form-control" id="edtSearch">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" id="btnSearch">Search</button>
      </span>
    </div>
</section>

<script type="text/javascript">
	$(document).ready(function(){
		
		$("#btnSearch").click(function(e) {
			var searchVal = $("#edtSearch").val();
			var pathname = window.location.pathname;
			var host = window.location.host;
			
				if (searchVal != '') {
					var strPrefixHref = "";
					var len1 = 0;
					var len2 = 0;
					var len3 = 0;
					var strHref = "";
					len1 = pathname.indexOf("zh-cn");
					len2 = pathname.indexOf("en-us");
					len3 = pathname.indexOf("ja-jp");
					
					if (len1 > 0 || len2 > 0 || len3 > 0)
						strPrefixHref = pathname.substring(1, len1 + len2 + len3 + 7);

					strHref = 
						"http://" + host  + "/" +
						strPrefixHref + 
						"/page/search/" + searchVal;
					//alert(strHref);			
					window.location.href = strHref;
				}
			});
	});
</script>
