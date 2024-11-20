<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;
use App\Models\Fakultas;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;
    public $fakultasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
        $this->fakultasModel = new Fakultas(); // Inisialisasi model Fakultas
    }

    // List user
    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser (),
        ];

        return view('list_user', $data);
    }

    // Profile user berdasarkan parameter
    public function profile($nama = "", $kelas = "", $npm = "")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm
        ];

        return view('profile', $data);
    }

    // Form untuk membuat user
    public function create()
    {
        $kelas = $this->kelasModel->getKelas();
        $fakultas = $this->fakultasModel->all(); // Ambil semua fakultas dari database
        $data = [  
            'title' => 'Create User',
            'kelas' => $kelas,
            'fakultas' => $fakultas, // Tambahkan fakultas ke data yang dikirim
        ];

        return view('create_user', $data);
    }

    // Menyimpan data user
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'jurusan' => 'required|in:fisika,kimia,biologi,matematika,ilmu komputer',
            'semester' => 'required|integer|min:1|max:14',
            'fakultas_id' => 'required|exists:fakultas,id', // Validasi fakultas_id harus ada di tabel fakultas
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Proses upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $filename, 'public');
        } else {
            $filename = null; // Jika tidak ada foto yang diupload
        }

        // Simpan data user ke database
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'kelas_id' => $request->input('kelas_id'),
            'jurusan' => $request->input('jurusan'),
            'semester' => $request->input('semester'),
            'fakultas_id' => $request->input('fakultas_id'),
            'foto' => $filename,
        ]);

        // Redirect ke halaman list user setelah berhasil menyimpan data
        return redirect()->route('user.list')->with('success', 'User   berhasil ditambahkan');
    }

    // Update data user berdasarkan ID
    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'jurusan' => 'required|in:fisika,kimia,biologi,matematika,ilmu komputer',
            'semester' => 'required|integer|min:1|max:14',
            'fakultas_id' => 'required|exists:fakultas,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update data user lainnya
        $user->nama = $request->nama;
        $user->kelas_id = $request->kelas_id;
        $user->jurusan = $request->jurusan;
        $user->semester = $request->semester;
        $user->fakultas_id = $request->fakultas_id;

        // Cek jika ada file foto baru
        if ($request->hasFile('foto')) {
            $oldFilename = $user->foto;

            if ($oldFilename) {
      $oldFilePath = public_path('storage/uploads/' . $oldFilename);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath); // Hapus file lama jika ada
                }
            }

            $file = $request->file('foto');
            $newFilename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $newFilename, 'public');
            $user->foto = $newFilename; // Update path foto baru
        }

        $user->save(); // Simpan perubahan ke database

        // Redirect ke halaman list user setelah berhasil update
        return redirect()->route('user.list')->with('success', 'User  berhasil diupdate');
    }

    // Menghapus user berdasarkan ID
    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);

        // Hapus file foto jika ada
        if ($user->foto) {
            $oldFilePath = public_path('storage/uploads/' . $user->foto);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath); // Hapus file foto
            }
        }

        $user->delete(); // Hapus user dari database

        // Redirect ke halaman list user setelah berhasil hapus
        return redirect()->route('user.list')->with('success', 'User  berhasil dihapus');
    }
    public function edit($id) {
        // Find the user by ID or fail if not found
        $user = UserModel::findOrFail($id);
    
        // Get list of classes
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
    
        // Get list of faculties
        $fakultasModel = new Fakultas();  // Assuming you have a Fakultas model
        $fakultas = $fakultasModel->getFakultas();  // Assuming this method exists
    
        // Set title for the page
        $title = 'Edit User';
    
        // Return the edit user view with the required data
        return view('edit_user', compact('user', 'kelas', 'fakultas', 'title'));
    }
    
    

    // Menampilkan detail user berdasarkan ID
    public function show($id)
    {
        $user = UserModel::findOrFail($id);
        $kelas = Kelas::find($user->kelas_id);
        $fakultas = Fakultas::find($user->fakultas_id); // Menampilkan fakultas

        return view('profile', [
            'title' => 'Show User',
            'user' => $user,
            'nama_kelas' => $kelas ? $kelas->nama_kelas : null,
            'nama_fakultas' => $fakultas ? $fakultas->nama_fakultas : null, // Menampilkan nama fakultas jika ada
        ]);
    }
}