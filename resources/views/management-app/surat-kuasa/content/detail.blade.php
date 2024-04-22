<div class="card">
    <div class="card-body">
        <form action="{{ route('management-app.surat-kuasa.create') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col">
                    <label class="form-label">Nama Surat</label>
                    <input type="text" class="form-control" name="nama_surat" id="nama_surat" value="{{ $record->nama_template }}"
                        required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label class="form-label">Parameter</label>
                    <select class="select2-demo form-control" name="parameter[]" multiple style="width: 100%">
                        {{-- @foreach ($fields as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach --}}
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
                       {{ $content }}
                    </textarea>
                </div>
            </div>
            <div class="row justify-content-end">
                <a href="{{ route('management-app.surat-kuasa') }}" type="button" class="btn btn-default mr-1" data-dismiss="modal">Batal</a>
                <button type="submit" class="btn btn-primary" id="saveBtn">Simpan</button>
            </div>
        </form>
    </div>
</div>
