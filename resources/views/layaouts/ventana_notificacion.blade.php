

<body>
<div class="modal fade" role="dialog" id="notificacion" style="display: block;">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content" id="msform">
            <div class="modal-header">
                <div class="modal-title">
                    @yield ('titulo_ventana')
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                @yield('body_ventana')
            </div>
            <div class="modal-footer">
               @yield('footer_ventana')
            </div>
        </div>
    </div>
</div>

<script>
    $("#notificacion").modal('show')
</script>
    
</body>