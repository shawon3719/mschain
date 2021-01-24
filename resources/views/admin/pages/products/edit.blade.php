{{--/**--}}
{{--* Created by PhpStorm.--}}
{{--* User: Shawon--}}
{{--*/--}}
{{--@include('admin.partials.links')--}}
{{--@include('admin.partials.scripts')--}}
@include('admin.partials.modalLinks')
@include('admin.partials.modalScripts')
<div class="modal-header bg-success">
    <h5 class="modal-title" id="exampleModalLongTitle">Update This Product</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="popupMessageContainer">
        <form action="{!! route('admin.product.update', $product->id) !!}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Select Category</label>
                        <select class="form-control" name="category_id">
                            <option value="">Please Select a Category of the product</option>
                            @foreach(App\Model\Category::orderBy('name','asc')->where('parent_id', NULL)->get() as
                            $parent)
                            <option value="{{$parent->id}}" {{$parent->id == $product->category->id ? 'selected' : ''}}>
                                {{$parent->name}}</option>
                            @foreach(App\Model\Category::orderBy('name','asc')->where('parent_id', $parent->id)->get()
                            as $child)
                            <option value="{{$child->id}}" {{$child->id == $product->category->id ? 'selected' : ''}}>
                                {{$child->name}}
                            </option>
                            @endforeach
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1"
                            value="{{$product->title}}">
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                {{--<textarea name="description" rows="3" class="form-control"></textarea>--}}
                <textarea name="description" class="textarea" placeholder="Enter Description here"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$product->description}}</textarea>

            </div>
            {{--------------------}}
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        {{--<div class="col-lg-6">--}}
                        {{--<div class="form-group">--}}
                        {{--<label for="main_image">Main Image</label>--}}
                        {{--<input type="file" class="form-control-sm"--}}
                        {{--value="{{$product->main_image}}" name="main_image" id="main_image" accept="image/*" >--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-6">--}}
                        {{--<label for="password-input">File: </label>--}}
                        {{--<input class="form-control-sm" type="file" name="file"--}}
                        {{--value="{{$product->file}}" id="password-input"
                        accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                        />--}}
                        {{--</div>--}}

                        <div class="col-lg-4 mt-4">
                            <div class="form-check">
                                <label class="form-check-label" for="active_status">
                                    <input class="form-check-input" type="checkbox" id="active_status"
                                        name="active_status" value="1" {{$product->active_status == 1? 'checked' : ''}}>
                                    <b>Active</b>
                                </label>
                                {{--</div>--}}
                            </div>
                        </div>
                        <div class="col-lg-8 mt-4">
                            <div class="form-field row">
                                <label class="col-sm-4" for="password-input">Priority: </label>
                                <input class="col-sm-8" type="number" name="priority" class="form-control-sm"
                                    id="password-input" value="{{$product->priority}}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="product_image">Product Image</label>
                                <table class="table table-hover table-striped" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Product Images</th>
                                            <th>Preview</th>

                                        </tr>
                                    </thead>
                                    <tbody id="test-body">
                                    @foreach($product->images as $key=>$image)
                                        <tr>
                                            <td>
                                                <input type="file" class="form-control-sm" name="product_image[]"
                                                    id="product_image" onchange="readURL{{$key+1}}(this);" accept="image/*">
                                            </td>
                                            <td>
                                                <img id="outputMain{{$key+1}}" src="{{asset($image->image)}}"
                                                    alt="your image" width="50" />
                                            </td>
                                        </tr>
                                        @endforeach
                                    <?php
                                    $count = count($product->images);
                                    ?>
                                    @if($count==2)
                                        <tr>
                                            <td>
                                                <input type="file" class="form-control-sm" name="product_image[]"
                                                       id="product_image" onchange="readURL3(this);" accept="image/*">
                                            </td>
                                            <td>
                                                <img id="outputMain3"
                                                     alt="your image" width="50" />
                                            </td>
                                        </tr>
                                        @elseif($count == 1)
                                        <tr>
                                            <td>
                                                <input type="file" class="form-control-sm" name="product_image[]"
                                                       id="product_image" onchange="readURL2(this);" accept="image/*">
                                            </td>
                                            <td>
                                                <img id="outputMain2"
                                                     alt="your image" width="50" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="file" class="form-control-sm" name="product_image[]"
                                                       id="product_image" onchange="readURL3(this);" accept="image/*">
                                            </td>
                                            <td>
                                                <img id="outputMain3"
                                                     alt="your image" width="50" />
                                            </td>
                                        </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
            {{------------------------------}}

            {{--===============--}}
            <div class="form-group">
                <input type="hidden" class="form-control" name="updated_by" value="{{ Auth::user()->id }}">
            </div>
            <div class="form-btn mr-3" style="float: right">
                <button type="submit" class="btn btn-sm btn-success">Update</button>
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
            </div>

        </form>
    </div>
</div>
