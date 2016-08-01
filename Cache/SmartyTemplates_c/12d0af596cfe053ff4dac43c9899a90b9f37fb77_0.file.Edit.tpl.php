<?php
/* Smarty version 3.1.30-dev/74, created on 2016-07-12 17:44:44
  from "E:\phpleague\Grace\My\App\Views\Shares\Edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/74',
  'unifunc' => 'content_5784bc0c951b43_65765173',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12d0af596cfe053ff4dac43c9899a90b9f37fb77' => 
    array (
      0 => 'E:\\phpleague\\Grace\\My\\App\\Views\\Shares\\Edit.tpl',
      1 => 1468316680,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5784bc0c951b43_65765173 (Smarty_Internal_Template $_smarty_tpl) {
?>
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

<?php echo '<script'; ?>
 type="text/dialog">
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
<?php echo '</script'; ?>
><?php }
}
