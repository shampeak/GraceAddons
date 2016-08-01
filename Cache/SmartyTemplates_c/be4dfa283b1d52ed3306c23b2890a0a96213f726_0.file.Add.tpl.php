<?php
/* Smarty version 3.1.30-dev/74, created on 2016-07-12 15:47:52
  from "E:\phpleague\Grace\My\App\Views\Shares\Add.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/74',
  'unifunc' => 'content_5784a0a8286660_66975293',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'be4dfa283b1d52ed3306c23b2890a0a96213f726' => 
    array (
      0 => 'E:\\phpleague\\Grace\\My\\App\\Views\\Shares\\Add.tpl',
      1 => 1468309666,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5784a0a8286660_66975293 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
    <div class="col-md-12">
        <form class="sharesadd form-horizontal" action="/shares/add/"  method="post">

  <div class="form-group">
    <div class="col-sm-12">
      <input type="text" name="code" class="form-control">
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
