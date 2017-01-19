@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('task') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task-name') }}">
                            </div>
                        </div>
			<div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Description</label>

                            <div class="col-sm-6">
                                <input type="text" name="description" id="task-description" class="form-control" value="{{ old('task-description') }}">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>ToDo Task</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
				@if ($task->state=="todo")
				<form action="{{url('tasks/edit/' . $task->id)}}" method="POST">
 				{{ csrf_field() }}
                                {{ method_field('POST') }}
                                    <tr>
                                        <td class="table-text"><div>{{ $task->name }}</div></td>
					<td><input type="text" name="description" id="task-description" class="form-control" value="{{ $task->description }}"></td>
				    </tr>
				    <tr>
                                        <td colspan=2>
                                            <button type="submit" id="edit-description-{{ $task->id }}" class="btn btn-warning">
                                                <i class="fa fa-btn fa-edit"></i>Change Description
                                            </button>
                                        </td>
				    </tr>
                                </form>
					<tr>
						<td colspan=2>
                                        <!-- Task Delete Button -->
						<form action="{{url('task/' . $task->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
 					<!-- DOING Button -->
						<form action="{{url('task/doing/' . $task->id)}}" method="POST">
                                                {{ csrf_field() }}

                                                <button type="submit" id="doing-task-{{ $task->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-edit"></i>Doing
                                                </button>
                                            </form>
						</td>
					</tr>
				@endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
			</br>
			<div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Doing Task</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
				@if ($task->state=="doing")
				<form action="{{url('tasks/edit/' . $task->id)}}" method="POST">
 				{{ csrf_field() }}
                                {{ method_field('POST') }}
                                    <tr>
                                        <td class="table-text"><div>{{ $task->name }}</div></td>
					<td><input type="text" name="description" id="task-description" class="form-control" value="{{ $task->description }}"></td>
				    </tr>
				    <tr>
                                        <td colspan=2>
                                            <button type="submit" id="edit-description-{{ $task->id }}" class="btn btn-warning">
                                                <i class="fa fa-btn fa-edit"></i>Change Description
                                            </button>
                                        </td>
				    </tr>
                                </form>
					<tr>
						<td colspan=2>
                                        <!-- Task Delete Button -->
						<form action="{{url('task/' . $task->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
						<!-- TO DO Button -->
						<form action="{{url('task/todo/' . $task->id)}}" method="POST">
                                                {{ csrf_field() }}

                                                <button type="submit" id="todo-task-{{ $task->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-edit"></i>TO-DO
                                                </button>
                                            </form>
						<!-- DONE Button -->
						<form action="{{url('task/done/' . $task->id)}}" method="POST">
                                                {{ csrf_field() }}

                                                <button type="submit" id="done-task-{{ $task->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-edit"></i>Done
                                                </button>
                                            </form>
						</td>
					</tr>
				@endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
		</br>
		<div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Done Task</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
				@if ($task->state=="done")
				<form action="{{url('tasks/edit/' . $task->id)}}" method="POST">
 				{{ csrf_field() }}
                                {{ method_field('POST') }}
                                    <tr>
                                        <td class="table-text"><div>{{ $task->name }}</div></td>
					<td><input type="text" name="description" id="task-description" class="form-control" value="{{ $task->description }}"></td>
				    </tr>
				    <tr>
                                        <td colspan=2>
                                            <button type="submit" id="edit-description-{{ $task->id }}" class="btn btn-warning">
                                                <i class="fa fa-btn fa-edit"></i>Change Description
                                            </button>
                                        </td>
				    </tr>
                                </form>
					<tr>
						<td colspan=2>
                                        <!-- Task Delete Button -->
						<form action="{{url('task/' . $task->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
						<!-- TO DO Button -->
						<form action="{{url('task/todo/' . $task->id)}}" method="POST">
                                                {{ csrf_field() }}

                                                <button type="submit" id="todo-task-{{ $task->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-edit"></i>TO-DO
                                                </button>
                                            </form>
						<!-- DOING Button -->
						<form action="{{url('task/doing/' . $task->id)}}" method="POST">
                                                {{ csrf_field() }}

                                                <button type="submit" id="doing-task-{{ $task->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-edit"></i>Doing
                                                </button>
                                            </form>
						</td>
					</tr>
				@endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
