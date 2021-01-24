{{--/**--}}
{{--* Created by PhpStorm.--}}
{{--* User: Shawon--}}
{{--*/--}}
@include('admin.partials.modalLinks')
@include('admin.partials.modalScripts')
<div class="modal-header bg-success">
    <h5 class="modal-title" id="exampleModalLongTitle">Add New Product</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="popupMessageContainer">
        <form action="{{route('admin.product.store')}}" method="post" id="myForm" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Category</label>
                        <select class="form-control select2bs4" name="category_id">
                            <option disabled selected value="">Please Select a Category of the product</option>
                            @foreach(App\Model\Category::orderBy('name','asc')->where('parent_id', NULL)->get() as
                            $parent)
                            <option class="text-bold text-uppercase" value="{{$parent->id}}">{{$parent->name}}</option>
                            @foreach(App\Model\Category::orderBy('name','asc')->where('parent_id', $parent->id)->get()
                            as $subchild)

                            <?php $hasChild = 0 ?>
                            @foreach(App\Model\Category::orderBy('name','asc')->where('parent_id', $subchild->id)->get()
                            as $child)
                            <?php $hasChild += $child->id ?>
                            @endforeach
                            <option @if($hasChild> 0) class="text-bold" @endif class="ml-2" value="{{$subchild->id}}">
                                <b style="color: red!important;"> @if($hasChild >
                                    0)&nbsp;&nbsp;&nbsp;•&nbsp;@else&nbsp;&nbsp;&nbsp;•&nbsp;@endif{{$subchild->name}}</b>
                            </option>

                            @foreach(App\Model\Category::orderBy('name','asc')->where('parent_id', $subchild->id)->get()
                            as $child)
                            <option class="ml-2" value="{{$child->id}}">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;‣&nbsp;{{$child->name}}</option>
                            @endforeach
                            @endforeach
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea name="description" class="textarea" placeholder="Enter Description here"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                    required></textarea>

            </div>
            <div class="row px-3">
                <div class="col-lg-12 ">
                    <div class="row">
                        {{--<div class="col-lg-6">--}}
                        {{--<div class="form-group">--}}
                        {{--<label for="main_image">Main Image</label>--}}
                        {{--<input type="file" class="form-control-sm" name="main_image" id="main_image" accept="image/*" >--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-6">--}}
                        {{--<label for="password-input">File: </label>--}}
                        {{--<input class="form-control-sm" type="file" name="file" id="password-input" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"  />--}}
                        {{--</div>--}}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="active_status"
                                        name="active_status" value="1" checked>
                                    <label for="active_status" class="custom-control-label">Active</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-field row">
                                <label class="col-sm-4" for="password-input">Priority: </label>
                                <input class="col-sm-8" type="number" name="priority" class="form-control-sm"
                                    id="password-input" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="image_url">Product Image</label>
                        <div class="table-responsive">
                            <table id="test-table" class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>Upload</th>
                                        <th>Preview</th>
                                    </tr>
                                </thead>
                                <tbody id="test-body">
                                    <tr id="row0">
                                        <td>
                                            <input type="file" class="form-control-sm" class="img_input"
                                                name="product_image[]" id="product_image1" accept="image/*" required
                                                onchange="readURL1(this);">
                                        </td>
                                        <td>
                                            <img id="outputMain1" alt="your image" width="50" />
                                        </td>
                                    </tr>
                                    <tr id="row1">
                                        <td>
                                            <input type="file" class="form-control-sm" class="img_input"
                                                   name="product_image[]" id="product_image2" accept="image/*" required
                                                   onchange="readURL2(this);">
                                        </td>
                                        <td>
                                            <img id="outputMain2" alt="your image" width="50" />
                                        </td>
                                    </tr>
                                    <tr id="row2">
                                        <td>
                                            <input type="file" class="form-control-sm" class="img_input"
                                                   name="product_image[]" id="product_image3" accept="image/*" required
                                                   onchange="readURL3(this);">
                                        </td>
                                        <td>
                                            <img id="outputMain3" alt="your image" width="50" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input type="hidden" class="form-control" name="created_by" id="created_by"
                    value="{{ Auth::user()->id }}">
            </div>
            <div class="form-btn mr-3" style="float: right">
                <button type="submit" id="submit" class="btn btn-sm btn-success">Submit</button>
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>
