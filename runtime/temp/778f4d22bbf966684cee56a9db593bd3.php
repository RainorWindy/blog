<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:74:"D:\software\website\Time\public/../application/index\view\share\index.html";i:1589283374;s:63:"D:\software\website\Time\application\index\view\pub\header.html";i:1589592949;s:69:"D:\software\website\Time\application\index\view\pub\bright_index.html";i:1589597151;s:63:"D:\software\website\Time\application\index\view\pub\footer.html";i:1589532401;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/static/style/css/common.css">
    <link rel="stylesheet" href="/public/static/style/css/iconfont.css">
    <link rel="stylesheet" href="/public/static/style/css/body.css">
    <title>Knowledge</title>
</head>

<body>
    <script src="/public/static/style/js/jquery.min.js"></script>
<header id="header">
    <div id="nav">
        <div class="logoul nav_ul">
            <a href="/" class="logo">Personal-Blog-Net|<font>My-life</font></a>
        </div>
        <ul class="menuul nav_ul">
            <?php if(is_array($navi) || $navi instanceof \think\Collection || $navi instanceof \think\Paginator): $i = 0; $__LIST__ = $navi;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li class="ls1 hson ls1_cl"><a
                    href="<?php echo url('/index/Rou/index',array('nid'=>$vo['navigate_id'])); ?>"><?php echo $vo['navigate_name']; ?></a>
                <ul class="ls1_ul share_ul">
                    <?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
                    <li><a
                            href="<?php echo url('/index/Rou/index',array('nid'=>$vo['navigate_id'],'category_by'=>$vv['navigate_id'])); ?>"><?php echo $vv['navigate_name']; ?></a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <!-- <li class="ls1 hson ls1_cl"><a href="<?php echo url('/index/share/index'); ?>">资源共享</a>
                <ul class="ls1_ul share_ul">
                    <li><a href="javascript:void(0)">技术手册</a></li>
                    <li><a href="javascript:void(0)">建站模板</a></li>
                    <li><a href="javascript:void(0)">网页插件</a></li>
                </ul>
            </li>
            <li class="ls1 hson ls1_cl"><a href="<?php echo url('/index/life/index'); ?>">我的生活</a>
                <ul class="ls1_ul mylife_ul">
                    <li><a href="javascript:void(0)">我的相册</a></li>
                    <li><a href="javascript:void(0)">我的日志</a></li>
                </ul>
            </li> -->
        </ul>
        <div class="formul nav_ul">
            <form action="#" method="post" autocomplete="off">
                <!-- <div>
                    <label for="">资源共享</label>
                    <ul class="type_list"></ul>
                </div> -->
                <input type="text" id="keyword" name="keyword" placeholder="请输入关键词">
                <button type="button" class="icon iconfont searchBtn">&#xe783;</button>
            </form>
        </div>
        <!-- 手机端导航按钮 -->
        <button class="mobileBtn">
            <span class="mobileBtnline"></span>
            <span class="mobileBtnline"></span>
            <span class="mobileBtnline"></span>
        </button>
        <!-- 手机端导航按钮 -->
    </div>
</header>

    <!-- body start -->
    <div class="clearboth"></div>
    <div class="container">
        <!-- left start -->
        <div class="bleft">
            <div class="sharebox sims">
                <div class="sharetitle toppv">
                    <ul>
                        <?php if(isset($category_by)): ?>
                        <li class="scate" setcategory_by="0" setnid="<?php echo $nid; ?>">全部</li>
                        <?php if(is_array($sonL) || $sonL instanceof \think\Collection || $sonL instanceof \think\Paginator): $i = 0; $__LIST__ = $sonL;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vk): $mod = ($i % 2 );++$i;?>
                        <li class="scate <?php if($category_by == $vk['navigate_id']){echo 'sharetitle_active';}?>"
                            setcategory_by="<?php echo $vk['navigate_id']; ?>" setnid="<?php echo $nid; ?>">
                            <?php echo $vk['navigate_name']; ?></li>
                        <?php endforeach; endif; else: echo "" ;endif; else: ?>
                        <li class="scate" setcategory_by="0" setnid="<?php echo $nid; ?>">全部</li>
                        <?php if(is_array($sonL) || $sonL instanceof \think\Collection || $sonL instanceof \think\Paginator): $i = 0; $__LIST__ = $sonL;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vk): $mod = ($i % 2 );++$i;?>
                        <li class="scate" setcategory_by="<?php echo $vk['navigate_id']; ?>" setnid="<?php echo $nid; ?>"><?php echo $vk['navigate_name']; ?></li>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        <!-- <li>建站模板</li>
                        <li>网页插件</li> -->
                    </ul>
                </div>
                <div class="sharecontent">
                    <?php if($contentL): if(is_array($contentL) || $contentL instanceof \think\Collection || $contentL instanceof \think\Paginator): $i = 0; $__LIST__ = $contentL;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cv): $mod = ($i % 2 );++$i;?>
                    <div class="article_list">
                        <h4><?php echo $cv['title']; ?></h4>
                        <p class="isshortinfo"><small>发布时间:<?php if($cv['issuetime']): ?><?php echo date("Y-m-d
                                H:i:s",$cv['issuetime']); else: ?><?php echo (isset($cv['issuetime']) && ($cv['issuetime'] !== '')?$cv['issuetime']:"未设置"); endif; ?> 编辑：[ <a href="javascript:void(0)"
                                    style="color:#1d89e8;text-decoration:none">站长</a> ] 分类：[
                                <span style="color:#1d89e8">分享</span> ]</small></p>
                        <div class="article_intro">
                            <figure><img src="http://www.perfind.cn/Public/style/img/img.jpg" alt=""></figure>
                            <div class="article_word">
                                一、队列使用场景：为什么需要队列在web开发中，我们经常会遇到需要处理批量任务的时候，这些批量任务可能是用户提交的，也可能是当系统被某个事件触发时需要进行批量处理的，面对这样的
                                任务，如果是用户提交的批量任务，初级程序员只能让用户触发提交动作后，等待服务器
                            </div>
                            <div class="debtn">
                                <div class="clearboth"></div>
                                <a
                                    href="<?php echo url('/index/article/aprev',array('nid'=>$cv['topcate_id'],'category_by'=>$cv['cid'],'itemsid'=>$cv['art_id'])); ?>">了解详情</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; else: ?>
                    <p style="color: #666;">相关资源暂无</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- left end -->

        <!-- right start -->
        <div class="bright">
            <div class="siteinfo sims">
    <div class="siteinfotitle simi">
        <h3>站长名片</h3>
        <div class="simi_body">
            <p>职业：<span class="simi_body_name"><?php echo $admininfo['admin_occupation']; ?></span></p>
            <p>位置：<span class="simi_body_name"><?php echo $admininfo['admin_location']; ?></span></p>
            <p>邮箱：<span class="simi_body_name"><?php echo $admininfo['admin_email']; ?></span></p>
            <p>微信：<span class="simi_body_name"><?php echo $admininfo['admin_wechat']; ?></span></p>
        </div>
    </div>
</div>
<div class="clearboth"></div>
<div class="siteinfo sims">
    <div class="siteinfotitle simi">
        <h3>最新日志</h3>
        <div class="simi_body">
            <ul>
                <?php if($newAlst): if(is_array($newAlst) || $newAlst instanceof \think\Collection || $newAlst instanceof \think\Paginator): $i = 0; $__LIST__ = $newAlst;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$newAlst): $mod = ($i % 2 );++$i;?>
                <li><a
                        href="<?php echo url('/index/article/aprev',array('nid'=>$newAlst['topcate_id'],'category_by'=>$newAlst['cid'],'itemsid'=>$newAlst['art_id'])); ?>"><?php echo $newAlst['title']; ?></a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; else: ?>
                <li style="color:#666;">相关数据暂无</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<div class="clearboth"></div>
<div class="siteinfo sims">
    <div class="siteinfotitle simi">
        <h3>点击排行</h3>
        <div class="simi_body">
            <ul>
                <?php if($clickL): if(is_array($clickL) || $clickL instanceof \think\Collection || $clickL instanceof \think\Paginator): $i = 0; $__LIST__ = $clickL;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$clickL): $mod = ($i % 2 );++$i;?>
                <li><a
                        href="<?php echo url('/index/article/aprev',array('nid'=>$clickL['topcate_id'],'category_by'=>$clickL['cid'],'itemsid'=>$clickL['art_id'])); ?>"><?php echo $clickL['title']; ?></a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; else: ?>
                <li style="color:#666;">相关数据暂无</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<div class="clearboth"></div>
<div class="siteinfo sims">
    <div class="siteinfotitle simi">
        <h3>热门推荐</h3>
        <div class="simi_body">
            <ul>
                <?php if($remL): if(is_array($remL) || $remL instanceof \think\Collection || $remL instanceof \think\Paginator): $i = 0; $__LIST__ = $remL;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$remL): $mod = ($i % 2 );++$i;?>
                <li><a
                        href="<?php echo url('/index/article/aprev',array('nid'=>$remL['topcate_id'],'category_by'=>$remL['cid'],'itemsid'=>$remL['art_id'])); ?>"><?php echo $remL['title']; ?></a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; else: ?>
                <li style="color:#666;">相关数据暂无</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<div class="clearboth"></div>
<div class="siteinfo sims">
    <div class="siteinfotitle simi">
        <h3>相册更新</h3>
        <div class="simi_body">
            <ul>
                <?php if($photo): if(is_array($photo) || $photo instanceof \think\Collection || $photo instanceof \think\Paginator): $i = 0; $__LIST__ = $photo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$upp): $mod = ($i % 2 );++$i;?>
                <li><a
                        href="<?php echo url('/index/life/showphoto',array('nid'=>$upp['topcate_id'],'category_by'=>$upp['cid'],'pname'=>$upp['photo_id'])); ?>"><?php echo $upp['title']; ?></a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; else: ?>
                <li style="color:#666;">相关数据暂无</li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<div class="clearboth"></div>
<div class="siteinfo sims">
    <div class="siteinfotitle simi">
        <h3>站点信息</h3>
        <div class="simi_body">
            <p>建站时间：<span class="simi_body_name"><?php echo date("Y-m-d",$sysinfo['start_time']); ?>至今</span></p>
            <p>建站目的：<span class="simi_body_name"><?php echo $sysinfo['create_purpose']; ?></span></p>
            <p>使用语言：<span class="simi_body_name"><?php echo $sysinfo['use_languge']; ?></span></p>
            <p>使用框架：<span class="simi_body_name"><?php echo $sysinfo['use_frame']; ?></span></p>
            <p>运行环境：<span class="simi_body_name"><?php echo $sysinfo['run_envi']; ?></span></p>
        </div>
    </div>
</div>
<div class="clearboth"></div>
<div class="siteinfo sims">
    <div class="siteinfotitle simi">
        <h3>站点标签</h3>
        <div class="simi_body">
            <div class="tags">
                <?php if(is_array($tags) || $tags instanceof \think\Collection || $tags instanceof \think\Paginator): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?>
                <a href="javascript:void(0)"><?php echo $tag['tag_name']; ?></a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
</div>
        </div>

        <!-- right end -->
    </div>
    <!-- body end-->
    <!-- footer -->
    <div class="clearboth"></div>
    <footer>
    <div class="footerbox">
        <p><?php echo $sysinfo['tips']; ?></p>
        <p><?php echo $sysinfo['copyright']; ?></p>
    </div>
</footer>

<script src="/public/static/style/js/jquery.min.js"></script>
<script src="/public/static/style/js/common.js"></script>
<script src="/public/static/style/js/vue.js"></script>
<script src="/public/static/style/js/vue_load.js"></script>
<script src="/public/static/style/js/loadpage.js"></script>
</body>
<?php if(!isset($category_by)): ?>
<script>
    $(document).ready(function () {
        $("div.toppv").find("li").eq(0).addClass("sharetitle_active");
    })
</script>
<?php endif; ?>

</html>