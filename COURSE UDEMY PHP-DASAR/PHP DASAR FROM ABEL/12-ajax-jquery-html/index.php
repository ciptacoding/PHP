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

          <!-- Content Row -->
          <div class="row mb-4">

            <div class="col-md-7">

              <div class="card shadow">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Daftar Mahasiswa</h6>
                </div>
                <div class="card-body">

                  <div class="row justify-content-between align-items-center mb-1">
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

                  <div id="mhs-wrapper"></div>

                </div>
              </div>
            </div>

            <div class="col-md-5">
              <div class="card shadow" id="mhs-tambah">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tambah Mahasiswa</h6>
                </div>
                <div class="card-body">
                  <form method="POST" action="save.php">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="fotoLama" name="fotoLama">
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                      <label for="nim">Nim</label>
                      <input type="text" class="form-control" id="nim" name="nim">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                      <label for="jurusan">Jurusan</label>
                      <select class="form-control" id="jurusan" name="jurusan">
                        <option value=""></option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="foto">Foto</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto" name="foto">
                        <label class="custom-file-label" for="foto">Choose file</label>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                      <button type="button" class="btn btn-secondary mr-1">Batal</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
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

  <!-- Modal -->
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


  <!-- Script -->
  <?php include APP_ROOT . '/includes/script.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
  <script>
    $('form button[type=button]').addClass('d-none');

    function resetInput() {
      $('form #nama').val('');
      $('form #nim').val('');
      $('form #email').val('');
      $('form #jurusan').val('');
      $('form #fotoLama').val('');
      $('form #id').val('');
      $('form input[type="file"]').val('');
      $('form .custom-file-label').text('Choose file');

      $('form button[type=button]').addClass('d-none');
      $('form button[type=submit]').text('Simpan');
      $('#mhs-tambah h6').text('Tambah Mahasiswa');

      // $('form .form-control').removeClass('is-invalid');
      // $('form .form-control').removeClass('is-valid');
      // $('form .invalid-feedback').remove();
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
            url: 'check-nim.php',
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
            url: 'check-email.php',
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
        // jQuery(element).closest('.form-control').addClass('is-invalid');
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element) {
        // jQuery(element).closest('.form-control').removeClass('is-invalid').addClass('is-valid');
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
        }).done(function(data, textStatus, jqXHR) {
          alert(data);
          loadData($('#perPage').val().trim());
        }).fail(function(jqXHR, textStatus, errorThrown) {
          console.log('Request faield: ' + jqXHR.responseText);
        }).always(function(jqXHR, textStatus, errorThrown) {
          resetInput();
        });
      }
    });

    function loadData(perPage, keyword = '', page = 1) {
      $.ajax({
        url: 'fetch.php?perPage=' + perPage + '&keyword=' + keyword + '&page=' + page,
        type: 'GET'
      }).done(function(data, textStatus, jqXHR) {
        $('#mhs-wrapper').html(data);
      }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log('Request faield: ' + jqXHR.responseText);
      });
    }

    loadData($('#perPage').val().trim());

    $('#perPage').on('input', function() {
      loadData($(this).val().trim(), $('#keyword').val().trim(), 1);
    });

    $('#keyword').on('input', function() {
      loadData($('#perPage').val().trim(), $(this).val().trim(), 1);
    });

    $('#mhs-wrapper').on('click', '.page-link', function(e) {
      e.preventDefault();
      if (e.target.hasAttribute('data-page')) {
        loadData($('#perPage').val().trim(), $('#keyword').val().trim(), e.target.dataset.page);
      }
    });

    $('#mhs-wrapper').on('click', '.detail-mhs', function(e) {
      e.preventDefault();

      $('#detailMhsModal').modal('show');

      $.ajax({
        url: 'detail.php?id=' + e.target.dataset.id,
        type: 'GET'
      }).done(function(data, textStatus, jqXHR) {
        $('#detailMhsModal .modal-body').html(data);
      }).fail(function(jqXHR, textStatus, errorThrown) {
        console.log('Request faield: ' + jqXHR.responseText);
      });
    });

    $('#mhs-wrapper').on('click', '.delete-mhs', function(e) {
      e.preventDefault();

      if (confirm('yakin?')) {
        $.ajax({
          url: 'delete.php?id=' + e.target.dataset.id,
          type: 'GET'
        }).done(function(data, textStatus, jqXHR) {
          alert(data);
          loadData($('#perPage').val().trim());
        }).fail(function(jqXHR, textStatus, errorThrown) {
          console.log('Request faield: ' + jqXHR.responseText);
        }).always(function(jqXHR, textStatus, errorThrown) {
          resetInput();
        });
      }
    });

    $('#mhs-wrapper').on('click', '.edit-mhs', function(e) {
      e.preventDefault();

      resetInput();
      $('#mhs-tambah h6').text('Edit Mahasiswa');
      $('form button[type=button]').removeClass('d-none');
      $('form button[type=submit]').text('Update');

      $.ajax({
        url: 'edit.php?id=' + e.target.dataset.id,
        type: 'GET'
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

    $('form button[type=button]').on('click', function(e) {
      resetInput();
    });

    function loadJurusan() {
      $.ajax({
        url: 'jurusan.php',
        type: 'GET'
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