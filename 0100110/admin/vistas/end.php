<?php
@session_start();
$email = $_SESSION['usuario'];
if (!isset($email)) {
    header('location: index');
}
?>
 <!-- /.container-fluid -->

<div class="container">
</div>
 
 <!-- End of Page Wrapper -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Seguro que quieres salir?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 Seleccione "Salir" a continuación si está listo para finalizar su sesión actual.</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                 <a class="btn btn-primary" href="salir.php">Salir</a>
             </div>
         </div>
     </div>
 </div>
   <!-- Footer -->
   <footer class="sticky-footer bg-white">
     <div class="container my-auto">
         <div class="copyright text-center my-auto">
             <span>Copyright &copy; MSP 2020</span>
         </div>
     </div>
 </footer>
 <!-- End of Footer -->
 <!-- End of Content Wrapper -->


 <script type="text/javascript" src="../../datables/datable.js"></script>
 <script type="text/javascript" src="../../datables/jquery.js"></script>
 <script type="text/javascript" src="../../datables/boostrapdata.js"></script>
 <!-- Bootstrap core JavaScript-->
 <script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="js/sb-admin-2.min.js"></script>

<script type="text/javascript" src="vendor/datatables/datatables.min.js"></script>
<script type="text/javascript" src="main.js"></script>
<script type="text/javascript" src="pwdrandom.js"></script>
<script>
$(document).ready(function() {
    $('#tablaPersonas').DataTable();
    
} );</script>
</body>

 </html>