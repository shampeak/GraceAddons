<?php
/* Smarty version 3.1.29, created on 2016-06-29 01:04:28
  from "C:\www\Grace\My\App\Views\Admin\Index_add.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5772ae1c603907_18779444',
  'file_dependency' => 
  array (
    '7e0929e3b45138e9df12cb10b7afc4988f3b906c' => 
    array (
      0 => 'C:\\www\\Grace\\My\\App\\Views\\Admin\\Index_add.tpl',
      1 => 1467065018,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5772ae1c603907_18779444 ($_smarty_tpl) {
?>
<div class="row">
    <div class="col-md-12">
        <form class="useradd form-horizontal" action="?z=admin/user/add/"  method="post">

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control">
    </div>
  </div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">手机号</label>
<div class="col-sm-10">
    <input type="text" name="mobile" class="form-control"><span class="red">必须填写</span>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">密码</label>
<div class="col-sm-10">
    <input type="text" name="mima" class="form-control"><span class="red"></span>
</div>
</div>

<div class="form-group">
<label for="inputPassword3" class="col-sm-2 control-label">code</label>
<div class="col-sm-10">
    <input type="text" name="code" class="form-control"><span class="red"></span>
</div>
</div>



  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">性别</label>
    <div class="col-sm-10">
      <input type="radio" name="gender" id="radio" value="1" /> 男
      <input type="radio" name="gender" id="radio" value="0" /> 女
      <label for="radio"></label>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">公司</label>
    <div class="col-sm-10">
      <input type="text" name="company" class="form-control">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">职位</label>
    <div class="col-sm-10">
      <input type="text" name="title" class="form-control">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">微信号</label>
    <div class="col-sm-10">
      <input type="text" name="weixin" class="form-control">
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
			var tag = '.useradd';
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
