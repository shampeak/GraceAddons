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
                {foreach from=$shares key=key item =item}
                    <a href="/shares?code={$item['code']}" type="button" class="btn btn-default">{$item['title']}</a>
                {/foreach}
            </div>        
        </div>
        <div class="col-md-12" id="te">
            <h1>{$shares[$smarty.get.code]['code']}</h1>
            <blockquote>
            <p>{$shares[$smarty.get.code]['title']}
<br>            现价 : <font class="red">{$price}</font>
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
	                <input name="code" type="email" class="form-control" id="exampleInputEmail1" placeholder="代码" value="{$smarty.get.code}">
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
            		{foreach from=$rc key=key item=item}
                    <tr>
                        <td class="warning" width="70">{$item['dt']}</td>
                        <td class="info" width="70">
                        {if $item['action'] eq 'buy'}
                        <span class="label label-danger">{$item['action']}</span>
                        {else}
                        <span class="label label-success">{$item['action']}</span>
                        {/if}
                        </td>
                        <!-- td width="70"><span class="label label-primary">Primary</span></td -->
                        <td class="info" width="60">{$item['num']}</td>
                        <td class="info" width="60">{$item['price']}</td>
                        
                        <td class="danger" width="60">{$item['shnum']}</td>
                        <td class="danger" width="60">{$item['junjia']}</td>
                        <td>{$item['fees']}</td>
                        <td>
                        
                        {(($price - $item['junjia']) * $item['shnum'])|string_format:"%0.2f"}
                        
                        </td>
                        <td>
                        {if ($price -$item['junjia']) gt 0}
                        {(($price - $item['junjia'])*100/($item['junjia']))|string_format:"%0.2f"|cat:'%'}
                        {else}
                        {(($price - $item['junjia'])*100/($price))|string_format:"%0.2f"|cat:'%'}
                        {/if}
                        
                        </td>
                        <td class="info">
                            <a rel="/shares/huigun?id={$item['id']}" shamcomfirm="操作记录回滚到这里?" class="shamget">回</a>
                            <a class="shambox" href="#" title="修改" rel="/shares/edit/">修</a>
						</td>
                    </tr>
            		{/foreach}
                    
                </table>        
            </div>  
                    
            
		</div>
    </div>


</div>





    <script src="/assets/jquery-1.11.1.min.js"></script>
    <script src="/assets/bootstrap-3.3.5/js/bootstrap.min.js"></script>
    <script src="/assets/app.js"></script>
    <script type="text/javascript" charset="utf-8">
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
    </script>



  </body>
</html>
