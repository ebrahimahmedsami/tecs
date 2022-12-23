<div class="alert alert-{{isset($title)?$title:'success'}} container mt-1 alert-dismissible fade show" role="alert">
    <strong>{{\Session::get(isset($title)?$title:'success')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
