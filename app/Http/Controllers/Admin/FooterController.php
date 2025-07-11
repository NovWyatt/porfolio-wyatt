<?php
// app/Http/Controllers/Admin/FooterController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $footer = Footer::first();
        return view('admin.footer.index', compact('footer'));
    }

    public function edit()
    {
        $footer = Footer::first();
        return view('admin.footer.edit', compact('footer'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required|string'
        ]);

        $footer = Footer::first();

        if ($footer) {
            $footer->update($request->only('content'));
        } else {
            Footer::create($request->only('content'));
        }

        return redirect()->route('admin.footer.index')
            ->with('success', 'Footer đã được cập nhật thành công!');
    }
}
