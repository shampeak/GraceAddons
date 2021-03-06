<?php
/* Smarty version 3.1.30-dev/80, created on 2016-07-18 00:28:11
  from "C:\www\Grace\My\App\Addons\Admin\Views\Home\Index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/80',
  'unifunc' => 'content_578bb21b46aeb9_94617430',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd003fb7ce15d6633468ea884c8b0595f4d3ceb99' => 
    array (
      0 => 'C:\\www\\Grace\\My\\App\\Addons\\Admin\\Views\\Home\\Index.tpl',
      1 => 1468771548,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_578bb21b46aeb9_94617430 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html><head>
    <meta charset="utf-8">
    <title>后台管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link rel="stylesheet" type="text/css" href="/assets/bootstrap-3.3.5/css/bootstrap.min.css" />

    <!-- DATA TABLE CSS -->
    <link href="/ui/css/table.css" rel="stylesheet">
    <link href="/assets/css/color.css" rel="stylesheet">

    <?php echo '<script'; ?>
 type="text/javascript" src="/assets/jquery-1.11.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/assets/bootstrap-3.3.5/js/bootstrap.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 type="text/javascript" src="/ui/js/admin.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="/assets/app.js"><?php echo '</script'; ?>
>

    <style type="text/css">
        body {
            padding-top: 60px;
        }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="http://html5shim.googlecode.com/svn/trunk/html5.js"><?php echo '</script'; ?>
>
    <![endif]-->

    <!-- DataTables Initialization -->
    <?php echo '<script'; ?>
 type="text/javascript" src="/assets/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" charset="utf-8">
        $(document).ready(function () {
            $('#dt1').dataTable({
                "aaSorting": [[ 0, "desc" ]],
                "aLengthMenu": [[30, 50, -1], [30, 50, "All"]],
                "iDisplayLength":30,			//一页多少条
                "bAutoWidth": true,	//自动宽度
                "bStateSave": false,
                "bLengthChange": true, //改变每页显示数据数量

                "oLanguage": {
                    "sLengthMenu": "每页显示 _MENU_ 条记录",
                    "sZeroRecords": "抱歉， 没有找到",
                    "sInfo": "从 _START_ 到 _END_ /共 _TOTAL_ 条数据",
                    "sInfoEmpty": "没有数据",
                    "sInfoFiltered": "(从 _MAX_ 条数据中检索)",
                    "oPaginate": {
                        "sFirst": "首页",
                        "sPrevious": "前一页",
                        "sNext": "后一页",
                        "sLast": "尾页"
                    },
                    "sZeroRecords": "没有检索到数据",
                    "sProcessing": "<img src='./loading.gif' />"
                }

            });
        });
    <?php echo '</script'; ?>
>


</head>
<body>

<!-- NAVIGATION MENU -->

<div class="navbar-nav navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="javascript:void(0)">
                <img alt="Brand" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABUAAAAUCAYAAABiS3YzAAAACXBIWXMAAAsTAAALEwEAmpwYAAABNmlDQ1BQaG90b3Nob3AgSUNDIHByb2ZpbGUAAHjarY6xSsNQFEDPi6LiUCsEcXB4kygotupgxqQtRRCs1SHJ1qShSmkSXl7VfoSjWwcXd7/AyVFwUPwC/0Bx6uAQIYODCJ7p3MPlcsGo2HWnYZRhEGvVbjrS9Xw5+8QMUwDQCbPUbrUOAOIkjvjB5ysC4HnTrjsN/sZ8mCoNTIDtbpSFICpA/0KnGsQYMIN+qkHcAaY6addAPAClXu4vQCnI/Q0oKdfzQXwAZs/1fDDmADPIfQUwdXSpAWpJOlJnvVMtq5ZlSbubBJE8HmU6GmRyPw4TlSaqo6MukP8HwGK+2G46cq1qWXvr/DOu58vc3o8QgFh6LFpBOFTn3yqMnd/n4sZ4GQ5vYXpStN0ruNmAheuirVahvAX34y/Axk/96FpPYgAAACBjSFJNAAB6JQAAgIMAAPn/AACA6AAAUggAARVYAAA6lwAAF2/XWh+QAAACRUlEQVR42ozUSWjWVxQF8F+SzwETq0RRCVVxFimFgtPCgIKLGogUaQzdOGAQSl0pboq0UCgUQQiCA4q4MLoSWxXcqcVGi4IWSgsOdUCjEmfj0MjXJm7OBx8x0Vz48+e9d98dzjn3VWw/0mgAa8AqHMVhFLP/OdbgOA72d7GASvT0c3YKtViA0fgL0/EZfsOJgaopoAkdONvnrBttCb4DO9GOr5MApqAXt7Keh9qqZc2zmtCC4biCIahKwnUJ8iLVPUcjxuImlgSWDqzFZnQXsA3/YCnmYBxe4g7q8R/+xFVMwngsx6dJPgErMBMH8EshVbThGDZgPYbhEvbiOmZhcaprxcf4BvNzf0/WHSVMS9aFn/AKX+ExvsC9JGjHGHyJiemgHfuigmI5UeXWk1Zn4xo+wVxMLmN/Iv7A3+GhvTygyKmvTcW0nJ3G/jDckv8hnAzuM/K9I6mhAbsLz4JRZVodgU5cQDXOxWdSCP0//kJqERcrE6ARP4aAp3gQ54pcrgrGNZFTMT6dGInV2JJkxUJEfjJS+T5Oo/AGT6KE2lTdE+Kqg3d9oDqDraUBKhF1Gd9hITZFr8NxI63fRx1e52xeOnyBn7H7feyfx5H8X2VK6oLlmyhhAn4NYQ1RyXvZr4tGi9iFlZHSRjTjdlTwbYbi0UAPSt9H5PfSZOShaA3Oc7J/PWfFPIn/fijokwDem3UF7uIHLAokH+FhJqqrv0r7tt8b7fWUrYXtmkzbQx+wSoOzsRndmsE4Dzboszx9rwfj/HYAl92e7KDhDE4AAAAASUVORK5CYII=">
            </a>
            <a class="navbar-brand" href="javascript:void(0)"> 后台管理 </a>

        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/addons/?ad=admin.home"><i class="icon-th icon-white"></i>插件管理</a></li>
                <li><a href="/addons/?ad=admin.home"><i class="icon-home icon-white"></i>系统参数</a></li>
                <li><a href="/addons/?ad=admin.home"><i class="icon-lock icon-white"></i>数据</a></li>
                <li><a href="/addons/?ad=admin.home"><i class="icon-lock icon-white"></i>Document</a></li>
                <li><a href="/addons/?ad=admin.home"><i class="icon-lock icon-white"></i>Api</a></li>
                <li><a href="/addons/?ad=admin.home"><i class="icon-lock icon-white"></i>帮助</a></li>
                <li><a href="/addons/?ad=admin.home"><i class="icon-lock icon-white"></i>日志</a></li>
                <li><a href="/addons/?ad=admin.home"><i class="icon-lock icon-white"></i>依赖关系</a></li>
                <li><a href="/addons/?ad=admin.home"><i class="icon-lock icon-white"></i>注册菜单</a></li>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<div class="container-fluid">

    <!-- CONTENT -->
    <div class="row">
        <div class="col-sm-12 col-lg-12">


            <h4><strong>调查问卷</strong></h4>

            <a class="shambox" rel="/addons/?ad=admin.homeadd">添加</a>


            <table class="display" id="dt1">
                <thead>
                <tr>
                    <th width="90">排序</th>
                    <th>问题</th>
                    <th>选项A</th>
                    <th>选项B</th>
                    <th>选项C</th>
                    <th width="180">资料</th>
                    <th width="160">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['res']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
                    <tr>
                        <td><?php echo $_smarty_tpl->tpl_vars['value']->value['sort'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['value']->value['optionA'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['value']->value['optionB'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['value']->value['optionC'];?>
</td>
                        <td><?php echo $_smarty_tpl->tpl_vars['value']->value['optionD'];?>
</td>
                        <td>
                            <a class="shambox" rel="/addons/?ad=admin.homeedit&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">信息</a>
                            <!-- a class="shamboxl" rel="/admin/userzhishi?uid=<?php echo $_smarty_tpl->tpl_vars['value']->value['uid'];?>
">知识</a>
<a class="shamboxl" rel="/admin/userdiaocha?uid=<?php echo $_smarty_tpl->tpl_vars['value']->value['uid'];?>
">调查</a>
<a class="shamboxl" rel="/admin/userjifen?uid=<?php echo $_smarty_tpl->tpl_vars['value']->value['uid'];?>
">积分</a -->
                            <a class="formact" relid="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" tag="/addons/?ad=admin.homedelete" act="delete" confirm="确定?">删除</a>

                        </td>
                    </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['sort'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['optionA'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['optionB'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['optionC'];?>
</td>
                    <td>信息 文档 AJPI 帮助 日志</td>
                    <td>
                        <!-- a class="shambox" rel="/addons/?ad=admin.homeedit&id=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">信息</a -->
                        <!-- a class="shamboxl" rel="/admin/userzhishi?uid=<?php echo $_smarty_tpl->tpl_vars['value']->value['uid'];?>
">知识</a>
<a class="shamboxl" rel="/admin/userdiaocha?uid=<?php echo $_smarty_tpl->tpl_vars['value']->value['uid'];?>
">调查</a>
<a class="shamboxl" rel="/admin/userjifen?uid=<?php echo $_smarty_tpl->tpl_vars['value']->value['uid'];?>
">积分</a -->
                       安装 卸载 更新 设置
                    </td>
                </tr>

                </tbody>
            </table><!--/END SECOND TABLE -->

        </div><!--/span12 -->
    </div><!-- /row -->




</div> <!-- /container -->
<br>

<!-- Modal - ->
<a class="btnnew" data-toggle="modal" role="button" href="#myModal">Example Modal Window</a>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">Modal title</h4>
    </div>
    <div class="modal-body">
      ...
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary">Save changes</button>
    </div>
  </div>
</div>
</div>

<!-- /.modal -->






<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <!-- FOOTER -->
            <div id="footerwrap">
                <footer class="clearfix"></footer>
                <hr>
                <p>@Sham Copyright &copy;2016</p>
                </footer>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /footerwrap -->




</body></html><?php }
}
