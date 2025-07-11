<?php
// app/Http/Controllers/Admin/WorkController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    public function index()
    {
        $works = Work::orderBy('sort_order', 'asc')->get();
        return view('admin.works.index', compact('works'));
    }

    public function create()
    {
        return view('admin.works.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'thumbnail_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail_2x' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'project_link' => 'nullable|url',
            'sort_order' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();

        // Upload images
        if ($request->hasFile('thumbnail_image')) {
            $data['thumbnail_image'] = $request->file('thumbnail_image')->store('works/thumbnails', 'public');
        }

        if ($request->hasFile('gallery_image')) {
            $data['gallery_image'] = $request->file('gallery_image')->store('works/gallery', 'public');
        }

        if ($request->hasFile('thumbnail_2x')) {
            $data['thumbnail_2x'] = $request->file('thumbnail_2x')->store('works/thumbnails', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        Work::create($data);

        return redirect()->route('admin.works.index')
            ->with('success', 'Dự án đã được thêm thành công!');
    }

    public function edit(Work $work)
    {
        return view('admin.works.edit', compact('work'));
    }

    public function update(Request $request, Work $work)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'thumbnail_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail_2x' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'project_link' => 'nullable|url',
            'sort_order' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();

        // Upload new images if provided
        if ($request->hasFile('thumbnail_image')) {
            // Delete old image
            if ($work->thumbnail_image) {
                Storage::disk('public')->delete($work->thumbnail_image);
            }
            $data['thumbnail_image'] = $request->file('thumbnail_image')->store('works/thumbnails', 'public');
        }

        if ($request->hasFile('gallery_image')) {
            if ($work->gallery_image) {
                Storage::disk('public')->delete($work->gallery_image);
            }
            $data['gallery_image'] = $request->file('gallery_image')->store('works/gallery', 'public');
        }

        if ($request->hasFile('thumbnail_2x')) {
            if ($work->thumbnail_2x) {
                Storage::disk('public')->delete($work->thumbnail_2x);
            }
            $data['thumbnail_2x'] = $request->file('thumbnail_2x')->store('works/thumbnails', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        $work->update($data);

        return redirect()->route('admin.works.index')
            ->with('success', 'Dự án đã được cập nhật thành công!');
    }

    public function destroy(Work $work)
    {
        // Delete images
        if ($work->thumbnail_image) {
            Storage::disk('public')->delete($work->thumbnail_image);
        }
        if ($work->gallery_image) {
            Storage::disk('public')->delete($work->gallery_image);
        }
        if ($work->thumbnail_2x) {
            Storage::disk('public')->delete($work->thumbnail_2x);
        }

        $work->delete();

        return redirect()->route('admin.works.index')
            ->with('success', 'Dự án đã được xóa thành công!');
    }
}
