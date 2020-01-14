@if(session('success'))
    <div class="alert alert-success">
        <i class="fa fa-check"></i>
        {{session('success')}}
    </div>
    @endif
@if(session('error'))
    <div class="alert alert-error">
        <i class="fa fa-trash"></i>
        {{session('error')}}
    </div>
    @endif