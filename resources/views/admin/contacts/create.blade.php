{{-- resources/views/admin/contacts/create.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Thêm Thông Tin Liên Hệ')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0">Thêm Thông Tin Liên Hệ</h1>
            <p class="text-muted">Thêm thông tin liên hệ mới</p>
        </div>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Quay Lại
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-address-book me-2"></i>
                    Thông Tin Liên Hệ
                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.contacts.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="type" class="form-label">Loại <span class="text-danger">*</span></label>
                                <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                                    <option value="">Chọn loại</option>
                                    <option value="email" {{ old('type') == 'email' ? 'selected' : '' }}>Email</option>
                                    <option value="phone" {{ old('type') == 'phone' ? 'selected' : '' }}>Điện thoại</option>
                                    <option value="address" {{ old('type') == 'address' ? 'selected' : '' }}>Địa chỉ</option>
                                </select>
                                @error('type')
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
                        <label for="label" class="form-label">Nhãn <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('label') is-invalid @enderror"
                               id="label" name="label" value="{{ old('label') }}"
                               placeholder="Ví dụ: Email, Điện thoại, Địa chỉ">
                        @error('label')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="value" class="form-label">Giá Trị <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('value') is-invalid @enderror"
                               id="value" name="value" value="{{ old('value') }}"
                               placeholder="Nhập email, số điện thoại hoặc địa chỉ">
                        @error('value')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1"
                                   {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Kích hoạt thông tin liên hệ
                            </label>
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Lưu Thông Tin
                        </button>
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary">
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
                    Hướng Dẫn
                </h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <h6><i class="fas fa-envelope me-1"></i> Email:</h6>
                    <p class="mb-0 small">Ví dụ: contact@example.com</p>
                </div>

                <div class="alert alert-success">
                    <h6><i class="fas fa-phone me-1"></i> Điện thoại:</h6>
                    <p class="mb-0 small">Ví dụ: +84 123 456 789</p>
                </div>

                <div class="alert alert-warning">
                    <h6><i class="fas fa-map-marker-alt me-1"></i> Địa chỉ:</h6>
                    <p class="mb-0 small">Ví dụ: Hà Nội, Việt Nam</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
