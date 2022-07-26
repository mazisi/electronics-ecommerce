<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin  Dashboard </title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- plugin css file  -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/plugin/datatables/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/plugin/datatables/dataTables.bootstrap5.min.css') }}">

    <!-- project css file  -->
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/ebazar.style.min.css') }}">
    @livewireStyles
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <style>
    .body{
        style="margin-top: -2rem"
    }
    </style>
</head>
<body>
    <div id="ebazar-layout" class="theme-blue">
        
        <!-- sidebar -->
        @include('admin.layouts.sidebar')

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">

            <!-- Body: Header -->
           @include('admin.layouts.header')

            <!-- Body: Body -->
            @yield('content')
        
            <!-- Modal Custom Settings-->
           
            
        </div>
    
    </div>
    @livewireScripts
    <!-- Jquery Core Js -->
    <script src="{{ asset('dashboard/assets/bundles/libscripts.bundle.js') }}"></script>

    <!-- Plugin Js -->
    <script src="{{ asset('dashboard/assets/bundles/apexcharts.bundle.js') }}"></script>
    <script src="{{ asset('dashboard/assets/bundles/dataTables.bundle.js') }}"></script>  

    <!-- Jquery Page Js -->
    <script src="{{ asset('dashboard/js/template.js') }}"></script>
    <script src="{{ asset('dashboard/page/index.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.min.js') }}"></script> 
    <script>
        window.addEventListener('closeModal', event => {
        $("#add-category").modal('hide');
        $("#editCategory").modal('hide');
        $("#upload-products").modal('hide');
        $("#create-brand").modal('hide');
       
      })
       </script>
    <script>
        
        $('#myDataTable')
        .addClass( 'nowrap')
        .dataTable( {
            responsive: true,
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
        });
    <script>
    lightbox.option({
      'maxWidth': 200,
      'maxHeight': 200
    })
</script>
  </script>

</body>

</html> 