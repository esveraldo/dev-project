<div class="alert alert-{{Session::get('type')}} alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <span><i class="icon fa fa-{{Session::get('icon')}}"></i> {{Session::get('message')}}</span>
</div>
