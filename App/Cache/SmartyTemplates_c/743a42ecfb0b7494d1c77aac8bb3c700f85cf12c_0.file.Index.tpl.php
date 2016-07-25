<?php
/* Smarty version 3.1.30-dev/74, created on 2016-07-12 18:06:02
  from "E:\phpleague\Grace\My\App\Views\Shares\Index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/74',
  'unifunc' => 'content_5784c10a18c355_00053815',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '743a42ecfb0b7494d1c77aac8bb3c700f85cf12c' => 
    array (
      0 => 'E:\\phpleague\\Grace\\My\\App\\Views\\Shares\\Index.tpl',
      1 => 1468317959,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5784c10a18c355_00053815 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['res']->value['description'];?>
">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title><?php echo $_smarty_tpl->tpl_vars['res']->value['title'];?>
</title>
   
    <!-- Bootstrap -->
    <link href="/assets/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/color.css" rel="stylesheet">



  <style>
    #te {
		padding-left: 0px;
		padding-right: 0px;
    }
    </style>


  </head>
  <body>
  

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" id="te">
        
            <ol class="breadcrumb">
            <li><a href="/">首页</a></li>
            <li><a href="javascript:void(0)">gp</a></li>
            </ol>  
        </div>
        <div class="col-md-12" id="te">
            <div class="btn-group" role="group" aria-label="...">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['shares']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <a href="/shares?code=<?php echo $_smarty_tpl->tpl_vars['item']->value['code'];?>
" type="button" class="btn btn-default"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            </div>        
        </div>
        <div class="col-md-12" id="te">
            <h1><?php echo $_smarty_tpl->tpl_vars['shares']->value[$_GET['code']]['code'];?>
</h1>
            <blockquote>
            <p><?php echo $_smarty_tpl->tpl_vars['shares']->value[$_GET['code']]['title'];?>

<br>            现价 : <font class="red"><?php echo $_smarty_tpl->tpl_vars['price']->value;?>
</font>
<br>            盈亏 : <font class="white b_red">3.21</font>
<br>            盈亏 : <font class="white b_green">3.21</font>
            
            </p>
            </blockquote>
                    
                    
            <ul class="nav nav-pills">
                <li><a href="#" onClick="javascript:showAjaxModal()">分析</a></li>
                <li><a href="#" onClick="javascript:showAjaxModal()">日志</a></li>
                <li><a href="#" onClick="javascript:showAjaxModal()">设定</a></li>
                <li><a class="shambox" href="#" title="添加" rel="/shares/add/">添加</a></li>
            </ul>
            <Hr>
        </div>

    </div>
    
    <div class="row">
        <div class="col-md-12" id="te">
        <div class="well">
            <form class="sharesrec form-horizontal" action="/shares/"  method="post">
            
                <div class="form-group">
	                <input name="code" type="email" class="form-control" id="exampleInputEmail1" placeholder="代码" value="<?php echo $_GET['code'];?>
">
                </div>
                
                <div class="form-group">
                    <div class="input-group">
                        <input name="num" type="text" class="form-control" id="exampleInputAmount" placeholder="数量">
                        <div class="input-group-addon">股</div>
                    </div>                
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input name="price" type="text" class="form-control" id="exampleInputAmount" placeholder="单价">
                        <div class="input-group-addon">¥</div>
                    </div>                
                </div>
                <div class="form-group">
	                <div class="input-group">
                    <label class="radio-inline">
                      <input name="act" type="radio" id="inlineRadio1" value="buy" checked> Buy
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="act" id="inlineRadio2" value="sale"> Sale
                    </label>
	                </div>
                </div>
<hr>
        	    <button type="button" class="btn btn-primary btn-lg btn-block gupiaosubmit">提交</button>
            </form>   
        </div>
		</div>
    </div>


 <div class="row">
        <div class="col-md-12" id="te">
        
            <!-- div class="thumbnail">
                <div class="caption">
                   
                    <h1>2019-2-1</h1>
                    <blockquote>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                    </blockquote>
                    <p>
                    123123
                    123123
                    </p>                
                </div>
            </div -->
            
              
            <div class="thumbnail">
                <table class="table table-condensed table-bordered">
                    <tr>
                        <td width="70">时间</td>
                        <td width="60">操作</td>
                        <!-- td width="70"><span class="label label-primary">Primary</span></td -->
                        <td width="60">数量</td>
                        <td width="60">单价</td>
                        
                        <td width="60">剩余</td>
                        <td width="60">均价</td>
                        <td>手续费</td>
                        <td>盈利 [市值 - 数量*均价]</td>
                        <td>盈利</td>
                        <td width="60"></td>
                    </tr>
            		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rc']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <tr>
                        <td class="warning" width="70"><?php echo $_smarty_tpl->tpl_vars['item']->value['dt'];?>
</td>
                        <td class="info" width="70">
                        <?php if ($_smarty_tpl->tpl_vars['item']->value['action'] == 'buy') {?>
                        <span class="label label-danger"><?php echo $_smarty_tpl->tpl_vars['item']->value['action'];?>
</span>
                        <?php } else { ?>
                        <span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['item']->value['action'];?>
</span>
                        <?php }?>
                        </td>
                        <!-- td width="70"><span class="label label-primary">Primary</span></td -->
                        <td class="info" width="60"><?php echo $_smarty_tpl->tpl_vars['item']->value['num'];?>
</td>
                        <td class="info" width="60"><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</td>
                        
                        <td class="danger" width="60"><?php echo $_smarty_tpl->tpl_vars['item']->value['shnum'];?>
</td>
                        <td class="danger" width="60"><?php echo $_smarty_tpl->tpl_vars['item']->value['junjia'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['fees'];?>
</td>
                        <td>
                        
                        <?php echo sprintf("%0.2f",(($_smarty_tpl->tpl_vars['price']->value-$_smarty_tpl->tpl_vars['item']->value['junjia'])*$_smarty_tpl->tpl_vars['item']->value['shnum']));?>

                        
                        </td>
                        <td>
                        <?php if (($_smarty_tpl->tpl_vars['price']->value-$_smarty_tpl->tpl_vars['item']->value['junjia']) > 0) {?>
                        <?php echo (sprintf("%0.2f",(($_smarty_tpl->tpl_vars['price']->value-$_smarty_tpl->tpl_vars['item']->value['junjia'])*100/($_smarty_tpl->tpl_vars['item']->value['junjia'])))).('%');?>

                        <?php } else { ?>
                        <?php echo (sprintf("%0.2f",(($_smarty_tpl->tpl_vars['price']->value-$_smarty_tpl->tpl_vars['item']->value['junjia'])*100/($_smarty_tpl->tpl_vars['price']->value)))).('%');?>

                        <?php }?>
                        
                        </td>
                        <td class="info">
                            <a rel="/shares/huigun?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" shamcomfirm="操作记录回滚到这里?" class="shamget">回</a>
                            <a class="shambox" href="#" title="修改" rel="/shares/edit/">修</a>
						</td>
                    </tr>
            		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    
                </table>        
            </div>  
                    
            
		</div>
    </div>


</div>





    <?php echo '<script'; ?>
 src="/assets/jquery-1.11.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/assets/bootstrap-3.3.5/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/assets/app.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" charset="utf-8">
        $(document).ready(function () {
			$('.gupiaosubmit').click(function(){
				var tag = '.sharesrec';
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

			
        });
    <?php echo '</script'; ?>
>



  </body>
</html>
<?php }
}
