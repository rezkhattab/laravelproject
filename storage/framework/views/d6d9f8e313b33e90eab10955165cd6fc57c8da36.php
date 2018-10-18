<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>User Profile</h2><br/>
    <form method="POST" action="<?php echo e(url('profile', [$profile->id])); ?>" enctype="multipart/form-data">
        <?php echo e(method_field('PATCH')); ?>


        <?php echo e(csrf_field()); ?>

        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
            <label for="name" class="col-md-4 control-label">Name</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="<?php echo e($profile->name); ?>" required autofocus>

                <?php if($errors->has('name')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('name')); ?></strong>
                </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group<?php echo e($errors->has('nationalid') ? ' has-error' : ''); ?>">
            <label for="nationalid" class="col-md-4 control-label">National ID</label>

            <div class="col-md-6">
                <input id="nationalid" type="text" class="form-control" name="nationalid" value="<?php echo e($profile->nationalid); ?>" required>

                <?php if($errors->has('nationalid')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('nationalid')); ?></strong>
                </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group<?php echo e($errors->has('gender') ? ' has-error' : ''); ?>">
            <label for="gender" class="col-md-4 control-label">Gender</label>

            <div class="col-md-6">
                <select name="gender" class="form-control" >
                    <option value="0">-- Select --</option>
                    <?php if($profile->gender == '1'): ?>
                    <option value="1" selected="">Male</option>
                    <?php else: ?>
                    <option value="1">Male</option>
                    <?php endif; ?>
                    <?php if($profile->gender == '2'): ?>
                    <option value="2" selected="">Female</option>
                    <?php else: ?>
                    <option value="2">Female</option>
                    <?php endif; ?>
                </select>
            </div>
        </div>
        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="<?php echo e($profile->email); ?>" required>

                <?php if($errors->has('email')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
            <label for="password" class="col-md-4 control-label">Password</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required>

                <?php if($errors->has('password')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group">
            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>