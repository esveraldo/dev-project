<div class="modal fade" id="sendOfferModal" tabindex="-1" role="dialog" aria-labelledby="pointsLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formSendOffer" action="" method="POST">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="pointsLabel"><strong><i class="fa fa-gift"></i> {{ trans('words.lb.offer.send') }}</strong></h4>
                </div>

                <table class="table modal-body" style="margin-bottom: -1px">
                    <tr>
                        <td>
                            <div class="col-sm-12 no-padding">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="offer_name">{{trans('words.lb.offer.product')}}</label>
                                        <select class="select22 form-control" id="offer_id" name="offer_id" disabled>
                                            @foreach($offers as $offer)
                                                <option value="{{$offer->id}}">{{ $offer->product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="offer_id" id="takeofferid">
                                </div>

                                <!-- <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="profile">{{trans('words.lb.profile')}}</label>
                                        <select class="select22 form-control" id="profile_id" name="profile_id">
                                            <option value="0" selected>Todos os Usuários</option>
                                            @foreach($profiles as $profile)
                                                <option value="{{$profile->id}}">{{ $profile->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> -->

                            </div>
                        </td>
                    </tr>
                </table>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> {{trans('words.bt.send')}}</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>