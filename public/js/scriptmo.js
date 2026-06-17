//    <!-- JavaScript Independen Menggunakan Pola Loop -->

        // Mengambil seluruh elemen pembungkus kol
        const hoverColumns = document.querySelectorAll('.js-hover-col');

        hoverColumns.forEach(column => {
            const btn = column.querySelector('.main-btn');
            const formContainer = column.querySelector('.login-form-container');

            // --- DEKSTOP LOGIC (Hover / Mouseover) ---
            column.addEventListener('mouseenter', () => {
                formContainer.style.display = 'block';
            });

            column.addEventListener('mouseleave', (event) => {
                if (!column.contains(event.relatedTarget)) {
                    formContainer.style.display = 'none';
                }
            });

            // --- MOBILE RESPONSIVE LOGIC (Klik / Touch) ---
            // HP tidak mengenal hover, jadi sentuhan pertama membuka form, sentuhan kedua menutup form
            btn.addEventListener('click', (event) => {
                // Mencegah trigger ganda di beberapa tipe device browser
                if (window.innerWidth <= 992) { 
                    event.stopPropagation();
                    const isFormVisible = formContainer.style.display === 'block';
                    
                    // Tutup semua form terbuka lainnya terlebih dahulu (fitur akordeon otomatis)
                    document.querySelectorAll('.login-form-container').forEach(form => {
                        form.style.display = 'none';
                    });

                    // Atur form saat ini berdasarkan status sebelumnya
                    formContainer.style.display = isFormVisible ? 'none' : 'block';
                }
            });
        });

        // Sentuh di mana saja di area luar layar HP untuk menyembunyikan form login kembali
        document.addEventListener('click', (event) => {
            if (window.innerWidth <= 992) {
                hoverColumns.forEach(column => {
                    const formContainer = column.querySelector('.login-form-container');
                    if (!column.contains(event.target)) {
                        formContainer.style.display = 'none';
                    }
                });
            }
        });

