<?php
// app/Http/Controllers/Admin/AboutMeController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutMe;
use Illuminate\Http\Request;

class AboutMeController extends Controller
{
    public function index()
    {
        $aboutMe = AboutMe::first();
        return view('admin.about-me.index', compact('aboutMe'));
    }

    public function edit()
    {
        $aboutMe = AboutMe::first();
        return view('admin.about-me.edit', compact('aboutMe'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required|string'
        ]);

        $aboutMe = AboutMe::first();

        if ($aboutMe) {
            $aboutMe->update($request->only('content'));
        } else {
            AboutMe::create($request->only('content'));
        }

        return redirect()->route('admin.about-me.index')
            ->with('success', 'About Me đã được cập nhật thành công!');
    }
}
