<?php

namespace App\Http\Controllers\Admin;

use App\Models\CV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;

class CVController extends Controller
{
    public function view()
    {
        $cv = CV::getActiveCv();

        if (!$cv) {
            abort(404, 'CV not found');
        }

        return view('cv.view', compact('cv'));
    }

    public function download()
    {
        $cv = CV::getActiveCv();

        if (!$cv || !Storage::disk('public')->exists($cv->file_path)) {
            abort(404, 'CV file not found');
        }

        $filePath = Storage::disk('public')->path($cv->file_path);
        $fileName = $cv->name ?: 'CV.pdf';

        return Response::download($filePath, $fileName, [
            'Content-Type' => 'application/pdf',
        ]);
    }

    public function stream()
    {
        $cv = CV::getActiveCv();

        if (!$cv || !Storage::disk('public')->exists($cv->file_path)) {
            abort(404, 'CV file not found');
        }

        $file = Storage::disk('public')->get($cv->file_path);

        return Response::make($file, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . ($cv->name ?: 'CV.pdf') . '"'
        ]);
    }

    // Admin methods
    public function adminIndex()
    {
        $cvs = CV::latest()->get();
        return view('admin.cv.index', compact('cvs'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'cv_file' => 'required|mimes:pdf|max:10240', // 10MB max
            'name' => 'nullable|string|max:255'
        ]);

        // Deactivate all existing CVs
        CV::query()->update(['is_active' => false]);

        // Upload new CV
        $file = $request->file('cv_file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('cv', 'public');

        CV::create([
            'name' => $request->name ?: $fileName,
            'file_path' => $filePath,
            'is_active' => true,
            'uploaded_at' => now()
        ]);

        return redirect()->back()->with('success', 'CV uploaded successfully!');
    }

    public function destroy(CV $cv)
    {
        if (Storage::disk('public')->exists($cv->file_path)) {
            Storage::disk('public')->delete($cv->file_path);
        }

        $cv->delete();

        return redirect()->back()->with('success', 'CV deleted successfully!');
    }

    public function setActive(CV $cv)
    {
        // Deactivate all CVs
        CV::query()->update(['is_active' => false]);

        // Activate selected CV
        $cv->update(['is_active' => true]);

        return redirect()->back()->with('success', 'CV activated successfully!');
    }
}
