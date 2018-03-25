<div class="modal fade" role="dialog" id="ventana_codigo">
    <div class="modal-dialog modal-md">
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