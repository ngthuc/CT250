<?php 
	$sqlSelect="SELECT `EmployeeCode`, `EmployeePass`, `EmployeeName`, `EmployeeBirth`, `EmployeeAddress`, `EmployeeEmail`, `EmployeeIC`, `Role` FROM employee";
	$list_employee= mysql_query($sqlSelect);
?>
<h3 class="w3_inner_tittle two text-center">Quản lý Nhân Viên</h3>
<a class="btn btn-primary" href="?page=AddEmployee">THÊM <i class="fa fa-plus"></i></a> 
<br>
<br>
<table id="myTable" class="table-striped table-bordered table-hover table-condensed">
	<thead >
		<tr>
			<th><strong>STT</strong></th>
			<th><strong>Mã Nhân Viên</strong></th>
			<th><strong>Mật Khẩu</strong></th>
			<th><strong>Tên Nhân Viên</strong></th>
			<th><strong>Ngày sinh</strong></th>
			<th><strong>Địa chỉ</strong></th>
			<th><strong>Email</strong></th>
			<th><strong>CMND</strong></th>
			<th><strong>Quyền</strong></th>
			<th><strong>Phương Thức</strong></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$num = 1;
		while(list($empCode,$empPass,$empName,$empBrith,$empAddress,$empMail,$empIC,$empRole) = mysql_fetch_array($list_employee))
		{
			?>
			<tr>
				<td class="col-md-1"><?= $num;?> </td>
				<?php 
				$result = searchRole($empRole);
				if(isset($result))
				{
					list($RoleId,$RoleName)=mysql_fetch_array($result);
					$empRole = $RoleName;
				} ?>
				<td class="col-md-1"><?= $empCode;?> </td>
				<td class="col-md-1"><?= $empPass;?> </td>
				<td class="col-md-1"><?= $empName;?> </td>
				<td class="col-md-1"><?= $empBrith;?> </td>
				<td class="col-md-1"><?= $empAddress;?> </td>
				<td class="col-md-1"><?= $empMail;?> </td>
				<td class="col-md-1"><?= $empIC?> </td>
				<td class="col-md-1"><?= $empRole?> </td>
				<td class="text-center col-md-6">
					<a class='btn btn-success' href="?page=UploadImageEmployee&&empCode=<?=$empCode?>">
						<i class="fa fa-file-image-o"></i></a>
						<a class="btn btn-warning btn" href="?page=UpadateEmployee&empCode=<?php echo $empCode; ?>"><i class="fa fa-edit"></i></a>
						<a class='btn btn-danger' href="?page=DeleteEmployee&empCode=<?php echo $empCode; ?>" onclick="return confirm('Bạn có chắc chắn xóa bản ghi này không?')"><i class="fa fa-remove"></i></a>
				</td>     
				</tr>
				<?php
				$num++;
			}
			?>
		</tbody>
	</table>
