@extends('layouts.guest')

@section('title', 'Tentang Kami')

@section('content')
<div class="px-6 sm:px-16 pt-24">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
        <div>
            <h1 class="text-5xl font-bold leading-tight mb-4">
                Solusi Terpercaya untuk Kebutuhan Kantor Anda!
            </h1>
        </div>
        <div>
            <p class="text-gray-600 text-lg">
                Nursa Jaya Comp hadir untuk menyediakan tinta, toner, dan perlengkapan kantor berkualitas tinggi dengan layanan profesional dan solusi inovatif.
            </p>
        </div>
    </div>
</div>

<div class="px-6 sm:px-16 py-20">
    <img src="{{ asset('assets/images/photo-about-us.png') }}" alt="Tentang Nursa Jaya Comp" class="w-full rounded-lg object-cover">
</div>

<div class="px-6 sm:px-16 pb-20">
    <h2 class="text-lg text-primary font-semibold mb-8">Visi</h2>
    <p class="text-secondary text-3xl font-bold">
    Menjadi penyedia utama dan terpercaya untuk tinta, toner original, dan kebutuhan alat kantor lainnya, yang dikenal karena kualitas produk, pelayanan profesional, dan solusi inovatif untuk memenuhi kebutuhan pelanggan.
    </p>

    <h2 class="text-lg text-primary font-semibold my-8">Misi</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="bg-card p-6 rounded-lg">
        <h3 class="text-6xl font-bold text-triary mb-4">1</h3>
        <p class="font-bold text-2xl text-secondary mb-2">Produk Original Berkualitas</p>
        <p class="text-secondary">Menyediakan tinta, toner original, dan alat kantor dengan kualitas terbaik serta harga yang kompetitif untuk memenuhi kebutuhan pelanggan.</p>
    </div>
    <div class="bg-card p-6 rounded-lg">
        <h3 class="text-6xl font-bold text-triary mb-4">2</h3>
        <p class="font-bold text-2xl text-secondary mb-2">Pelayanan Profesional</p>
        <p class="text-secondary">Memberikan pelayanan yang cepat, ramah, dan responsif untuk memastikan kepuasan pelanggan dalam memenuhi kebutuhan mereka.</p>
    </div>
    <div class="bg-card p-6 rounded-lg">
        <h3 class="text-6xl font-bold text-triary mb-4">3</h3>
        <p class="font-bold text-2xl text-secondary mb-2">Solusi Inovatif</p>
        <p class="text-secondary">Terus berinovasi dalam mencari solusi untuk kebutuhan pelanggan, termasuk penggunaan teknologi terbaru dan produk ramah lingkungan.</p>
    </div>
    <div class="bg-card p-6 rounded-lg">
        <h3 class="text-6xl font-bold text-triary mb-4">4</h3>
        <p class="font-bold text-2xl text-secondary mb-2">Kemitraan Kuat</p>
        <p class="text-secondary">Membangun hubungan yang erat dan saling menguntungkan dengan pelanggan, mitra bisnis, dan komunitas untuk pertumbuhan bersama.</p>
    </div>
    <div class="bg-card p-6 rounded-lg">
        <h3 class="text-6xl font-bold text-triary mb-4">5</h3>
        <p class="font-bold text-2xl text-secondary mb-2">Kontribusi Sosial</p>
        <p class="text-secondary">Berkomitmen untuk berperan aktif dalam mendukung kegiatan sosial dan lingkungan, sebagai bagian dari tanggung jawab sosial perusahaan.</p>
    </div>
    </div>
</div>

<!-- Tentang Kami -->
<div class="px-6 sm:px-16 py-20">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
        <div>
            <h2 class="text-3xl text-primary font-bold mb-4">Menyediakan yang Terbaik, Melayani dengan Profesionalisme</h2>
            <p class="text-gray-700 leading-relaxed">
                Nursa Jaya Comp memulai perjalanannya pada tahun 2016 dengan membuka toko fisik di Pasar Manggis. Pada awalnya, perusahaan ini fokus pada penjualan tinta, toner, dan perlengkapan kantor lainnya. <br><br>
                Seiring berjalannya waktu, Nursa Jaya Comp terus berinovasi untuk memenuhi kebutuhan pelanggan yang semakin berkembang. Pada tahun 2018, perusahaan ini mulai memperluas jangkauannya dengan menjual produknya melalui platform e-commerce terkemuka seperti Tokopedia, Shopee, dan Lazada. Langkah ini memungkinkan Nursa Jaya Comp untuk menjangkau pelanggan di seluruh Indonesia dan meningkatkan penjualan secara signifikan. <br><br>
                Pada tahun 2024, Nursa Jaya Comp mencapai tonggak penting lainnya dengan mendaftarkan perusahaannya secara resmi ke Direktorat Jenderal Administrasi Hukum. Langkah ini menegaskan komitmen perusahaan terhadap legalitas dan memberikan kepercayaan yang lebih besar kepada pelanggan dan mitra bisnis. <br><br>
                Dengan perjalanan yang dimulai dari toko fisik kecil hingga menjadi pemain e-commerce yang sah, Nursa Jaya Comp terus berupaya untuk memberikan produk dan layanan terbaik kepada pelanggannya. Perusahaan ini berkomitmen untuk terus berinovasi dan beradaptasi dengan perubahan pasar untuk tetap relevan dan berdaya saing di era digital saat ini.
            </p>
        </div>
        <div>
            <img src="{{ asset('assets/images/photo-about-us-1.png') }}" alt="Proses Printer" class="w-full rounded-lg shadow">
        </div>
    </div>
</div>
@endsection
