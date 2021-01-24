{{--/**--}}
{{--* Created by PhpStorm.--}}
{{--* User: Shawon--}}
{{--* Date: 06-Sep-20--}}
{{--* Time: 5:19 PM--}}
{{--*/--}}

@include('admin.partials.modalLinks')
@include('admin.partials.modalScripts')
<div class="modal-header bg-success">
    <h5 class="modal-title" id="exampleModalLongTitle">Update This Category</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="popupMessageContainer">
        <form action="{!! route('admin.category.update', $category->id) !!}" method="post"
            enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputPassword1">Parent Category (Optional)</label>
                <select class="form-control select2bs4" name="parent_id">
                    <option disabled selected>Please select a primary category</option>
                    {{--@foreach(App\Model\Category::orderBy('name','asc')->get() as $cat)--}}
                    {{--<option value="{{$cat->id}}" {{$cat->id==$category->parent_id ? 'selected' :''}}>{{$cat->name}}
                    </option>--}}
                    {{--@endforeach--}}

                    {{--@foreach($main_categories as $cat)--}}
                    {{--<option value="{{$category->id}}"
                    {{$cat->id==$category->parent_id ? 'selected' :''}}>{{$category->name}}</option>--}}
                    {{--@foreach(App\Model\Category::orderBy('priority','asc')->where('parent_id', $cat->id)->get() as $child)--}}
                    {{--<option value="{{$child->id}}" {{$child->id==$category->parent_id ? 'selected' :''}}> --->
                    {{$child->name}}</option>--}}
                    {{--@endforeach--}}
                    {{--@endforeach--}}

                    @foreach(App\Model\Category::orderBy('name','asc')->where('parent_id', NULL)->get() as $parent)
                    <option @if($parent->id == $category->parent_id) selected @endif
                        value="{{$parent->id}}">{{$parent->name}}</option>
                    @foreach(App\Model\Category::orderBy('name','asc')->where('parent_id', $parent->id)->get() as
                    $subchild)
                    <option @if($subchild->id == $category->parent_id) selected @endif class="ml-2"
                        value="{{$subchild->id}}"> <b
                            style="color: red!important;">&nbsp;&nbsp;&nbsp;•&nbsp;{{$subchild->name}}</b></option>
                    @endforeach
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Category Name<small class="text-danger">(required)</small></label>
                <input type="text" class="form-control" name="name" value="{{$category->name}}" required>
            </div>
            <div class="form-group">
                <label for="description">Category Description<small class="text-danger">(required)</small></label>
                <textarea name="description" class="textarea" value="{{$category->description}}"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$category->description}}</textarea>
                {{--<textarea name="description"  class="form-control"  rows="4" value="{{$category->description}}">{{$category->description}}</textarea>--}}
            </div>
            {{-- <div class="form-group">
                <label for="image">Category Image
                    <a href="{{asset($category->image_url)}}" target="_blank">Previous image_url</a>
            <img src="{{asset($category->image_url)}}" width="50">
            <small class="text-danger">(required)</small></label>
            <input type="file" class="form-control" name="image" placeholder="Category Image..">
    </div> --}}

    <div class="form-group">
        <div class="form-group">
            <label for="active_status">Status: <small class="text-danger"></small></label>
            <input type="checkbox" class="ml-4" name="active_status" value="1"
                {{$category->active_status == 1? 'checked' : ''}}> Active
        </div>
    </div>
    <div class="form-group">
        <div class="form-group">
            <label for="priority">Priority <small class="text-danger"></small></label>
            <input type="number" class="form-control" name="priority" value="{{$category->priority}}">
        </div>
    </div>


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
