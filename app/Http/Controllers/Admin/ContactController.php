<?php
// app/Http/Controllers/Admin/ContactController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('sort_order', 'asc')->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('admin.contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|in:email,phone,address',
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'sort_order' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        Contact::create($data);

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Thông tin liên hệ đã được thêm thành công!');
    }

    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'type' => 'required|string|in:email,phone,address',
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'sort_order' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $contact->update($data);

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Thông tin liên hệ đã được cập nhật thành công!');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Thông tin liên hệ đã được xóa thành công!');
    }
}
