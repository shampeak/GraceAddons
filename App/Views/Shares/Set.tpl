<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="{$res['description']}">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>{$res['title']}</title>
   
    <!-- Bootstrap -->
    <link href="/assets/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/color.css" rel="stylesheet">
<script type="text/javascript" src="/assets/jquery-1.11.1.min.js"></script>

  <style>
    #te {
		padding-left: 0px;
		padding-right: 0px;
    }
    </style>


  </head>
  <body>
  

<div class="container-fluid">
<form class="guset form-horizontal" action="/shares/set/"  method="post">
    
    <div class="row">
        <div class="col-md-12" id="te">
        
            <ol class="breadcrumb">
            <li><a href="/">首页</a></li>
            <li><a href="/shares/">股票</a></li>
            <li><a href="javascript:void(0)">设定</a></li>
            </ol>          
        
        
        <!-- Modal sham (Ajax Modal)-->
        <div  id="modal-sham">
            <div class="modal-dialog"><div class="modal-content">
                <div class="modal-body">
                
<div class="form-group">
    <label for="inputEmail3" class="col-xs-2 control-label">总金额</label>
    <div class="col-xs-9">
        <input type="text" name="total" class="form-control" placeholder="10000" value="{$res['total']}">
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-xs-2 control-label">仓位/浮动</label>
    <div class="col-xs-3">
        <input type="text" name="space" class="form-control" placeholder="10%" value="{$res['space']}">
    </div>
    <div class="col-xs-3">
        <input type="text" name="spaceplus" class="form-control" placeholder="+10%" value="{$res['spaceplus']}">
    </div>
    <div class="col-xs-3">
        <input type="text" name="spacered" class="form-control" placeholder="-10%" value="{$res['spacered']}">
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-xs-2 control-label">单次金额</label>
    <div class="col-xs-4">
        <input type="text" name="money" class="form-control" placeholder="3000" value="{$res['money']}">
    </div>
    <div class="col-xs-5">
        <input type="text" name="money2" class="form-control" placeholder="5000" value="{$res['money2']}">
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-xs-2 control-label">做T区间</label>
    <div class="col-xs-4">
        <input type="text" name="per" class="form-control" placeholder="+2%" value="{$res['per']}">
    </div>
    <div class="col-xs-5">
        <input type="text" name="per2" class="form-control" placeholder="-3%" value="{$res['per2']}">
    </div>
</div>

<div class="form-group">
    <label for="inputEmail3" class="col-xs-2 control-label">账面剩余</label>
    <div class="col-xs-9">
        <input type="text" name="surplus" class="form-control" placeholder="10000" value="{$res['surplus']}">
    </div>
</div>
<strong></strong>

<div class="form-group">
    <label for="inputEmail3" class="col-xs-3 control-label">说明</label>
    <div class="col-xs-9">

<span class="red">单次金额</span> - 金额区间 <br>
<span class="red">做T 区间</span> - 百分比浮动区间 <br>
<span class="red">账面剩余</span> - 根据 股票面值 + 剩余 - 总金额,计算账面盈利 <br>

为操作提供计算建议
    </div>
</div>



<input type="hidden" id="tag" name='act' value="update">
               
                
                </div>
                 <div class="modal-footer">
                <a type="button" class="btn btn-white modal_close" data-dismiss=\"modal" href="/shares/">返回</a>
                <button type="button" class="btn btn-info modal_ok">确定</button>
                </div>
                </div>
            </div>
        </div>

        

     
     
     
     </div></div></div>
   

        
        </div>
    </div>
    

        </form>


</div>




<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$('.modal_ok').click(function(){
			var tag = '.guset';
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

    
  </body>
</html>
