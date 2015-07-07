Sitemap dan Design Pattern Aplikasi
===================================

Sitemap & Rencana Aplikasi
-------

1. Login & signup
   - login page
   - Auth Hybrid (linkedin, twitter dan facebook)
   - Verifikasi email

2. Index (menggabungkan semua CRUD dalam satu halaman, view prioritas)
   - tata letak dan fungsi mirip linkedin
   - semua fungsi crud berjalan di sini via ajax / pjax

3. CRUD (untuk memastikan controller dan model berjalan baik, view tidak prioritas):
   - Profile
   - Image Profile (upload)
   - Education
   - Skill
   - Experience 
   - Portofolio (upload)

4. Module Mailbox (pesan antara sesama user)

5. Contact us

6. About

7. Dukungan multi bahasa

8. ...



Design pattern Applikasi :
--------------------------

Selain digunakan oleh PHP Indonesia, applikasi ini juga akan dijadikan referensi
untuk pengguna Yii atau yang mau belajar Yii, olehnya kita tetapkan aturan-aturan
bersama untuk ber-koding yang lebih baik.

# Model

- Seperti yang sudah di contohkan di model awal aplikasi ini, model hasil generate
  GII untuk tidak dimodifikasi, makanya dibuat class turunan yang sesuai dengan
  tujuannya baik search maupun CRUD. Dengan tujuan, jika ada perkembangan dari
  tabel kita tidak khwatir kodingan kita akan tertima oleh Gii.

- ...


# Controller

- ...


# View

- ...