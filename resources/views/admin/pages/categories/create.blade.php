{{--/**--}}
{{--* Created by PhpStorm.--}}
{{--* User: Shawon--}}
{{--* Date: 06-Sep-20--}}
{{--* Time: 5:11 PM--}}
{{--*/--}}
@include('admin.partials.modalLinks')
@include('admin.partials.modalScripts')
@include('admin.partials.validate')
<div class="modal-header bg-success">
    <h5 class="modal-title" id="exampleModalLongTitle">Add New Category</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="popupMessageContainer">
        <form action="{{route('admin.category.store')}}" id="myForm" method="post" enctype="multipart/form-data">
            @csrf
            @include('admin.partials.messages')
            <div class="form-group">
                <label for="parent_id">Select Parent Category (Optional)</label>
                <select class="form-control select2bs4" name="parent_id">
                    <option disabled selected value="">Please select a parent category</option>
                    @foreach($main_categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @foreach(App\Model\Category::orderBy('priority','asc')->where('parent_id', $category->id)->get() as
                    $child)
                    <option value="{{$child->id}}">&nbsp;&nbsp;&nbsp;•&nbsp;{{$child->name}}</option>
                    @endforeach
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Category Name"
                    required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                {{--<textarea name="description" rows="4" class="form-control"></textarea>--}}
                <textarea name="description" class="textarea" placeholder="Enter Description here"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>



            {{-- <div class="form-group">
                <label for="image_url">Category Image (Optional)</label>
                <input type="file" class="form-control" name="image" id="image" accept="image/*" required >
            </div> --}}

            <div class="form-group">
                <label for="active_status">Status: <small class="text-danger"></small></label>
                <input type="checkbox" class="ml-4" name="active_status" value="1" checked required> Active
            </div>


            <div class="form-group">
                <label for="priority">Priority</label>
                <input type="number" class="form-control" name="priority" id="priority" placeholder="Enter Priority"
                    required>
            </div>

            <div class="form-group">
                <input type="hidden" class="form-control" name="created_by" id="created_by"
                    value="{{ Auth::user()->id }}" required>
            </div>
            <div class="form-btn mr-3" style="float: right">
                <button type="submit" class="btn btn-sm btn-success">Add New</button>
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
//        $.validator.setDefaults({
//            submitHandler: function () {
//                alert( "Form successful submitted!" );
//            }
//        });
        $('#myForm').validate({
            rules: {
                name: {
                    required: true,
                },
                description: {
                    required: true,
                },
                priority: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: "Please enter a name"
                },
                description: {
                    required: "Please Enter description"
                },
                priority: {
                    required: "Please Enter category priority"
                },
//                image_url: {
//                    required: "Please Enter category image"
//                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
