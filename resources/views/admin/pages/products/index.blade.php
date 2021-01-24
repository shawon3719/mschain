{{--/**--}}
{{--* Created by: Masudul Hasan Shawon--}}
{{--*/--}}

@extends('admin.layouts.master')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">

        <div class="card">
            <div class="card-header">
                Manage Products
            </div>
            <div class="card-body">
                @include('admin.partials.messages')
                <a data-toggle="modal" id="getModal" data-target="#addModal"
                    data-url="{{ url('admin/products/create')}}" href="#."
                    class="btn btn-sm btn-success float-right mb-2 mr-3">
                    <i class="fa fa-plus"></i> Add
                </a>
                <div class="clearfix"></div>
                <!--- Add Modal ---->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content  ceramics-modal">

                        </div>
                    </div>
                </div>
                <!--- END Add Modal ---->

                <!--Edit Modal-->
                {{--<div class="modal fade" id="#editModal" tabindex="-1" role="dialog" aria-labelledby="editModallTitle" aria-hidden="true">--}}
                {{--<div class="modal-dialog modal-xl" role="document">--}}
                {{--<div class="modal-content  ceramics-modal">--}}

                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                <!---End Edit Modal--->


                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>SI</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Product Images</th>
                            <th>Status</th>
                            <th>Priority</th>
                            <th style="width: 60px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td style="text-align: left">{{$loop->index +1}}</td>
                            <td style="text-align: left">{{$product->title}}</td>
                            <td style="text-align: left">{{$product->category->name}}</td>
                            <td>
                                @foreach($product->images as $key => $image)
                                <img src="{{asset($image->image)}}" width="30" alt="Thumb_image">
                                @endforeach
                            </td>

                            <td>
                                <span
                                    class="{{$product->active_status == 1? 'badge badge-success badge-success-alt' : 'badge badge-danger badge-danger-alt'}}}">{{$product->active_status == 1 ? 'active' : 'inactive'}}</span>
                            </td>
                            <td style="text-align: right">{{$product->priority}}</td>
                            <td style="text-align: center">
                                <a data-toggle="modal" id="getModal" data-target="#addModal"
                                    data-url="{{url('admin/products/edit', $product->id)}}" href="#."
                                    class="btn btn-sm btn-info"><i class="far fa-edit"></i></a>

                                <a href="#deleteModal{{$product->id}}" data-toggle="modal"
                                    class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>

                                <!-- DeleteModal -->


                                <!--End Delete Modal-->

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{$product->id, $product->category_id}}"
                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update this Product
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SI</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Product Images</th>
                            <th>Status</th>
                            <th>Priority</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    {{--</tbody>--}}
                </table>
                @foreach($products as $product)
                <div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure to delete?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-footer">
                                <form action="{!! route('admin.product.delete', $product->id) !!}" method="post">
                                    {{csrf_field()}}
                                    <button type="submit" class="btn btn-sm btn-danger">Yes, Delete it!</button>
                                </form>
                                <button type="button" class="btn btn-sm btn-secondary"
                                    data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
<!-- main-panel ends -->
@endsection
