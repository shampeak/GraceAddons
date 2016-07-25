<div class="row">
    <div class="col-md-12">
        <form class="sharesadd form-horizontal" action="/shares/edit/"  method="post">

  <div class="form-group">
    <div class="col-sm-12">
      <input type="text" name="code" class="form-control"  placeholder="手续费">
    </div>
  </div>

<input type="hidden" id="tag" name='act' value="update">
        </form>

    </div>
</div>

<script type="text/dialog">
	$(document).ready(function(){
		$('.modal_ok').click(function(){
			var tag = '.sharesadd';
			$.ajax({
				type: "POST",
				url: $(tag).attr("action"),
				data: $(tag).serialize(),
				dataType:'json',
				success: function(data){
					var JS = data.js;
					eval(JS);
					
					},
				error : function() {
					   alert("异常！");
				  }
			});
		});
	})
</script>