@extends('layouts.app')
@section('title')
    <title>Edit Post</title>
@endsection
@section('main-panel')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12 col-md-12 stretch-card">
                    <div class="card-wrap form-block p-0">
                        <div class="block-header p-4">
                            <h3>Edit Post</h3>
                            <p class="ms-4">Update the fields to edit the Post</p>
                            <div class="tbl-buttons">
                                <ul>
                                    <li class="m-0">
                                        <a href="{{url('admin/posts')}}" class="icon-wrap">
                                            <i class="bi bi-x"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('success.success')
                        @include('errors.error')
                        <div class="row p-4">
                            <div class="col-12 table-responsive grid-margin">
                                {!! Form::model($post, ['url' => 'admin/posts/'.$post->id, 'class' =>'normal-form', 'method'=>'PUT', 'files' => true]) !!}
                                    <div class="row">
                                        <div class="row align-items-baseline">
                                            <div class="col-md-2">
                                                <label class="col-form-label">Category</label>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="input-group">
                                                    <select name="category_id" class="form-select" id="categories" required>
                                                        <option value="" selected disabled>Please Select the Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-4">
                                            <label for="title" class="col-md-2 col-form-label">Post Title</label>
                                            <div class="col-md-10">
                                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-4">
                                            <label for="body" class="col-md-2 col-form-label">Post Body</label>
                                            <div class="col-md-10">
                                                <textarea name="body" id="body" class="form-control" rows="4" required>{{ old('body', $post->body) }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-4">
                                            <label for="tags" class="col-md-2 col-form-label">Tags</label>
                                            <div class="col-md-4">
                                                <input type="text" name="tags" id="tags" class="form-control" value="{{ old('tags', $post->tags) }}" >
                                            </div>

                                            <label for="featured_image" class="col-md-2 col-form-label">Featured Image</label>
                                            <div class="col-md-4">
                                                <input type="file" class="form-control" name="featured_image" id="featured_image">
                                                @if($post->featured_image)
                                                    <img src="{{ url($post->featured_image) }}" alt="Featured Image" class="img-fluid mt-2">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row mt-4">
                                            <label for="status" class="col-md-2 col-form-label">Status</label>
                                            <div class="col-md-10">
                                                <select name="status" id="status" class="form-select" required>
                                                    <option value="" selected disabled>Please Select Status</option>
                                                    <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                                    <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Published</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="button-section d-flex justify-content-end mt-4">
                                            <a href="{{url('admin/posts')}}">
                                                <button type="button">
                                                    Cancel
                                                    <i class="fa-solid fa-chevron-right"></i>
                                                </button>
                                            </a>

                                            <button type="submit">
                                                Update Post
                                                <i class="fas fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
