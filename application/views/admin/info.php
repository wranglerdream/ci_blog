<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('style/admin/css/ch-ui.admin.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('style/admin/font/css/font-awesome.min.css');?>">
</head>
<body>
	<!--面包屑导航 开始-->
	<div class="crumb_warp">
		<!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
		<i class="fa fa-home"></i> <a href="#">首页</a>
	</div>
	<!--面包屑导航 结束-->
	
	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增文章</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

	
    <div class="result_wrap">
        <div class="result_title">
            <h3>系统基本信息</h3>
        </div>
        <div class="result_content">
            <ul>
                <li>
                    <label>操作系统</label><span>WINNT</span>
                </li>
                <li>
                    <label>运行环境</label><span><?php echo $_SERVER['SERVER_SOFTWARE'];?></span>
                </li>
             
                <li>
                    <label>静静设计-版本</label><span>v-0.1</span>
                </li>
                <li>
                    <label>上传附件限制</label><span>2M</span>
                </li>
                <li>
                    <label>北京时间</label><span><?php echo date('Y-M-D H:i:s',$_SERVER['REQUEST_TIME']);?></span>
                </li>
                <li>
                    <label>服务器域名/IP</label><span><?php echo $_SERVER['SERVER_NAME']?></span>
                </li>
                <li>
                    <label>Host</label><span><?php echo $_SERVER['HTTP_HOST'];?></span>
                </li>
            </ul>
        </div>
    </div>
    
</body>
</html>