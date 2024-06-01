CREATE TABLE anak (
    nik VARCHAR(20) PRIMARY KEY,
    jenis_anggota VARCHAR(30),
    nama VARCHAR(100),
    tanggal_lahir DATE,
    alamat TEXT,
    provinsi VARCHAR(50),
    kabupaten VARCHAR(50),
    kecamatan VARCHAR(50)
);

CREATE TABLE pengukuran (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nik VARCHAR(20),
    tanggal_pengukuran DATE,
    berat_badan DECIMAL(5, 2),
    tinggi_badan DECIMAL(5, 2),
    bbu VARCHAR(50),
    tbu VARCHAR(50),
    bbtb VARCHAR(50),
    FOREIGN KEY (nik) REFERENCES anak(nik)
);