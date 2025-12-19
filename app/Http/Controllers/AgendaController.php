<?php
namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Media;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = Agenda::with('media')
            ->orderBy('tanggal_mulai', 'desc')
            ->paginate(10);

        return view('pages.agenda.index', compact('agenda'));
    }

    public function create()
    {
        return view('pages.agenda.create');
    }

    // ==================== STORE AGENGA ====================
    public function store(Request $request)
    {
        $request->validate([
            'judul'           => 'required|string|max:255',
            'lokasi'          => 'required|string|max:255',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'penyelenggara'   => 'required|string|max:255',
            'deskripsi'       => 'required|string',
            'poster_dokumen'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $agenda = Agenda::create($request->except('poster_dokumen'));

        // ================= SIMPAN POSTER KE MEDIA =================
        if ($request->hasFile('poster_dokumen')) {
            $file = $request->file('poster_dokumen');

            $namaFile = time() . '_' . $file->getClientOriginalName();
            $mime     = $file->getMimeType();

            $file->move(public_path('uploads/agenda'), $namaFile);

            Media::create([
                'ref_table'  => 'agenda',
                'ref_id'     => $agenda->agenda_id,
                'file_name'  => $namaFile,
                'mime_type'  => $mime,
                'sort_order' => 0,
            ]);
        }

        return redirect()->route('agenda.index')
            ->with('success', 'Agenda berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('pages.agenda.edit', compact('agenda'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'           => 'required|string|max:255',
            'lokasi'          => 'required|string|max:255',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'penyelenggara'   => 'required|string|max:255',
            'deskripsi'       => 'required|string',
            'poster_dokumen'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $agenda = Agenda::findOrFail($id);
        $agenda->update($request->except('poster_dokumen'));

        // HAPUS POSTER LAMA JIKA ADA
        if ($request->hasFile('poster_dokumen')) {

            $oldMedia = Media::where('ref_table', 'agenda')
                ->where('ref_id', $agenda->agenda_id)
                ->first();

            if ($oldMedia) {
                $oldPath = public_path('uploads/agenda/' . $oldMedia->file_name);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
                $oldMedia->delete();
            }

            $file     = $request->file('poster_dokumen');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $mime     = $file->getMimeType();

            $file->move(public_path('uploads/agenda'), $namaFile);

            Media::create([
                'ref_table'  => 'agenda',
                'ref_id'     => $agenda->agenda_id,
                'file_name'  => $namaFile,
                'mime_type'  => $mime,
                'sort_order' => 0,
            ]);
        }

        return redirect()->route('agenda.index')
            ->with('success', 'Agenda berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);

        $mediaFiles = Media::where('ref_table', 'agenda')
            ->where('ref_id', $agenda->agenda_id)
            ->get();

        foreach ($mediaFiles as $m) {
            $filePath = public_path('uploads/agenda/' . $m->file_name);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $m->delete();
        }

        $agenda->delete();

        return redirect()->route('agenda.index')
            ->with('success', 'Agenda berhasil dihapus!');
    }

}
