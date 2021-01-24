/**
{{--* Created by: Shawon--}}
{{--*/--}}
<style>
    .card-header:first-child {
        background-color: lightgray !important;
    }
</style>
@extends('admin.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @include('frontend.partials.messages')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Inbox</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Inbox</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Inbox</h3>

                        {{--<div class="card-tools">--}}
                        {{--<div class="input-group input-group-sm">--}}
                        {{--<input type="text" class="form-control" placeholder="Search Mail">--}}
                        {{--<div class="input-group-append">--}}
                        {{--<div class="btn btn-primary">--}}
                        {{--<i class="fas fa-search"></i>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i
                                    class="far fa-square"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i
                                        class="far fa-trash-alt"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i
                                        class="fas fa-reply"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i
                                        class="fas fa-share"></i></button>
                            </div>
                            <!-- /.btn-group -->
                            <button type="button" onclick="refresh()" class="btn btn-default btn-sm"><i
                                    class="fas fa-sync-alt"></i></button>
                            {{--<div class="float-right">--}}
                            {{--1-50/200--}}
                            {{--<div class="btn-group">--}}
                            {{--<button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>--}}
                            {{--<button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>--}}
                            {{--</div>--}}
                            {{--<!-- /.btn-group -->--}}
                            {{--</div>--}}
                            <!-- /.float-right -->
                        </div>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped" id="example2">
                                <thead>
                                    <tr>
                                        <th>Mark</th>
                                        <th>Seen</th>
                                        <th>Sender</th>
                                        <th>Subject</th>
                                        <th>Time</th>
                                        {{--<th style="width: 60px">Action</th>--}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($messages as $message)
                                    <tr>
                                        <td>
                                            <div class="icheck-primary">
                                                <input type="checkbox" value="" id="check{{$loop->index +1}}">
                                                <label for="check{{$loop->index +1}}"></label>
                                            </div>
                                        </td>
                                        <td class="mailbox-star">
                                            @if($message->is_seen == 1)
                                            <b><i class="far fa-eye-slash"></i></b>
                                            @else
                                            <i style="color: grey" class="far fa-eye"></i>
                                            @endif
                                        </td>
                                        <td class="mailbox-name">
                                            @if($message->is_seen == 1)
                                            <a
                                                href="{{url('admin/inbox/read',$message->id)}}"><b>{{$message->name}}</b></a>
                                            @else
                                            <a href="{{url('admin/inbox/read',$message->id)}}">{{$message->name}}</a>
                                            @endif
                                        </td>
                                        <td class="mailbox-subject">
                                            @if($message->is_seen == 1)
                                            <b>{{$message->subject}}</b>
                                            @else
                                            <span style="color: grey">{{$message->subject}}</span>
                                            @endif
                                        </td>
                                        {{--<td class="mailbox-attachment"></td>--}}
                                        <td class="mailbox-date">
                                            @if($message->is_seen == 1)
                                            <b>{{$message->time}} <small
                                                    style="color: lightslategrey">({{$message->date}})</small></b>
                                            @else
                                            {{$message->time}} <small
                                                style="color: lightslategrey">({{$message->date}})</small>
                                            @endif

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.card-body -->
                    {{--<div class="card-footer p-0">--}}
                    {{--<div class="mailbox-controls">--}}
                    {{--<!-- Check all button -->--}}
                    {{--<button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>--}}
                    {{--</button>--}}
                    {{--<div class="btn-group">--}}
                    {{--<button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>--}}
                    {{--<button type="button" class="btn btn-default btn-sm"><i class="fas fa-reply"></i></button>--}}
                    {{--<button type="button" class="btn btn-default btn-sm"><i class="fas fa-share"></i></button>--}}
                    {{--</div>--}}
                    {{--<!-- /.btn-group -->--}}
                    {{--<button type="button" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>--}}
                    {{--<div class="float-right">--}}
                    {{--1-50/200--}}
                    {{--<div class="btn-group">--}}
                    {{--<button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>--}}
                    {{--<button type="button" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>--}}
                    {{--</div>--}}
                    {{--<!-- /.btn-group -->--}}
                    {{--</div>--}}
                    {{--<!-- /.float-right -->--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
