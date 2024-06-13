<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->
<head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Posyandu Mawar | Data Balita</title><!--begin::Primary Meta Tags-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!--end::Primary Meta Tags-->
  <!--begin::Fonts-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous"><!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous"><!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous"><!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
  <link rel="stylesheet" href="dist/css/adminlte.css"><!--end::Required Plugin(AdminLTE)-->
  <link rel="stylesheet" href="dist/css/admin.css">
  <link rel="stylesheet" href="dist/css/master_balita.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="icon" type="image/x-icon" href="../dist/assets/favicon.ico"> <!-- Title Icon -->
</head> <!--end::Head--> <!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg sidebar-mini sidebar-collapse bg-body-tertiary"> <!--begin::App Wrapper-->
  <div class="app-wrapper"> <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
          <div class="container-fluid"> <!--begin::Start Navbar Links-->
              <ul class="navbar-nav">
                  <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"><i class="bi bi-list"></i></a></li>
              </ul>
              <ul class="navbar-nav ms-auto">
                 <!--begin::User Menu Dropdown-->
                  <li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> <img src="../admin/dist/assets/img/admin.png" class="user-image rounded-circle shadow" alt="User Image"> <span class="d-none d-md-inline"><?php echo $_SESSION['username']; ?></span> </a>
                      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end"> <!--begin::User Image-->
                          <li class="user-header text-bg-primary"> <img src="../admin/dist/assets/img/admin.png" class="rounded-circle shadow" alt="User Image">
                          <p>
                                  <?php echo $_SESSION['username']; ?>
                                  <br>
                                  Posyandu Mawar
                                  <small>RW 08</small>
                              </p>
                          </li> <!--end::User Image--> <!--begin::Menu Body-->
                         <!--begin::Menu Footer-->
                          <li class="user-footer">   <form method="POST" action="logout.php">
                                <a href="../admin/index.php" class="btn btn-default btn-flat" type="submit" id="logout-button">Sign out</a>
                            </form> </li> <!--end::Menu Footer-->
                          
                    </ul>
                  </li> <!--end::User Menu Dropdown-->
              </ul> <!--end::End Navbar Links-->
          </div> <!--end::Container-->
      </nav> <!--end::Header-->
      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
          <div class="sidebar-brand"> <!--begin::Brand Image--> <img src="../dist/assets/favicon.ico" alt="Rose Emoji" class="brand-image"> <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light">Posyandu Mawar</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
          <div class="sidebar-wrapper">
            <nav class="mt-2"> <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <li class="nav-item"> <a href="include.php" class="nav-link"> <i class="nav-icon bi bi-house-fill"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-clipboard-heart-fill"></i>
                                <p>
                                    Master Data
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item"><a href="#" class="nav-link"> <i class="nav-icon bi bi-person-fill"></i>
                                    <p>Data Balita</p>
                                    </a>
                                </li>
                                <li class="nav-item"><a href="data_pengukuran.php" class="nav-link"> <i class="nav-icon bi bi-rulers"></i>
                                    <p>Data Pengukuran</p>
                                    </a>
                                </li>
                            </ul>
                            <?php 
                                if ($_SESSION['role'] == 'admin') {
                                echo '<li class="nav-item"> <a href="data_admin.php" class="nav-link"> <i class="bi bi-person-raised-hand"></i>
                                <p>
                                    Kelola Data Kader
                                </p>
                                    </a>
                                </li>';
                                }
                                ?>
                        </li>
                    </ul> <!--end::Sidebar Menu-->

                </nav>
          </div> <!--end::Sidebar Wrapper-->
      </aside> <!--end::Sidebar--> <!--begin::App Main-->
      <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row mb-1">
                        <div class="col">
                            <h2>Data Balita</h2>
                        </div>
                    </div> <!--end::Row-->
                        <table border="1" class="table table-bordered">
                            <tr>
                                <th>No.</th>
                                <th>NIK</th>
                                <th>Jenis Anggota</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                          <?php
                            include 'connection.php';
                            $query_mysql = $conn->query("SELECT * FROM anak") or die(print_r($conn->errorInfo(), true));
                            global $nomor;
                            $nomor = 1;
                            while($data = $query_mysql->fetch(PDO::FETCH_ASSOC)){
                          ?>
                          <tr>
			                <td><?php echo $nomor++; ?></td>
			                <td><?php echo $data['nik']; ?></td>
			                <td><?php echo $data['jenis_anggota']; ?></td>
			                <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['tanggal_lahir']; ?></td>
                            <td><?php echo $data['alamat']; ?></td>
			                <td>
                            
                            <div class="btn-group" role="group">
                            <a class="edit" href="edit_anak.php?nik=<?php echo $data['nik']; ?>">
                            <button type="button" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"></path>
                            </svg>
                            Edit
                            </button>
                            </a>

                            <a class="hapus" href="delete.php?nik=<?php echo $data['nik']; ?>">
                            <button type="button" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eraser" viewBox="0 0 16 16">
                                <path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293z"></path>
                            </svg>
                            Hapus
                            </button>
                            </a>
                            </div>
                            </td>
                          </tr>
                          <?php } ?>
                        </table>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-9">
                                </div>
                                <div class="col-3 align-self-end">
                                    <a href="tambah_balita.php">
                                <button class="btn btn-add btn-block btn-success">Tambahkan data baru</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content"> <!--begin::Container-->
                
            </div> <!--end::App Content-->
    </main> <!--end::App Main--> <!--begin::Footer-->
    <footer class="app-footer"> <!--begin::To the end-->
          <div class="float-end d-none d-sm-inline">Posyandu Mawar RW. 08, Kel. Abadijaya, Kec. Sukmajaya</div> <!--end::To the end--> <!--begin::Copyright-->
            <strong>Edited by</strong> 
            <a href="https://github.com/grxzlly" class="btn btn-sm" target="_blank">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"></path>
              </svg>
              grxzlly
            </a>
          <!--end::Copyright-->
        </footer> <!--end::Footer-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
  <script src="../admin/dist/js/adminlte.js"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
  </body><!--end::Body-->

</html>