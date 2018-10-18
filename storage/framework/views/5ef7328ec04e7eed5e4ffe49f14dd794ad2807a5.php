<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All users posts</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <table>
                                        <tr>
                                            <td><b> <?php echo e($post->title); ?></b></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #4CAF50;"><b>Posted By: <?php echo e($post->name); ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo e($post->post); ?></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <form action="<?php echo e(url('posts', [$post->id])); ?>" method="POST">
                                                    <?php echo e(method_field('DELETE')); ?>

                                                    <?php echo e(csrf_field()); ?>

                                                    <input type="text" class="form-control" name="comment" required value="">
                                                    <button class="btn btn-danger" type="submit">Comment</button>
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>