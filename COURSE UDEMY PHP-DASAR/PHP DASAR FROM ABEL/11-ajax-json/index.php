<?php require 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include APP_ROOT . '/includes/head.php'; ?>
  <title><?= SITE_NAME ?> - Mahasiswa</title>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include APP_ROOT . '/includes/sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include APP_ROOT . '/includes/navbar.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Mahasiswa</h6>
              <button class="btn btn-primary btn-sm" id="tambahMhs" data-toggle="modal" data-target="#formMhsModal">Tambah Data</button>
            </div>
            <div class="card-body">

              <div class="row justify-content-between mb-2">
                <div class="col-auto">
                  <div class="form-group form-row align-items-center mb-0">
                    <label for="perPage" class="col-sm-auto col-form-label">Show</label>
                    <div class="col-sm-auto">
                      <select class="form-control form-control-sm" id="perPage" name="perPage">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-auto">
                  <div class="form-group form-row align-items-center mb-0">
                    <label for="keyword" class="col-sm-auto col-form-label">Search</label>
                    <div class="col-sm-auto">
                      <input type="text" class="form-control form-control-sm" id="keyword">
                    </div>
                  </div>
                </div>
              </div>

              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Nim</th>
                      <th scope="col">Jurusan</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>

              <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                  <p class="mb-0">Total: <span id="show-total"></span></p>
                </div>
                <div class="col-auto">
                  <div id="show-pagination"></div>
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include APP_ROOT . '/includes/footer.php'; ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <?php include APP_ROOT . '/includes/scroll-to-top.php'; ?>

  <!-- Modal Detail Mahasiswa -->
  <div class="modal fade" id="detailMhsModal" tabindex="-1" aria-labelledby="detailMhsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailMhsModalLabel">Detail Mahasiswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Submit Mahasiswa -->
  <div class="modal fade" id="formMhsModal" tabindex="-1" aria-labelledby="formMhsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formMhsModalLabel">Tambah Mahasiswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formMhs">
          <div class="modal-body">
            <input type="hidden" id="id">
            <input type="hidden" id="fotoLama">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama">
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="nim">Nim</label>
              <input type="text" class="form-control" id="nim">
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email">
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="jurusan">Jurusan</label>
              <select class="form-control" id="jurusan">
                <option value="">Pilih Jurusan</option>
              </select>
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="foto">Foto</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="foto">
                <label class="custom-file-label" for="foto">Choose file</label>
                <div class="invalid-feedback"></div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Script -->
  <?php include APP_ROOT . '/includes/script.php'; ?>

  <script>
    const tbody = document.querySelector('tbody');
    const showPagination = document.querySelector('#show-pagination');
    const perPage = document.querySelector('#perPage');
    const keyword = document.querySelector('#keyword');

    const tambahMhs = document.querySelector('#tambahMhs');
    const formMhsModal = document.querySelector('#formMhsModal');

    const form = formMhsModal.querySelector('form');
    const btnClose = form.querySelector('button[data-dismiss=modal]');
    const btnSave = form.querySelector('button[type=submit]');

    const fields = ['nama', 'nim', 'email', 'jurusan', 'foto'];
    let isNamaValid = isEmailValid = isNimValid = isJurusanValid = false;
    let isFotoValid = true;

    function ajaxPost(url, data, callback) {
      const xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          callback(this);
        }
      }
      xhr.open('POST', url, true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.send(data);
    }

    function ajaxGet(url, callback) {
      const xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          callback(this);
        }
      }
      xhr.open('GET', url, true);
      xhr.send();
    }

    function resetInput() {
      form.nama.value = '';
      form['nim'].value = '';
      form.email.value = '';
      form['jurusan'].value = '';
      document.getElementById('fotoLama').value = '';
      document.getElementById('id').value = '';
      document.querySelector('input[type="file"]').value = '';
      document.querySelector('.custom-file-label').textContent = 'Choose file';

      btnSave.innerHTML = 'Simpan';
      formMhsModal.querySelector('.modal-title').innerHTML = 'Tambah Mahasiswa';

      fields.forEach(function(field) {
        const input = document.getElementById(field);
        input.classList.remove('is-invalid');
      });

      const msgInvalid = document.querySelectorAll('.invalid-feedback');
      msgInvalid.forEach(function(message) {
        message.innerText = '';
      });
    }

    function setStatus(field, status, message = '') {
      status === 'error' ? field.classList.add('is-invalid') : field.classList.remove('is-invalid');
      field.nextElementSibling.innerText = message;
    }

    function validateFields(field) {

      if (field.id == 'nama') {
        if (!field.value.trim()) {
          isNamaValid = false;
          setStatus(field, "error", `${field.previousElementSibling.innerText} tidak boleh kosong!`);
        } else {
          const re = /^[a-zA-Z\s]+$/;
          if (!re.test(field.value)) {
            isNamaValid = false;
            setStatus(field, "error", `${field.previousElementSibling.innerText} hanya mengandung huruf dan spasi!`);
          } else {
            isNamaValid = true;
            setStatus(field, "success");
          }
        }
      }

      if (field.id == 'nim') {
        if (!field.value.trim()) {
          isNimValid = false;
          setStatus(field, "error", `${field.previousElementSibling.innerText} tidak boleh kosong!`);
        } else {
          const re = /^\d+$/;
          if (!re.test(field.value)) {
            isNimValid = false;
            setStatus(field, "error", `${field.previousElementSibling.innerText} hanya mengandung angka!`);
          } else {
            if (field.value.length < 9) {
              isNimValid = false;
              setStatus(field, "error", `Panjang ${field.previousElementSibling.innerText} harus 9 digit!`);
            } else {
              const data = "nim=" + form.nim.value + "&id=" + form.id.value;
              ajaxPost('check-data.php', data, function(xhr) {
                const result = JSON.parse(xhr.responseText);
                if (result.error) {
                  isNimValid = false;
                  field.classList.add('is-invalid');
                  field.nextElementSibling.innerText = `${result.error}`;
                } else {
                  isNimValid = true;
                  field.classList.remove('is-invalid');
                  field.nextElementSibling.innerText = null;
                }
              });
            }
          }
        }
      }

      if (field.id == 'email') {
        if (!field.value.trim()) {
          isEmailValid = false;
          setStatus(field, "error", `${field.previousElementSibling.innerText} tidak boleh kosong!`);
        } else {
          const regex = /^\S+@\S+\.\S+$/;
          if (!regex.test(field.value)) {
            isEmailValid = false;
            setStatus(field, "error", `${field.previousElementSibling.innerText} tidak valid!`);
          } else {
            const data = "email=" + form.email.value + "&id=" + form.id.value;
            ajaxPost('check-data.php', data, function(xhr) {
              const result = JSON.parse(xhr.responseText);
              if (result.error) {
                isEmailValid = false;
                field.classList.add('is-invalid');
                field.nextElementSibling.innerText = `${result.error}`;
              } else {
                isEmailValid = true;
                field.classList.remove('is-invalid');
                field.nextElementSibling.innerText = null;
              }
            });
          }
        }
      }

      if (field.id == 'jurusan') {
        if (!field.value.trim()) {
          isJurusanValid = false;
          setStatus(field, "error", `${field.previousElementSibling.innerText} tidak boleh kosong!`);
        } else {
          isJurusanValid = true;
          setStatus(field, "success");
        }
      }

      if (field.id == 'foto') {
        if (field.files.length) {
          const fileName = field.files[0].name;
          const fileSize = field.files[0].size;
          const extension = fileName.substr(fileName.lastIndexOf("."));
          const allowedExts = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

          if (allowedExts.test(extension)) {
            isFotoValid = true;
            field.classList.remove('is-invalid');
            field.nextElementSibling.nextElementSibling.innerText = null;
          } else {
            isFotoValid = false;
            field.classList.add('is-invalid');
            field.nextElementSibling.nextElementSibling.innerText = "Extension file tidak valid!";
          }

          if (isFotoValid) {
            if (Math.round(fileSize / 1024) <= 2 * 1024) {
              isFotoValid = true;
              field.classList.remove('is-invalid');
              field.nextElementSibling.nextElementSibling.innerText = null;
            } else {
              isFotoValid = false;
              field.classList.add('is-invalid');
              field.nextElementSibling.nextElementSibling.innerText = "Ukuran file tidak boleh lebih dari 2MB!";
            }
          }
        }
      }

    }

    fields.forEach(function(field) {
      const input = document.getElementById(field);
      input.addEventListener('input', function(e) {
        validateFields(input);
      });
    });

    form.addEventListener('submit', function(e) {
      e.preventDefault();

      // fields.forEach(function(field) {
      //   const input = document.getElementById(field);
      //   validateFields(input);
      // });

      for (const field of fields) {
        const input = document.getElementById(field);
        validateFields(input);
      }

      for (const field of fields) {
        const input = document.getElementById(field);
        if (input.classList.contains('is-invalid')) {
          input.focus();
          break;
        }
      }

      let isFormValid = isNamaValid && isNimValid && isEmailValid && isJurusanValid && isFotoValid;

      if (isFormValid) {
        const data = new FormData();
        data.append('nama', form.nama.value);
        data.append('nim', form['nim'].value);
        data.append('email', e.target.email.value);
        data.append('jurusan', e.target['jurusan'].value);
        data.append('foto', document.getElementById('foto').files[0]);
        data.append('fotoLama', form.fotoLama.value);
        data.append('id', form.id.value);

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            const result = JSON.parse(this.responseText);
            if (result.OK) {
              if (form.id.value) {
                alert('Data berhasil diupdate!');
              } else {
                alert('Data berhasil ditambahkan!');
              }
              resetInput();
              $('#formMhsModal').modal('hide');
              loadData(perPage.value);
            }
          }
        }
        xhr.open('POST', 'mahasiswa.php?action=submit', true);
        xhr.send(data);
      }

    });

    tambahMhs.addEventListener('click', function(e) {
      resetInput();
    });

    function loadData(perPage, keyword = '', page = 1) {
      ajaxGet('mahasiswa.php?action=show&perPage=' + perPage + '&keyword=' + keyword + '&page=' + page, function(xhr) {
        const result = JSON.parse(xhr.responseText);

        let html = pagination = '';
        if (result.total) {
          // Object.entries(result.mhs).forEach(([key, value]) => {
          //   console.log(`${key}: ${value}`);
          // });
          for (let [i, mhs] of Object.entries(result.mahasiswa)) {
            html += `<tr>
                          <th class="align-middle text-nowrap" scope="row">${parseInt(i) + 1 + result.start}</th>
                          <td class="align-middle text-nowrap">${mhs.nama}</td>
                          <td class="align-middle text-nowrap">${mhs.nim}</td>
                          <td class="align-middle text-nowrap">${mhs.nama_jurusan}</td>
                          <td class="align-middle text-nowrap">
                            <a href="javascript:void(0)" class="py-0 btn btn-info btn-sm detail-mhs" data-id="${mhs.id}" data-toggle="modal" data-target="#detailMhsModal">Detail</a>
                            <a href="javascript:void(0)" class="py-0 btn btn-primary btn-sm edit-mhs" data-id="${mhs.id}">Edit</a>
                            <a href="javascript:void(0)" class="py-0 btn btn-secondary btn-sm delete-mhs" data-id="${mhs.id}">Delete</a>
                          </td>
                        </tr>`;
          }
        } else {
          html += `<tr class="text-nowrap"><td colspan="5" class="text-center text-danger">Data tidak ditemukan!</td></tr>`;
        }

        pagination += `<nav aria-label="Page navigation"><ul class="pagination mb-0">`;

        if (result.page > 1) {
          pagination += `<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="1">First</a></li>
            <li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="${result.page - 1}">&laquo;</a></li>`;
        }

        for (let [index, data] of Object.entries(result.pageArr)) {
          pagination += `<li class="page-item ${(result.page == data) ? 'active' : ''}">
              <a href="javascript:void(0)" class="page-link" data-page="${data}">${data}</a>
            </li>`;
        }

        if (result.page < result.pages) {
          pagination += `<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="${result.page + 1}">&raquo;</a></li><li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="${result.pages}">Last</a></li>`;
        }

        pagination += `</ul></nav>`;

        tbody.innerHTML = html;
        showPagination.innerHTML = pagination;
        document.querySelector('#show-total').textContent = result.total;
      });
    }

    loadData(perPage.value.trim());

    perPage.addEventListener('input', function(e) {
      loadData(this.value.trim());
    });

    keyword.addEventListener('input', function(e) {
      loadData(perPage.value.trim(), this.value.trim());
    });

    showPagination.addEventListener('click', function(e) {
      e.preventDefault();
      if (e.target.classList.contains('page-link')) {
        loadData(perPage.value.trim(), keyword.value.trim(), e.target.dataset.page);
      }
    });

    tbody.addEventListener('click', function(e) {
      e.preventDefault();

      if (e.target.classList.contains('detail-mhs')) {
        ajaxGet('mahasiswa.php?action=detail&id=' + e.target.dataset.id, function(xhr) {
          const result = JSON.parse(xhr.responseText);
          const html = `<img src="uploads/${result.foto}" alt="mhs-image" class="img-thumbnail mb-3 w-25">
                        <ul class="list-group">
                          <li class="list-group-item">${result.nama}</li>
                          <li class="list-group-item">${result.nim}</li>
                          <li class="list-group-item">${result.email}</li>
                          <li class="list-group-item">${result.nama_jurusan}</li>
                        </ul>`;
          const detailMhsModal = document.querySelector('#detailMhsModal');
          detailMhsModal.querySelector('.modal-body').innerHTML = html;
        });
      }

      if (e.target.classList.contains('edit-mhs')) {
        $('#formMhsModal').modal('show');
        resetInput();
        btnSave.innerHTML = 'Update';
        formMhsModal.querySelector('.modal-title').innerHTML = 'Edit Mahasiswa';

        ajaxGet('mahasiswa.php?action=edit&id=' + e.target.dataset.id, function(xhr) {
          const data = JSON.parse(xhr.responseText);
          form.nama.value = data.nama;
          form['nim'].value = data.nim;
          form.email.value = data.email;
          form['jurusan'].value = data.id_jurusan;
          document.getElementById('fotoLama').value = data.foto;
          document.getElementById('id').value = data.id;

          fields.forEach(function(field) {
            const input = document.getElementById(field);
            validateFields(input);
          });
        });
      }

      if (e.target.classList.contains('delete-mhs')) {
        if (confirm('yakin?')) {
          ajaxGet('mahasiswa.php?action=delete&id=' + e.target.dataset.id, function(xhr) {
            const result = JSON.parse(xhr.responseText);
            if (result.OK) {
              alert('Data berhasil dihapus');
              loadData(perPage.value);
            }
          });
        }
      }

    });

    function loadJurusan() {
      ajaxGet('mahasiswa.php?action=jurusan', function(xhr) {
        const result = JSON.parse(xhr.responseText);
        for (let [index, data] of Object.entries(result.jurusan)) {
          form.querySelector('#jurusan').insertAdjacentHTML("beforeend", `<option value="${data.id}">${data.nama}</option>`);
        }
      });
    }

    loadJurusan();
  </script>
</body>

</html>