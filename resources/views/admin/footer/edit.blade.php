{{-- resources/views/admin/footer/edit.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Chỉnh Sửa Footer')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0">{{ $footer ? 'Chỉnh Sửa' : 'Thêm' }} Footer</h1>
            <p class="text-muted">Cập nhật nội dung footer của website</p>
        </div>
        <a href="{{ route('admin.footer.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Quay Lại
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-edit me-2"></i>
                    Chỉnh Sửa Nội Dung Footer
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.footer.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="content" class="form-label">Nội Dung Footer <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('content') is-invalid @enderror"
                                  id="content"
                                  name="content"
                                  rows="8"
                                  placeholder="Ví dụ: © 2025 Wyatt. All rights reserved.">{{ old('content', $footer->content ?? '') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">
                            <i class="fas fa-info-circle me-1"></i>
                            Footer thường chứa thông tin bản quyền, liên kết hoặc thông tin liên hệ ngắn gọn.
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>
                            {{ $footer ? 'Cập Nhật' : 'Lưu' }}
                        </button>
                        <a href="{{ route('admin.footer.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-times me-2"></i>Hủy
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-lightbulb me-2"></i>
                    Gợi Ý Footer
                </h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <h6><i class="fas fa-list me-1"></i> Nên bao gồm:</h6>
                    <ul class="mb-0 small">
                        <li>Thông tin bản quyền</li>
                        <li>Năm hiện tại</li>
                        <li>Tên hoặc thương hiệu</li>
                        <li>Link đến chính sách (tùy chọn)</li>
                    </ul>
                </div>

                <div class="alert alert-success">
                    <h6><i class="fas fa-magic me-1"></i> Ví dụ mẫu:</h6>
                    <div class="small">
                        <p class="mb-1">© 2025 Wyatt. All rights reserved.</p>
                        <p class="mb-1">Made with ❤️ in Vietnam</p>
                        <p class="mb-0">© 2025 Portfolio Website. Designed by Wyatt</p>
                    </div>
                </div>

                <div class="alert alert-warning">
                    <h6><i class="fas fa-exclamation-triangle me-1"></i> Lưu ý:</h6>
                    <ul class="mb-0 small">
                        <li>Giữ nội dung ngắn gọn</li>
                        <li>Sử dụng năm hiện tại</li>
                        <li>Kiểm tra chính tả</li>
                        <li>Có thể sử dụng emoji</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-eye me-2"></i>
                    Preview
                </h5>
            </div>
            <div class="card-body">
                <div id="footer-preview" class="text-center p-3 bg-dark text-light rounded">
                    @if($footer)
                        {!! nl2br(e($footer->content)) !!}
                    @else
                        <em>Chưa có nội dung footer</em>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('content').addEventListener('input', function() {
    const content = this.value || 'Chưa có nội dung footer';
    const preview = document.getElementById('footer-preview');
    preview.innerHTML = content.replace(/\n/g, '<br>') || '<em>Chưa có nội dung footer</em>';
});
</script>
@endpush
