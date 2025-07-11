
{{-- resources/views/admin/socials/index.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Social Links')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0">Social Links</h1>
            <p class="text-muted">Quản lý các liên kết mạng xã hội</p>
        </div>
        <a href="{{ route('admin.socials.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Thêm Social Link
        </a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-share-alt me-2"></i>
                    Danh Sách Social Links ({{ $socials->count() }})
                </h5>
            </div>
            <div class="card-body">
                @if($socials->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nền Tảng</th>
                                    <th>URL</th>
                                    <th>Thứ Tự</th>
                                    <th>Trạng Thái</th>
                                    <th>Ngày Tạo</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($socials as $social)
                                <tr>
                                    <td>
                                        <strong>{{ $social->platform }}</strong>
                                    </td>
                                    <td>
                                        <a href="{{ $social->url }}" target="_blank" class="text-decoration-none">
                                            {{ Str::limit($social->url, 40) }}
                                            <i class="fas fa-external-link-alt ms-1 text-primary"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $social->sort_order }}</span>
                                    </td>
                                    <td>
                                        @if($social->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $social->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.socials.edit', $social) }}"
                                               class="btn btn-outline-primary" title="Chỉnh sửa">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-outline-danger"
                                                    onclick="deleteSocial({{ $social->id }})" title="Xóa">
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
                        <i class="fas fa-share-alt fa-3x text-muted mb-3"></i>
                        <h5>Chưa có social link nào</h5>
                        <p class="text-muted">Thêm các liên kết mạng xã hội để người xem có thể kết nối với bạn.</p>
                        <a href="{{ route('admin.socials.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Thêm Social Link Đầu Tiên
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
                <p>Bạn có chắc chắn muốn xóa social link này?</p>
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
function deleteSocial(socialId) {
    const form = document.getElementById('deleteForm');
    form.action = `/admin/socials/${socialId}`;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
</script>
@endpush
