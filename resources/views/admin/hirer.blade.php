@extends('admin.layouts.app')
@section('content')
@include('admin.layouts.headers.cards')
<link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<div class="container-fluid mt--7">
	<div class="main-content" id="panel">
		<!-- Page content -->
		<div class="container-fluid mt--6">
			<div class="table-responsive">
				<table class="table align-items-center" id="data-table">
					<thead class="thead-light">
						<tr>
							<th>S.No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone No.</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- @include('admin.layouts.footers.auth') -->
	<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
	<script type="text/javascript">
		$(function() {
			var table = $('#data-table').DataTable({
				processing: true,
				serverSide: true,
				ajax: "/admin/hirer",
				columns: [
				{	
					data: 'DT_RowIndex', 
					name: '', 
					orderable: false, 
					searchable: false
				},
				{
					data: 'name',
					name: 'name'
				},
				{
					data: 'email',
					name: 'email'
				},
				{
					data: 'phone_no',
					name: 'phone_no'
				},
				]
			});
		});
	</script>
	@endsection