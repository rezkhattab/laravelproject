<?php $__env->startSection('content'); ?>
<div class="container">
      <h2>New Post</h2><br/>
      <form method="POST" action="<?php echo e(url('posts', [$post->id])); ?>" enctype="multipart/form-data">
               <?php echo e(method_field('PATCH')); ?>


          <?php echo e(csrf_field()); ?>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Title">Title:</label>
            <input type="text" class="form-control" name="title" required value="<?php echo e($post->title); ?>">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Post">Post:</label>
              <textarea cols="10" rows="10" class="form-control" name="post" required><?php echo e($post->post); ?></textarea>
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>