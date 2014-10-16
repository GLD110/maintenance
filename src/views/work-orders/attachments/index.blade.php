@extends('maintenance::layouts.main')

@section('header')
	<h1>{{ $title }}</h1>
@stop

@section('breadcrumb')
<li>
    <a href="{{ route('maintenance.work-orders.index') }}">
        <i class="fa fa-book"></i> 
        Work Orders
    </a>
</li>
<li>
    <a href="{{ route('maintenance.work-orders.show', array($workOrder->id)) }}"> 
        {{ $workOrder->subject }}
    </a>
</li>
<li class="active">
    Attachments
</li>
@stop

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            <div class="btn-toolbar">
                <a href="{{ route('maintenance.work-orders.attachments.create', array($workOrder->id)) }}" class="btn btn-primary" data-toggle="tooltip" title="Upload Work Order Attachments">
                    <i class="fa fa-plus"></i>
                    Upload Attachments
                </a>
            </div>
        </div>
    </div>
    <div class="panel-body">
        @if($workOrder->attachments->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Attachment</th>
                    <th>Name</th>
                    <th class="hidden-xs">File Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($workOrder->attachments as $attachment)
                <tr>
                    <td width="200">
                        <a href="{{ Storage::url($attachment->file_path.$attachment->file_name) }}">{{ $attachment->file_name }}</a>
                    </td>
                    <td>{{ $attachment->name }}</td>
                    <td class="hidden-xs">{{ $attachment->file_name }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                                Action
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('maintenance.work-orders.attachments.show', array($workOrder->id, $attachment->id)) }}">
                                        <i class="fa fa-search"></i> View Attachment
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('maintenance.work-orders.attachments.destroy', array($workOrder->id, $attachment->id)) }}" data-method="delete" data-message="Are you sure you want to delete this image?">
                                        <i class="fa fa-trash-o"></i> Delete Attachment
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        
        <h5>There are currently no attachments to list.</h5>
        
        @endif
    </div>
</div>
@stop