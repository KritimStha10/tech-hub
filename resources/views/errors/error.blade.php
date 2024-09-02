@if ($errors->any())
    <div class="alert alert-danger ">
        <button  class="btn-close1" data-dismiss="alert" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
        </button>
        {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button> --}}
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('email'))
    <div class="alert alert-danger alert-warning alert-dismissible fade show  d-flex justify-content-between my-4" role="alert">
        <div>
            <strong>Success!</strong>  {{ session()->get('email') }}
        </div>
        <div>
            <button type="button"  data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif
@if(session()->has('custom_error'))
    <div class="alert alert-danger alert-warning alert-dismissible fade show  d-flex justify-content-between my-4">
        <div>
            <button type="button"  data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div>
            <strong>Error!</strong>  {{ session()->get('custom_error') }}
        </div>
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger alert-warning alert-dismissible fade show  d-flex justify-content-between my-4">
        <div>
            <button type="button"  data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div>
            <strong>Error!</strong>  {{ session()->get('error') }}
        </div>
    </div>
@endif

@if(session()->has('my_custom_error'))
    <div class="alert alert-danger alert-warning alert-dismissible fade show  d-flex justify-content-between my-4">
        <div>
            <button type="button"  data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div>
            {{ session()->get('my_custom_error') }}
        </div>
    </div>
@endif
