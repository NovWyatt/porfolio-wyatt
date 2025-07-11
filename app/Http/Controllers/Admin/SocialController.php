<?php
// app/Http/Controllers/Admin/SocialController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index()
    {
        $socials = Social::orderBy('sort_order', 'asc')->get();
        return view('admin.socials.index', compact('socials'));
    }

    public function create()
    {
        return view('admin.socials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'platform' => 'required|string|max:255',
            'url' => 'required|url',
            'sort_order' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        Social::create($data);

        return redirect()->route('admin.socials.index')
            ->with('success', 'Social link đã được thêm thành công!');
    }

    public function edit(Social $social)
    {
        return view('admin.socials.edit', compact('social'));
    }

    public function update(Request $request, Social $social)
    {
        $request->validate([
            'platform' => 'required|string|max:255',
            'url' => 'required|url',
            'sort_order' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $social->update($data);

        return redirect()->route('admin.socials.index')
            ->with('success', 'Social link đã được cập nhật thành công!');
    }

    public function destroy(Social $social)
    {
        $social->delete();

        return redirect()->route('admin.socials.index')
            ->with('success', 'Social link đã được xóa thành công!');
    }
}
