<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menempatkan Kotak di Posisi Tertentu</title>
    <style>
        body {
            height: 100vh;
            margin: 0;
            position: relative; /* agar posisi absolute kotak mengacu ke body */
            background-color: #f0f0f0;
        }
        .kotak {
            width: 100px;
            height: 100px;
            background-color: tomato;
            position: absolute; /* memungkinkan pengaturan posisi */
            border: 2px solid black;
        }
                /* Styling garis */
        hr {
            border: none;
            height: 3px;
            background-color: #333;
            margin: 20px 0;
        }
    .vertical-line {
        border-left: 2px solid black; /* Ketebalan & warna garis */
        height: 200px;               /* Tinggi garis */
        margin: 20px;                 /* Jarak dari elemen lain */
    }
    </style>
</head>
<body>
    <h2>Klik tombol untuk menempatkan kotak di posisi tertentu</h2>
    <button onclick="buatKotak(50, 50)">Posisi (50px, 50px)</button>
    <button onclick="buatKotak(200, 150)">Posisi (200px, 150px)</button>
    <button onclick="buatKotak(400, 300)">Posisi (400px, 300px)</button>
    <button onclick="buatGaris()">Buat Garis</button>
    <div id="konten"></div>
<div id="container" style="display: flex; align-items: center;">
    <p>Konten di kiri</p>
    <!-- Garis akan dimasukkan di sini lewat JavaScript -->
    <p>Konten di kanan</p>
</div>
    <script>
try {
    // Buat elemen div untuk garis
    const line = document.createElement("div");
    line.className = "vertical-line";

    // Sisipkan garis di antara dua elemen
    const container = document.getElementById("container");
    container.insertBefore(line, container.children[1]);
} catch (error) {
    console.error("Terjadi kesalahan saat membuat garis vertikal:", error);
}

function buatKotak(x, y) {
            try {
                // Buat elemen kotak
                const kotak = document.createElement("div");
                kotak.classList.add("kotak");

                // Atur posisi
                kotak.style.left = x + "px";
                kotak.style.top = y + "px";

                // Tambahkan ke body
                document.body.appendChild(kotak);
            } catch (error) {
                console.error("Gagal membuat kotak:", error);
            }
        }
                function buatGaris() {
            try {
                // Buat elemen <hr>
                const garis = document.createElement("hr");

                // Tambahkan ke dalam div dengan id "konten"
                document.getElementById("konten").appendChild(garis);
            } catch (error) {
                console.error("Terjadi kesalahan saat membuat garis:", error);
            }
        }
            body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f0f0f0;
    }

    /* Class untuk kotak */
    .square-box {
        width: 150px;       /* Lebar kotak */
        height: 150px;      /* Tinggi kotak sama dengan lebar → square */
        background-color: #4CAF50;
        border: 3px solid #333;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-weight: bold;
        font-family: Arial, sans-serif;
        border-radius: 8px; /* Opsional: sudut membulat */
    }
        body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f0f0f0;
    }

    /* Class untuk kotak */
    .square-box {
        width: 150px;       /* Lebar kotak */
        height: 150px;      /* Tinggi kotak sama dengan lebar → square */
        background-color: #4CAF50;
        border: 3px solid #333;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        font-weight: bold;
        font-family: Arial, sans-serif;
        border-radius: 8px; /* Opsional: sudut membulat */
    }
    </script>
</body>
</html>