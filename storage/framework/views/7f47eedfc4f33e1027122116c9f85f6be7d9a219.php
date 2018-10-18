<?php $__env->startSection('content'); ?>
<div class="container">
    <br />
    <?php if(\Session::has('success')): ?>
    <div class="alert alert-success">
        <p><?php echo e(\Session::get('success')); ?></p>
    </div><br />
    <?php endif; ?>
    <a class="navbar-brand" href="<?php echo e(url('/posts/create')); ?>">
        Add new post
    </a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>

            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td><?php echo e($post->id); ?></td>
                <td><?php echo e($post->title); ?></td>
                <td><a href="<?php echo e(action('PostsController@edit', $post->id)); ?>" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="<?php echo e(url('posts', [$post->id])); ?>" method="POST">
                        <?php echo e(method_field('DELETE')); ?>

                        <?php echo e(csrf_field()); ?>

                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>