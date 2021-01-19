@extends('journals.layout')
@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Check all Journals</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-success" href="{{ route('journals.create')}}">Create a new Journal</a>
			</div>
		</div>
	</div>	
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
		
	<table class="table table-bordered">
		<tr>
			<th>Journal No</th>
			<th>Journal Title</th>
			<th>Description</th>
			<th width="250px">Available Actions</th>
		</tr>
	@foreach ($journals as $journal)
		@if($journal->userid === Auth::id())
        <tr>
            <td>{{ $index++ }}</td>
            <td>{{ $journal->title }}</td>
            <td>{{ $journal->description }}</td>
            <td>
                <form action="{{ route('journals.destroy',$journal->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('journals.show',$journal->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('journals.edit',$journal->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
		@endif
    @endforeach
	
    </table>
	
    {!! $journals->links() !!}
@endsection
	
