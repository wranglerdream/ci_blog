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
    <script src="<?php echo base_url('style/admin/js/ch-ui.admin.js');?>"></script>
</head>
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; 
        <a href="<?php echo site_url('admin/news/news_cls_list');?>" target="main">资讯分类列表</a> &raquo; 资讯分类列表
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="" method="post">
            <table class="search_tab">
                <tr>
                    <th width="120">选择分类:</th>
                    <td>
                        <select onchange="javascript:location.href=this.value;">
                            <option value="">全部</option>
                            <option value="http://www.baidu.com">百度</option>
                            <option value="http://www.sina.com">新浪</option>
                        </select>
                    </td>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字"></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="<?php echo site_url('admin/news/news_cls_add');?>" target="main"><i class="fa fa-plus"></i>新增资讯分类</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%"><input type="checkbox" name=""></th>
                        <th class="tc">排序</th>
                        <th class="tc">ID</th>
                        <th>分类名称</th>
                        <th>分类等级</th>
                        <th>状态</th>
                        <th>更新时间</th>
                        <th>简介</th>
                        <th>操作</th>
                    </tr>
                    <?php foreach($news_cls_list as $val):?>
                    <?php if($val['level']==1):?>
                    <tr>
                        <td class="tc"><input type="checkbox" name="id" value="<?php echo $val['id'];?>"></td>
                        <td class="tc">
                            <input type="text" name="sort" value="<?php echo $val['sort'];?>">
                        </td>
                        <td class="tc"><?php echo $val['id'];?></td>
                        <td>|-<?php echo $val['title'];?></td>
                        <td><?php echo $val['level'];?></td>
                        <td><?php if($val['status']==1){echo '可用';}else{echo '不可用';}?></td>
                        <td><?php echo date('Y-m-d H:i:s',$val['addtime']);?></td>
                        <td><?php echo $val['condition'];?></td>
                        <td>
                            <a href="#">修改</a>
                            <a href="<?php echo site_url('admin/news/news_cls_del_run/id/'.$val['id']);?>">删除</a>
                        </td>
                    </tr>
                    <?php endif;?>
                        <?php foreach($news_cls_list as $vall):?>
                        <?php if($vall['pid']==$val['id']):?>
                        <tr>
                            <td class="tc"><input type="checkbox" name="id" value="<?php echo $vall['id'];?>"></td>
                            <td class="tc">
                                <input type="text" name="sort" value="<?php echo $vall['sort'];?>">
                            </td>
                            <td class="tc"><?php echo $vall['id'];?></td>
                            <td>|--<?php echo $vall['title'];?></td>
                            <td><?php echo $vall['level'];?></td>
                            <td><?php if($vall['status']==1){echo '可用';}else{echo '不可用';}?></td>
                            <td><?php echo date('Y-m-d H:i:s',$vall['addtime']);?></td>
                            <td><?php echo $vall['condition'];?></td>
                            <td>
                                <a href="#">修改</a>
                                <a href="<?php echo site_url('admin/news/news_cls_del_run/id/'.$vall['id']);?>">删除</a>
                            </td>
                        </tr>
                        <?php endif;?>
                        <?php endforeach;?>
                    <?php endforeach;?>
                    <tr>
                        <td colspan="9"><a>排序</a> <a>批量删除</a></td>
                    </tr>
                </table>


               <!--  <div class="page_nav">
                <div>
                <a class="first" href="/wysls/index.php/Admin/Tag/index/p/1.html">第一页</a> 
                <a class="prev" href="/wysls/index.php/Admin/Tag/index/p/7.html">上一页</a> 
                <a class="num" href="/wysls/index.php/Admin/Tag/index/p/6.html">6</a>
                <a class="num" href="/wysls/index.php/Admin/Tag/index/p/7.html">7</a>
                <span class="current">8</span>
                <a class="num" href="/wysls/index.php/Admin/Tag/index/p/9.html">9</a>
                <a class="num" href="/wysls/index.php/Admin/Tag/index/p/10.html">10</a> 
                <a class="next" href="/wysls/index.php/Admin/Tag/index/p/9.html">下一页</a> 
                <a class="end" href="/wysls/index.php/Admin/Tag/index/p/11.html">最后一页</a> 
                <span class="rows">11 条记录</span>
                </div>
                </div>



                <div class="page_list">
                    <ul>
                        <li class="disabled"><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->
</body>
</html>