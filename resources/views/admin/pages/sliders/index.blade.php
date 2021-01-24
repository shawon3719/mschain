{{--<style>--}}
{{--.table-header:first-child {--}}
{{--background-color: #304e72!important;--}}
{{--}--}}
{{--</style>--}}
@extends('admin.layouts.master')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">

        <div class="card">
            <div class="card-header">
                Manage Sliders
            </div>
            <div class="card-body">
                @include('admin.partials.messages')
                <a href="#addSliderModal" data-toggle="modal" class="btn btn-sm btn-success float-right mb-2 mr-3">
                    <i class="fa fa-plus"></i> Add
                </a>
                <div class="clearfix"></div>
                <!--- Add Modal ---->
                <div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add New Slider</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="myForm" action="{!! route('admin.slider.store')!!}" method="post"
                                    enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="title">Slider Title<b class="text-danger">*</b></label>
                                        <input type="text" class="form-control" name="title" id="title"
                                            placeholder="Slider Title..">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Slider Description<b class="text-danger">*</b></label>
                                        <textarea name="description"
                                            style="width: 100%; height: 80px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Slider Image<b class="text-danger">*</b></label>
                                        <input type="file" class="form-control" name="image" id="image"
                                            placeholder="Slider Image..">
                                    </div>

                                    <div class="form-group">
                                        <label for="priority">Slider Priority<b class="text-danger">*</b></label>
                                        <input type="number" class="form-control" name="priority" id="priority"
                                            placeholder="Slider Priority; eg:10">
                                    </div>
                                    <div class="form-group">
                                        <label for="active_status">Status: <b class="text-danger"></b></label>
                                        <input type="checkbox" class="ml-4" name="active_status" value="1" checked>
                                        Active
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="created_by" id="created_by"
                                            value="{{ Auth::user()->id }}">
                                    </div>
                                    <div class="form-btn mr-3" style="float: right">
                                        <button type="submit" class="btn btn-sm btn-success">Add New</button>
                                        <button type="button" class="btn btn-sm btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!--- END Add Modal ---->


                <table id="example2" class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>SI</th>
                            <th>Slider Title</th>
                            <th>Slider Image</th>
                            <th>Slider Priority</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $slider)

                        <tr style="{{$slider->active_status === 1 ? '' : 'background-color: rgb(218 189 189 / 87%)'}}">
                            <td>{{$loop->index+1}}</td>
                            <td>{{$slider->title}}</td>
                            <td>
                                <img src="{{asset($slider->image)}}" width="40">
                            </td>
                            <td>{{$slider->priority}}</td>
                            <td>
                                <span
                                    class="{{$slider->active_status === 1? 'badge badge-success badge-success-alt' : 'badge badge-danger badge-danger-alt'}}}">{{$slider->active_status === 1 ? 'active' : 'inactive'}}</span>
                            </td>
                            <td>
                                <a href="#editModal{{$slider->id}}" data-toggle="modal" class="btn btn-sm btn-info"><i
                                        class="far fa-edit"></i></a>
                                <a href="#deleteModal{{$slider->id}}" data-toggle="modal"
                                    class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>

                                <!-- DeleteModal -->
                                <div class="modal fade" id="deleteModal{{$slider->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        {{--<div class="modal-content">--}}
                                        {{--<div class="modal-header">--}}
                                        {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                                        {{--<h4 class="modal-title" id="myModalLabel">Confirmar</h4>--}}
                                        {{--</div>--}}
                                        {{--<div class="modal-footer">--}}
                                        {{--<button type="button" class="btn btn-default" id="modal-btn-si">Si</button>--}}
                                        {{--<button type="button" class="btn btn-primary" id="modal-btn-no">No</button>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure to
                                                    delete?</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            {{--<div class="modal-body">--}}
                                            {{--<form action="{!! route('admin.slider.delete', $slider->id) !!}" method="post">--}}
                                            {{--{{csrf_field()}}--}}
                                            {{--<button type="submit" class="btn btn-danger" >Permanent Delete</button>--}}
                                            {{--</form>--}}

                                            {{--</div>--}}
                                            <div class="modal-footer">
                                                <form action="{!! route('admin.slider.delete', $slider->id) !!}"
                                                    method="post">
                                                    {{csrf_field()}}
                                                    <button type="submit" class="btn btn-sm btn-danger">Yes, Delete
                                                        it!</button>
                                                </form>
                                                <button type="button" class="btn btn-sm btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--End Delete Modal-->

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{$slider->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update this slider
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="myForm"
                                                    action="{!! route('admin.slider.update', $slider->id) !!}"
                                                    method="post" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <div class="form-group">
                                                        <label for="title">Slider Title<b
                                                                class="text-danger">*</b></label>
                                                        <input type="text" class="form-control" name="title"
                                                            value="{{$slider->title}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description">Slider Description<b
                                                                class="text-danger">*</b></label>
                                                        <textarea name="description" class="form-control"
                                                            style="width: 100%; height: 80px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                                            value="{{$slider->description}}">{{$slider->description}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image">Slider Image
                                                            <a href="{{asset($slider->image)}}"
                                                                target="_blank">Previous image_url</a>
                                                            <img src="{{asset($slider->image)}}" width="50">
                                                            <b class="text-danger">*</b></label>
                                                        <input type="file" class="form-control" name="image"
                                                            placeholder="Slider Image..">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="priority">Slider Priority<b
                                                                class="text-danger">*</b></label>
                                                        <input type="number" class="form-control" name="priority"
                                                            value="{{$slider->priority}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label for="active_status">Status: <b
                                                                    class="text-danger"></b></label>
                                                            <input type="checkbox" class="ml-4" name="active_status"
                                                                value="1"
                                                                {{$slider->active_status == 1? 'checked' : ''}}> Active
                                                        </div>

                                                        {{--<label for="active_status">Status<b class="text-danger"></b></label>--}}
                                                        {{--@if($slider->active_status != 0)--}}
                                                        {{--<input type="checkbox" class="ml-4"  name="active_status" value="1" {{$slider->active_status == 1? 'checked' : ''}}
                                                        > Active--}}
                                                        {{--@else--}}
                                                        {{--<input type="checkbox" class="ml-4"  name="active_status" value="1" {{$slider->active_status == 1? 'checked' : ''}}
                                                        > Active--}}
                                                        {{--@endif--}}
                                                        {{--<input type="checkbox" class="ml-4"  name="active_status" value="1" {{$slider->active_status == 1? 'checked' : ''}}
                                                        > Active--}}
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" name="updated_by"
                                                            value="{{ Auth::user()->id }}">
                                                    </div>
                                                    <div class="form-btn mr-3" style="float: right">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-success">Update</button>
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!---End Edit Modal--->

                            </td>
                        </tr>

                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>

    </div>
</div>
<!-- main-panel ends -->
@endsection
{{---- Form validation check--}}
