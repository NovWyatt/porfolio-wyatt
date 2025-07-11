{{-- resources/views/admin/socials/create.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Thêm Social Link')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0">Thêm Social Link</h1>
            <p class="text-muted">Thêm liên kết mạng xã hội mới</p>
        </div>
        <a href="{{ route('admin.socials.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Quay Lại
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-share-alt me-2"></i>
                    Thông Tin Social Link
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.socials.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="platform" class="form-label">Nền Tảng <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('platform') is-invalid @enderror"
                                       id="platform" name="platform" value="{{ old('platform') }}"
                                       placeholder="Ví dụ: Facebook, GitHub, LinkedIn">
                                @error('platform')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sort_order" class="form-label">Thứ Tự Hiển Thị <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                                       id="sort_order" name="sort_order" value="{{ old('sort_order', 1) }}" min="0">
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="url" class="form-label">URL <span class="text-danger">*</span></label>
                        <input type="url" class="form-control @error('url') is-invalid @enderror"
                               id="url" name="url" value="{{ old('url') }}"
                               placeholder="https://facebook.com/username">
                        @error('url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1"
                                   {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Kích hoạt social link
                            </label>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Lưu Social Link
                        </button>
                        <a href="{{ route('admin.socials.index') }}" class="btn btn-outline-secondary">
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
                    Gợi Ý Nền Tảng
                </h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <h6><i class="fas fa-list me-1"></i> Nền tảng phổ biến:</h6>
                    <ul class="mb-0 small">
                        <li>GitHub</li>
                        <li>LinkedIn</li>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>YouTube</li>
                        <li>Behance</li>
                        <li>Dribbble</li>
                    </ul>
                </div>

                <div class="alert alert-warning">
                    <h6><i class="fas fa-exclamation-triangle me-1"></i> Lưu ý:</h6>
                    <ul class="mb-0 small">
                        <li>URL phải bắt đầu với http:// hoặc https://</li>
                        <li>Kiểm tra link trước khi lưu</li>
                        <li>Sử dụng thứ tự để sắp xếp hiển thị</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
