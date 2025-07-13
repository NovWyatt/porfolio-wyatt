@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Manage CV</h4>
                </div>
                <div class="card-body">
                    {{-- Upload Form --}}
                    <div class="mb-4">
                        <form action="{{ route('admin.cv.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="cv_file">Upload New CV (PDF) *</label>
                                        <input type="file" name="cv_file" id="cv_file"
                                               class="form-control @error('cv_file') is-invalid @enderror"
                                               accept=".pdf" required>
                                        @error('cv_file')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="name">Display Name</label>
                                        <input type="text" name="name" id="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               value="{{ old('name') }}" placeholder="e.g., John Doe CV">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group mb-3">
                                        <label>&nbsp;</label>
                                        <button type="submit" class="btn btn-primary d-block w-100">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- CV List --}}
                    @if($cvs->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Uploaded</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cvs as $cv)
                                    <tr class="{{ $cv->is_active ? 'table-success' : '' }}">
                                        <td>
                                            <strong>{{ $cv->name }}</strong>
                                            <br>
                                            <small class="text-muted">{{ basename($cv->file_path) }}</small>
                                        </td>
                                        <td>{{ $cv->uploaded_at->format('M d, Y H:i') }}</td>
                                        <td>
                                            @if($cv->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('cv.view') }}"
                                                   target="_blank"
                                                   class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i> View
                                                </a>

                                                <a href="{{ route('cv.download') }}"
                                                   class="btn btn-sm btn-primary">
                                                    <i class="fas fa-download"></i> Download
                                                </a>

                                                @if(!$cv->is_active)
                                                    <form action="{{ route('admin.cv.activate', $cv) }}"
                                                          method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm btn-success">
                                                            <i class="fas fa-check"></i> Activate
                                                        </button>
                                                    </form>
                                                @endif

                                                <form action="{{ route('admin.cv.destroy', $cv) }}"
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info text-center">
                            <p><i class="fas fa-info-circle"></i> No CV uploaded yet.</p>
                            <p>Upload your first CV using the form above.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
