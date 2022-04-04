<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link href="css/style.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/style.css">

    {{-- Font Awesome CDN --}}
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- JQuery -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"
        integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer">
    </script>

  </head>
  <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark fixed-top">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="/">Hyber.App</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-m order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars fa-lg"></i></button>
        <!-- Navbar Search-->
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
          <!-- <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
          </div> -->
        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw" style="color: #434a6a"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#!">Settings</a></li>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
          </li>
        </ul>
    </nav>

    <!-- Side navbar -->
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
              <div class="sb-sidenav-menu">
                <div class="nav">
                  <div class="sb-sidenav-menu-heading">Core</div>
                  <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                  </a>
                  <div class="sb-sidenav-menu-heading">Interface</div>
        
                  <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                    Perusahaan
                  </a>
        
                  <a class="nav-link collapsed active" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Accounts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link active" href="#">Admin</a>
                      <a class="nav-link" href="#">Karyawan</a>
                    </nav>
                  </div>
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                        Authentication
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                      </a>
                      <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                          <a class="nav-link" href="login.html">Login</a>
                          <a class="nav-link" href="register.html">Register</a>
                          <a class="nav-link" href="password.html">Forgot Password</a>
                        </nav>
                      </div>
                      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                        Error
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                      </a>
                      <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                          <a class="nav-link" href="401.html">401 Page</a>
                          <a class="nav-link" href="404.html">404 Page</a>
                          <a class="nav-link" href="500.html">500 Page</a>
                        </nav>
                      </div>
                    </nav>
                  </div>
                  <div class="sb-sidenav-menu-heading">Addons</div>
                  <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                  </a>
                  <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                  </a>
                </div>
              </div>
              <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                Andiko Yoga
              </div>
            </nav>
        </div>

      <!-- Content -->
      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid px-4">
            <div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">Account Admin</div>
            <div class="row">
              <div class="add-admin col-xl-3 col-md-6">
                <button type="button" class="btn btn-primary my-4" id="tambah-acc" data-bs-toggle="modal" data-bs-target="#popupTambahAcc">
                  <i class="fa-solid fa-pencil"></i>
                  <span class="ps-2 fw-bolder"> Tambah Akun</span>
                </button>
              </div>
            </div>
            <div class="row">
              <div class="tabel-adm col-xl-3 col-md-6 mx-auto">
                <h4 class="pt-4 pb-3">Daftar Akun Admin</h4>
                <div class="table-responsive w-auto">
                  <table class="table table-bordered">
                    <thead>
                      <th scope="col">Id</th>
                      <th scope="col">Nama Lengkap</th>
                      <th scope="col">Email</th>
                      <th scope="col">No. HP</th>
                      <th scope="col">Action</th>
                    </thead>
                    <tbody class="align-middle">
                      <th scope="row">1</th>
                      <th scope="row">Andiko Yoga</th>
                      <th scope="row">rizuna30@gmail.com</th>
                      <th scope="row">085157506552</th>
                      <th scope="row">
                        <button type="button" class="view-btn rounded-3 ms-2 my-1" data-bs-toggle="modal" data-bs-target="#popupViewAcc"><i class="fa-solid fa-eye"></i></button>
                        <button type="button" class="edit-btn rounded-3 ms-2 my-1"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button type="button" class="delete-btn rounded-3 ms-2 my-1" data-bs-toggle="modal" data-bs-target="#popupDeleteAcc"><i class="fa-solid fa-trash-can"></i></button>
                      </th>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </main>

        <!-- Popup Delete Account -->
        <div class="modal fade" id="popupDeleteAcc">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-body">
                <h6>Apakah Anda Ingin Menghapus Data Ini?</h6>
              </div>
              <div class="modal-footer">
                <button type="button" class="cancel-btn rounded-3" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="conf-delete-btn rounded-3">Hapus</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Popup  View Account-->
        <div class="modal fade" id="popupViewAcc">
          <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title fw-bold">Detail Account</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <div class="container">
                  <div class="row mx-1">
                    <div class="col-3">
                      <p class="fw-bold">Nama Lengkap</p>
                    </div>
                    <div class="col-3">
                      <p class="fw-bold">:</p>
                    </div>
                    <div class="col-6 text-end">
                      <p>Andiko Yoga</p>
                    </div>
                  </div>

                  <div class="row mx-1">
                    <div class="col-3">
                      <p class="fw-bold">Alamat</p>
                    </div>
                    <div class="col-3">
                      <p class="fw-bold">:</p>
                    </div>
                    <div class="col-6 text-end">
                      <p>Ds.Banaran, Kec.Kauman, Kab.Tulungagung, Jawa Timur 66261</p>
                    </div>
                  </div>

                  <div class="row mx-1">
                    <div class="col-3">
                      <p class="fw-bold">Email</p>
                    </div>
                    <div class="col-3">
                      <p class="fw-bold">:</p>
                    </div>
                    <div class="col-6 text-end">
                      <p>rizuna30@gmail.com</p>
                    </div>
                  </div>

                  <div class="row mx-1">
                    <div class="col-3">
                      <p class="fw-bold">Nomor Telepon</p>
                    </div>
                    <div class="col-3">
                      <p class="fw-bold">:</p>
                    </div>
                    <div class="col-6 text-end">
                      <p>085157506552</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Tambah Akun -->
        <div class="modal fade" id="popupTambahAcc">
          <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title fw-bold">Tambah Account</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body mt-3">
                <form action="">
                  <div class="form-group row mb-4 px-3">
                    <label for="form-alamat" class="form-label col-3">Alamat</label>
                    <div class="col-9">
                      <input type="text" class="form-control" id="form-alamat" />
                    </div>
                  </div>
                  <div class="form-group row mb-4 px-3">
                    <label for="form-kecamatan" class="form-label col-3">Kecamatan</label>
                    <div class="col-9">
                      <input type="text" class="form-control" id="form-kecamatan" />
                    </div>
                  </div>
                  <div class="form-group row mb-4 px-3">
                    <label for="form-kabupaten" class="form-label col-3">Kabupaten</label>
                    <div class="col-9">
                      <input type="text" class="form-control" id="form-kabupaten" />
                    </div>
                  </div>
                  <div class="form-group row mb-4 px-3">
                    <label for="form-kode-pos" class="form-label col-3">Kode Pos</label>
                    <div class="col-9">
                      <input type="text" class="form-control" id="form-kode-pos" />
                    </div>
                  </div>
                  <div class="form-group row mb-4 px-3">
                    <label for="form-email" class="form-label col-3">Email</label>
                    <div class="col-9">
                      <input type="email" class="form-control" id="form-email" />
                    </div>
                  </div>
                  <div class="form-group row mb-4 px-3">
                    <label for="form-password" class="form-label col-3">Password</label>
                    <div class="col-9">
                      <input type="password" class="form-control" id="form-password" />
                    </div>
                  </div>
                  <div class="form-group row mb-4 px-3">
                    <label for="form-no-tlp" class="form-label col-3">No. Telp</label>
                    <div class="col-9">
                      <input type="text" class="form-control" id="form-no-tlp" />
                    </div>
                  </div>
                  <div class="form-group row mb-4 px-3">
                    <label for="form-role" class="form-label col-3">Role</label>
                    <div class="col-9">
                      <select class="form-select" aria-label="select-role" id="form-role">
                        <option value="Admin" selected>Admin</option>
                        <option value="Karyawan">Karyawan</option>
                      </select>
                    </div>
                  </div>
                </form>
              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
  </body>
</html>
