
 <?php $__env->startSection('content'); ?>
     <div class="container-fluid">
         <h1 class="h3 mb-2 text-gray-800">Profile User</h1>
         <div class="card shadow mb-4">
             <div class="card-body">
                 <div class="mb-3">
                     <label class="col-form-label">Nama</label>
                     <input value="<?php echo e($user->name); ?>" class="form-control" readonly>
                 </div>
                 <div class="mb-3">
                     <label class="col-form-label">Email</label>
                     <input value="<?php echo e($user->email); ?>" class="form-control" readonly>
                 </div>
                 <a href="<?php echo e(route('dashboard.index')); ?>" class="btn btn-secondary">Kembali</a>
             </div>
         </div>
     </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend/layout/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\tugaskuliah\2023\semester4\RPL\latihan1\resources\views/backend/content/profile.blade.php ENDPATH**/ ?>