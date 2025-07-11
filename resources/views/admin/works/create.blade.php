{{-- resources/views/admin/works/create.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Thêm Dự Án')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0">Thêm Dự Án Mới</h1>
            <p class="text-muted">Tạo một dự án mới cho portfolio</p>
        </div>
        <a href="{{ route('admin.works.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Quay Lại
        </a>
    </div>
</div>

<form action="{{ route('admin.works.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        Thông Tin Dự Án
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Tên Dự Án <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                               id="title" name="title" value="{{ old('title') }}"
                               placeholder="Ví dụ: E-commerce Website">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Danh Mục <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('category') is-invalid @enderror"
                               id="category" name="category" value="{{ old('category') }}"
                               placeholder="Ví dụ: Web Development, Mobile App, Frontend Design">
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Mô Tả <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description" name="description" rows="6"
                                  placeholder="Mô tả chi tiết về dự án, công nghệ sử dụng, tính năng chính...">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="project_link" class="form-label">Link Dự Án</label>
                        <input type="url" class="form-control @error('project_link') is-invalid @enderror"
                               id="project_link" name="project_link" value="{{ old('project_link') }}"
                               placeholder="https://github.com/username/project">
                        @error('project_link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-images me-2"></i>
                        Hình Ảnh
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="thumbnail_image" class="form-label">Ảnh Thumbnail <span class="text-danger">*</span></label>
                        <input type="file" class="form-control @error('thumbnail_image') is-invalid @enderror"
                               id="thumbnail_image" name="thumbnail_image" accept="image/*">
                        @error('thumbnail_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Ảnh hiển thị trong danh sách dự án</div>
                    </div>

                    <div class="mb-3">
                        <label for="gallery_image" class="form-label">Ảnh Gallery <span class="text-danger">*</span></label>
                        <input type="file" class="form-control @error('gallery_image') is-invalid @enderror"
                               id="gallery_image" name="gallery_image" accept="image/*">
                        @error('gallery_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Ảnh hiển thị trong lightbox (kích thước lớn)</div>
                    </div>

                    <div class="mb-3">
                        <label for="thumbnail_2x" class="form-label">Ảnh Thumbnail 2x</label>
                        <input type="file" class="form-control @error('thumbnail_2x') is-invalid @enderror"
                               id="thumbnail_2x" name="thumbnail_2x" accept="image/*">
                        @error('thumbnail_2x')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Ảnh retina cho màn hình HD (tùy chọn)</div>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-cog me-2"></i>
                        Cài Đặt
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="sort_order" class="form-label">Thứ Tự Hiển Thị <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                               id="sort_order" name="sort_order" value="{{ old('sort_order', 1) }}" min="0">
                        @error('sort_order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Số nhỏ hơn sẽ hiển thị trước</div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1"
                               {{ old('is_active', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">
                            Kích hoạt dự án
                        </label>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Lưu Dự Án
                </button>
                <a href="{{ route('admin.works.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i>Hủy
                </a>
            </div>
        </div>
    </div>
</form>
@endsection
