<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        
            <div class="list-group">
            <a href="javascript:void(0)" class="list-group-item active">
            财富之路
            </a>
            <a class="list-group-item" role="button" data-toggle="collapse" href="#collapseExample0" aria-expanded="false" aria-controls="collapseExample0">股票 [shares]</a>
            <div class="collapse in" id="collapseExample0">
                <div class="well">
                	{foreach from=$shares key=key item =item}
                    <a class="list-group-item" href="/shares?code={$item['code']}">{$item['title']} [ <font class="red">{$item['code']}</font> ]</a>
                    {/foreach}
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



    <script src="/assets/jquery-1.11.1.min.js"></script>
    <script src="/assets/bootstrap-3.3.5/js/bootstrap.min.js"></script>
    <script src="/assets/app.js"></script>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function () {
            
        });
    </script>

    
  </body>
</html>
