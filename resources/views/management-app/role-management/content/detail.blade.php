<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <label>Role</label>
                <input type="text" class="form-control" value="{{ $role->name }}" readonly>
            </div>
            <input type="hidden" class="form-control" name="role_id" id="roleId" value="{{ $role->id }}" readonly>
        </div>
        <div class="row pt-4">
            <div class="col">
                <div class="sk-three-bounce sk-primary">
                  <div class="sk-child sk-bounce1"></div>
                  <div class="sk-child sk-bounce2"></div>
                  <div class="sk-child sk-bounce3"></div>
                </div>
            </div>
            <div class="col-sm-12" id="detail-permission">
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        load()
    })
    function functionPermission(rolePermissionId) {
        $(':checkbox').each(function(i) {
            if ($(this).data('id') == `permission${rolePermissionId}`) {
                if ($(this).prop('checked')) {
                    var checked = true
                } else {
                    var checked = false
                }
                $.ajax({
                    url: "{{ route('management-app.role-management.access.update-permission') }}",
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        role_permission_id: rolePermissionId,
                        role_id: $('#roleId').val(),
                        parent_id: $(this).data('parent') ? $(this).data('parent') : null,
                        checked: checked
                    },
                    success: function(response) {
                        console.log(response)
                        if (response.rc == "0000") {
                            swal({ title: "Sukses",
                                text: response.message,
                                type: "success",
                                timer: 1500
                            });
                            $('.sk-primary').fadeIn(100);
                        } else {
                            swal("Gagal", response.message, "warning");
                        }
                        load()
                    },
                    error: function(error) {
                        alert(error)
                    },
                })
            }
        })
    }

    function load() {
        $('#detail-permission').html('')
        $.ajax({
            url: "{{ route('management-app.role-management.access-permission') }}",
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                role_id: $('#roleId').val()
            },
            success: function(response) {
                var head = "<table class='table table-bordered'><thead><tr><th>Menu</th>"
                $.map(response.permissions, function(v, k) {
                    head += `<th class="text-nowrap">${v.name}</th>`
                })
                head += "</tr></thead>"
                head += "<tbody>"
                $.map(response.menus, function(v, k) {
                    if (v.childs.length > 0) {
                        head += `<tr data-toggle="collapse" data-target="#demo${k}" class="accordion-toggle" parent="demo${k}">
            <th>${v.name}</th>`
                        $.map(response.data, function(vData, kData) {
                            if (v.id == vData.application_id) {
                                if (vData.isactive == true) {
                                    head +=
                                        `<th colspan='6'><input type="checkbox" data-parent="${vData.application_id}" data-id="permission${vData.id}" onclick="functionPermission(${vData.id})" checked></th>`
                                } else {
                                    head +=
                                        `<th colspan='6'><input type="checkbox" data-parent="${vData.application_id}" data-id="permission${vData.id}" onclick="functionPermission(${vData.id})"></th>`
                                }
                            }
                        })
                        head += `</tr>`
                        $.map(v.childs, function(value, key) {
                            if (value.grand_childs.length > 0) {
                                head +=
                                    `<tr data-toggle="collapse" data-target="#demoGrand${k}${key}" class="accordion-toggle tr-grand" parent="demo${k}" grand="demoGrand${k}${key}">
                <th class="accordion-body collapse" style="background: #ededed !important;" id="demo${k}" parent="demo${k}">--->${value.name}</th>`
                                $.map(response.data, function(vData, kData) {
                                    if (value.id == vData.application_id) {
                                        if (vData.isactive == true) {
                                            head +=
                                                `<th colspan='6' class="accordion-body collapse" style="background: #ededed !important;" id="demo${k}" parent="demo${k}"><input type="checkbox" data-parent="${vData.application_id}" data-id="permission${vData.id}" onclick="functionPermission(${vData.id})" checked></th>`
                                        } else {
                                            head +=
                                                `<th colspan='6' class="accordion-body collapse" style="background: #ededed !important;" id="demo${k}" parent="demo${k}"><input type="checkbox" data-parent="${vData.application_id}" data-id="permission${vData.id}" onclick="functionPermission(${vData.id})"></th>`
                                        }
                                    }
                                })
                                head += `</tr>`
                                $.map(value.grand_childs, function(valueGrand, keyGrand) {
                                    head +=
                                        `<tr>
                    <th class="accordion-body collapse th-grand" style="background: #ededed !important;" id="demoGrand${k}${key}" parent="demo${k}" grand="demoGrand${k}${key}">------>${valueGrand.name}</th>`
                                    $.map(response.data, function(vData, kData) {
                                        if (valueGrand.id == vData
                                            .application_id) {
                                            if (vData.isactive == true) {
                                                head +=
                                                    `<th class="accordion-body collapse th-grand" style="background: #ededed !important;" id="demoGrand${k}${key}" parent="demo${k}" grand="demoGrand${k}${key}"><input type="checkbox" data-id="permission${vData.id}" onclick="functionPermission(${vData.id})" checked></th>`
                                            } else {
                                                head +=
                                                    `<th class="accordion-body collapse th-grand" style="background: #ededed !important;" id="demoGrand${k}${key}" parent="demo${k}" grand="demoGrand${k}${key}"><input type="checkbox" data-id="permission${vData.id}" onclick="functionPermission(${vData.id})"></th>`
                                            }
                                        }
                                    })
                                    head += `</tr>`
                                })
                            } else {
                                head +=
                                    `<tr>
                <th class="accordion-body collapse" style="background: #f5f5f5 !important;" id="demo${k}" parent="demo${k}">--->${value.name}</th>`
                                $.map(response.data, function(vData, kData) {
                                    if (value.id == vData.application_id) {
                                        if (vData.isactive == true) {
                                            head +=
                                                `<th class="accordion-body collapse" style="background: #f5f5f5 !important;" id="demo${k}" parent="demo${k}"><input type="checkbox" data-id="permission${vData.id}" onclick="functionPermission(${vData.id})" checked></th>`
                                        } else {
                                            head +=
                                                `<th class="accordion-body collapse" style="background: #f5f5f5 !important;" id="demo${k}" parent="demo${k}"><input type="checkbox" data-id="permission${vData.id}" onclick="functionPermission(${vData.id})"></th>`
                                        }
                                    }
                                })
                                head += `</tr>`
                            }
                        })
                    } else {
                        head += `<tr data-toggle="collapse" class="accordion-toggle">
            <th>${v.name}</th>`
                        $.map(response.data, function(vData, kData) {
                            if (v.id == vData.application_id) {
                                if (vData.isactive == true) {
                                    if (v.type == 3) {
                                        head +=
                                            `<th><input type="checkbox" data-parent="${vData.application_id}" data-id="permission${vData.id}" onclick="functionPermission(${vData.id})" checked></th>`
                                    } else {
                                        head +=
                                            `<th colspan='6'><input type="checkbox" data-parent="${vData.application_id}" data-id="permission${vData.id}" onclick="functionPermission(${vData.id})" checked></th>`
                                    }
                                } else {
                                    if (v.type == 3) {
                                        head +=
                                            `<th><input type="checkbox" data-parent="${vData.application_id}" data-id="permission${vData.id}" onclick="functionPermission(${vData.id})"></th>`
                                    } else {
                                        head +=
                                            `<th colspan='6'><input type="checkbox" data-parent="${vData.application_id}" data-id="permission${vData.id}" onclick="functionPermission(${vData.id})"></th>`
                                    }
                                }
                            }
                        })
                        head += `</tr>`
                    }
                })
                head += "</tbody"
                head += "</table>"
                $('#detail-permission').html(head)
            }
        }).done(function() {
            // setTimeout(function() {
            //     $("#overlay").fadeOut(300);
            // }, 500);
            setTimeout(function() {
                $('.sk-primary').fadeOut(100);
                $('#detail-permission').fadeIn();
            }, 100);
        });
    }

    $('#detail-permission').on('click', 'tr.accordion-toggle', function() {
        var parent = $(this).attr('parent')
        $(`th.accordion-body[parent!='${parent}']`).removeClass('show')
    })
    $('#detail-permission').on('click', '.tr-grand', function() {
        var grand = $(this).attr('grand')
        $(`.th-grand[grand!='${grand}']`).removeClass('show')
    })
</script>
@endpush
