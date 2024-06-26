<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "job_connector";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari tabel mitra
$sql = "SELECT * FROM mitra";
$result = $conn->query($sql);

$mitra_data = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $mitra_data[] = $row;
    }
} else {
    echo "Tidak ada data mitra.";
}

// Ambil data dari tabel rekomendasi
$sql = "SELECT * FROM rekomendasi";
$result = $conn->query($sql);

$rekomendasi_data = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $rekomendasi_data[] = $row;
    }
} else {
    echo "Tidak ada data rekomendasi.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <title>Belajar Bekerja</title>
</head>
<body>
    <nav class="w-full bg-white flex justify-between px-[156px] py-[16px] sticky top-0 z-50">
        <div class="">
            <img src="asset/logo-nav.svg" alt="" class="w-full">
        </div>
        <div class="flex gap-[32px]">
            <div class="flex items-center justify-center gap-[32px] text-[16px]">
                <select name="" id="" class="max-w-[100px]">
                    <option value="">Program</option>
                    <option value=""><a href="">Web Developer</a></option>
                    <option value=""><a href="">UI/UX Designer</a></option>
                    <option value=""><a href="">3D Designer</a></option>
                </select>
                <a href="">Biaya</a>
                <a href="">Komunitas</a>
                <a href="">FaQs</a>
                <a href="">Tentang</a>
            </div>
            <div class="flex items-center justify-center gap-[16px] text-[16px]">
                <a href="#" class="px-[16px] py-[8px] rounded-[4px] border border-[#CBCECF] text-[1E2223]">Login</a>
                <a href="#" class="px-[16px] py-[8px] rounded-[4px] text-[1E2223] bg-[#FFD21E] whitespace-nowrap">Daftar Akun</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="flex items-center pl-[156px]">
        <div class="flex flex-col gap-[24px] basis-[50%]">
            <div class="px-[12px] py-[8px] border border-[#CBCECF] rounded-[4px] gap-[8px] flex items-center justify-center w-fit">
                <span class="bg-[#1976E4] rounded-[100%] w-[10px] h-[10px]"></span>
                <h5>Program Job Connector telah hadir</h5>
                <a href="">
                    <img class="max-w-[13px]" src="asset/icon/arrow.svg" alt="">
                </a>
            </div>
            <div class="flex flex-col items-start">
                <h1 class="text-[48px] text-[#1E2223] leading-[52px]">Mulai bangun karir untuk masa depanmu, hanya disini.</h1>
                <div class="mb-[15px]">
                    <img src="asset/icon/underline.svg" alt="">
                </div>
                <p class="text-[16px] text-[#6C6F70] leading-[24px]">Mempersiapkan individu menjadi lebih siap secara profesional untuk dunia industri dengan memanfaatkan pemahaman digital transformasi serta teknologi kecerdasan buatan (AI) yang langsung didampingi oleh praktisi berpengalaman.</p>
            </div>
            <div class="flex gap-[16px] items-center justify-start">
                <a href="#" class="px-[24px] py-[12px] rounded-[4px] text-[1E2223] text-[16px] bg-white border border-[#4C4F50] whitespace-nowrap flex items-center justify-center gap-[5px] max-h-[48px]">
                    <img class="rotate-90 max-w-[13px]" src="asset/icon/arrow.svg" alt="">
                    <p>Lihat Program</p>
                </a>
                <a href="#" class="px-[24px] py-[12px] rounded-[4px] text-[1E2223] bg-[#FFD21E] whitespace-nowrap">Konsultasi Gratis</a>
            </div>
            <div class="flex flex-col gap-[16px]">
                <p>Masih bimbang? Konsultasikan dengan kami, GRATIS.</p>
                <div class="flex flex-row gap-[56px]">
                    <div class="flex">
                        <img src="asset/icon/user1.svg" alt="" class="">
                        <img src="asset/icon/user2.svg" alt="" class="ml-[-20px]">
                        <img src="asset/icon/user3.svg" alt="" class="ml-[-20px]">
                        <img src="asset/icon/user3.svg" alt="" class="ml-[-20px]">
                        <img src="asset/icon/user3.svg" alt="" class="ml-[-20px]">
                    </div>
                    <div>
                        <div class="flex gap-[10px]">
                            <img src="asset/icon/star.svg" alt="">
                            <img src="asset/icon/star.svg" alt="">
                            <img src="asset/icon/star.svg" alt="">
                            <img src="asset/icon/star.svg" alt="">
                            <img src="asset/icon/star.svg" alt="">
                            <p>4.8</p>
                        </div>
                        <p>dari review 124 alumni</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex basis-[65%]">
            <img class="w-full" src="asset/hero/img-hero.svg" alt="">
        </div>
    </section>

    <!-- Mitra Section -->
    <section class="flex w-full flex-col items-center justify-center gap-[28px] mt-[30px]">
        <div class="flex w-full items-center justify-center gap-[32px]">
            <?php foreach ($mitra_data as $mitra): ?>
                <div><img src="<?php echo $mitra['foto_mitra']; ?>" alt="<?php echo $mitra['nama_mitra']; ?>"></div>
            <?php endforeach; ?>
        </div>
        <p class="text-[16px] text-[#6C6F70]">Daftarkan dirimu, raih kesempatan untuk disalurkan ke company partner kami bersama Cakap</p>
    </section>

    <!-- Rekomendasi Program Section -->
    <section class="px-[156px] mt-[7%]">
        <div class="gradient-border2 w-full flex justify-center p-10">
            <div class="absolute rounded-[8px] w-full">
                <img class="filter blur-2xl w-full" src="asset/rekomendasi/rekom-bg.svg" alt="">
            </div>
            <div class="relative flex flex-col gap-[16px] items-center justify-center">
                <div>
                    <img src="asset/rekomendasi//icon-rekom.svg" alt="">
                </div>
                <div class="text-center flex flex-col items-center justify-center gap-[8px]">
                    <p class="text-[#1976E4] text-[16px] font-semibold">Rekomendasi Program</p>
                    <h4 class="text-[#1E2223] text-[24px]">Bagaimana posisi karirmu saat ini?</h4>
                    <p class="text-[#6C6F70] text-[16px] max-w-[76%]">Kami akan membantumu untuk merekomendasikan program yang sesuai dengan kondisimu saat ini dan bidang yang membuatmu tertarik.</p>
                </div>
                <div class="flex gap-[24px]">
                    <div class="flex flex-col gap-[5px]">
                        <label for="merasa" class="text-[#1E2223] text-[14px]">Aku merasa bahwa</label>
                        <select name="merasa" id="" class="border border-[#CBCECF] rounded-[4px] min-w-[408px] px-[12px] py-[8px] text-[14px] text-[#6C6F70]">
                            <option value="">Pilih jawaban</option>
                            <option value="1">Bingung cari pengalaman pertama di industri</option>
                            <option value="2">Masih cari passion yang cocok, nih</option>
                            <option value="3">Mau punya portofolio</option>
                            <option value="4">Merasa salah jurusan</option>
                            <option value="5">Bingung untuk membangun karir</option>
                            <option value="6">Cari magang yang auto lolos</option>
                            <option value="7">Mau punya mentor khusus untuk konsultasi karir</option>
                            <option value="8">Mau ngelamar kerja tapi ga punya skill yang mumpuni</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-[5px]">
                        <label for="minat" class="text-[#1E2223] text-[14px]">Bidang pekerjaan yang diminati</label>
                        <select name="minat" id="" class="border border-[#CBCECF] rounded-[4px] min-w-[408px] px-[12px] py-[8px] text-[14px] text-[#6C6F70]">
                            <option value="">Pilih bidang atau role</option>
                            <option value="1">Teknologi Informasi (IT)</option>
                            <option value="2">Marketing</option>
                            <option value="3">Creative</option>
                        </select>
                    </div>
                </div>
                <div class="program-rekom flex flex-col w-[76%] gap-[16px] hidden">
                    <div>
                        <p class="text-[16px] text-[#1E2223] font-semibold">Rekomendasi Program</p>
                    </div>
                    <div class="grid grid-cols-3 gap-[37px]">
                        <?php foreach ($rekomendasi_data as $rekom): ?>
                        <div class="card-rekom max-w-[264px]" data-merasa="<?php echo $rekom['data_merasa']?>" data-minat="<?php echo $rekom['data_minat']?>">
                            <div class="flex items-center">
                                <img class="rounded-t-[8px]" src="<?php echo $rekom['foto_program']; ?>" alt="<?php echo $rekom['nama_program']; ?>">
                            </div>
                            <div class="p-[16px] flex flex-col gap-[14px]">
                                <h1 class="py-[4px] px-[8px] w-fit bg-[#FFF9DF] border border-[#8F7200] text-[#8F7200] font-semibold text-[12px] rounded-[4px]"><?php echo $rekom['tipe_program']; ?></h1>
                                <div>
                                    <div class="flex gap-[5px]">
                                        <img src="<?php echo $rekom['icon_program']; ?>" alt="">
                                        <h1 class="text-[#1E2223] text-[16px] font-semibold"><?php echo $rekom['nama_program']; ?></h1>
                                    </div>
                                    <p class="text-[#6C6F70] text-[14px]"><?php echo $rekom['deskripsi_program']; ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pencapaian Section -->
    <section class="px-[156px] mt-[7%] flex flex-col gap-[40px]">
        <div class="gradient-border2 flex gap-[28px]">
            <div class="basis-[40%]">
                <img class="w-full rounded-[8px]" src="asset/pencapaian/pencapaian-img.svg" alt="">
            </div>
            <div class="basis-[60%] flex flex-col gap-[24px] justify-center">
                <div>
                    <img src="asset/pencapaian/pencapaian-icon.svg" alt="">
                </div>
                <div class="relative flex flex-col gap-[16px]">
                    <p class="text-[#1976E4] text-[16px] font-medium">Mudah dan efisien</p>
                    <h1 class="text-[#1E2223] text-[24px] font-semibold">Saatnya bilang “tidak” dengan proses daftar magang yang terlalu lama dan ribet</h1>
                    <p class="text-[#6C6F70] text-[16px]">Kamu sering menunggu lama atau bahkan ditolak ketika ingin magang di suatu perusahaan? Beruntung kamu menemukan Belajar Bekerja 🥹</p>
                    <p class="text-[#6C6F70] text-[16px]">Platform kami menawarkan berbagai role yang sedang banyak dicari oleh jobseeker, kamu bisa memilih sesuai kebutuhan dan tentunya
                        <span class="text-[#1976E4] font-semibold underline-span relative">
                            AUTO LOLOS.*
                        </span>
                    </p>
                </div>
                <a href="" class="px-[24px] py-[12px] rounded-[4px] text-[1E2223] bg-[#FFD21E] w-fit whitespace-nowrap">Pilih Program</a>
                <p class="text-[#6C6F70] text-[12px]">* hanya tersedia di beberapa program pilihan</p>
            </div>
        </div>
        <div class="flex gap-[24px]">
            <div class="min-w-[264px] flex flex-col gap-[8px]">
                <p class="text-[32px] text-[#ECAD0B] font-semibold">3</p>
                <h1 class="text-[20px] text-[#1E2223] font-semibold">Batch telah dilaksanakan</h1>
                <p class="text-[16px] text-[#6C6F70]">Rasakan pengalaman langsung di industri.</p>
            </div>
            <div class="min-w-[264px] flex flex-col gap-[8px]">
                <p class="text-[32px] text-[#ECAD0B] font-semibold">200+</p>
                <h1 class="text-[20px] text-[#1E2223] font-semibold">Orang telah bergabung</h1>
                <p class="text-[16px] text-[#6C6F70]">Banyak alumni terbantu dengan program Belajar Bekerja.</p>
            </div>
            <div class="min-w-[264px] flex flex-col gap-[8px]">
                <p class="text-[32px] text-[#ECAD0B] font-semibold">50+</p>
                <h1 class="text-[20px] text-[#1E2223] font-semibold">Project telah dikerjakan</h1>
                <p class="text-[16px] text-[#6C6F70]">Berbagai project kamu kerjakan sesuai role yang kamu pilih.</p>
            </div>
            <div class="min-w-[264px] flex flex-col gap-[8px]">
                <p class="text-[32px] text-[#ECAD0B] font-semibold">10+</p>
                <h1 class="text-[20px] text-[#1E2223] font-semibold">Role tersedia</h1>
                <p class="text-[16px] text-[#6C6F70]">Semua role bisa kamu pilih dan ikuti sesuai kebutuhan.</p>
            </div>
        </div>
    </section>

    <!-- Program Tersedia Section -->
    <section class="px-[156px] mt-[5%] flex flex-col gap-[24px]">
        <div class="flex flex-col gap-[16px] items-start">
            <div>
                <img src="asset/program-tersedia/program-tersedia-icon.svg" alt="">
            </div>
            <p class="text-[#1976E4] text-[16px] font-medium">Program tersedia</p>
            <div class="flex flex-col gap-[8px]">
                <h1 class="text-[#1E2223] text-[24px] font-semibold">Pilihan program yang bisa kamu ikuti</h1>
                <p class="text-[#6C6F70] text-[16px]">Pilih program yang sesuai dengan kebutuhanmu. Setiap program memiliki benefitnya tersendiri.</p>
            </div>
        </div>
        <div class="flex gap-[24px]">
            <div class="flex flex-col gap-[24px] w-full">
                <img src="asset/program-tersedia/img-1.svg" alt="">
                <div class="flex flex-col gap-[8px]">
                    <h1 class="text-[#1E2223] text-[20px] font-semibold">Project Based Internship (PBI)</h1>
                    <p class="text-[#6C6F70] text-[16px]">Program magang berdurasi maksimal 3 bulan. Cocok untukmu untuk mendapatkan basic experiences atau portofolio.</p>
                </div>
                <a href="" class="px-[24px] py-[12px] rounded-[4px] text-[1E2223] bg-[#FFD21E] w-fit whitespace-nowrap">Lihat Detail Program</a>
            </div>
            <div class="flex flex-col gap-[24px] w-full">
                <img src="asset/program-tersedia/img-2.svg" alt="">
                <div class="flex flex-col gap-[8px]">
                    <h1 class="text-[#1E2223] text-[20px] font-semibold">Job Connector</h1>
                    <p class="text-[#6C6F70] text-[16px]">Program berdurasi 6 bulan atau lebih. Cocok untukmu agar lebih siap secara profesional untuk bisa mendapatkan pekerjaan.</p>
                </div>
                <a href="" class="px-[24px] py-[12px] rounded-[4px] text-[1E2223] bg-[#FFD21E] w-fit whitespace-nowrap">Lihat Detail Program</a>
            </div>
        </div>
    </section>

    <!-- Benefit Section -->
    <section class="px-[156px] mt-[7%] flex flex-col gap-[24px]">
        <div class="w-full flex flex-col gap-[16px] items-center">
            <div>
                <img src="asset/benefit/benefit-icon.svg" alt="">
            </div>
            <p class="text-[#1976E4] text-[16px] font-semibold">Benefit Utama</p>
            <h1 class="text-[#1E2223] text-[24px] font-semibold">Kenapa kamu harus memilih Belajar Bekerja</h1>
        </div>
        <div class="flex gap-[24px] justify-between">
            <div class="gradient-border2 w-[264px]">
                <img class="rounded-[8px] w-full" src="asset/benefit/img1.svg" alt="">
                <div class="p-[16px]">
                    <h5 class="text-[#1E2223] text-[16px] font-medium">Career Advancements</h5>
                    <p class="text-[#6C6F70] text-[14px]">Tingkatkan karirmu dengan mengikuti kelas pengembangan karir, konsultasi karir secara intensif, dan kesempatan dapat pekerjaan dengan partner industri Belajar Bekerja.</p>
                </div>
            </div>
            <div class="gradient-border2 w-[264px]">
                <img class="rounded-[8px] w-full" src="asset/benefit/img2.svg" alt="">
                <div class="p-[16px]">
                    <h5 class="text-[#1E2223] text-[16px] font-medium">Hands-On Industry Experience</h5>
                    <p class="text-[#6C6F70] text-[14px]">Dapatkan pengalaman bekerja sesungguhnya dengan mengerjakan proyek nyata industri didukung pembelajaran yang terupdate dengan kurikulum industri.</p>
                </div>
            </div>
            <div class="gradient-border2 w-[264px]">
                <img class="rounded-[8px] w-full" src="asset/benefit/img3.svg" alt="">
                <div class="p-[16px]">
                    <h5 class="text-[#1E2223] text-[16px] font-medium">Professional Guidance</h5>
                    <p class="text-[#6C6F70] text-[14px]">Dapatkan bimbingan dan dukungan dari mentor berpengalaman yang memiliki pengetahuan dan keahlian mendalam di bidangnya.</p>
                </div>
            </div>
            <div class="gradient-border2 w-[264px]">
                <img class="rounded-[8px] w-full" src="asset/benefit/img4.svg" alt="">
                <div class="p-[16px]">
                    <h5 class="text-[#1E2223] text-[16px] font-medium">Like-Minded Community</h5>
                    <p class="text-[#6C6F70] text-[14px]">Gabung dengan komunitas yang se-frekuensi! Dengan minat dan tujuan yang sama, kamu dapat mendukung dan membantu satu sama lain.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Syarat dan Ketentuan Section -->
    <section class="px-[156px] mt-[7%] flex gap-[24px]">
        <div class="gradient-border2 flex gap-[28px]">
            <div class="p-[24px] flex flex-col gap-[24px] basis-[65%]">
                <div>
                    <img src="asset/syarat-ketentuan/sk-icon.svg" alt="">
                </div>
                <div class="flex flex-col gap-[16px]">
                    <p class="text-[#1976E4] text-[16px] font-semibold">Syarat dan ketentuan</p>
                    <h1 class="text-[#1E2223] text-[24px] font-semibold">Kami memiliki standar yang harus diperhatikan oleh para peserta agar prosesnya berjalan lancar.</h1>
                </div>
                <div class="flex flex-col gap-[16px]">
                    <div class="flex gap-[10px] items-start justify-start">
                        <img src="asset/syarat-ketentuan/icon1.svg" alt="">
                        <p class="text-[#6C6F70] text-[16px]">Peserta harus mengikuti program sampai akhir</p>
                    </div>
                    <div class="flex gap-[10px] items-start justify-start">
                        <img src="asset/syarat-ketentuan/icon2.svg" alt="">
                        <p class="text-[#6C6F70] text-[16px]">Apabila peserta tidak menyelesaikan project atau program magang sesuai waktu dan alurnya, peserta tidak akan mendapatkan sertifikat magang.</p>
                    </div>
                    <div class="flex gap-[10px] items-start justify-start">
                        <img src="asset/syarat-ketentuan/icon3.svg" alt="">
                        <p class="text-[#6C6F70] text-[16px]">Tidak menyebarluaskan dan menyalahgunakan data perusahaan.</p>
                    </div>
                    <div class="flex gap-[10px] items-start justify-start">
                        <img src="asset/syarat-ketentuan/icon4.svg" alt="">
                        <p class="text-[#6C6F70] text-[16px]">Program yang sudah dibeli tidak dapat dibatalkan.</p>
                    </div>
                </div>
                <a href=""  class="px-[24px] py-[12px] rounded-[4px] text-[1E2223] bg-[#FFD21E] w-fit whitespace-nowrap">Pilih Program</a>
            </div>
            <div class="basis-[35%] flex items-end justify-end">
                <div>
                    <img src="asset/syarat-ketentuan/sk-img.svg" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Alumin Section -->
    <section class="px-[152px] mt-[8%] flex flex-col gap-[40px]">
        <div class="w-full flex flex-col gap-[16px] items-center justify-center text-center">
            <div>
                <img src="asset/alumni/alumni-icon.svg" alt="">
            </div>
            <p class="text-[#1976E4] text-[16px] font-semibold">Review Alumni</p>
            <h1 class="text-[#1E2223] text-[25px] font-semibold w-[50%]">Banyak alumni merasakan manfaat dari program Belajar Bekerja</h1>
        </div>
        <div class="scroll relative max-h-[680px] p-[2px] overflow-y-hidden overflow-x-hidden flex justify-between gap-[24px]">
            <div class="flex flex-col gap-[24px]">
                <div class="gradient-border2 p-[16px] flex flex-col gap-[24px]">
                    <div class="flex gap-[10px]">
                        <div>
                            <img src="asset/alumni/user1.svg" alt="">
                        </div>
                        <div class="flex flex-col justify-between">
                            <h6 class="text-[#1E2223] text-[14px] font-medium">Nama user</h6>
                            <p class="text-[#6C6F70] text-[14px]">Program yang diikuti</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-[#6C6F70] text-[14px]">Framer has helped me to scale my agency by being able to make websites in a very efficient and creative way.</p>
                    </div>
                </div>
                <div class="gradient-border2 p-[16px] flex flex-col gap-[24px]">
                    <div class="flex gap-[10px]">
                        <div>
                            <img src="asset/alumni/user2.svg" alt="">
                        </div>
                        <div class="flex flex-col justify-between">
                            <h6 class="text-[#1E2223] text-[14px] font-medium">Nama user</h6>
                            <p class="text-[#6C6F70] text-[14px]">Program yang diikuti</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-[#6C6F70] text-[14px]">As a seasoned designer always on the lookout for innovative tools, Framer.com instantly grabbed my attention. This powerful web design platform is more than just a design tool - it's a complete ecosystem that revolutionizes the way websites are created and published.</p>
                    </div>
                </div>
                <div class="gradient-border2 p-[16px] flex flex-col gap-[24px]">
                    <div class="flex gap-[10px]">
                        <div>
                            <img src="asset/alumni/user3.svg" alt="">
                        </div>
                        <div class="flex flex-col justify-between">
                            <h6 class="text-[#1E2223] text-[14px] font-medium">Nama user</h6>
                            <p class="text-[#6C6F70] text-[14px]">Program yang diikuti</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-[#6C6F70] text-[14px]">Framer has helped me to design great websites with half the effort.</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-[24px]">
                <div class="gradient-border2 p-[16px] flex flex-col gap-[24px]">
                    <div class="flex gap-[10px]">
                        <div>
                            <img src="asset/alumni/user4.svg" alt="">
                        </div>
                        <div class="flex flex-col justify-between">
                            <h6 class="text-[#1E2223] text-[14px] font-medium">Nama user</h6>
                            <p class="text-[#6C6F70] text-[14px]">Program yang diikuti</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-[#6C6F70] text-[14px]">As a seasoned designer always on the lookout for innovative tools, Framer.com instantly grabbed my attention. This powerful web design platform is more than just a design tool - it's a complete ecosystem that revolutionizes the way websites are created and published.</p>
                    </div>
                </div>
                <div class="gradient-border2 p-[16px] flex flex-col gap-[24px]">
                    <div class="flex gap-[10px]">
                        <div>
                            <img src="asset/alumni/user5.svg" alt="">
                        </div>
                        <div class="flex flex-col justify-between">
                            <h6 class="text-[#1E2223] text-[14px] font-medium">Nama user</h6>
                            <p class="text-[#6C6F70] text-[14px]">Program yang diikuti</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-[#6C6F70] text-[14px]">Framer has helped me to scale my agency by being able to make websites in a very efficient and creative way.</p>
                    </div>
                </div>
                <div class="gradient-border2 p-[16px] flex flex-col gap-[24px]">
                    <div class="flex gap-[10px]">
                        <div>
                            <img src="asset/alumni/user6.svg" alt="">
                        </div>
                        <div class="flex flex-col justify-between">
                            <h6 class="text-[#1E2223] text-[14px] font-medium">Nama user</h6>
                            <p class="text-[#6C6F70] text-[14px]">Program yang diikuti</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-[#6C6F70] text-[14px]">Framer has helped me to scale my agency by being able to make websites in a very efficient and creative way.</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-[24px]">
                <div class="gradient-border2 p-[16px] flex flex-col gap-[24px]">
                    <div class="flex gap-[10px]">
                        <div>
                            <img src="asset/alumni/user7.svg" alt="">
                        </div>
                        <div class="flex flex-col justify-between">
                            <h6 class="text-[#1E2223] text-[14px] font-medium">Nama user</h6>
                            <p class="text-[#6C6F70] text-[14px]">Program yang diikuti</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-[#6C6F70] text-[14px]">Framer has helped me to scale my agency by being able to make websites in a very efficient and creative way.</p>
                    </div>
                </div>
                <div class="gradient-border2 p-[16px] flex flex-col gap-[24px]">
                    <div class="flex gap-[10px]">
                        <div>
                            <img src="asset/alumni/user8.svg" alt="">
                        </div>
                        <div class="flex flex-col justify-between">
                            <h6 class="text-[#1E2223] text-[14px] font-medium">Nama user</h6>
                            <p class="text-[#6C6F70] text-[14px]">Program yang diikuti</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-[#6C6F70] text-[14px]">As a seasoned designer always on the lookout for innovative tools, Framer.com instantly grabbed my attention. This powerful web design platform is more than just a design tool - it's a complete ecosystem that revolutionizes the way websites are created and published.</p>
                    </div>
                </div>
                <div class="gradient-border2 p-[16px] flex flex-col gap-[24px]">
                    <div class="flex gap-[10px]">
                        <div>
                            <img src="asset/alumni/user9.svg" alt="">
                        </div>
                        <div class="flex flex-col justify-between">
                            <h6 class="text-[#1E2223] text-[14px] font-medium">Nama user</h6>
                            <p class="text-[#6C6F70] text-[14px]">Program yang diikuti</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-[#6C6F70] text-[14px]">Framer has helped me to scale my agency by being able to make websites in a very efficient and creative way.</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-[24px]">
                <div class="gradient-border2 p-[16px] flex flex-col gap-[24px]">
                    <div class="flex gap-[10px]">
                        <div>
                            <img src="asset/alumni/user10.svg" alt="">
                        </div>
                        <div class="flex flex-col justify-between">
                            <h6 class="text-[#1E2223] text-[14px] font-medium">Nama user</h6>
                            <p class="text-[#6C6F70] text-[14px]">Program yang diikuti</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-[#6C6F70] text-[14px]">Framer has helped me to scale my agency by being able to make websites in a very efficient and creative way.</p>
                    </div>
                </div>
                <div class="gradient-border2 p-[16px] flex flex-col gap-[24px]">
                    <div class="flex gap-[10px]">
                        <div>
                            <img src="asset/alumni/user11.svg" alt="">
                        </div>
                        <div class="flex flex-col justify-between">
                            <h6 class="text-[#1E2223] text-[14px] font-medium">Nama user</h6>
                            <p class="text-[#6C6F70] text-[14px]">Program yang diikuti</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-[#6C6F70] text-[14px]">Framer has helped me to scale my agency by being able to make websites in a very efficient and creative way.</p>
                    </div>
                </div>
                <div class="gradient-border2 p-[16px] flex flex-col gap-[24px]">
                    <div class="flex gap-[10px]">
                        <div>
                            <img src="asset/alumni/user12.svg" alt="">
                        </div>
                        <div class="flex flex-col justify-between">
                            <h6 class="text-[#1E2223] text-[14px] font-medium">Nama user</h6>
                            <p class="text-[#6C6F70] text-[14px]">Program yang diikuti</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-[#6C6F70] text-[14px]">As a seasoned designer always on the lookout for innovative tools, Framer.com instantly grabbed my attention. This powerful web design platform is more than just a design tool - it's a complete ecosystem that revolutionizes the way websites are created and published.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FaQs Section -->
    <section class="px-[156px] mt-[7%] flex flex-col gap-[24px]">
        <div class="w-full flex flex-col items-center justify-center text-center">
            <p class="text-[#1976E4] text-[16px] font-semibold">FAQs</p>
            <h1 class="text-[#1E2223] text-[24px] font-semibold">Frequently asked questions</h1>
            <p class="text-[#6C6F70] text-[16px]">Butuh bantuan? Coba cek terlebih dahulu pertanyaan yang sering ditanyakan berikut</p>
        </div>
        <div class="w-full flex flex-col justify-center items-center mt-[20px]">
            <div class="w-[85%]">
                <div class="accordion-item">
                    <div class="flex justify-between items-center py-[20px] border-b border-[#E1E3E3] cursor-pointer" onclick="toggleAccordion(this)">
                        <p class="text-[#1E2223] text-[16px]">Apa itu Belajar Bekerja</p>
                        <i class="transition-transform duration-300"><img src="asset/icon/arrow-down.svg" alt=""></i>
                    </div>
                    <div class="accordion-content overflow-hidden transition-all duration-300 max-h-0">
                        <div class="p-[20px] bg-[#FFFCEF]">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda voluptatem vitae, repudiandae sunt dolorem reprehenderit distinctio est unde sequi rem soluta quis perspiciatis laborum eum. Eaque aliquid dolores saepe repellendus!</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="flex justify-between items-center py-[20px] border-b border-[#E1E3E3] cursor-pointer" onclick="toggleAccordion(this)">
                        <p class="text-[#1E2223] text-[16px]">Kenapa harus Belajar Bekerja?</p>
                        <i class="transition-transform duration-300"><img src="asset/icon/arrow-down.svg" alt=""></i>
                    </div>
                    <div class="accordion-content overflow-hidden transition-all duration-300 max-h-0">
                        <div class="p-[20px] bg-[#FFFCEF]">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda voluptatem vitae, repudiandae sunt dolorem reprehenderit distinctio est unde sequi rem soluta quis perspiciatis laborum eum. Eaque aliquid dolores saepe repellendus!</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="flex justify-between items-center py-[20px] border-b border-[#E1E3E3] cursor-pointer" onclick="toggleAccordion(this)">
                        <p class="text-[#1E2223] text-[16px]">Apakah programnya berbayar?</p>
                        <i class="transition-transform duration-300"><img src="asset/icon/arrow-down.svg" alt=""></i>
                    </div>
                    <div class="accordion-content overflow-hidden transition-all duration-300 max-h-0">
                        <div class="p-[20px] bg-[#FFFCEF]">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda voluptatem vitae, repudiandae sunt dolorem reprehenderit distinctio est unde sequi rem soluta quis perspiciatis laborum eum. Eaque aliquid dolores saepe repellendus!</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="flex justify-between items-center py-[20px] border-b border-[#E1E3E3] cursor-pointer" onclick="toggleAccordion(this)">
                        <p class="text-[#1E2223] text-[16px]">Bisakah melakukan refund jika sudah membeli programnya?</p>
                        <i class="transition-transform duration-300"><img src="asset/icon/arrow-down.svg" alt=""></i>
                    </div>
                    <div class="accordion-content overflow-hidden transition-all duration-300 max-h-0">
                        <div class="p-[20px] bg-[#FFFCEF]">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda voluptatem vitae, repudiandae sunt dolorem reprehenderit distinctio est unde sequi rem soluta quis perspiciatis laborum eum. Eaque aliquid dolores saepe repellendus!</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="flex justify-between items-center py-[20px] border-b border-[#E1E3E3] cursor-pointer" onclick="toggleAccordion(this)">
                        <p class="text-[#1E2223] text-[16px]">Bisakah melakukan refund jika sudah membeli programnya?</p>
                        <i class="transition-transform duration-300"><img src="asset/icon/arrow-down.svg" alt=""></i>
                    </div>
                    <div class="accordion-content overflow-hidden transition-all duration-300 max-h-0">
                        <div class="p-[20px] bg-[#FFFCEF]">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda voluptatem vitae, repudiandae sunt dolorem reprehenderit distinctio est unde sequi rem soluta quis perspiciatis laborum eum. Eaque aliquid dolores saepe repellendus!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </section>

    <footer class="px-[156px] py-[40px] mt-[7%] bg-[#FFFCEF] flex flex-col gap-[40px]">
        <div class="flex gap-[24px]">
            <div class="flex flex-col gap-[40px] basis-[30%]">
                <div class="w-full flex items-start justify-start">
                    <img src="asset/footer/foot-logo.svg" alt="">
                </div>
                <div class="flex flex-col gap-[24px]">
                    <div>
                        <p class="text-[#1E2223] text-[14px] font-medium">Headquarter</p>
                        <p class="text-[#1E2223] text-[14px]">Jl. Nama jalan, Blok nama blok, nomor bangunan dan sebagainya kode pos 00000</p>
                    </div>
                    <div class="flex flex-col gap-[16px]">
                        <div class="flex gap-[15px]">
                            <img src="asset/footer/whatsapp.svg" alt="">
                            <div class="flex flex-col justify-between">
                                <p class="text-[#1E2223] text-[14px] font-medium">Whatsapp</p>
                                <a href="" class="text-[#1E2223] text-[14px] underline">+62 812 1234 567</a>
                            </div>
                        </div>
                        <div class="flex gap-[15px]">
                            <img src="asset/footer/email.svg" alt="">
                            <div class="flex flex-col justify-between">
                                <p class="text-[#1E2223] text-[14px] font-medium">Email</p>
                                <a href="" class="text-[#1E2223] text-[14px] underline">cs@belajarbekerja.com</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-[#1E2223] text-[14px]">Jam pelayanan konsumen (09:00 - 17:00 WIB)</p>
                    </div>
                </div>
            </div>
            <div class="flex gap-[36px] basis-[70%]">
                <div class="flex flex-col gap-[20px] basis-[10%]">
                    <h5 class="text-[#1E2223] text-[14px] font-medium">Produk</h5>
                    <a href="" class="text-[#1E2223] text-[14px] underline">Project Based Industry (PBI)</a>
                    <a href="" class="text-[#1E2223] text-[14px] underline">Job Connector</a>
                    <div class="flex gap-[5px]">
                        <a href="" class="text-[#1E2223] text-[14px] underline">Aplikasi</a>
                        <p class="text-[#1976E4] text-[14px]">Segera!</p>
                    </div>
                </div>
                <div class="flex flex-col gap-[20px] basis-[18%]">
                    <h5 class="text-[#1E2223] text-[14px] font-medium">Perusahaan</h5>
                    <a href="" class="text-[#1E2223] text-[14px] underline">Tentang Kami</a>
                    <a href="" class="text-[#1E2223] text-[14px] underline">Newsroom</a>
                    <a href="" class="text-[#1E2223] text-[14px] underline">Visi Kami</a>
                    <a href="" class="text-[#1E2223] text-[14px] underline">Hubungi Kami</a>
                    <a href="" class="text-[#1E2223] text-[14px] underline">Pusat Bantuan</a>
                </div>
                <div class="flex flex-col gap-[20px] basis-[19%]">
                    <h5 class="text-[#1E2223] text-[14px] font-medium">Sumber Daya</h5>
                    <a href="" class="text-[#1E2223] text-[14px] underline">Kenapa Belajar Bekerja?</a>
                    <a href="" class="text-[#1E2223] text-[14px] underline">Update tentang program</a>
                    <a href="" class="text-[#1E2223] text-[14px] underline">Gabung Komunitas</a>
                    <a href="" class="text-[#1E2223] text-[14px] underline">Blog</a>
                </div>
                <div class="flex flex-col gap-[20px] basis-[15%]">
                    <h5 class="text-[#1E2223] text-[14px] font-medium whitespace-nowrap">Media Sosial</h5>
                    <div class="flex gap-[5px] items-center">
                        <img src="asset/footer/instagram.svg" alt="">
                        <a href="" class="text-[#1E2223] text-[14px] underline">Instagram</a>
                    </div>
                    <div class="flex gap-[5px] items-center">
                        <img src="asset/footer/twitter.svg" alt="">
                        <a href="" class="text-[#1E2223] text-[14px] underline">X / Twitter</a>
                    </div>
                    <div class="flex gap-[5px] items-center">
                        <img src="asset/footer/linkedin.svg" alt="">
                        <a href="" class="text-[#1E2223] text-[14px] underline">LinkedIn</a>
                    </div>
                </div>
                <div class="flex flex-col gap-[20px] basis-[38%]">
                    <h5 class="text-[#1E2223] text-[14px] font-medium whitespace-nowrap">Metode Pembayaran</h5>
                    <div class="flex flex-col gap-[12px]">
                        <p class="text-[#1E2223] text-[14px]">Partner</p>
                        <div>
                            <img src="asset/footer/partner.svg" alt="">
                        </div>
                    </div>
                    <div class="flex flex-col gap-[12px]">
                        <p class="text-[#1E2223] text-[14px]">Kartu Kredit</p>
                        <div class="flex gap-[10px]">
                            <div class="p-[12px] border border-[#CBCECF] rounded-[4px] flex justify-center items-center min-w-[72px]"><img src="asset/footer/visa.svg" alt=""></div>
                            <div class="p-[12px] border border-[#CBCECF] rounded-[4px] flex justify-center items-center min-w-[72px]"><img src="asset/footer/maestro.svg" alt=""></div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-[12px]">
                        <p class="text-[#1E2223] text-[14px]">Bank Transfer</p>
                        <div class="grid grid-cols-3 gap-[10px]">
                            <div class="p-[12px] border border-[#CBCECF] rounded-[4px] flex justify-center items-center min-w-[72px]"><img src="asset/footer/bca.svg" alt=""></div>
                            <div class="p-[12px] border border-[#CBCECF] rounded-[4px] flex justify-center items-center min-w-[72px]"><img src="asset/footer/bni.svg" alt=""></div>
                            <div class="p-[12px] border border-[#CBCECF] rounded-[4px] flex justify-center items-center min-w-[72px]"><img src="asset/footer/bri.svg" alt=""></div>
                            <div class="p-[12px] border border-[#CBCECF] rounded-[4px] flex justify-center items-center min-w-[72px]"><img src="asset/footer/gopay.svg" alt=""></div>
                            <div class="p-[12px] border border-[#CBCECF] rounded-[4px] flex justify-center items-center min-w-[72px]"><img src="asset/footer/jenius.svg" alt=""></div>
                            <div class="p-[12px] border border-[#CBCECF] rounded-[4px] flex justify-center items-center min-w-[72px]"><a href="" class="text-[#1E2223] text-[12px] underline">Lainnya</a></div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-[12px]">
                        <p class="text-[#1E2223] text-[14px]">QRIS</p>
                        <div>
                            <img src="asset/footer/qris.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <span class="w-full border-dashed border-b border-[#4C4F50]"></span>
        <div class="flex flex-col gap-[24px]">
            <div class="flex gap-[16px]">
                <a href="" class="text-[#1E2223] text-[14px] underline">Lisensi</a>
                <a href="" class="text-[#1E2223] text-[14px] underline">Syarat & Ketentuan</a>
                <a href="" class="text-[#1E2223] text-[14px] underline">Syarat & Privasi</a>
                <a href="" class="text-[#1E2223] text-[14px] underline">Cookies</a>
                <a href="" class="text-[#1E2223] text-[14px] underline">Penggunaan Data</a>
            </div>
            <p class="text-[#1E2223] text-[14px]">© 2024 Belajar Bekerja. All rights reserved.</p>
            <p class="text-[#1E2223] text-[14px]">Belajar Bekerja merupakan program untuk  mempersiapkan individu menjadi lebih siap secara profesional. Dimana peserta dapat mengerjakan kasus nyata yang terjadi di dunia industri dengan memanfaatkan pemahaman digital transformasi serta teknologi Kecerdasan Buatan (AI) yang langsung didampingi oleh praktisi berpengalaman. Pada program ini semua orang memiliki kesempatan untuk berpengalaman di industri!</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>