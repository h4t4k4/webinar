<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Todo List - Codeigniter Way</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<style>
		.selesai {
			text-decoration: line-through;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="offset-3 col-md-6 mt-2">
			<h1>Todo List</h1>
			<form action="todo/tambah" method="post">
				<div class="form-group">
					<input type="text" name="todo" id="todo" class="form-control">
				</div>
				<div class="form-group">
					<input type="submit" value="Simpan" name="simpan"
						class="btn btn-success">
				</div>
			</form>

			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No.</th>
						<th>Todo</th>
						<th colspan=2>Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$i=0;
					foreach($todo as $row):
						$i++;
						echo "<tr>
								<td>{$i}.</td>
								<td class=".($row->status==1?"selesai":"").">{$row->todo}</td>
								<td><a href='todo/selesai/{$row->id}' class='btn btn-success btn-block'>Selesai</a></td>
								<td><a href='todo/hapus/{$row->id}' class='btn btn-danger btn-block'>Hapus</a></td>
							</tr>";
					endforeach;
				?>					
				</tbody>
			</table>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
