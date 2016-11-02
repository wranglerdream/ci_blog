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
	<script src="<?php echo base_url('style/admin/layer/layer.js');?>"></script>
</head>
<script type="text/javascript">
$(function(){
  $("input[name='button']").click(function(){
      var $aname = $("input[name='aname']").val();
      if($aname.length<1){layer.alert('用户名不能为空',{icon:5});return false;}
	  var $apass = $("input[name='apass']").val();
	  if($apass.length<6){layer.alert('用户密码长度不能小于6位',{icon:5});return false;}
	  var $acode = $("input[name='acode']").val();
      if($acode.length<1){layer.alert('验证码不能为空',{icon:5});return false;}
  });
});
</script>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>Blog</h1>
		<h2>欢迎使用博客管理平台</h2>
		<div class="form">
			<p style="color:red"><?php echo validation_errors();if(isset($errors_info)){echo $errors_info;}?></p>
			<?php echo form_open('admin/login/login_run');?>
				<ul>
					<li>
					<input type="text" name="aname" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="apass" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" class="code" name="acode"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="<?php echo site_url('admin/login/get_captcha');?>" onclick= this.src="<?php echo site_url('admin/login/get_captcha').'/'?>"+Math.random() style="cursor: pointer;" title="看不清？点击更换另一个验证码。">
					</li>
					<li>
						<input type="submit" name="button" value="立即登陆"/>
					</li>
				</ul>
			</form>
			<p><a href="/">返回首页</a> &copy; 2016 Powered by </p>
		</div>
	</div>
</body>
</html>