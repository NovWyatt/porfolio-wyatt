@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h1 class="h3 mb-0">Dashboard</h1>
        <p class="text-muted">Chào mừng trở lại, {{ Auth::user()->name }}!</p>
    </div>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card stat-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title text-uppercase mb-0">Tổng Dự Án</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $totalProjects }}</span>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-briefcase stat-card-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card" style="background: linear-gradient(135deg, #10b981, #059669); color: white;">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title text-uppercase mb-0">Dự Án Active</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $activeProjects }}</span>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check-circle stat-card-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card" style="background: linear-gradient(135deg, #f59e0b, #d97706); color: white;">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title text-uppercase mb-0">Social Links</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $totalSocials }}</span>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-share-alt stat-card-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card" style="background: linear-gradient(135deg, #ef4444, #dc2626); color: white;">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="card-title text-uppercase mb-0">Thông Tin Liên Hệ</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $totalContacts }}</span>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-address-book stat-card-icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-rocket me-2"></i>
                    Thao Tác Nhanh
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.works.create') }}" class="btn btn-primary w-100">
                            <i class="fas fa-plus me-2"></i>
                            Thêm Dự Án Mới
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.about-me.edit') }}" class="btn btn-outline-primary w-100">
                            <i class="fas fa-edit me-2"></i>
                            Sửa About Me
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.socials.create') }}" class="btn btn-outline-success w-100">
                            <i class="fas fa-share-alt me-2"></i>
                            Thêm Social Link
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('portfolio.index') }}" target="_blank" class="btn btn-outline-info w-100">
                            <i class="fas fa-eye me-2"></i>
                            Xem Portfolio
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Projects -->
<div class="row">
    <div class="col-lg-8 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="fas fa-briefcase me-2"></i>
                    Dự Án Gần Đây
                </h5>
                <a href="{{ route('admin.works.index') }}" class="btn btn-sm btn-outline-primary">
                    Xem Tất Cả
                </a>
            </div>
            <div class="card-body">
                @php
                    $recentProjects = \App\Models\Work::latest()->take(5)->get();
                @endphp

                @if($recentProjects->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tên Dự Án</th>
                                    <th>Danh Mục</th>
                                    <th>Trạng Thái</th>
                                    <th>Ngày Tạo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentProjects as $project)
                                <tr>
                                    <td>
                                        <strong>{{ $project->title }}</strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary">{{ $project->category }}</span>
                                    </td>
                                    <td>
                                        @if($project->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $project->created_at->format('d/m/Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-briefcase fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Chưa có dự án nào.</p>
                        <a href="{{ route('admin.works.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>
                            Thêm Dự Án Đầu Tiên
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-4 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    Thông Tin Hệ Thống
                </h5>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-3">
                        <div class="d-flex justify-content-between">
                            <span><i class="fas fa-calendar me-2 text-primary"></i>Hôm nay:</span>
                            <strong>{{ now()->format('d/m/Y') }}</strong>
                        </div>
                    </li>
                    <li class="mb-3">
                        <div class="d-flex justify-content-between">
                            <span><i class="fas fa-user me-2 text-success"></i>Đăng nhập:</span>
                            <strong>{{ Auth::user()->name }}</strong>
                        </div>
                    </li>
                    <li class="mb-3">
                        <div class="d-flex justify-content-between">
                            <span><i class="fas fa-server me-2 text-info"></i>Laravel:</span>
                            <strong>{{ app()->version() }}</strong>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex justify-content-between">
                            <span><i class="fas fa-database me-2 text-warning"></i>PHP:</span>
                            <strong>{{ phpversion() }}</strong>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-lightbulb me-2"></i>
                    Gợi Ý
                </h5>
            </div>
            <div class="card-body">
                <div class="alert alert-info">
                    <small>
                        <i class="fas fa-info-circle me-1"></i>
                        Hãy thường xuyên cập nhật portfolio để thu hút nhà tuyển dụng!
                    </small>
                </div>
                <div class="alert alert-warning">
                    <small>
                        <i class="fas fa-exclamation-triangle me-1"></i>
                        Nhớ backup dữ liệu định kỳ để đảm bảo an toàn.
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
