{{-- resources/views/admin/about-me/index.blade.php --}}
@extends('admin.layouts.app')

@section('title', 'About Me')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 mb-0">About Me</h1>
            <p class="text-muted">Quản lý thông tin giới thiệu về bản thân</p>
        </div>
        <a href="{{ route('admin.about-me.edit') }}" class="btn btn-primary">
            <i class="fas fa-edit me-2"></i>Chỉnh Sửa
        </a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-user me-2"></i>
                    Nội Dung About Me
                </h5>
            </div>
            <div class="card-body">
                @if($aboutMe)
                    <div class="content-preview p-4 bg-light rounded">
                        {!! nl2br(e($aboutMe->content)) !!}
                    </div>
                    <div class="mt-3">
                        <small class="text-muted">
                            <i class="fas fa-clock me-1"></i>
                            Cập nhật lần cuối: {{ $aboutMe->updated_at->format('d/m/Y H:i') }}
                        </small>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-user-plus fa-3x text-muted mb-3"></i>
                        <h5>Chưa có nội dung About Me</h5>
                        <p class="text-muted">Hãy thêm thông tin giới thiệu về bản thân để hoàn thiện portfolio.</p>
                        <a href="{{ route('admin.about-me.edit') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Thêm Nội Dung
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

