<div class="modal fade" id="PushNotificationAllModal"
     tabindex="-1" role="dialog"
     aria-labelledby="PushNotificationAllLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"
                    id="PushNotificationAllLabel">Escreva sua mensagem</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="message">{{ trans('words.lb.message') }}</label>
                        <textarea rows="5" class="form-control" id="message" name="message" required>

                        </textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-default"
                        data-dismiss="modal" style="float: left">Close</button>
                <span class="pull-right">
                  <button type="submit" class="btn btn-success">
                      <i class="fa fa-envelope"></i>
                    Enviar
                  </button>
                </span>
            </div>
        </div>
    </div>
</div>