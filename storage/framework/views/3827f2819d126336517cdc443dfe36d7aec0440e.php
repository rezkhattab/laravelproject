<?php $__env->startSection('content'); ?>
<div class="container">
      <h2>New Post</h2><br/>
      <form method="post" action="<?php echo e(url('posts')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Title">Title:</label>
            <input type="hidden" name="ownerid" value="<?php echo e(Auth::user()->id); ?>">
            <input type="text" class="form-control" name="title" required>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Post">Post:</label>
              <textarea cols="10" rows="10" class="form-control" name="post" required></textarea>
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