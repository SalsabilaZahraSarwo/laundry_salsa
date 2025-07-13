<?php

namespace App\Http\Controllers;

use App\Models\SalsabilaService;
use Illuminate\Http\Request;

class SalsabilaServiceController extends Controller
{
    public function index()
    {
        $services = SalsabilaService::all();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('name', 'description', 'price');

        // simpan file gambar jika ada
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/services'), $filename);
            $data['image'] = $filename;
        }

        SalsabilaService::create($data);

        return redirect('/admin/services')->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $service = SalsabilaService::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = SalsabilaService::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('name', 'description', 'price');

        // jika ada file baru diupload
        if ($request->hasFile('image')) {
            // hapus gambar lama
            if ($service->image && file_exists(public_path('uploads/services/' . $service->image))) {
                unlink(public_path('uploads/services/' . $service->image));
            }

            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/services'), $filename);
            $data['image'] = $filename;
        }

        $service->update($data);

        return redirect('/admin/services')->with('success', 'Layanan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $service = SalsabilaService::findOrFail($id);

        // hapus file gambar jika ada
        if ($service->image && file_exists(public_path('uploads/services/' . $service->image))) {
            unlink(public_path('uploads/services/' . $service->image));
        }

        $service->delete();

        return redirect('/admin/services')->with('success', 'Layanan berhasil dihapus');
    }
}
