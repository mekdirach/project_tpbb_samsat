<div class="card">
    <div class="card-body">
        <form action="<?php echo e(route('management-app.surat-kuasa.create')); ?>" method="POST">
            <?php echo csrf_field(); ?>
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
                        
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label class="form-label">Status</label>
                    <select class="custom-select" name="isactive" >
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
            <div class="row justify-content-end">
                <a href="<?php echo e(route('management-app.surat-kuasa')); ?>" type="button" class="btn btn-default mr-1" data-dismiss="modal">Batal</a>
                <button type="submit" class="btn btn-primary" id="saveBtn">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?php /**PATH /Users/elizzwell/Documents/work/t-pajak/tpbb-devbjb/resources/views/management-app/surat-kuasa/content/detail.blade.php ENDPATH**/ ?>