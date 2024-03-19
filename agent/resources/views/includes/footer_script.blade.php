 <!-- Core JS -->
 <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
 <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
 <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>

 <script src="{{ asset('assets/vendor/js/jquery-3.3.1.min.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <script src="{{ asset('assets/vendor/js/script.js') }}"></script>
 <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

 <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
 <!-- endbuild -->

 <!-- Vendors JS -->
 <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

 <!-- Main JS -->
 <script src="{{ asset('assets/js/main.js') }}"></script>

 <!-- Page JS -->
 <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>


 <script async defer src="https://buttons.github.io/buttons.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>

 <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
 <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
 <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>
 <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/extensions/export/bootstrap-table-export.min.js"></script>
 <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js'></script>


 <script>
   var toastMixin = Swal.mixin({
     toast: true,
     icon: 'success',
     title: 'General Title',
     animation: false,
     position: 'bottom',
     showConfirmButton: false,
     timer: 4000,
     timerProgressBar: true,
     didOpen: (toast) => {
       toast.addEventListener('mouseenter', Swal.stopTimer)
       toast.addEventListener('mouseleave', Swal.resumeTimer)
     }
   });
 </script>