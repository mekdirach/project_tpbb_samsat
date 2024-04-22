<div class="card">
    <div class="card-body">
        <form action="<?php echo e(route('management-app.surat-kuasa.update')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" id="id" value="<?php echo e($record->id); ?>">
            <input type="hidden" name="file_template" id="file_template" value="<?php echo e($record->file_template); ?>">
            <div class="form-row">
                <div class="form-group col">
                    <label class="form-label">Nama Surat</label>
                    <input type="text" class="form-control" name="nama_surat" id="nama_surat" value="<?php echo e($record->nama_template); ?>"
                        required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label class="form-label">Parameter</label>
                    <select class="select2-demo form-control" name="parameter[]" multiple style="width: 100%">
                        <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item); ?>" <?php echo e(in_array($item, $values) ? 'selected' : ''); ?>><?php echo e($item); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label class="form-label">Status</label>
                    <select class="custom-select" name="isactive" >
                        <option value="1" <?php echo e($record->status == '1' ? 'selected' : ''); ?>>Aktif</option>
                        <option value="0" <?php echo e($record->status == '0' ? 'selected' : ''); ?>>Nonaktif</option>
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
            <div class="row justify-content-end">
                <a href="<?php echo e(route('management-app.surat-kuasa')); ?>" type="button" class="btn btn-default mr-1" data-dismiss="modal">Batal</a>
                <button type="submit" class="btn btn-primary" id="saveBtn">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/management-app/surat-kuasa/content/edit.blade.php ENDPATH**/ ?>