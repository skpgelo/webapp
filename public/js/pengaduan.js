const sectionBelumLogin = document.getElementById('section-belum-login');
const sectionSudahLogin = document.getElementById('section-sudah-login');
const areaTrigger = document.getElementById('area-trigger');
const formFitur = document.getElementById('form-fitur');
const loginError = document.getElementById('login-error');
const fileError = document.getElementById('file-error');

// HOVER SYSTEM
if (areaTrigger) {
    areaTrigger.addEventListener('mouseover', function() {
        formFitur.classList.add('show');
    });

    areaTrigger.addEventListener('mouseleave', function() {
        if (document.activeElement.tagName !== 'INPUT') {
            formFitur.classList.remove('show');
        }
    });
}

// VALIDASI REAL-TIME UKURAN FILE (MAKS 2MB)
function validasiFile(input) {
    const file = input.files[0];
    if (!file) return;

    const tipeDiizinkan = ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'];
    const ukuranMaksimal = 2 * 1024 * 1024; // 2MB

    if (!tipeDiizinkan.includes(file.type) || file.size > ukuranMaksimal) {
        fileError.textContent = "Format file salah (harus PDF/Gambar) atau ukuran melebihi 2 MB!";
        fileError.classList.remove('hidden');
        input.value = '';
    } else {
        fileError.classList.add('hidden');
    }
}

// KIRIM DATA KE BACKEND ROUTE CI4
function kirimKeBackend(event) {
    event.preventDefault();
    const formElement = document.getElementById('form-data-fitur');
    const formData = new FormData(formElement);

    fetch(`${baseUrl}/auth/simpan`, {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message);
        if(data.status === 'success') {
            formElement.reset();
            formFitur.classList.remove('show');
        }
    })
    .catch(err => console.error('Error:', err));
}