-- ========================
-- USERS (ADMIN LOGIN)
-- ========================
CREATE TABLE users (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('admin','editor') DEFAULT 'editor',
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- ========================
-- ADMINISTRATOR (Guru / Tendik)
-- ========================
CREATE TABLE administrators (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255),
    name VARCHAR(100),
    role ENUM('pengurus','guru','tendik'),
    keterangan VARCHAR(255), --contoh Kepala sekolah, Guru IPA, Kepala Kebersihan
    nip VARCHAR(30) NULL,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- ========================
-- EKSKUL
-- ========================
CREATE TABLE ekskuls (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255),
    ekskul_name VARCHAR(100),
    slug VARCHAR(120) UNIQUE,
    description TEXT,
    pembina VARCHAR(100),
    instagram VARCHAR(255),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- ========================
-- BERITA
-- ========================
CREATE TABLE news (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    news_title VARCHAR(255),
    slug VARCHAR(255) UNIQUE,
    thumbnail VARCHAR(255),
    content LONGTEXT,
    author_id BIGINT,
    status ENUM('draft','publish') DEFAULT 'draft',
    published_at DATETIME NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,

    FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE SET NULL
);

-- ========================
-- ACADEMIC (KALENDER AKADEMIK)
-- ========================
CREATE TABLE academics (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255),
    description TEXT,
    start_date DATE,
    end_date DATE,
    academic_year VARCHAR(20),
    status ENUM('selesai','aktif','mendatang'),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- ========================
-- FASILITAS
-- ========================
CREATE TABLE fasilitas (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    fasilitas_image VARCHAR(255),
    fasilitas_name VARCHAR(100),
    fasilitas_desc TEXT,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- ========================
-- ACHIEVEMENT (PRESTASI)
-- ========================
CREATE TABLE achievements (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    achiev_image VARCHAR(255),
    title VARCHAR(255),
    content TEXT,
    date DATE,
    kategori ENUM('akademik','non_akademik'),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- ========================
-- ALUMNI
-- ========================
CREATE TABLE alumni (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    alumni_image VARCHAR(255),
    alumni_name VARCHAR(100),
    story TEXT,
    graduate_at YEAR,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);