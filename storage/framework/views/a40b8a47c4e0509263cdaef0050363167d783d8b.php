<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>
        新闻
            <small>证书 > <a href="<?php echo url('/news'); ?>">新闻</a> > 编辑</small>
        </h2>
    </div>
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                    编辑 新闻
                    </h2>
                </div>
                <div class="body">
                <form class="form-inline" action="/news/update/<?php echo e($news->id); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="name">形式:</label>
                                <input type="text" class="form-control" id="type" placeholder="输入 形式" name="type" value="<?php echo e($news->type); ?>">
                            </div>
                        </div>  
                        <br/>
                        <br/>
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="password">主题:</label>
                                <input type="text" class="form-control" id="subject" placeholder="输入  主题" name="subject" value="<?php echo e($news->subject); ?>">
                            </div>
                        </div> 
                        <div class="form-group  form-float">
                            <div class="form-line">
                                <label for="repassword">内容:</label>
                                <input type="text" class="form-control" id="contents" placeholder="输入 内容" name="contents" value="<?php echo e($news->contents); ?>">
                            </div>
                        </div> 
                        <button type="submit" class="btn btn-default">提交</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('bsb.templates.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>