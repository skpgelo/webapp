
  // Dibungkus dalam IIFE (Immediately Invoked Function Expression) 
  // agar variabel tidak bentrok jika komponen ini dimuat di berbagai halaman
  (function() {
    const modalBody = document.getElementById('modalBodyTerms');
    const btnSetuju = document.getElementById('btnModalSetuju');
    const btnTolak = document.getElementById('btnModalTolak');

    // Ambil checkbox target yang ada di halaman utama (menggunakan id standar 'checkSyarat')
    const checkSyarat = document.getElementById('checkSyarat'); 
    const btnDaftar = document.getElementById('btnDaftar'); 

    // 1. Logika gulir teks
    modalBody.addEventListener('scroll', () => {
      if (modalBody.scrollTop + modalBody.clientHeight >= modalBody.scrollHeight - 5) {
        btnSetuju.removeAttribute('disabled');
      }
    });

    // 2. Aksi jika tombol "Saya Setuju" diklik
    btnSetuju.addEventListener('click', () => {
      if (checkSyarat) {
        checkSyarat.disabled = false;
        checkSyarat.checked = true;
        // Trigger event change manual agar script halaman utama tahu jika checkbox berubah
        checkSyarat.dispatchEvent(new Event('change')); 
      }
      if (btnDaftar) btnDaftar.removeAttribute('disabled');
    });

    // 3. Aksi jika tombol "Tolak" diklik
    btnTolak.addEventListener('click', () => {
      if (checkSyarat) {
        checkSyarat.checked = false;
        checkSyarat.disabled = true;
        checkSyarat.dispatchEvent(new Event('change'));
      }
      if (btnDaftar) btnDaftar.setAttribute('disabled', 'true');
    });
  })();
