<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Message;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public $data;

    public function __construct()
    {
        $this->data = collect([
            [
                'title' => '5 Printer Wireless Terbaik 2025, Bisa Cetak dari Smartphone',
                'description' => 'Printer wireless terbaik 2025 adalah solusi untuk kebutuhan cetak dokumen di rumah maupun perkantoran. Perangkat nirkabel ini menawarkan berbagai keunggulan dibandingkan printer kabel.',
                'image' => asset('assets/images/news/5-printer-wireless-terbaik-2025.jpg'),
                'date' => '2025-02-21',
                'link' => 'https://kumparan.com/how-to-tekno/5-printer-wireless-terbaik-2025-bisa-cetak-dari-smartphone-24XmvajsFQM'
            ],
            [
                'title' => 'Brother Luncurkan Printer Laser dengan Toner Original Terhemat Rp. 190 Ribu',
                'description' => 'PT Brother International Sales Indonesia, perusahaan terkemuka dalam industri perangkat IT dari Jepang hari ini mengumumkan peluncuran Printer Laser Brother terbaru, produk terbaru dalam jajaran printer laser dengan toner original terhemat pertama di Indonesia.',
                'image' => asset('assets/images/news/brother-news.jpg'),
                'date' => '2024-03-07',
                'link' => 'https://economicreview.id/brother-luncurkan-printer-laser-dengan-toner-original-terhemat-rp-190-ribu'
            ],
            [
                'title' => 'Cara Reset Printer Epson L31, Jangan Sampai Salah Langkah!',
                'description' => 'Epson L31 yang dibanderol Rp2 jutaan memang banyak dipilih karena harga yang relatif terjangkau, bandel, serta fitur cukup banyak. Ini adalah printer all in one yang bisa mencetak, hingga melakukan scan dan copy.',
                'image' => asset('assets/images/news/cara-reset-printer-epson-l31-jangan-sampai-salah-langkah-rwh.webp'),
                'date' => '2024-06-11',
                'link' => 'https://tekno.sindonews.com/read/1394347/123/cara-reset-printer-epson-l31-jangan-sampai-salah-langkah-1718096783'
            ],
            [
                'title' => 'Epson Luncurkan Printer Tangki Tinta Foto WiFi L8050 A4 dan L18050 A3+',
                'description' => 'Epson secara resmi meluncurkan Printer Tangki Tinta Foto Epson L8050 A4 dan Printer Tangki Tinta Foto Epson L18050 A3+ WiFi.',
                'image' => asset('assets/images/news/epson-secara-resmi-meluncurkan-produk-terbaru-berupa-printer-s1eb.jpg'),
                'date' => '2023-06-23',
                'link' => 'https://m.jpnn.com/news/epson-luncurkan-printer-tangki-tinta-foto-wifi-l8050-a4-dan-l18050-a3-ini-kelebihannya'
            ],
            [
                'title' => 'Ini Manfaat Mengganti Printer Laser ke Inkjet, Yuk Cermati',
                'description' => 'Printer laser saat ini tidak bisa dipungkiri merupakan alat cetak yang paling banyak digunakan oleh masyarakat. Termasuk para peaku bisnis yang memilih printer laser level pemula karena harga yang terjangkau.',
                'image' => asset('assets/images/news/ini-manfaat-mengganti-printer-laser-ke-inkjet-yuk-cermati-jkj.jpeg'),
                'date' => '2023-11-29',
                'link' => 'https://tekno.sindonews.com/read/1264195/123/ini-manfaat-mengganti-printer-laser-ke-inkjet-yuk-cermati-1701270689'
            ],
            [
                'title' => 'Canon Hadirkan Empat Seri Printer Ink Tank untuk Cetak Banyak dan Efisien',
                'description' => 'Canon menghadirkan jajaran printer ink tank terbarunya dengan konfigurasi empat tinta botol, yaitu PIXMA Ink Efficient G4770, G3770, G2770 dan G1737. Keempat printer terbaru ini mengandalkan kemampuan cetak banyak, efisien.',
                'image' => asset('assets/images/news/printer-ink-canon.jpg'),
                'date' => '2022-12-18',
                'link' => 'https://www.tempo.co/digital/canon-hadirkan-empat-seri-printer-ink-tank-untuk-cetak-banyak-dan-efisien-238368'
            ],
            [
                'title' => 'Tinta Epson 003 untuk Printer Apa Saja? Ini Daftarnya',
                'description' => 'Informasi tinta Epson 003 untuk printer apa saja menjadi penting diketahui. Sebab, tinta menjadi salah satu komponen printer yang dipakai untuk mencetak berbagai dokumen.',
                'image' => asset('assets/images/news/tinta-epson-003-untuk-printer-apa-saja.jpg'),
                'date' => '2022-10-10',
                'link' => 'https://kumparan.com/how-to-tekno/tinta-epson-003-untuk-printer-apa-saja-ini-daftarnya-21Lq3PEZFAa'
            ]
        ])->sortByDesc('date')->values()->all();
    }

    public function index()
    {
        $categories = Category::all();
        $products = Product::all()->take(5)->sortByDesc('created_at');
        $news = collect($this->data)->take(4);
        return view('general.index', compact('categories', 'news', 'products'));
    }
    public function product(Request $request)
    {
        $search = $request->search;
        $categorySlug = $request->category;
        if ($categorySlug) {
            $getCategory = Category::whereSlug($categorySlug)->first();
        }
        $categories = Category::all();

        $products = Product::query()
            ->when($search, fn($q) => $q->where('name', 'like', "%{$search}%"))
            ->when($categorySlug, fn($q) => $q->where('category_id', $getCategory->id))
            ->paginate(3);

        return view('general.product', compact('products', 'search', 'categories', 'categorySlug'));
    }

    public function productDetail(Product $product)
    {
        $recommendProduct = Product::whereCategoryId($product->category_id)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->limit(4)
            ->get();
        return view('general.product-detail', compact('product', 'recommendProduct'));
    }

    public function loadMoreProduct(Request $request)
    {
        $categorySlug = $request->category;
        if ($categorySlug) {
            $getCategory = Category::whereSlug($categorySlug)->first();
        }

        $products = Product::query()
        ->when($request->search, fn($q) => $q->where('name', 'like', "%{$request->search}%"))
        ->when($categorySlug, fn($q) => $q->where('category_id', $getCategory->id))
        ->paginate(3);

        return view('general.partials.product-list', compact('products'))->render();
    }

    public function aboutUs()
    {
        return view('general.about-us');
    }

    public function news()
    {
        $data = $this->data;
        return view('general.news', compact('data'));
    }

    public function contactUs()
    {
        return view('general.contact-us');
    }

    public function sendContactUs(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'telp' => 'required',
            'message' => 'required',
        ]);

        Message::create($data);

        return back()->with('success', 'Terima kasih telah menghubungi kami. Pesan Anda telah kami terima.');
    }
}
