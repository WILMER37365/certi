			
<!-- Modal para visualizar PDF -->
<div class="modal fade" id="visualizarPdfModal" tabindex="-1" role="dialog" aria-labelledby="visualizarPdfModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="visualizarPdfModalLabel">Visualizar PDF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Contenido de la modal -->
        <iframe id="pdfViewer" src="" style="width: 100%; height: 500px;"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- ... tu código existente ... -->

<script>
  // Función para cargar el PDF en la modal
  function cargarPDF(url) {
    $('#pdfViewer').attr('src', url);
  }
</script>