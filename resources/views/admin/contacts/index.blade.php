{{-- resources/views/admin/contacts/index.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Thông Tin Liên Hệ')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0">Thông Tin Liên Hệ</h1>
            <p class="text-muted">Quản lý các thông tin liên hệ</p>
        </div>
        <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Thêm Thông Tin Liên Hệ
        </a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-address-book me-2"></i>
                    Danh Sách Thông Tin Liên Hệ ({{ $contacts->count() }})
                </h5>
            </div>
            <div class="card-body">
                @if($contacts->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Loại</th>
                                    <th>Nhãn</th>
                                    <th>Giá Trị</th>
                                    <th>Thứ Tự</th>
                                    <th>Trạng Thái</th>
                                    <th>Ngày Tạo</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                <tr>
                                    <td>
                                        @switch($contact->type)
                                            @case('email')
                                                <span class="badge bg-primary">
                                                    <i class="fas fa-envelope me-1"></i>Email
                                                </span>
                                                @break
                                            @case('phone')
                                                <span class="badge bg-success">
                                                    <i class="fas fa-phone me-1"></i>Phone
                                                </span>
                                                @break
                                            @case('address')
                                                <span class="badge bg-info">
                                                    <i class="fas fa-map-marker-alt me-1"></i>Address
                                                </span>
                                                @break
                                            @default
                                                <span class="badge bg-secondary">{{ ucfirst($contact->type) }}</span>
                                        @endswitch
                                    </td>
                                    <td><strong>{{ $contact->label }}</strong></td>
                                    <td>
                                        @if($contact->type === 'email')
                                            <a href="mailto:{{ $contact->value }}" class="text-decoration-none">
                                                {{ $contact->value }}
                                            </a>
                                        @elseif($contact->type === 'phone')
                                            <a href="tel:{{ $contact->value }}" class="text-decoration-none">
                                                {{ $contact->value }}
                                            </a>
                                        @else
                                            {{ $contact->value }}
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $contact->sort_order }}</span>
                                    </td>
                                    <td>
                                        @if($contact->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $contact->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.contacts.edit', $contact) }}"
                                               class="btn btn-outline-primary" title="Chỉnh sửa">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-outline-danger"
                                                    onclick="deleteContact({{ $contact->id }})" title="Xóa">
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
                        <i class="fas fa-address-book fa-3x text-muted mb-3"></i>
                        <h5>Chưa có thông tin liên hệ nào</h5>
                        <p class="text-muted">Thêm thông tin liên hệ để người xem có thể kết nối với bạn.</p>
                        <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Thêm Thông Tin Đầu Tiên
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
                <p>Bạn có chắc chắn muốn xóa thông tin liên hệ này?</p>
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
function deleteContact(contactId) {
    const form = document.getElementById('deleteForm');
    form.action = `/admin/contacts/${contactId}`;
    new bootstrap.Modal(document.getElementById('deleteModal')).show();
}
</script>
@endpush
