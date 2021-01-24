{{--/**--}}
{{--* Created by: Shawon--}}
{{--*/--}}
@extends('admin.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Inbox Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.inbox')}}">Back to Inbox</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Read Mail</h3>

                            <div class="card-tools">
                                <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i
                                        class="fas fa-chevron-left"></i></a>
                                <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0" id="printableArea">
                            <div class="mailbox-read-info">
                                <h5>{{$message->subject}}</h5>
                                <h6>From: {{$message->email}}
                                    <span class="mailbox-read-time float-right">{{$message->date}}
                                        {{$message->time}}</span></h6>
                            </div>
                            <!-- /.mailbox-read-info -->
                            {{--<div class="mailbox-controls with-border text-center">--}}
                            {{--<div class="btn-group">--}}
                            {{--<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">--}}
                            {{--<i class="far fa-trash-alt"></i></button>--}}
                            {{--<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">--}}
                            {{--<i class="fas fa-reply"></i></button>--}}
                            {{--<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">--}}
                            {{--<i class="fas fa-share"></i></button>--}}
                            {{--</div>--}}
                            {{--<!-- /.btn-group -->--}}
                            {{--<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">--}}
                            {{--<i class="fas fa-print"></i></button>--}}
                            {{--</div>--}}
                            <!-- /.mailbox-controls -->
                            <div class="mailbox-read-message">
                                @php echo($message->message) @endphp
                                <hr>
                                <p>Thanks,<br>{{$message->name}}</p>
                            </div>
                            <!-- /.mailbox-read-message -->
                        </div>
                        <!-- /.card-body -->

                        <!-- /.card-footer -->
                        <div class="card-footer">
                            <div class="float-right">
                                <a href="mailto:{{$message->email}}" class="btn btn-default"><i
                                        class="fas fa-reply"></i> Reply</a>
                                <button type="button" class="btn btn-default"><i class="fas fa-share"></i>
                                    Forward</button>
                            </div>
                            {{--<a href="{{url('admin/inbox/delete',$message->id)}}" type="button" class="btn
                            btn-default"><i class="far fa-trash-alt"></i> Delete</a>--}}
                            <form action="{!! route('admin.inbox.delete', $message->id) !!}" method="post">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-default"><i class="far fa-trash-alt"></i>
                                    Delete</button>
                                <button onclick="printDiv('printableArea')" type="button" class="btn btn-default"><i
                                        class="fas fa-print"></i> Print</button>
                            </form>

                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
@endsection
