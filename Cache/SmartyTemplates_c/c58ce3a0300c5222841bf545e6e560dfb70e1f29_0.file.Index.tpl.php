<?php
/* Smarty version 3.1.30-dev/74, created on 2016-07-12 15:17:36
  from "E:\phpleague\Grace\My\App\Views\Home\Index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/74',
  'unifunc' => 'content_57849990626c77_66701031',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c58ce3a0300c5222841bf545e6e560dfb70e1f29' => 
    array (
      0 => 'E:\\phpleague\\Grace\\My\\App\\Views\\Home\\Index.tpl',
      1 => 1468295286,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57849990626c77_66701031 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        
            <div class="list-group">
            <a href="javascript:void(0)" class="list-group-item active">
            财富之路
            </a>
            <a class="list-group-item" role="button" data-toggle="collapse" href="#collapseExample0" aria-expanded="false" aria-controls="collapseExample0">股票 [shares]</a>
            <div class="collapse in" id="collapseExample0">
                <div class="well">
                	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['shares']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                    <a class="list-group-item" href="/shares?code=<?php echo $_smarty_tpl->tpl_vars['item']->value['code'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
 [ <font class="red"><?php echo $_smarty_tpl->tpl_vars['item']->value['code'];?>
</font> ]</a>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </div>
            </div>  

            <a class="list-group-item" role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">基金 [fund]</a>
            <div class="collapse in" id="collapseExample2">
                <div class="well">
                    <a class="list-group-item" href="#collapseExample0">股票</a>
                    <a class="list-group-item" href="#collapseExample1">黄金 [gold]</a>
                    <a class="list-group-item" href="#collapseExample2">基金 [fund]</a>
                </div>
            </div>

            <a class="list-group-item" role="button" data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">黄金 [gold]</a>
            <div class="collapse" id="collapseExample1">
                <div class="well">
                ...
                </div>
            </div>  
            
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
            
        });
    <?php echo '</script'; ?>
>

    
  </body>
</html>
<?php }
}
