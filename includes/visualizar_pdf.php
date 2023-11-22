<!-- Agrega este modal al final del body -->
<div class="modal" id="pdfViewerModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nombre del PDF</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Aquí se cargará el contenido del PDF -->
            </div>
        </div>
    </div>
</div>




<script>
    $(document).ready(function () {
        // Otros códigos...

        // Manejar la apertura del modal y carga del PDF
        $('.btn-open-pdf').click(function () {
            var pdfNombre = $(this).data('pdf');
            var pdfRuta = '../includes/files/' + pdfNombre;

            // Puedes utilizar el mismo modal que usas para la descarga
            $('#pdfViewerModal .modal-title').text(pdfNombre);
            $('#pdfViewerModal .modal-body').html('<iframe src="' + pdfRuta + '" style="width:100%;height:100%;" frameborder="0"></iframe>');
            
            // Abre el modal
            $('#pdfViewerModal').modal('show');
        });
    });
</script>