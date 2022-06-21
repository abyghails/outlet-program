<?php
// jangan lupa koneksi
//require_once "../config/koneksi.php";

// cuma untuk role admin yang bisa crud
// ambil dari session yang sudah di buat saat proses login
require_once "../config/koneksi.php";

$role = $_SESSION["role"];
$idUser = $_SESSION["id_user"];

?>

<div class="col-md-8 mt-3 mt-md-0">
	<div class="card card-data">
		<div class="card-header bg-info">
			<h5>Tambah Data Users</h5>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<div class="d-flex justify-content-between mb-5 mt-3">
						<a href="?page=users" class="btn btn-sm btn-secondary">Back</a>
					</div>

					<form action="include/users/proses/proses-tambah.php" method="POST">
						<div class="mb-3 row">
							<label for="nama" class="col-sm-2 col-form-label">Nama</label>
							<div class="col-sm-10">
								<input type="text" name="nama" class="form-control" autocomplete="off" required>
							</div>
						</div>
						<div class="mb-3 row">
							<label for="username" class="col-sm-2 col-form-label">Username</label>
							<div class="col-sm-10">
								<input type="text" name="username" class="form-control" autocomplete="off" required>
							</div>
						</div>
						<div class="mb-3 row">
							<label for="password" class="col-sm-2 col-form-label">Password</label>
							<div class="col-sm-10">
								<input type="password" name="password" class="form-control" autocomplete="off" required>
							</div>
						</div>
						<div class="mb-3 row">
							<label for="role" class="col-sm-2 col-form-label">Role</label>
							<div class="col-sm-10">
						
							<select name="role" id="role" class="form-select" required>
							
								<!--<
								//$role = $_POST['role'];
								// ambil data dari database
								//$sql = mysqli_query("SELECT role FROM users_role");
								//while ($result = mysqli_fetch_assoc($sql)) 
								//{																
									echo '<option value="'.$result['role'].'">'.$result["role"].'</option> ';	
								//	//echo $result['role'];									
								//}	
								
								//$sql = "SELECT role FROM users_role";
								//$query = $mysqli->query($sql);
								//$data = array();
								//while($row = $query->fetch_array(MYSQLI_ASSOC)){
								//$data[] = array("role" => $row['role']);
								//}
								//echo json_encode($data);								
								
								?--> 
								
								<?php
								$sql = mysqli_query($koneksi, "SELECT * FROM users_role");
								foreach ($sql as $result) { ?>								
								<option value="<?=$result['role']?>"><?=$result['role']; ?></option>
								<?php } ?>
                    			</select>
							</div>
						</div>

						<div class="mb-3 row">
							<label for="departemen" class="col-sm-2 col-form-label">departemen</label>
							<div class="col-sm-10">

							<select name="departemen" id="departemen" class="form-select" required>

							
							<?php $sql1 = mysqli_query($koneksi, "SELECT * FROM department");
							foreach ($sql1 as $result1) { ?>								
							<option value="<?=$result1['depart_name']?>"><?=$result1['depart_name']; ?></option>
							<?php } ?>															

							</select>
						
							</div>
						</div>

						<div class="mb-3 row">
							<label for="users" class="col-sm-2 col-form-label">users</label>
							<div class="col-sm-10">

							<select name="users" id="users" class="form-select" required>	
								<?php $sql1 = mysqli_query($koneksi, "SELECT * FROM users where $idUser");
								foreach ($sql1 as $result1) { ?>								
								<option value="<?=$result1['username']?>"><?=$result1['username']; ?></option>
								<?php } ?>							
							</select>

							</div>
						</div>

							<div class="col-sm-11">
								<button type="submit" class="btn btn-sm btn-primary">Tambah</button>
							</div>

							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){

		$("#sel_depart").change(function(){
			var deptid = $(this).val();

			$.ajax({
				url: 'getUsers.php',
				type: 'post',
				data: {depart:deptid},
				dataType: 'json',
				success:function(response){

					var len = response.length;

					$("#sel_user").empty();
					for( var i = 0; i<len; i++){
						var id = response[i]['id'];
						var name = response[i]['depart_name'];

						$("#sel_user").append("<option value='"+id+"'>"+name+"</option>");

					}
				}
			});
		});

	});
</script>