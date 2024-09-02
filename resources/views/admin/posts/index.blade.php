@extends('layouts.app')
@section('title')
    <title>Posts</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper content-wrapper-bg">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="row">
                    <div class="card-heading d-flex justify-content-between">
                            <div>
                                <h4>Post List</h4>
                                <p>
                                    You can search the Post by <a href="#" class="card-heading-link">name.</a>
                                </p>
                            </div>
                            <ul class="admin-breadcrumb">
                                <li><a href="{{url('admin/dashboard')}}" class="card-heading-link">Home</a></li>
                                <li>Post</li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-md-11">
                                {!! Form::open(['url' => 'admin/posts', 'method' => 'GET']) !!}
                                    <div class="row">
                                        <div class="filter-btnwrap justify-content-between">
                                            <div class="d-flex">
                                                <div class="input-group">
                                                    <span>
                                                        <i class="fa-solid fa-magnifying-glass"></i>
                                                    </span>
                                                        <input type="text" value="{{request()->title}}" class="form-control" placeholder="Search by Title" name="title"/>
                                                </div>


                                                    <button class="btn-primary-style ms-3 mx-2" type="submit">
                                                        <svg class="me-2" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.63827 16.9618L6.87789 17.6725H6.87789L6.63827 16.9618ZM11.6383 15.276L11.8779 15.9867H11.8779L11.6383 15.276ZM16.6897 4.32674L16.1563 3.79945L16.6897 4.32674ZM12.2674 8.79997L12.8007 9.32725L12.2674 8.79997ZM5.68966 8.79997L5.1563 9.32725L5.68966 8.79997ZM1.97852 1.75H15.9785V0.25H1.97852V1.75ZM1.72852 3.62369V2H0.228516V3.62369H1.72852ZM6.22302 8.27268L1.80073 3.79945L0.734013 4.85402L5.1563 9.32725L6.22302 8.27268ZM5.22852 9.50301V16.4881H6.72852V9.50301H5.22852ZM5.22852 16.4881C5.22852 17.3431 6.06769 17.9457 6.87789 17.6725L6.39864 16.2512C6.56068 16.1965 6.72852 16.317 6.72852 16.4881H5.22852ZM6.87789 17.6725L11.8779 15.9867L11.3986 14.5653L6.39864 16.2512L6.87789 17.6725ZM11.8779 15.9867C12.3862 15.8153 12.7285 15.3386 12.7285 14.8022H11.2285C11.2285 14.6949 11.297 14.5996 11.3986 14.5653L11.8779 15.9867ZM12.7285 14.8022V9.50301H11.2285V14.8022H12.7285ZM16.1563 3.79945L11.734 8.27268L12.8007 9.32725L17.223 4.85402L16.1563 3.79945ZM16.2285 2V3.62369H17.7285V2H16.2285ZM17.223 4.85402C17.5469 4.52643 17.7285 4.08435 17.7285 3.62369H16.2285C16.2285 3.6895 16.2026 3.75266 16.1563 3.79945L17.223 4.85402ZM12.7285 9.50301C12.7285 9.4372 12.7545 9.37405 12.8007 9.32725L11.734 8.27268C11.4102 8.60027 11.2285 9.04235 11.2285 9.50301H12.7285ZM5.1563 9.32725C5.20257 9.37405 5.22852 9.4372 5.22852 9.50301H6.72852C6.72852 9.04235 6.54688 8.60028 6.22302 8.27268L5.1563 9.32725ZM0.228516 3.62369C0.228516 4.08435 0.41015 4.52643 0.734013 4.85402L1.80073 3.79945C1.75446 3.75266 1.72852 3.6895 1.72852 3.62369H0.228516ZM15.9785 1.75C16.1166 1.75 16.2285 1.86193 16.2285 2H17.7285C17.7285 1.0335 16.945 0.25 15.9785 0.25V1.75ZM1.97852 0.25C1.01202 0.25 0.228516 1.0335 0.228516 2H1.72852C1.72852 1.86193 1.84045 1.75 1.97852 1.75V0.25Z" fill="#699AE2"/>
                                                            </svg>
                                                        Search
                                                    </button>

                                                    <a onclick="getReset('{{Request::segment(1)}}')" class="refresh-group btn-primary-style mx-2" data-bs-toggle="tooltip"  data-bs-custom-class="custom-tooltip" data-bs-title="Clear Filters">
                                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M3.463 2.43301C5.27756 0.86067 7.59899 -0.00333986 10 9.70266e-06C15.523 9.70266e-06 20 4.47701 20 10C20 12.136 19.33 14.116 18.19 15.74L15 10H18C18.0001 8.43163 17.5392 6.89781 16.6747 5.58927C15.8101 4.28072 14.5799 3.25517 13.1372 2.64013C11.6944 2.0251 10.1027 1.84771 8.55996 2.13003C7.0172 2.41234 5.59145 3.14191 4.46 4.22801L3.463 2.43301ZM16.537 17.567C14.7224 19.1393 12.401 20.0034 10 20C4.477 20 0 15.523 0 10C0 7.86401 0.67 5.88401 1.81 4.26001L5 10H2C1.99987 11.5684 2.46075 13.1022 3.32534 14.4108C4.18992 15.7193 5.42007 16.7449 6.86282 17.3599C8.30557 17.9749 9.89729 18.1523 11.44 17.87C12.9828 17.5877 14.4085 16.8581 15.54 15.772L16.537 17.567Z" fill="#699AE2"/>
                                                            </svg>
                                                    </a>

                                            </div>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 stretch-card mt-4">
                            <div class="card-wrap form-block p-0">
                                <div class="block-header bg-header d-flex justify-content-between p-4 pb-0 flex-wrap gap-2">
                                    <div class="d-flex flex-column">
                                        <h3>Post Table</h3>
                                    </div>

                                    <div class="add-button btn-primary-style p-0">

                                        <a class="nav-link" href="{{url('admin/posts/create')}}"><i class="fa-solid fa-book-open"></i>&nbsp;&nbsp;Add Post
                                        </a>
                                    </div>

                                </div>
                                <div class="row px-4">
                                    <div class="col-md-12">
                                        @include('success.success')
                                        @include('errors.error')
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 stretch-card sl-stretch-card">
                                        <div class="card-wrap card-wrap-bs-none form-block p-4 pt-0">
                                            <div class="row">
                                                <div class="col-12 table-responsive table-details">
                                                    <table class="table mb-0" id="">
                                                        <thead>
                                                        <tr>
                                                            <th>S.N.</th>
                                                            <th>Title</th>
                                                            <th>Feature Image</th>
                                                            <th>Created At</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="post_list">
                                                        @foreach($posts as $post)
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>{{$post->title}}</td>
                                                                <td>
                                                                    <a href="{{url($post->featured_image ?? '')}}" target="_blank">
                                                                        <img src="{{url($post->featured_image ?? '')}}" alt="" style="width: 100px;">

                                                                    </a>
                                                                </td>
                                                                <td>{{$post->created_at}}</td>
                                                                <td>{{ $post->status }}</td>
                                                                <td class="action-icons">
                                                                    <ul class="icon-button d-flex">
                                                                            <li>
                                                                                <a class="dropdown-item"
                                                                                    href="{{ url('admin/posts/' . $post->id . '/edit') }}"
                                                                                    role="button" data-bs-toggle="tooltip"
                                                                                    data-bs-title="edit"><i
                                                                                        class="fa-solid fa-pen"></i></a>
                                                                            </li>

                                                                            <li>
                                                                                <a href="{{ url('admin/posts/'.$post->id.'/delete') }}" style="display: inline-block;">
                                                                                    <i class="fa-solid fa-trash text-danger delete-assignment" data-bs-toggle="tooltip" data-bs-title="Delete"></i>
                                                                                </a>

                                                                            </li>

                                                                            <li>
                                                                                <a class="dropdown-item"
                                                                                href="{{url('admin/posts/'.$post->id)}}"
                                                                                role="button"><i class="fa-solid fa-eye"
                                                                                                    data-bs-toggle="tooltip"
                                                                                                    data-bs-title="Show"></i></a>
                                                                            </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                    {{$posts->links()}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
<script>
    $("#from_date").flatpickr({
        dateFormat: "Y-m-d"
    });
    function getMinDate(){
        var min_date = $('#from_date').val();
        if(min_date != ''){
            $('#to_date').flatpickr({
                minDate: min_date,
                dateFormat: 'Y-m-d',
            });
        }
    }

    $("#from_date_update").flatpickr({
        dateFormat: "Y-m-d"
    });
    // function getMinDate(){
    //     var min_date = $('#from_date_update').val();
    //     if(min_date != ''){
    //         $('#to_date_update').flatpickr({
    //             minDate: min_date,
    //             dateFormat: 'Y-m-d',
    //         });
    //     }
    // }

</script>
@endsection
