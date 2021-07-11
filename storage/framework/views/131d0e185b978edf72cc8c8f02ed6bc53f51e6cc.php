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
                    <a href="<?php echo e(route('student.create')); ?>"> <button type="submit" class="btn btn-primary">Tambah Data</button> </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead id="table">
                            <th>No</th>
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Asal Sekolah</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(++$i); ?></td>
                                <td><?php echo e($student->npm); ?></td>
                                <td><?php echo e($student->name); ?></td>
                                <td><?php echo e($student->kelas); ?></td>
                                <td><?php echo e($student->jurusan); ?></td>
                                <td><?php echo e($student->asal_sekolah); ?></td>
                                <td>
                                    <form style='display:inline' , method="POST" action="<?php echo route('student.destroy', $student->npm); ?> ">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button onclick="return confirm('Anda akan menghapus data?')" class="btn btn-danger">
                                            <?php echo e(__('Delete')); ?>

                                        </button>
                                    </form>
                                    |
                                    <a href="<?php echo e(route('student.edit', $student->npm)); ?>" class="btn btn-success">
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
<?php endif; ?><?php /**PATH /Users/behumble/Documents/Projects/LaravelProject/pemrograman_web2/resources/views/student/index.blade.php ENDPATH**/ ?>