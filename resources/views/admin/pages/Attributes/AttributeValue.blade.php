@extends('admin.layouts.master')


{{-- ================================== --}}
{{--                 CSS                --}}
{{-- ================================== --}}

@push('css_library')
@endpush

@push('css')
@endpush



{{-- ================================== --}}
{{--                 CONTENT            --}}
{{-- ================================== --}}

@section('content')
    <!-- Container-fluid starts-->
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="title-header option-title">
                        <h5> Attributes Value</h5>
                    </div>
                    <div class="attributes d-flex align-items-center gap-2 small mb-3">
                        <h6 class="attributes__title mb-0 fw-normal text-primary">Attributes</h6>
                        <i class="attributes__icon fa fa-chevron-right text-secondary"></i>
                        <h6 class="attributes__subtitle mb-0 fw-normal">Color</h6>
                    </div>
                    <div class="show-box">
                        <div class="selection-box"><label>Show
                                :</label><select class="form-control">
                                <option value="30">30</option>
                                <option value="50">50</option>
                                <option value="100">100</option><!---->
                            </select><label>Items per page</label><!----><!----></div>
                        <div class="datepicker-wrap"><!----></div>
                        <div class="table-search d-flex align-items-center justify-content-evenly flex-wrap">
                            <!-- Search -->
                            <div class="d-flex align-items-center">
                                <label for="role-search" class="form-label me-2">Search:</label>
                                <input type="search" id="role-search" class="form-control">
                            </div>

                            <!-- Filter by Variant -->
                            <div class="d-flex align-items-center">
                                <label for="variant-filter" class="form-label me-2">Filter by Variant:</label>
                                <select id="variant-filter" class="form-control">
                                    <option value="">All</option>
                                    <option value="1">Has Variant</option>
                                    <option value="0">No Variant</option>
                                </select>
                            </div>

                            <!-- Add New Button -->
                            <div class="d-flex align-items-center ms-3">
                                <a href="javascript:void(0)" class="align-items-center btn btn-theme d-flex"
                                    onclick="openAddModal()">
                                    <i data-feather="plus-square" class="me-1"></i>Add New
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive category-table">
                        <table class="table all-package theme-table" id="table_id">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Value</th>
                                    <th>Is Active</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Red</td>
                                    <td>
                                        <div class="col-sm-10">
                                            <div class="form-check form-switch ps-0"><label class="switch"><input
                                                        type="checkbox" id="status" formcontrolname="status"
                                                        class="  "><span class="switch-state"></span></label></div>
                                        </div>
                                    </td>
                                    <td>2024-01-01</td>
                                    <td>2024-01-02</td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="openEditModal(1)"> <i
                                                class="ri-pencil-line"></i></a>
                                        <a href="javascript:void(0)" onclick="openDeleteModal(1)"><i
                                                class="ri-delete-bin-line"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Blue</td>
                                    <td>
                                        <div class="col-sm-10">
                                            <div class="form-check form-switch ps-0"><label class="switch"><input
                                                        type="checkbox" id="status" formcontrolname="status"
                                                        class="  "><span class="switch-state"></span></label></div>
                                        </div>
                                    </td>
                                    <td>2024-01-03</td>
                                    <td>2024-01-04</td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="openEditModal(2)"><i
                                                class="ri-pencil-line"></i></a>
                                        <a href="javascript:void(0)" onclick="openDeleteModal(2)"><i
                                                class="ri-delete-bin-line"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <nav class="custom-pagination"><app-pagination>
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled"><a href="javascript:void(0)" tabindex="-1"
                                        aria-disabled="true" class="page-link"><i class="ri-arrow-left-s-line"></i></a></li>
                                <li class="page-item active"><a href="javascript:void(0)" class="page-link">1</a></li>
                                <!---->
                                <li class="page-item disabled"><a href="javascript:void(0)" class="page-link"><i
                                            class="ri-arrow-right-s-line"></i></a></li>
                            </ul><!---->
                        </app-pagination></nav>
                </div>
            </div>

            <!-- Modal Add/Edit -->
            <div class="modal fade" id="addEditModal" tabindex="-1" aria-labelledby="addEditModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addEditModalLabel">Add/Edit Attribute Value</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="addEditForm">
                                <input type="hidden" id="attribute_value_id">

                                <div class="mb-3">
                                    <label for="attribute_id" class="form-label">Attribute</label>
                                    <select class="form-select" id="attribute_id">
                                        <!-- Options will be populated by JavaScript -->
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="value" class="form-label">Value</label>
                                    <input type="text" class="form-control" id="value" required>
                                </div>

                                <div id="is_variant_row" class="mb-3 d-none">
                                    <!-- Is Variant switch (Only visible in Add mode) -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="is_variant" class="form-label mb-0">Is Variant:</label>
                                        <div class="form-check form-switch ps-0 mb-0">
                                            <label class="switch">
                                                <input type="checkbox" id="is_variant" formcontrolname="is_variant"
                                                    class="">
                                                <span class="switch-state"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end gap-2">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="saveButton">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal End -->


            <!-- Modal Confirm Delete -->
            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="text-center">
                            <i class="ri-delete-bin-line" style="font-size: 50px; color: #ff4d4f;"></i>
                            <h3>Delete Item?</h3>
                            <p>This item will be deleted permanently. You can't undo this action.</p>
                        </div>
                        <div class="modal-footer justify-content-center gap-2">
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection



{{-- ================================== --}}
{{--                 JS                 --}}
{{-- ================================== --}}

@push('js_library')
@endpush

@push('js')
    <!--modal add sua -->
    <script>
        $(document).ready(function() {
            // Hiển thị modal thêm mới
            window.openAddModal = function() {
                $('#addEditModalLabel').text('Add New Attribute Value');
                $('#attribute_value_id').val('');
                $('#attribute_id').val('');
                $('#value').val('');
                $('#is_variant').prop('checked', false); // Default state
                $('#is_variant_row').removeClass('d-none'); // Show the Is Variant switch
                $('#addEditModal').modal('show');
            }
    
            // Hiển thị modal chỉnh sửa
            window.openEditModal = function(attributeValueId) {
                $('#addEditModalLabel').text('Edit Attribute Value');
                $('#attribute_value_id').val(attributeValueId); // Example data
                $('#attribute_id').val('101'); // Example data
                $('#value').val('Red'); // Example data
                $('#is_variant_row').addClass('d-none'); // Hide the Is Variant switch for Edit
                $('#addEditModal').modal('show');
            }
    
            // Hiển thị modal xác nhận xóa
            window.openDeleteModal = function(attributeValueId) {
                // Đặt ID cần xóa vào một input ẩn hoặc bất kỳ trường nào
                $('#attribute_value_id').val(attributeValueId);
                $('#confirmDeleteModal').modal('show');
            }
    
            // Xử lý khi nhấn nút "Delete" trong modal xác nhận xóa
            $('#confirmDeleteButton').on('click', function(event) {
                'use strict';
                // Ngăn chặn hành động mặc định của nút (gửi form)
                event.preventDefault();
    
                // Lấy giá trị của ID để xóa
                var attributeValueId = $('#attribute_value_id').val();
    
                // Ví dụ thông báo xóa thành công
                var notify = $.notify(
                    '<i class="fas fa-bell"></i><strong>Deleting...</strong> Your data is being deleted...', {
                        type: 'info',
                        allow_dismiss: true,
                        delay: 3000,
                        showProgressbar: true,
                        timer: 300,
                        animate: {
                            enter: 'animated fadeInDown',
                            exit: 'animated fadeOutUp'
                        }
                    });
    
                // Giả lập hành động xóa và hiển thị thông báo
                setTimeout(function() {
                    // Cập nhật thông báo thành "Success"
                    notify.update({
                        type: 'success',
                        message: '<i class="fas fa-check-circle"></i> <strong>Success:</strong> Your data has been deleted successfully!'
                    });
    
                    // Đóng modal xác nhận xóa
                    $('#confirmDeleteModal').modal('hide');
    
                    // Thực hiện xóa dữ liệu thực tế (gửi request API hoặc xóa từ DOM)
                    // Ví dụ: Xóa dữ liệu từ DOM (hoặc gửi request API)
                    // $('#row-' + attributeValueId).remove(); // Nếu bạn đang hiển thị trong bảng
                }, 1000);  // Giả lập một khoảng thời gian xử lý
    
            });
    
            // Sự kiện mở modal thêm mới
            $('#addButton').on('click', openAddModal);
    
            // Sự kiện mở modal chỉnh sửa
            $('#editButton').on('click', function() {
                openEditModal(1); // Pass your attribute_value_id here
            });
    
            // Sự kiện mở modal xóa
            $('#deleteButton').on('click', function() {
                openDeleteModal(1); // Pass your attribute_value_id here to delete
            });
        });
    </script>
    

    <!--modal thông báo-->
    <script>
        $('#saveButton').click(function(event) {
            'use strict';
            // Ngăn chặn hành động mặc định của nút (gửi form)
            event.preventDefault();

            // Hiển thị thông báo "Loading"
            var notify = $.notify('<i class="fas fa-bell"></i><strong>SUCCESS</strong> Saving your data...', {
                type: 'info',
                allow_dismiss: true,
                delay: 3000,
                showProgressbar: true,
                timer: 300,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                }
            });

            // Sau 1 giây, cập nhật thông báo thành "Success"
            setTimeout(function() {
                // Cập nhật thông báo hiện tại
                notify.update({
                    type: 'success',
                    message: '<i class="fas fa-check-circle"></i> <strong>Success:</strong> Your data has been saved successfully!'
                });

                // Đóng modal bằng API Bootstrap
                var modal = $('#addEditModal');
                var bsModal = bootstrap.Modal.getInstance(modal[0]); // Sử dụng getInstance thay vì new
                bsModal.hide(); // Đóng modal

            }, 1000);
        });
    </script>
@endpush
