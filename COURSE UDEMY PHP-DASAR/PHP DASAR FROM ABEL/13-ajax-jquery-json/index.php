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
        <form id="formMhs" method="POST" action="mahasiswa.php?action=submit">
          <div class="modal-body">
            <input type="hidden" id="id" name="id">
            <input type="hidden" id="fotoLama" name="fotoLama">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama">
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="nim">Nim</label>
              <input type="text" class="form-control" id="nim" name="nim">
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email">
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="jurusan">Jurusan</label>
              <select class="form-control" id="jurusan" name="jurusan">
                <option value="">Pilih Jurusan</option>
              </select>
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="foto">Foto</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="foto" name="foto">
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

  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>

  <script>
    function resetInput() {
      $('form #nama').val('');
      $('form #nim').val('');
      $('form #email').val('');
      $('form #jurusan').val('');
      $('form #fotoLama').val('');
      $('form #id').val('');
      $('form input[type="file"]').val('');
      $('form .custom-file-label').text('Choose file');

      $('form button[type=submit]').text('Simpan');
      $('#formMhsModalLabel').text('Tambah Mahasiswa');

      $('form .form-control').removeClass('is-invalid');
      $('form').validate().resetForm();
    }

    $.validator.addMethod('filesize', function(value, element, param) {
      if (element.files.length) {
        const size = Math.round(element.files[0].size / 1024);
        const limit = parseInt(param);
        if (size <= limit) return true;
        return false;
      }
      return true;
    });

    $('form').validate({
      normalizer: function(value) {
        return $.trim(value);
      },
      rules: {
        nama: 'required',
        nim: {
          required: true,
          number: true,
          minlength: 9,
          remote: {
            url: 'check-data.php',
            type: 'post',
            data: {
              nim: function() {
                return $('form #nim').val();
              },
              id: function() {
                return $('form #id').val();
              }
            }
          }
        },
        email: {
          required: true,
          email: true,
          remote: {
            url: 'check-data.php',
            type: 'post',
            data: {
              email: function() {
                return $('form #email').val();
              },
              id: function() {
                return $('form #id').val();
              }
            }
          }
        },
        jurusan: 'required',
        foto: {
          // extension: 'xls|csv',
          accept: 'image/*',
          filesize: 2048
        }
      },
      messages: {
        nim: {
          remote: 'This nim is already taken!'
        },
        email: {
          required: 'This email is required!',
          remote: 'This email is already taken!'
        },
        foto: {
          accept: 'File must be an Image',
          filesize: 'File must be less than 2MB'
        }
      },
      errorElement: 'div',
      errorClass: 'invalid-feedback',
      highlight: function(element) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element) {
        $(element).removeClass('is-invalid');
      },
      errorPlacement: function(error, element) {
        if (element.parent('.input-group-prepend').length) {
          $(element).siblings('.invalid-feedback').append(error);
        } else {
          error.insertAfter(element);
        }
      },
      submitHandler: function(form) {
        $.ajax({
          url: form.action,
          type: form.method,
          data: new FormData(form),
          enctype: 'multipart/form-data',
          processData: false,
          contentType: false,
          cache: false,
          dataType: 'json'
        }).done(function(data, textStatus, jqXHR) {
          if (data.OK) {
            $('form #id').val() ? alert('berhasil diubah') : alert('berhasil disimpan');
            loadData($('#perPage').val());
          }
        }).fail(function(jqXHR, textStatus, errorThrown) {
          console.log('Request faield: ' + jqXHR.responseText);
        }).always(function(jqXHR, textStatus, errorThrown) {
          resetInput();
          $('#formMhsModal').modal('hide');
        });
      }
    });

    $('#tambahMhs').on('click', function(e) {
      resetInput();
    });

    function loadData(perPage, keyword = '', page = 1) {
      $.ajax({
        url: 'mahasiswa.php?action=show&perPage=' + perPage + '&keyword=' + keyword + '&page=' + page,
        type: 'GET',
        dataType: 'json'
      }).done(function(data, textStatus, jqXHR) {
        $('tbody').empty();
        if (data.total) {
          $.each(data.mahasiswa, function(key, value) {
            $('tbody').append(`<tr>
                                <th class="align-middle text-nowrap" scope="row">${parseInt(key) + 1 + data.start}</th>
                                <td class="align-middle text-nowrap">${value.nama}</td>
                                <td class="align-middle text-nowrap">${value.nim}</td>
                                <td class="align-middle text-nowrap">${value.nama_jurusan}</td>
                                <td class="align-middle text-nowrap">
                                  <a href="javascript:void(0)" class="py-0 btn btn-info btn-sm detail-mhs" data-id="${value.id}" data-toggle="modal" data-target="#detailMhsModal">Detail</a>
                                  <a href="javascript:void(0)" class="py-0 btn btn-primary btn-sm edit-mhs" data-id="${value.id}">Edit</a>
                                  <a href="javascript:void(0)" class="py-0 btn btn-secondary btn-sm delete-mhs" data-id="${value.id}">Delete</a>
                                </td>
                              </tr>`);
          });

          pagination = `<nav aria-label="Page navigation"><ul class="pagination mb-0">`;
          if (data.page > 1) {
            pagination += `<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="1">First</a></li>
                           <li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="${data.page - 1}">&laquo;</a></li>`;
          }
          $.each(data.pageArr, function(index, value) {
            pagination += `<li class="page-item ${(data.page == value) ? 'active' : ''}">
                            <a href="javascript:void(0)" class="page-link" data-page="${value}">${value}</a>
                           </li>`;
          });
          if (data.page < data.pages) {
            pagination += `<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="${data.page + 1}">&raquo;</a></li>
                           <li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="${data.pages}">Last</a></li>`;
          }
          pagination += `</ul></nav>`;
          $('#show-pagination').html(pagination);
        } else {
          $('tbody').append(`<tr class="text-nowrap"><td colspan="5" class="text-center text-danger">Data tidak ditemukan!</td></tr>`);
        }

        $('#show-total').text(data.total);
      }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log('Request faield: ' + jqXHR.responseText);
      });
    }

    loadData($('#perPage').val().trim());

    $('#perPage').on('input', function(e) {
      loadData($(this).val().trim());
    });

    $('#keyword').on('input', function(e) {
      loadData($('#perPage').val().trim(), $(this).val().trim());
    });

    $('#show-pagination').on('click', function(e) {
      e.preventDefault();
      if ($(e.target).hasClass('page-link')) {
        loadData($('#perPage').val().trim(), $('#keyword').val().trim(), $(e.target).data('page'));
      }
    });

    $('tbody').on('click', '.detail-mhs', function(e) {
      e.preventDefault();
      $.ajax({
        url: 'mahasiswa.php?action=detail&id=' + $(e.target).data('id'),
        type: 'GET',
        dataType: 'json'
      }).done(function(data, textStatus, jqXHR) {
        const html = `<img src="uploads/${data.foto}" alt="mhs-image" class="img-thumbnail mb-3 w-25">
                      <ul class="list-group">
                        <li class="list-group-item">${data.nama}</li>
                        <li class="list-group-item">${data.nim}</li>
                        <li class="list-group-item">${data.email}</li>
                        <li class="list-group-item">${data.nama_jurusan}</li>
                      </ul>`;
        $('#detailMhsModal .modal-body').html(html);
      }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log('Request faield: ' + jqXHR.responseText);
      });
    });

    $('tbody').on('click', '.edit-mhs', function(e) {
      e.preventDefault();
      $('#formMhsModal').modal('show');
      resetInput();
      $('form button[type=submit]').text('Update');
      $('#formMhsModal .modal-title').text('Edit Mahasiswa');
      $.ajax({
        url: 'mahasiswa.php?action=edit&id=' + $(e.target).data('id'),
        type: 'GET',
        dataType: 'json'
      }).done(function(data, textStatus, jqXHR) {
        $('form #nama').val(data.nama);
        $('form #nim').val(data.nim);
        $('form #email').val(data.email);
        $('form #jurusan').val(data.id_jurusan);
        $('form #fotoLama').val(data.foto);
        $('form #id').val(data.id);
      }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log('Request faield: ' + jqXHR.responseText);
      });
    });

    $('tbody').on('click', '.delete-mhs', function(e) {
      e.preventDefault();
      if (confirm('yakin?')) {
        $.ajax({
          url: 'mahasiswa.php?action=delete&id=' + $(e.target).data('id'),
          type: 'GET',
          dataType: 'json'
        }).done(function(data, textStatus, jqXHR) {
          if (data.OK) {
            alert('berhasil dihapus');
            loadData($('#perPage').val().trim());
          }
        }).fail(function(jqXHR, textStatus, errorThrown) {
          console.log('Request faield: ' + jqXHR.responseText);
        }).always(function(jqXHR, textStatus, errorThrown) {
          resetInput();
        });
      }
    });

    function loadJurusan() {
      $.ajax({
        url: 'jurusan.php',
        type: 'GET',
        dataType: 'json'
      }).done(function(data, textStatus, jqXHR) {
        for (let [index, jurusan] of Object.entries(data)) {
          $('#jurusan').append(`<option value="${jurusan.id}">${jurusan.nama}</option>`);
        }
      }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log('Request faield: ' + jqXHR.responseText);
      });
    }

    loadJurusan();
  </script>
</body>

</html>