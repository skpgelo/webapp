<!-- Bagian dari VIEW/READ: Menampilkan data lengkap individu -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="fas fa-user-circle mr-2"></i> Detail Profil Karyawan</h5>
                <button class="close text-white" type="button" data-dismiss="modal"><span>×</span></button>
            </div>
            <div class="modal-body text-center p-4">
                <img id="detail-foto" src="" class="rounded-circle border mb-3 shadow-sm" style="width:110px; height:110px; object-fit:cover;">
                <h4 id="detail-nama" class="font-weight-bold text-dark mb-0">-</h4>
                <span id="detail-jabatan" class="badge badge-danger mt-1 px-3 py-1 rounded-pill">-</span>
                <table class="table table-sm table-striped border text-left mt-4">
                    <tr><th width="40%">ID Card</th><td id="detail-id_card"></td></tr>
                    <tr><th>Gender</th><td id="detail-gender"></td></tr>
                    <tr><th>TTL</th><td id="detail-ttl"></td></tr>
                    <tr><th>Email</th><td id="detail-email"></td></tr>
                    <tr><th>Alamat</th><td id="detail-alamat" class="text-wrap"></td></tr>
                </table>
            </div>
        </div>
    </div>
</div>
