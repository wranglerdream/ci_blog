<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url('style/admin/css/ch-ui.admin.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('style/admin/font/css/font-awesome.min.css');?>">
	<script src="<?php echo base_url('style/admin/js/jquery.js');?>"></script>
	<script src="<?php echo base_url('style/admin/js/ch-ui.admin.js');?>"></script>
	<script src="<?php echo base_url('style/admin/layer/layer.js');?>"></script>
</head>
<script type="text/javascript">
	$(function(){
        $("#loginout").click(function(){
        	var $url = $(this).attr("href");
            layer.confirm('您确定要退出吗?',{
            	btn:['确定','取消'],btn2:function(index){}},function(index){window.location.href=$url;});
            return false;
        });
	});
</script>
<body>
	<!--头部 开始-->
    <div class="top_box">
		<div class="top_left">
			<div class="logo">后台管理</div>
			<ul>
				<li><a href="#" class="active">首页</a></li>
				<!-- <li><a href="#">管理页</a></li> -->
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li>管理员：<?php echo $this->session->aName;?></li>
				<li><a href="<?php echo site_url('admin/Admin/passwd');?>" target="main">修改密码</a></li>
				<li><a href="<?php echo site_url('admin/login/login_out');?>" id="loginout">退出</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>
	        <li>
	        	<h3><i class="fa fa-fw fa-clipboard"></i>资讯管理</h3>
	            <ul class="sub_menu">
	                <li><a href="<?php echo site_url('admin/news/news_cls_list');?>" target="main"><i class="fa fa-fw fa-plus-square"></i>资讯分类列表</a></li>
	                <li><a href="<?php echo site_url('admin/news/news_cls_add');?>" target="main"><i class="fa fa-fw fa-list-ul"></i>资讯分类添加</a></li>
	                <li><a href="<?php echo site_url('admin/news/news_list');?>" target="main"><i class="fa fa-fw fa-list-alt"></i>资讯列表</a></li>
	                <li><a href="<?php echo site_url('admin/news/news_add');?>" target="main"><i class="fa fa-fw fa-image"></i>资讯添加</a></li>
	            </ul>
	        </li>
	        <li>
	        	<h3><i class="fa fa-fw fa-cog"></i>系统设置</h3>
	            <ul class="sub_menu">
	                <li><a href="#" target="main"><i class="fa fa-fw fa-cubes"></i>网站配置</a></li>
	                <li><a href="#" target="main"><i class="fa fa-fw fa-database"></i>备份还原</a></li>
	            </ul>
	        </li>
	        <li>
	        	<h3><i class="fa fa-fw fa-thumb-tack"></i>工具导航</h3>
	            <ul class="sub_menu">
	                <li><a href="http://www.yeahzan.com/fa/facss.html" target="main"><i class="fa fa-fw fa-font"></i>图标调用</a></li>
	                <li><a href="http://hemin.cn/jq/cheatsheet.html" target="main"><i class="fa fa-fw fa-chain"></i>Jquery手册</a></li>
	                <li><a href="http://tool.c7sky.com/webcolor/" target="main"><i class="fa fa-fw fa-tachometer"></i>配色板</a></li>
	                <li><a href="element.html" target="main"><i class="fa fa-fw fa-tags"></i>其他组件</a></li>
	            </ul>
	        </li>
	    </ul>
	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box">
		<iframe src="<?php echo site_url('admin/admin/info');?>" frameborder="0" width="100%" height="100%" name="main"></iframe> 
	</div>
	<!--主体部分 结束-->

	<!--底部 开始-->
	<div class="bottom_box">
	    CopyRight © 2015. Powered By
    </div>
	<!--底部 结束-->
</body>
</html>