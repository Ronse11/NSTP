<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CPSU | NSTPs</title>

    <script src="https://cdn.jsdelivr.net/npm/ph-locations@latest/dist/ph-locations.min.js"></script>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free-6.5.2/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/css/custom.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    {{-- Date --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="icon" href="{{ asset('template/dist/img/cpsulogo.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">


    <style>
        .second-row {
            min-height: 300px; /* Adjust as needed */
        }
    </style>
</head>
<body class="hold-transition sidebar-mini text-sm">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" role="button">
                    <i class="fas fa-sign-out"></i> Sign Out
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            {{-- @auth('admin')
                @if(Auth::guard('admin')->user()->role === 'Administrator')
                    <a href="{{ route('dash')}}" class="brand-link">
                        <img src="{{ asset('template/dist/img/cpsulogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                        <span class="brand-text font-weight-light">CPSU NSTP Admin</span>
                    </a>
                @else
                    <a href="{{ route('fillupstudentCategoryRead') }}" class="brand-link">
                        <img src="{{ asset('template/dist/img/cpsulogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                        <span class="brand-text font-weight-light">CPSU NSTP</span>
                    </a>
                @endif
            @endauth --}}

            @auth('web')
                @if(Auth::guard('web')->user()->role === 'Student')
                    <a href="{{ route('fillupstudentCategoryRead') }}" class="brand-link">
                        <img src="{{ asset('template/dist/img/cpsulogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                        <span class="brand-text font-weight-light">CPSU NSTP</span>
                    </a>
                @else
                    <a href="{{ route('dash')}}" class="brand-link">
                        <img src="{{ asset('template/dist/img/cpsulogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                        <span class="brand-text font-weight-light">CPSU NSTP Admin</span>
                    </a>
                @endif
            @endauth

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                    <img src="{{ asset('template/dist/img/cpsulogo.png') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                    <a href="#" class="d-block">

                        {{-- @auth('admin')
                            @if(Auth::guard('admin')->user()->role == 'Administrator')
                                {{ Auth::guard('admin')->user()->fname }} {{ Auth::guard('admin')->user()->lname }}
                            @else
                                {{ Auth::guard('web')->user()->fname }} {{ Auth::guard('web')->user()->lname }}
                            @endif
                        @endauth --}}

                        @auth('web')
                            @if(Auth::guard('web')->user()->role === 'Student')
                                {{ auth()->user()->fname }} {{ auth()->user()->lname }}
                            @else
                                {{ auth()->user()->fname }} {{ auth()->user()->lname }}
                            @endif
                        @endauth
                        
                    </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                @include('partial.sidebar')
            </div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        @yield('body')
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                CPSU NSTP MANAGEMENT SYSTEM
            </div>
            <!-- Default to the left -->
            <strong></strong> All rights reserved.
        </footer>
    </div>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('template/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('template/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('template/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

{{-- JS Address --}}
<script src="{{ asset('assets/js/address.js') }}"></script>

{{-- Date --}}
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    flatpickr("#birthday", {
        dateFormat: "d-m-Y",
        onChange: function(selectedDates, dateStr, instance) {
            document.getElementById("birthday-hidden").value = dateStr;
        }
    });
</script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, 
            "lengthChange": true, 
            "autoWidth": false,
            //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
  </script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/print-js/1.6.0/print.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script> --}}

<script>
function printTable() {

    const elementsToHide = document.querySelectorAll('.no-print');
    const originalStyles = new Map();
    elementsToHide.forEach(el => {
        originalStyles.set(el, el.style.display);
        el.style.display = 'none';
    });

    const table = document.querySelector(".printTableArea"); 
    const category = table.getAttribute('data-category'); 
    if (!table) {
        alert("No table found!");
        restoreOriginalState();
        return;
    }

    const tableRows = table.querySelectorAll("tbody tr");
    let filteredRows = [];
    
    tableRows.forEach(row => {
        const checkbox = row.querySelector('.print-checkbox');
        if (checkbox && checkbox.checked) {
            let clonedRow = row.cloneNode(true);
            let checkboxCell = clonedRow.querySelector('.no-print');
            if (checkboxCell) checkboxCell.remove();
            console.log(checkboxCell);

            filteredRows.push(clonedRow.outerHTML);
        }
    });

    if (filteredRows.length === 0) {
        alert("No records selected for printing!");
        restoreOriginalState();
        return;
    }

    const customThead = `
        <thead>
            <tr>
                <th style="text-align: left;">#</th>
                <th style="text-align: left;">Name</th>
                <th style="text-align: left;">Course</th>
                <th style="text-align: left;">Gender</th>
            </tr>
        </thead>
    `;

    let paginatedRows = '';
    filteredRows.forEach((row, index) => {
        if (index % 23 === 0 && index !== 0) {
            paginatedRows += `<tr class="page-break" style="height: 170px;"></tr>`;
        }
        paginatedRows += row;
    });


    const printContent = `
    <style>
        /* Ensure the header and footer remain in place */
        .header, .footer {
            position: fixed;
            width: 100%;
            text-align: center;
            background: white;
        }
        .header {
            top: 0;
        }

        .footer {
            bottom: 0;
        }

        .content {
            margin-top: 200px;
        }

        /* Ensure content starts correctly on each new page */
        @media print {
            .content {
                page-break-before: always;
            }

            .page-break {
                page-break-before: always;
            }
        }
    </style>

    <div class="header">
        <img src="{{ asset('assets/img/printFormat/header.png') }}" style="width: 100%;" />
        <h2 style="font-family: Arial, Helvetica, sans-serif;">${category}</h2>
    </div>

    <div class="footer">
        <img src="{{ asset('assets/img/printFormat/footer.png') }}" style="width: 100%;" />
    </div>

    <div class="content">
        <table cellspacing="0" cellpadding="5" width="100%">
            ${customThead}
            <tbody>${paginatedRows}</tbody>
        </table>
    </div>
    `;

    printJS({
        printable: printContent,
        type: 'raw-html',
        documentTitle: 'Student List',
    });

    setTimeout(() => {
        restoreOriginalState();
    }, 500);

    function restoreOriginalState() {
        elementsToHide.forEach(el => {
            el.style.display = originalStyles.get(el) || '';
        });
    }
}


</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const checkAllBtn = document.getElementById("checkAllBtn");
        const checkboxes = document.querySelectorAll(".print-checkbox");

        checkAllBtn.addEventListener("click", function () {
            let allChecked = [...checkboxes].every(checkbox => checkbox.checked);
            checkboxes.forEach(checkbox => checkbox.checked = !allChecked);
        });

        // Master checkbox in table header
        const masterCheckbox = document.getElementById("checkAll");

        masterCheckbox.addEventListener("change", function () {
            checkboxes.forEach(checkbox => checkbox.checked = masterCheckbox.checked);
        });



        // Adding comment
        document.getElementById("declineForm").addEventListener("submit", function (event) {
            const comment = document.getElementById("declineComment").value.trim();
            
            if (!comment) {
                event.preventDefault();
                alert("Please enter a reason before declining.");
            }
        });
    });
</script>

{{-- Exporting to Excel --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("exportCheckedBtn").addEventListener("click", function() {
            let selectedStudents = [];
            let category = document.getElementById("example1").dataset.categ;
    
            document.querySelectorAll(".print-checkbox:checked").forEach((checkbox) => {
                let studentId = checkbox.closest("tr").dataset.studentId;
                if (studentId) {
                    selectedStudents.push(studentId);
                }
            });
    
            if (selectedStudents.length === 0) {
                alert("Please select at least one student to export.");
                return;
            }
            
            let exportUrl = "{{ route('export.all.students') }}";
            window.location.href = `${exportUrl}?key=${category}&selectedStudents=${selectedStudents.join(",")}`;
        });
    });
</script>


    

</body>
</html>
