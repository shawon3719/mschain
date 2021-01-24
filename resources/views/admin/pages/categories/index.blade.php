{{--/**--}}
{{--* Created by: Masudul Hasan Shawon--}}
{{--* Date: 23-Aug-20--}}
{{--* Time: 2:22 PM--}}
{{--*/--}}

@extends('admin.layouts.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">

        <div class="card">
            <div class="card-header">
                Manage Categories
            </div>
            <div class="card-body">
                @include('admin.partials.messages')
                <a data-toggle="modal" id="getModal" data-target="#addModal"
                    data-url="{{ url('admin/categories/create')}}" href="#."
                    class="btn btn-sm btn-success float-right mb-2 mr-3">
                    <i class="fa fa-plus"></i> Add
                </a>

                <div class="clearfix"></div>

                <!--- Modal Popup ---->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content  ceramics-modal">

                        </div>
                    </div>
                </div>
                <!--- END Modal ---->

                <table class="table table-hover table-striped" id="example2">
                    <thead>
                        <tr>
                            <th>SI</th>
                            <th>Category</th>
                            <th>Sub-category</th>
                            <th>Description</th>
                            {{-- <th>Image</th> --}}
                            <th>Status</th>
                            <th>Priority</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>
                                @if(!empty($category->parent_id))
                                {{$category->parent->name}}
                                @else
                                {{$category->name}}
                                @endif
                            </td>
                            <td>@if($category->parent_id != NULL)
                                {{$category->name}}
                                @endif</td>
                            <td> @php echo($category->description) @endphp </td>
                            {{-- <td>
                                      <img src="{!! asset($category->image_url) !!}" width="50">
                                  </td> --}}
                            <td>
                                <span
                                    class="{{$category->active_status == 1? 'badge badge-success badge-success-alt' : 'badge badge-danger badge-danger-alt'}}}">{{$category->active_status == 1 ? 'active' : 'inactive'}}</span>
                            </td>
                            <td>{{$category->priority}}</td>
                            <td>
                                {{--<a href="#editModal{{$category->id}}" data-toggle="modal" class="btn btn-sm
                                btn-info"><i class="far fa-edit"></i></a>--}}
                                <a data-toggle="modal" id="getModal" data-target="#addModal"
                                    data-url="{{url('admin/categories/edit', $category->id)}}" href="#."
                                    class="btn btn-sm btn-info"><i class="far fa-edit"></i></a>

                                <a href="#deleteModal{{$category->id}}" data-toggle="modal"
                                    class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>

                                <!-- DeleteModal -->
                                <div class="modal fade" id="deleteModal{{$category->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle"><span
                                                        class="text-danger">Corresponded <b>sub-categories</b> and
                                                        <b>Products</b> will be deleted also (if any!).</span> Are you
                                                    sure to delete?</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{!! route('admin.category.delete', $category->id) !!}"
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

                                {{--<!-- Edit Modal -->--}}
                                {{--<div class="modal fade" id="editModal{{$category->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLongTitle" aria-hidden="true">--}}
                                {{--<div class="modal-dialog modal-lg" role="document">--}}
                                {{--<div class="modal-content">--}}
                                {{--<div class="modal-header">--}}
                                {{--<h5 class="modal-title" id="exampleModalLongTitle">Update this Category</h5>--}}
                                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                                {{--<span aria-hidden="true">&times;</span>--}}
                                {{--</button>--}}
                                {{--</div>--}}
                                {{--<div class="modal-body">--}}
                                {{----}}

                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--<!---End Edit Modal--->--}}

                            </td>
                        </tr>
                        {{--@endif--}}
                        @endforeach
                    <tfoot>
                        <tr>
                            <th>SI</th>
                            <th>Category</th>
                            <th>Sub-category</th>
                            <th>Description</th>
                            {{-- <th>Image</th> --}}
                            <th>Status</th>
                            <th>Priority</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>

<!-- main-panel ends -->
@endsection
