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
            var $title = $("input[name='title']").val();
            if($title.length<1){
                layer.alert('分类名称不能为空！',{icon:5},function(index){
                    layer.close(index);return false;
                });
            }
        });
    });
</script>
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; 
        <a href="<?php echo site_url('admin/news/news_cls_list');?>" target="main">资讯分类列表</a> &raquo; 添加资讯分类
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增资讯</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <p style="color:red"><?php echo validation_errors();if(isset($errors_info)){echo $errors_info;}?></p>
        <?php echo form_open('admin/news/news_menu_add_run');?>
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>上级分类：</th>
                        <td>
                            <select name="pid">
                                <option value="0">==请选择==</option>
                                <?php foreach($one_news_menu_list as $menu_list):?>
                                    <option value="<?=$menu_list['id'];?>" 
                                    <?php if($menu_list['id']==$one_news_menu_info['pid']):?>
                                        selected="selected"
                                    <?php endif;?>
                                    >
                                        <?=$menu_list['title'];?></option>
                                <?php endforeach;?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>分类名称：</th>
                        <td>
                            <input type="text" class="lg" name="title" value="<?php echo $one_news_menu_info['title'];?>">
                        </td>
                    </tr>
                   
                    <tr>
                        <th>分类状态：</th>
                        <td>
                            <label for="">
                                <input type="radio" name="status" value="1" <?php if($one_news_menu_info['status']==1):?>checked="checked"<?php endif;?>>可用
                            </label>
                            <label for="">
                                <input type="radio" name="status" vlaue="" <?php if($one_news_menu_info['status']!=1):?>checked="checked"<?php endif;?>>不可用
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <th>分类描述：</th>
                        <td>
                            <textarea name="condition"><?php echo $one_news_menu_info['condition'];?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>排序：</th>
                        <td>
                            <input type="text" class="sm" name="sort" value="<?php echo $one_news_menu_info['sort'];?>">
                            <span><i class="fa fa-exclamation-circle yellow"></i>默认50</span>
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