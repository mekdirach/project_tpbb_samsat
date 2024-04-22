<div class="card">
    <div class="card-body">
        <form >
            <?php echo csrf_field(); ?>
            <div class="form-row">
                <div class="form-group col">
                    <label class="form-label">Nama Surat</label>
                    <input type="text" class="form-control" name="nama_surat" id="nama_surat" value="<?php echo e($record->nama_template); ?>"
                        required disabled>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label class="form-label">Parameter</label>
                    <select class="select2-demo form-control" name="parameter[]" multiple style="width: 100%" disabled>
                        <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item); ?>" <?php echo e(in_array($item, $values) ? 'selected' : ''); ?>><?php echo e($item); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label class="form-label">Status</label>
                    <select class="custom-select" name="isactive" disabled>
                        <option value="1" selected>Aktif</option>
                        <option value="0">Nonaktif</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label class="form-label">Template</label>
                    <div id="toolbar-container"></div>
                    <textarea id="editor" name="template">
                       <?php echo e($content); ?>

                    </textarea>
                </div>
            </div>
        </form>
    </div>
</div>
<?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/t-samsat/management-app/surat-kuasa/content/detail.blade.php ENDPATH**/ ?>