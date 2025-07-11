{{-- resources/views/admin/works/edit.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'Chỉnh Sửa Dự Án')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0">Chỉnh Sửa Dự Án</h1>
            <p class="text-muted">Cập nhật thông tin dự án: {{ $work->title }}</p>
        </div>
        <a href="{{ route('admin.works.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Quay Lại
        </a>
    </div>
</div>

<form action="{{ route('admin.works.update', $work) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
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
                               id="title" name="title" value="{{ old('title', $work->title) }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Danh Mục <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('category') is-invalid @enderror"
                               id="category" name="category" value="{{ old('category', $work->category) }}">
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Mô Tả <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description" name="description" rows="6">{{ old('description', $work->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="project_link" class="form-label">Link Dự Án</label>
                        <input type="url" class="form-control @error('project_link') is-invalid @enderror"
                               id="project_link" name="project_link" value="{{ old('project_link', $work->project_link) }}">
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
                    <!-- Current Thumbnail -->
                    @if($work->thumbnail_image)
                        <div class="mb-3">
                            <label class="form-label">Ảnh Thumbnail Hiện Tại</label>
                            <div>
                                <img src="{{ asset('storage/' . $work->thumbnail_image) }}"
                                     alt="Current thumbnail" class="img-fluid rounded" style="max-height: 100px;">
                            </div>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="thumbnail_image" class="form-label">Ảnh Thumbnail Mới</label>
                        <input type="file" class="form-control @error('thumbnail_image') is-invalid @enderror"
                               id="thumbnail_image" name="thumbnail_image" accept="image/*">
                        @error('thumbnail_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Để trống nếu không muốn thay đổi</div>
                    </div>

                    <div class="mb-3">
                        <label for="gallery_image" class="form-label">Ảnh Gallery Mới</label>
                        <input type="file" class="form-control @error('gallery_image') is-invalid @enderror"
                               id="gallery_image" name="gallery_image" accept="image/*">
                        @error('gallery_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="thumbnail_2x" class="form-label">Ảnh Thumbnail 2x Mới</label>
                        <input type="file" class="form-control @error('thumbnail_2x') is-invalid @enderror"
                               id="thumbnail_2x" name="thumbnail_2x" accept="image/*">
                        @error('thumbnail_2x')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
                               id="sort_order" name="sort_order" value="{{ old('sort_order', $work->sort_order) }}" min="0">
                        @error('sort_order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1"
                               {{ old('is_active', $work->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">
                            Kích hoạt dự án
                        </label>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Cập Nhật
                </button>
                <a href="{{ route('admin.works.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i>Hủy
                </a>
            </div>
        </div>
    </div>
</form>
@endsection
