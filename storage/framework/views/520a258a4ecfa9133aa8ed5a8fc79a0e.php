<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Form Ubah Kategori</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="<?php echo e(route('kategori.prosesUbah')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label class="form-label">Nama kategori</label>
                        <input type="text" name="nama_kategori" value="<?php echo e($kategori->nama_kategori); ?>" class="form-control <?php $__errorArgs = ['nama_kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php $__errorArgs = ['nama_kategori'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span style="color: red; font-weight: 600; font-size: 9pt"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <input type="hidden" name="id_kategori" value="<?php echo e($kategori->id_kategori); ?>">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="<?php echo e(route('kategori.index')); ?>" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend/layout/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\tugaskuliah\2023\semester4\RPL\latihan1\resources\views/backend/content/kategori/formUbah.blade.php ENDPATH**/ ?>