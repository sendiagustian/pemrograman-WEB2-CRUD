<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Dosen')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="max-w-7xl mx-auto py-10 py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-30">
            <div class="max-w-7xl mx-auto py-4 sm:px-6 lg:px-8">
                <div class="pb-4">
                    <a href="<?php echo e(route('dosen.create')); ?>"> <button type="submit" class="btn btn-primary">Tambah Data</button> </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead id="table">
                            <th scope="col">No</th>
                            <th scope="col">NIDIN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mata Kuliah</th>
                            <th scope="col">Action</th>
                        </thead>
                        <tbody id="table">
                            <?php $__currentLoopData = $dosens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dosen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(++$i); ?></td>
                                <td><?php echo e($dosen->nidin); ?></td>
                                <td><?php echo e($dosen->name); ?></td>
                                <td><?php echo e($dosen->email); ?></td>
                                <td><?php echo e($dosen->mata_kuliah); ?></td>
                                <td>
                                    <form style='display:inline' , method="POST" action="<?php echo route('dosen.destroy', $dosen->id); ?> ">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button onclick="return confirm('Anda akan menghapus data?')" class="btn btn-danger">
                                            <?php echo e(__('Delete')); ?>

                                        </button>
                                    </form>
                                    |
                                    <a href="<?php echo e(route('dosen.edit', $dosen->id)); ?>" class="btn btn-success">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?><?php /**PATH /Users/behumble/Documents/Projects/LaravelProject/pemrograman_web2/resources/views/dosen/index.blade.php ENDPATH**/ ?>