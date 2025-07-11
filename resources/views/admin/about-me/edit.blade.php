{{-- resources/views/admin/about-me/edit.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Chỉnh Sửa About Me')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0">{{ $aboutMe ? 'Chỉnh Sửa' : 'Thêm' }} About Me</h1>
            <p class="text-muted">Cập nhật thông tin giới thiệu về bản thân</p>
        </div>
        <a href="{{ route('admin.about-me.index') }}" class="btn btn-outline-secondary">
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
                    Chỉnh Sửa Nội Dung
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.about-me.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="content" class="form-label">Nội Dung About Me <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('content') is-invalid @enderror"
                                  id="content"
                                  name="content"
                                  rows="15"
                                  placeholder="Viết về bản thân, kinh nghiệm, kỹ năng, sở thích...">{{ old('content', $aboutMe->content ?? '') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">
                            <i class="fas fa-info-circle me-1"></i>
                            Bạn có thể sử dụng các dòng mới để tạo đoạn văn. HTML sẽ được hiển thị như text thường.
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>
                            {{ $aboutMe ? 'Cập Nhật' : 'Lưu' }}
                        </button>
                        <a href="{{ route('admin.about-me.index') }}" class="btn btn-outline-secondary">
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
                    Gợi Ý Viết About Me
                </h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <h6><i class="fas fa-list me-1"></i> Nên bao gồm:</h6>
                    <ul class="mb-0 small">
                        <li>Giới thiệu ngắn gọn về bản thân</li>
                        <li>Kinh nghiệm làm việc</li>
                        <li>Kỹ năng chuyên môn</li>
                        <li>Sở thích, đam mê</li>
                        <li>Mục tiêu nghề nghiệp</li>
                    </ul>
                </div>

                <div class="alert alert-warning">
                    <h6><i class="fas fa-exclamation-triangle me-1"></i> Lưu ý:</h6>
                    <ul class="mb-0 small">
                        <li>Viết ngắn gọn, súc tích</li>
                        <li>Sử dụng ngôn ngữ chuyên nghiệp</li>
                        <li>Tránh thông tin cá nhân nhạy cảm</li>
                        <li>Kiểm tra chính tả trước khi lưu</li>
                    </ul>
                </div>

                <div class="mt-3">
                    <h6>Ví dụ mẫu:</h6>
                    <small class="text-muted">
                        "Xin chào! Tôi là một Full-stack Developer với 3 năm kinh nghiệm trong việc phát triển ứng dụng web sử dụng Laravel, PHP, JavaScript và Vue.js..."
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
