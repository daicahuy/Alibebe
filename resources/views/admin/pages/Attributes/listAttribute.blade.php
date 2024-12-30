@extends('admin.layouts.master')


{{-- ================================== --}}
{{--                 CSS                --}}
{{-- ================================== --}}

@push('css_library')
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
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
                    <div class="title-header option-title d-flex align-items-center justify-content-between">
                        <div class="title-header option-title d-flex align-items-center">
                            <div class="title-header option-title d-flex align-items-center">
                                <h5>All Attributes</h5>
                            </div>

                        </div>
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
                            <div class="d-flex align-items-center">
                                <label for="role-search" class="form-label">Search:</label>
                                <input type="search" id="role-search" class="form-control me-2">
                            </div>
                            <div class="d-flex align-items-center">
                                <label for="variant-filter" class="form-label ms-3">Filter by Variant:</label>
                                <select id="variant-filter" class="form-control">
                                    <option value="">All</option>
                                    <option value="1">Has Variant</option>
                                    <option value="0">No Variant</option>
                                </select>
                            </div>
                            <div class="d-flex align-items-center ms-3">
                                <!-- Add New Button -->
                                <a href="javascript:void(0)" class="btn btn-theme d-flex align-items-center"
                                    onclick="openAddModal()">
                                    <i data-feather="plus-square"></i> Add New
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive category-table">
                        <table class="table all-package theme-table" id="table_id">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Variant</th>
                                    <th>Active</th>
                                    <th>Value</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Option</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Color</td>
                                    <td class="cursor-pointer">
                                        <div class="col-sm-10">
                                            <div class="form-check form-switch ps-0"><label class="switch"><input
                                                        type="checkbox" id="status" formcontrolname="status"
                                                        class="  "><span class="switch-state"></span></label></div>
                                        </div>
                                    </td>
                                    <td class="cursor-pointer">
                                        <div class="col-sm-10">
                                            <div class="form-check form-switch ps-0"><label class="switch"><input
                                                        type="checkbox" id="status" formcontrolname="status"
                                                        class="  "><span class="switch-state"></span></label></div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.Attributes.Value') }}"> <i class="fa fa-eye"></i></a>
                                    </td>
                                    <td>01-07-2024</td>
                                    <td>01-07-2024</td>
                                    <td>
                                        <ul>
                                            <!-- Nút để mở Modal -->
                                            <li>
                                                <a href="javascript:void(0)" onclick="openEditModal()">
                                                    <!-- 1 là ID của bản ghi cần chỉnh sửa -->
                                                    <i class="ri-pencil-line"></i>
                                                </a>
                                            </li>
                                            <!-- Nút Xóa -->
                                            <li>
                                                <!-- Ví dụ để trigger modal với ID cụ thể -->
                                                <a href="javascript:void(0)" onclick="openDeleteModal(1)">
                                                    <i class="ri-delete-bin-line"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>size</td>
                                    <td class="cursor-pointer">
                                        <div class="col-sm-10">
                                            <div class="form-check form-switch ps-0"><label class="switch"><input
                                                        type="checkbox" id="status" formcontrolname="status"
                                                        class="  "><span class="switch-state"></span></label></div>
                                        </div>
                                    </td>
                                    <td class="cursor-pointer">
                                        <div class="col-sm-10">
                                            <div class="form-check form-switch ps-0"><label class="switch"><input
                                                        type="checkbox" id="status" formcontrolname="status"
                                                        class="  "><span class="switch-state"></span></label></div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.Attributes.Value') }}"> <i class="fa fa-eye"></i></a>
                                    </td>
                                    <td>01-07-2024</td>
                                    <td>01-07-2024</td>
                                    <td>
                                        <ul>
                                            <li>
                                                <!-- Nút sửa -->
                                                <a href="javascript:void(0)" onclick="openEditModal(1)">
                                                    <i class="ri-pencil-line"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <!-- Nút xóa -->
                                                <a href="javascript:void(0)" onclick="openDeleteModal(1)">
                                                    <i class="ri-delete-bin-line"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <nav class="custom-pagination"><app-pagination>
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled"><a href="javascript:void(0)" tabindex="-1"
                                        aria-disabled="true" class="page-link"><i class="ri-arrow-left-s-line"></i></a>
                                </li>
                                <li class="page-item active"><a href="javascript:void(0)" class="page-link">1</a></li>
                                <!---->
                                <li class="page-item disabled"><a href="javascript:void(0)" class="page-link"><i
                                            class="ri-arrow-right-s-line"></i></a></li>
                            </ul><!---->
                        </app-pagination></nav>
                </div>
            </div>
            <!-- Modal for Add and Edit -->
            <div class="modal fade" id="attributeModal" tabindex="-1" aria-labelledby="attributeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitle">Add/Edit Attribute</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form id="attributeForm">
                            <div class="modal-body">
                                <input type="hidden" id="attributeId" name="id">

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="is_variant" class="form-label">Is Variant:</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-switch ps-0"><label class="switch"><input
                                                    type="checkbox" id="status" formcontrolname="status"
                                                    class="  "><span class="switch-state"></span></label></div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="is_active" class="form-label">Is Active:</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-switch ps-0"><label class="switch"><input
                                                    type="checkbox" id="status" formcontrolname="status"
                                                    class="  "><span class="switch-state"></span></label></div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" id="modalActionButton" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Modal Confirm Delete -->
            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center">
                            <i class="ri-delete-bin-line" style="font-size: 50px; color: #ff4d4f;"></i>
                            <h3>Delete Item?</h3>
                            <p>This item will be deleted permanently. You can't undo this action.</p>
                        </div>
                        <div class="modal-footer justify-content-center">
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
    <script src="/theme/admin/assets/js/notify/index.js"></script>
@endpush

@push('js')
    <!-- Thong báo-->
    <script>
        $('#modalActionButton').click(function(event) {
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
                // Đóng modal sau khi cập nhật thông báo
                closeModal();
            }, 1000);
        });
    </script>

    <!--ADD và Edit-->
    <script>
        $(document).ready(function() {
            // Mở modal cho thêm mới
            window.openAddModal = function() {
                openModal('add');
            };

            // Mở modal cho chỉnh sửa
            window.openEditModal = function(attributeId) {
                openModal('edit', attributeId);
            };

            // Hàm mở modal
            function openModal(action, attributeId = null) {
                const modalTitle = $('#modalTitle');
                const modalActionButton = $('#modalActionButton');

                // Reset form trước khi mở modal
                $('#attributeForm')[0].reset();
                $('#attributeId').val('');

                if (action === 'add') {
                    modalTitle.text('Add Attribute');
                    modalActionButton.text('Save');
                } else if (action === 'edit') {
                    modalTitle.text('Edit Attribute');
                    modalActionButton.text('Save');

                    // Giả lập dữ liệu để chỉnh sửa (có thể thay thế bằng API thực tế)
                    const attributeData = {
                        id: attributeId,
                        name: 'Sample Name', // Thay bằng dữ liệu thực tế từ backend
                        is_variant: 1,
                        is_active: 1,
                    };

                    // Điền dữ liệu vào form
                    $('#attributeId').val(attributeData.id);
                    $('#name').val(attributeData.name);
                    $('#is_variant').val(attributeData.is_variant);
                    $('#is_active').val(attributeData.is_active);
                }

                // Hiển thị modal
                $('#attributeModal').modal('show');
            }

            // Hàm đóng modal
            window.closeModal = function() {
                $('#attributeModal').modal('hide');
            };
        });
    </script>

    <!--modal xoa-->
    <script>
        // Mở Modal Xóa
        function openDeleteModal() {
            // Mở modal bằng Bootstrap Modal với jQuery
            $('#confirmDeleteModal').modal('show');

            // Gán hành động xóa cho nút "Xóa"
            $('#confirmDeleteButton').off('click').on('click', function() {
                deleteAttributeValue(); // Gọi hàm xóa khi nhấn "Xóa"
            });
        }

        // Xử lý khi nhấn nút "Xóa"
        function deleteAttributeValue() {
            // Hiển thị thông báo thành công bằng thư viện notify
            var notify = $.notify('<i class="fas fa-bell"></i> <strong>Đang xử lý...</strong>', {
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

            // Cập nhật thông báo thành công sau 1 giây
            setTimeout(function() {
                notify.update({
                    type: 'success',
                    message: '<i class="fas fa-check-circle"></i> <strong>Thành công:</strong> Mục đã được xóa!'
                });

                // Đóng modal xóa
                $('#confirmDeleteModal').modal('hide');
            }, 1000);
        }
    </script>
@endpush
