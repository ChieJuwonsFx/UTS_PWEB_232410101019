<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private $nostalgia = [
        [
            'judul' => 'SpongeBob SquarePants',
            'kategori' => 'Kartun',
            'tahun' => '1999',
            'deskripsi' => 'SpongeBob SquarePants (atau lebih dikenal sebagai SpongeBob saja) adalah seri animasi terpopuler di jaringan Nickelodeon.',
            'link' => 'https://id.wikipedia.org/wiki/SpongeBob_SquarePants'
        ],
        [
            'judul' => 'Upin & Ipin',
            'kategori' => 'Kartun',
            'tahun' => '2007',
            'deskripsi' => 'Upin & Ipin adalah sebuah serial televisi animasi kartun anak-anak Malaysia yang dirilis pada tanggal 14 September 2007 yang ditayangkan di TV9, RTM2, MNCTV, RCTI dan Kids TV, serta melalui layanan video streaming Disney+ Hotstar dan Netflix. ',
            'link' => 'https://id.wikipedia.org/wiki/Upin_%26_Ipin'
        ],
        [
            'judul' => 'Tom and Jerry',
            'kategori' => 'Kartun',
            'tahun' => '1940',
            'deskripsi' => 'Tom and Jerry adalah sebuah serial animasi asal Amerika Serikat produksi MGM, yang bercerita tentang seekor kucing yang bernama Tom, dan seekor tikus yang bernama Jerry yang selalu bertengkar. ',
            'link' => 'https://id.wikipedia.org/wiki/Tom_and_Jerry'
        ],

        [
            'judul' => 'Dragon Ball Z',
            'kategori' => 'Kartun',
            'tahun' => '1989',
            'deskripsi' => 'Dragon Ball Z (Jepang: ドラゴンボールゼット, Hepburn: Doragon Bōru Zetto, biasanya disingkat DBZ) adalah sebuah seri televisi animasi Jepang yang diproduksi oleh Toei Animation.',
            'link' => 'https://id.wikipedia.org/wiki/Dragon_Ball_Z'
        ],

        [
            'judul' => 'Angry Birds',
            'kategori' => 'Permainan',
            'tahun' => '2009',
            'deskripsi' => 'Angry Birds adalah permainan video yang pada awalnya tersedia untuk aplikasi iPad dan iPhone, namun kini telah dirilis di berbagai media. ',
            'link' => 'https://id.wikipedia.org/wiki/Angry_Birds'
        ],
        [
            'judul' => 'Tetris',
            'kategori' => 'Permainan',
            'tahun' => '1984',
            'deskripsi' => 'Tetris (bahasa Rusia: Тетрис (dibaca tʲetrʲɪs atauˈtetrʲɪs) adalah teka-teki yang didesain dan diprogram oleh Alexey Pajitnov pada 1984, pada saat ia bekerja di Pusat Komputer Dorodnicyn di Akademi Sains Uni Soviet di Moskow.',
            'link' => 'https://id.wikipedia.org/wiki/Tetris'
        ],
        [
            'judul' => 'Super Mario Bros.',
            'kategori' => 'Permainan',
            'tahun' => '1985',
            'deskripsi' => 'Super Mario Bros.[b] adalah suatu permainan platform yang dikembangkan dan diterbitkan oleh Nintendo pada akhir 1985 untuk konsol Nintendo Entertainment System. ',
            'link' => 'https://id.wikipedia.org/wiki/Super_Mario_Bros.'
        ],

        [
            'judul' => 'Bohemian Rhapsody',
            'kategori' => 'Lagu',
            'tahun' => '1975',
            'deskripsi' => '"Bohemian Rhapsody" adalah sebuah lagu oleh band rock asal Inggris, Queen. Lagu tersebut ditulis oleh Freddie Mercury untuk album A Night at the Opera (1975).',
            'link' => 'https://id.wikipedia.org/wiki/Bohemian_Rhapsody'
        ],
        [
            'judul' => 'Imagine',
            'kategori' => 'Lagu',
            'tahun' => '1971',
            'deskripsi' => '"Imagine" adalah sebuah lagu oleh John Lennon, yang muncul dalam albumnya yang terbit pada 1971, Imagine.',
            'link' => 'https://id.wikipedia.org/wiki/Imagine_(lagu)'
        ],
        [
            'judul' => 'Smells Like Teen Spirit',
            'kategori' => 'Lagu',
            'tahun' => '1991',
            'deskripsi' => '"Smells Like Teen Spirit" adalah lagu dari grup musik rock asal Amerika Serikat, Nirvana. Lagu ini adalah lagu pembuka dan singel pertama dari album kedua mereka, Nevermind yang dirilis melalui DGC Records.',
            'link' => 'https://id.wikipedia.org/wiki/Smells_Like_Teen_Spirit'
        ]
    ];

    public function login()
    {
        return view('login');
    }

    public function loginReq(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:4|max:20',
            'password' => 'required|string|min:6',
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.string' => 'Username harus berupa teks.',
            'username.min' => 'Username minimal 4 karakter.',
            'username.max' => 'Username maksimal 20 karakter.',
            'password.required' => 'Password wajib diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password minimal 6 karakter.'
        ]);
        
        session(['user' => [
            'username' => $request->username, 'lastLogin' => now(),
        ]]);

        $username = $request->username;

        return redirect()->route('dashboard', compact('username'));
    }



    public function dashboard(Request $request)
    {
        $username = $request->query('username');
        
        if (!session()->has('user')) {
            return redirect()->route('login');
        }
    
        $kategori = $request->get('kategori', 'Semua');
    
        $nostalgias = $kategori === 'Semua' 
            ? $this->nostalgia 
            : array_filter($this->nostalgia, fn($item) => $item['kategori'] === $kategori);
    
        return view('dashboard', compact('username', 'nostalgias'));
    }


    public function pengelolaan(Request $request)
    {
        if (!session()->has('user')) {
            return redirect()->route('login');
        }

        $username = $request->query('username');
        $nostalgias = $this->nostalgia;
        $totalNostalgia = count($this->nostalgia);

        return view('pengelolaan', compact('nostalgias', 'totalNostalgia', 'username'));
    }

    public function pengelolaanCreate(Request $request)
    {
        $username = $request->query('username');
        return view('createNostalgia', compact('username'));
    }

    public function pengelolaanStore(Request $request)
    {
        $username = $request->query('username');
        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required|string|max:100',
            'tahun' => 'required|numeric|digits:4|between:1900,' . date('Y'),
            'deskripsi' => 'required|string|min:10|max:1000',
            'link' => 'required|url|active_url',
        ], [
            'judul.required' => 'Judul nostalgia wajib diisi.',
            'judul.max' => 'Judul nostalgia tidak boleh lebih dari 255 karakter.',
            'kategori.required' => 'Kategori nostalgia wajib diisi.',
            'kategori.string' => 'Kategori harus berupa teks.',
            'kategori.max' => 'Kategori tidak boleh lebih dari 100 karakter.',
            'tahun.required' => 'Tahun nostalgia wajib diisi.',
            'tahun.numeric' => 'Tahun harus berupa angka.',
            'tahun.digits' => 'Tahun harus terdiri dari 4 digit.',
            'tahun.between' => 'Tahun harus berada di antara 1900 dan tahun ini.',
            'deskripsi.required' => 'Deskripsi nostalgia wajib diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
            'deskripsi.min' => 'Deskripsi minimal terdiri dari 10 karakter.',
            'deskripsi.max' => 'Deskripsi tidak boleh lebih dari 1000 karakter.',
            'link.required' => 'Link Wikipedia wajib diisi.',
            'link.url' => 'Link harus berupa URL yang valid.',
            'link.active_url' => 'Link harus mengarah ke URL yang aktif.',
        ]);
        return redirect()->route('pengelolaan', compact('username'))->with('alert', 'Data Berhasil Ditambahkan');
    }

    public function profile(Request $request)
    {
        $username = $request->query('username');

        if (!session()->has('user')) {
            return redirect()->route('login');
        }

        $nostalgia = $this->nostalgia;

        $kategoriCount = array_count_values(array_column($nostalgia, 'kategori'));
        arsort($kategoriCount);
        $kategoriFavorit = array_key_first($kategoriCount);

        $pertama = $nostalgia[0];

        $jumlah = count($nostalgia);
        if ($jumlah >= 10) {
            $levelNostalgia = 'Legenda Nostalgia';
            $levelDesc = 'Punya koleksi nostalgia buanyak banget bused';
        } elseif ($jumlah >= 5) {
            $levelNostalgia = 'Penggemar Setia';
            $levelDesc = 'Mulai konsisten mengenang masa kecil ye';
        } else {
            $levelNostalgia = 'Pemula Nostalgia';
            $levelDesc = 'Baru mulai menjelajahi kenangan lama';
        }

        $faktaList = [
            'Tahukah kamu? Lagu "Bohemian Rhapsody" durasinya lebih panjang dari kebanyakan TikTok kamu',
            'Tetris dulu dimainkan di Game Boy, sekarang kamu kamu bisa main dimana aja',
            'SpongeBob dulu tayang sore, sekarang kamu nontonnya sambil makan',
            'Dulu main Super Mario bareng teman, sekarang bareng nostalgia doang',
            'Kalau kamu ingat "Smells Like Teen Spirit", berarti kamu setidaknya nostalgia anak 90-an.'
        ];
        $faktaRandom = $faktaList[array_rand($faktaList)];
    
        return view('profile', compact('nostalgia', 'kategoriFavorit', 'pertama', 'levelNostalgia', 'levelDesc', 'faktaRandom', 'username'));
    }


    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return redirect('login');
    }
}
