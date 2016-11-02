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
<body>
    <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="<?php echo site_url('admin/admin/info');?>" target="main">首页</a> &raquo; 修改密码
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>修改密码</h3>
    </div>
</div>
<!--结果集标题与导航组件 结束-->
<script type="text/javascript">
$(function(){
  $("input[name='button']").click(function(){
      var $apasso = $("input[name='apasso']").val();
      if($apasso.length<1){layer.alert('原密码不能为空',{icon:5});return false;}
	  var $apass = $("input[name='apass']").val();
	  if($apass.length<6){layer.alert('新密码长度不能小于6位',{icon:5});return false;}
	  var $apass_sure = $("input[name='apass_sure']").val();
      if($apass_sure.length<1){layer.alert('确认密码不能为空',{icon:5});return false;}
      if($apass!=$apass_sure){layer.alert('两次输入密码不一致，请检查',{icon:5});return false;}
  });
});
</script>
<div class="result_wrap">
        <p style="color:red"><?php echo validation_errors();if(isset($errors_info)){echo $errors_info;}?></p>
        <?php echo form_open('admin/admin/passwd_run');?>
        <table class="add_tab">
            <tbody>
            <tr>
                <th width="120"><i class="require">*</i>原密码：</th>
                <td>
                    <input type="password" name="apasso" id="apasso"> </i>请输入原始密码</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>新密码：</th>
                <td>
                    <input type="password" name="apass" id="apass"> </i>新密码6-20位</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>确认密码：</th>
                <td>
                    <input type="password" name="apass_sure" id="apass_sure"> </i>再次输入密码</span>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" name="button" value="提交">
                    <input type="button" class="back" onclick="history.go(-1)" value="返回">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
</body>
</html>