
{{-- resources/views/admin/works/index.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Quản Lý Dự Án')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0">Quản Lý Dự Án</h1>
            <p class="text-muted">Danh sách tất cả các dự án trong portfolio</p>
        </div>
        <a href="{{ route('admin.works.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Thêm Dự Án
        </a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-briefcase me-2"></i>
                    Danh Sách Dự Án ({{ $works->count() }})
                </h5>
            </div>
            <div class="card-body">
                @if($works->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên Dự Án</th>
                                    <th>Danh Mục</th>
                                    <th>Thứ Tự</th>
                                    <th>Trạng Thái</th>
                                    <th>Ngày Tạo</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($works as $work)
                                <tr>
                                    <td>
                                        @if($work->thumbnail_image)
                                            <img src="{{ asset('storage/' . $work->thumbnail_image) }}"
                                                 alt="{{ $work->title }}"
                                                 class="rounded"
                                                 style="width: 60px; height: 40px; object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                                 style="width: 60px; height: 40px;">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            <strong>{{ $work->title }}</strong>
                                            @if($work->project_link)
                                                <a href="{{ $work->project_link }}" target="_blank" class="ms-2">
                                                    <i class="fas fa-external-link-alt text-primary"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">{{ $work->category }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $work->sort_order }}</span>
                                    </td>
                                    <td>
                                        @if($work->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $work->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.works.edit', $work) }}"
                                               class="btn btn-outline-primary" title="Chỉnh sửa">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-outline-danger"
                                                    onclick="deleteWork({{ $work->id }})" title="Xóa">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-briefcase fa-3x text-muted mb-3"></i>
                        <h5>Chưa có dự án nào</h5>
                        <p class="text-muted">Hãy thêm dự án đầu tiên để bắt đầu xây dựng portfolio.</p>
                        <a href="{{ route('admin.works.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Thêm Dự Án Đầu Tiên
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Xác Nhận Xóa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa dự án này? Hành động này không thể hoàn tác.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function deleteWork(workId) {
    const form = document.getElementById('deleteForm');
    form.action = `/admin/works/${workId}`;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
</script>
@endpush
