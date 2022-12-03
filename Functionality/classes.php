<?php
include 'connect.php';

class STMS
{
	function Login(){
		global $conn;
		$UserName = $_POST['UserName'];
		$Password = MD5($_POST['Password']);

		$sql = ("SELECT * FROM tbl_user WHERE UserName = '$UserName' AND Password = '$Password'");
		$result = $conn->query($sql) or die(mysqli_error($conn));

		if($result->num_rows > 0){
			
				session_start(); // SESSION START
				
				$row = mysqli_fetch_assoc($result);
				
				$DbUserID = $row['UserID'];
				$DbUsername = $row['UserName'];
				$DbPassword = $row['Password'];
				$DbPrivilage = $row['Privilage'];
				
				if($DbUsername == $UserName && $DbPassword == $Password ){
					
					$_SESSION['UID'] = $row['UserID'];
					$_SESSION['Name'] = $row['FName']." ".$row['LName'];
					$_SESSION['Privl'] = $row['Privilage'];
					$_SESSION['Status'] = $row['Status'];
					
					if($_SESSION['Privl'] == 'Administrator' && $_SESSION['Status'] == 'Active'){
						header("location:AdminDashboard.php");
					}
					elseif($_SESSION['Privl'] == 'Director' && $_SESSION['Status'] == 'Active'){
						header("location:AdminDashboard.php");
					}
					elseif($_SESSION['Privl'] == 'School' && $_SESSION['Status'] == 'Active'){
						$sql = "SELECT * FROM tbl_School WHERE tbl_School.SchlUserID = '$DbUserID'";
						$result = $conn->query($sql);
						if($result->num_rows > 0){
							$row = $result->fetch_assoc();
							$_SESSION['SchlID'] = $row['SchlID'];
							$_SESSION['SchlName'] = $row['SchlName'];
							$_SESSION['CtgState'] = $row['CtgState'];
							$_SESSION['CtgName'] = $row['CtgName'];
							header("location:School/Dashboard.php");}
					}else{
						$_SESSION['Blocked'] = "done";
					}
				}
				
			
		}else{
					$_SESSION['Error'] = "done";
				}
	}

	function AddUser(){
		global $conn;
		$FName = $_POST['FName'];
		$LName = $_POST['LName'];
		$Gender = $_POST['Gender'];
		$Address = $_POST['Address'];
		$Email = $_POST['Email'];
		$Phone = $_POST['Phone'];
		$UserName = $_POST['UserName'];
		$Password = MD5($_POST['Password']);
		$Privl = $_POST['Privilage'];
		$Status = $_POST['Status'];

		$sql = "SELECT * FROM tbl_User WHERE UserName = '$UserName'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$_SESSION['Exist'] = "done";
			
		}else{
			$sql = "INSERT INTO tbl_user VALUES('','$FName','$LName','$Gender','$Address','$Email','$Phone','$UserName','$Password','$Privl','$Status')";
			$result = $conn->query($sql);
			if ($result == true) {
				$_SESSION['Success'] = "done";

			}else{
				echo "<script>alert('Data NOT Saved')</script>";
			}
		}
	}

	function ViewUser(){
		global $conn;
		$sql = "SELECT * FROM tbl_user";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo"
					<tr>
						<td>{$row['FName']} {$row['LName']}</td>
						<td>{$row['Gender']}</td>
						<td>{$row['Address']}</td>
						<td>{$row['Phone']}</td>
						<td>{$row['Email']}</td>
						<td>{$row['UserName']}</td>
						<td>{$row['Privilage']}</td>
						<td><a data-toggle='modal' data-target='#ModalEditUser".$row['UserID']."' data-toggle='tooltip' data-placement='top' title='Edit'>
                                         <i class='far fa-edit'></i></a>";
							if($row['Status'] == 'Active'){
		                   		 echo "<a data-toggle='modal' data-target='#ModalAccessDeactive".$row['UserID']."' data-toggle='tooltip' data-placement='top' title='Active' style='color:Green'>
                                         <i class='fas fa-ban'></i></a>";
		                    	} 
		                   	if($row['Status'] == 'Deactive'){
		                    	echo "<a data-toggle='modal' data-target='#ModalAccessActive".$row['UserID']."' data-toggle='tooltip' data-placement='top' title='Deactive' style='color:red'>
                                         <i class='fas fa-ban'></i></a>";
		                    	}
		                    if($row['Privilage'] == 'School'){
	                    	echo "<a data-toggle='modal' data-target='#ModalAssignToSchool".$row['UserID']."' data-toggle='tooltip' data-placement='top' title='Assign to School'>
                                     <i class='fas fa-sign-in-alt'></i></a>";
	                    	}      
						echo "</td>";
					echo "</tr>";

					echo "
						<div class='modal fade in' id='ModalEditUser".$row['UserID']."' tabindex='-1' role='dialog'>
			                <div class='modal-dialog'>
			                <div class='card'>
			                <div class='modal-content'>
                            <form class='form-horizontal' method='post' action='ViewUser.php'>
                                <input  type='hidden' name='UserID' value='".$row['UserID']."'>
                                <div class='card-body'>
                                    <h4 class='card-title'>Update User</h4>
                                    <div class='form-group row'>
                                        <label for='fname' class='col-sm-3 text-right control-label col-form-label'>First Name</label>
                                        <div class='col-sm-9'>
                                            <input type='text' class='form-control' name='FName' value='".$row['FName']."' required placeholder='First Name Here'>
                                        </div>
                                    </div>
                                    <div class='form-group row'>
                                        <label for='lname' class='col-sm-3 text-right control-label col-form-label'>Last Name</label>
                                        <div class='col-sm-9'>
                                            <input type='text' class='form-control' name='LName' value='".$row['LName']."' required placeholder='Last Name Here'>
                                        </div>
                                    </div>
                                    <div class='form-group row'>
                                        <label for='Gender' class='col-sm-3 text-right control-label col-form-label'>Gender</label>
                                        <div class='col-sm-9'>
                                            <select class='form-control' name='Gender'>
                                                <option value='Male'>Male</option>
                                                <option value='Female'>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class='form-group row'>
                                        <label for='Address' class='col-sm-3 text-right control-label col-form-label'>Address</label>
                                        <div class='col-sm-9'>
                                            <input type='text' class='form-control' name='Address' value='".$row['Address']."' required placeholder='Address Here'>
                                        </div>
                                    </div>
                                    <div class='form-group row'>
                                        <label for='Phone' class='col-sm-3 text-right control-label col-form-label'>Phone</label>
                                        <div class='col-sm-9'>
                                            <input type='text' class='form-control' name='Phone' value='".$row['Phone']."' required placeholder='Phone Here'>
                                        </div>
                                    </div>
                                    <div class='form-group row'>
                                        <label for='email' class='col-sm-3 text-right control-label col-form-label'>Email</label>
                                        <div class='col-sm-9'>
                                            <input type='email' class='form-control' name='Email' value='".$row['Email']."' required placeholder='Email Here'>
                                        </div>
                                    </div>
                                    <div class='form-group row'>
                                        <label for='UserName' class='col-sm-3 text-right control-label col-form-label'>User Name</label>
                                        <div class='col-sm-9'>
                                            <input type='text' class='form-control' name='UserName' value='".$row['UserName']."' required placeholder='User Name Here'>
                                        </div>
                                    </div>
                                    <div class='form-group row'>
                                        <label for='password' class='col-sm-3 text-right control-label col-form-label'>Password</label>
                                        <div class='col-sm-9'>
                                            <input type='password' class='form-control' name='Password' required placeholder='Password Here'>
                                        </div>
                                    </div>
                                    <div class='form-group row'>
                                        <label for='Privilage' class='col-sm-3 text-right control-label col-form-label'>Privilage</label>
                                        <div class='col-sm-9'>
                                            <select class='form-control' name='Privilage'>
                                                <option value='".$row['Privilage']."'>".$row['Privilage']."</option>
                                                <option value='Administrator'>Administrator</option>
                                                <option value='Director'>Director</option>
                                                <option value='School'>School</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class='form-group row'>
                                        <label for='Status' class='col-sm-3 text-right control-label col-form-label'>Status</label>
                                        <div class='col-sm-9'>
                                            <select class='form-control' name='Status'>
                                                <option value='".$row['Status']."'>".$row['Status']."</option>
                                                <option value='Active'>Active</option>
                                                <option value='Deactive'>Deactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class='border-top'>
                                    <div class='card-body'>
                                        <button type='submit' name='updateuser' class='btn btn-success'><i class='ti-pencil'></i> Update</button>
                                        <button type='reset' data-dismiss='modal' class='btn btn-primary'>Cancel</button>
                                    </div>
                                </div>
                                </div>
	                            </form>
	                        	</div>
				                </div>
				                </div>
			                </div>

			                <!-- Modal Access To User-->

			                <div class='modal fade' id='ModalAccessDeactive".$row['UserID']."' tabindex='-1'>
		                        <div class='modal-dialog'>
		                        	<div class='card'>
		                            <div class='modal-content'>
		                                <form action='ViewUser.php' method='post'><div class='modal-body' <div class='card-body'>
		                                	<h4 class='card-title'>User Access</h4>
		                                    <div class='form-group'>
		                                        <div class='form-line'>
		                                            <h4 class='center'>Are you sure want to Deactive this user ?
		                                            <input type='hidden' name='UserID' class='form-control' value='".$row['UserID']."'>
		                                        </div>
		                                    </div>
		                                    </div>
		                                    <div class='border-top'>
			                                    <div class='card-body'>
			                                        <button type='submit' name='Deactive' class='btn btn-success'>Yes</button>
			                                        <button type='reset' data-dismiss='modal' class='btn btn-primary'>No</button>
			                                    </div>
                               				</div>
		                                </form>
		                            </div>
		                            </div>
		                        </div>
		                    </div>
		                    <div class='modal fade' id='ModalAccessActive".$row['UserID']."' tabindex='-1'>
		                        <div class='modal-dialog'>
		                        	<div class='card'>
		                            <div class='modal-content'>
		                                <form action='ViewUser.php' method='post'><div class='modal-body' <div class='card-body'>
		                                	<h4 class='card-title'>User Access</h4>
		                                    <div class='form-group'>
		                                        <div class='form-line'>
		                                            <h4 class='center'>Are you sure want to Active this user ?
		                                            <input type='hidden' name='UserID' class='form-control' value='".$row['UserID']."'>
		                                        </div>
		                                    </div>
		                                    </div>
		                                    <div class='border-top'>
			                                    <div class='card-body'>
			                                        <button type='submit' name='Active' class='btn btn-success'>Yes</button>
			                                        <button type='reset' data-dismiss='modal' class='btn btn-primary'>No</button>
			                                    </div>
                               				</div>
		                                </form>
		                            </div>
		                            </div>
		                        </div>
		                    </div>

			                <!-- Modal Assing To School-->

			                <div class='modal fade in' id='ModalAssignToSchool".$row['UserID']."'>
				                <div class='modal-dialog'>
				                <div class='card'>
			                      <div class='modal-content'>
			                      <form class='form-horizontal' action='ViewUser.php' method='post'>
			                        <div class='card-body'>
	                                <h4 class='card-title'>Assign <i style='color:#499dff'>{$row['FName']} {$row['LName']}</i> To School</h4> 
			                           <div class='form-group'>
		                                        <div class='form-line'>
		                                            <input class='form-control' name='UserID' value='".$row['UserID']."' type='hidden' required=''>
		                                            <label for='School' text-right control-label col-form-label'>Choose School :</label>
		                                            <select class='select2 form-control custom-select' name='SchlID' style='width: 100%; height:36px;'>";
													$call = new STMS();
			                                    	$call->SchoolSeclection();
				                           echo" </select></div>
		                                    </div>
			                          </div>
			                        	<div class='border-top'>
		                                    <div class='card-body'>
		                                        <button type='submit' name='Assign' class='btn btn-success'>Assign</button>
		                                        <button type='reset' class='btn btn-primary' data-dismiss='modal'>Cancel</button>
		                                    </div>
                           				</div>
			                      </form>
			                      </div>
				                </div>
				                </div>
				            </div>";

			}
		}
	}

	function SchoolSeclection(){
		global $conn;
		$sql = "SELECT * FROM tbl_School";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo"<option value='".$row['SchlID']."'>{$row['SchlName']}</option>";
			}
		}
	}
	function ModifyUserAccess(){
		global $conn;
		if(isset($_POST['Deactive'])){
	        $UserID = $_POST['UserID'];
	        if($UserID != $_SESSION['UID']){
	        $sql = "UPDATE tbl_User SET Status='Deactive' WHERE UserID = '$UserID'";
	        $result = $conn->query($sql);
	        }
	        else{
	            $_SESSION['Disable'] = "done";
	        }
    	}
	    if(isset($_POST['Active'])){
	        $UserID = $_POST['UserID'];
	        $sql = "UPDATE tbl_User SET Status='Active' WHERE UserID = '$UserID'";
	        $result = $conn->query($sql);
	    }
	}
	function UpdateUser(){
		global $conn;
		$userID = $_POST['UserID'];
		$FName = $_POST['FName'];
		$LName = $_POST['LName'];
		$Gender = $_POST['Gender'];
		$Address = $_POST['Address'];
		$Email = $_POST['Email'];
		$Phone = $_POST['Phone'];
		$UserName = $_POST['UserName'];
		$Password = MD5($_POST['Password']);
		$Privl = $_POST['Privilage'];
		$Status = $_POST['Status'];

		$sql = "UPDATE tbl_user SET FName='$FName',LName='$LName',Gender='$Gender',Address='$Address',Email='$Email',Phone='$Phone',UserName='$UserName',Password='$Password',Privilage='$Privl',Status='$Status' WHERE UserID = '$userID'";
		$result = $conn->query($sql);
		if ($result == true) {
			//echo "<script>alert('User Updated Successfull')</script>";
			$_SESSION['Updated'] = "done";
			header("location:ViewUser.php");
		}else{
			echo "<script>alert('User NOT Updated')</script>";
		}
	}

	function AddSchool(){
		global $conn;
		$SchoolCode = $_POST['SchoolCode'];
		$SchoolName = $_POST['SchoolName'];
		$Region = $_POST['Region'];
		$District = $_POST['District'];
		$Category = $_POST['Category'];
		$State = $_POST['State'];
		$UserID = $_SESSION['UID'];
		
		$sql = "SELECT * FROM tbl_School WHERE SchlCode = '$SchoolCode'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$_SESSION['Exist'] = "done";
			
		}else{
			$sql = "INSERT INTO tbl_School VALUES('','$SchoolCode','$SchoolName','$Region','$District','$Category','$State','0','$UserID')";
			$result = $conn->query($sql) or die(mysqli_error($conn));
			if ($result == true) {
				$_SESSION['Success'] = "done";
			}else{
				echo "<script>alert('Data NOT Saved')</script>";
			}
		}
	}

	function ViewSchool(){
		global $conn;
		$sql = "SELECT * FROM tbl_School";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$count = 0;
			while($row = $result->fetch_assoc()){
				$count++;
				echo"
					<tr>
						<td>{$row['SchlCode']}</td>
						<td>{$row['SchlName']}</td>
						<td>{$row['Region']}</td>
						<td>{$row['District']}</td>
						<td>{$row['CtgName']}</td>
						<td>{$row['CtgState']}</td>
						<td>";if($_SESSION['Privl'] != "Director"){
						echo "<a data-toggle='modal' data-target='#ModalEditSchool".$row['SchlID']."' data-toggle='tooltip' data-placement='top' title='Edit'>
                                         <i class='far fa-edit'></i></a>
                            <a href='SchoolReport.php?SchlID=".$row['SchlID']."' data-toggle='tooltip' data-placement='top' title='View More'>
                                         <i class='fas fa-eye'></i></a>"; 
                                }else{
                                	echo "<a href='SchoolReport.php?SchlID=".$row['SchlID']."' data-toggle='tooltip' data-placement='top' title='View More'>
                                         <i class='fas fa-eye'></i></a>";
                                } 
						echo "</td>";
					echo "</tr>";
					echo "
						<div class='modal fade in' id='ModalEditSchool".$row['SchlID']."' tabindex='-1' role='dialog'>
			                <div class='modal-dialog'>
			                <div class='card'>
			                <div class='modal-content'>
                            <form class='form-horizontal' method='post' action='ViewSchool.php'>
							    <input  type='hidden' name='SchlID' value='".$row['SchlID']."'>
							    <div class='card-body'>
							        <h4 class='card-title'>Register School</h4>
							        <div class='form-group row'>
							            <label for='SchCode' class='col-sm-3 text-right control-label col-form-label'>School Reg No.</label>
							            <div class='col-sm-9'>
							                <input type='text' class='form-control' name='SchoolCode' value='".$row['SchlCode']."' required placeholder='School Code Here'>
							            </div>
							        </div>
							        <div class='form-group row'>
							            <label for='SchName' class='col-sm-3 text-right control-label col-form-label'>School Name</label>
							            <div class='col-sm-9'>
							                <input type='text' class='form-control' name='SchoolName' value='".$row['SchlName']."' required placeholder='School Name Here'>
							            </div>
							        </div>
							        <div class='form-group row'>
							            <label for='Region' class='col-sm-3 text-right control-label col-form-label'>Region</label>
							            <div class='col-sm-9'>
							                <select class='form-control' name='Region'>
							                    <option value='".$row['Region']."'>".$row['Region']."</option>
							                    <option value='North Unguja'>North Unguja</option>
							                    <option value='South Unguja'>South Unguja</option>
							                    <option value='Urbun-West Unguja'>Urbun-West Unguja</option>
							                    <option value='North Pemba'>North Pemba</option>
							                    <option value='South Pemba'>South Pemba</option>
							                </select>
							            </div>
							        </div>
							        <div class='form-group row'>
							            <label for='District' class='col-sm-3 text-right control-label col-form-label'>District</label>
							            <div class='col-sm-9'>
							                <select class='form-control' name='District'>
							                    <option value='".$row['District']."'>".$row['District']."</option>
							                    <option value='Jangombe'>Jangombe</option>
							                    <option value='Amani'>Amani</option>
							                    <option value='Mwera'>Mwera</option>
							                    <option value='Magomeni'>Magomeni</option>
							                    <option value='Wete'>Wete</option>
							                    <option value='Chake'>Chake</option>
							                </select>
							            </div>
							        </div>
							        <div class='form-group row'>
							            <label for='Category' class='col-sm-3 text-right control-label col-form-label'>Category</label>
							            <div class='col-sm-9'>
							                <select class='form-control' name='Category'>
							                    <option value='".$row['CtgName']."'>".$row['CtgName']."</option>
							                    <option value='Government'>Government</option>
							                    <option value='Private'>Private</option>
							                </select>
							            </div>
							        </div>
							        <div class='form-group row'>
							            <label for='State' class='col-sm-3 text-right control-label col-form-label'>State</label>
							            <div class='col-sm-9'>
							                <select class='form-control' name='State'>
							                    <option value='".$row['CtgState']."'>".$row['CtgState']."</option>
							                    <option value='Secondary'>Secondary</option>
							                    <option value='Primary'>Primary</option>
							                    <option value='Both'>Both</option>
							                </select>
							            </div>
							        </div>
                                <div class='border-top'>
                                    <div class='card-body'>
                                        <button type='submit' name='updateschool' class='btn btn-success'><i class='ti-pencil'></i> Update</button>
                                        <button type='reset' data-dismiss='modal' class='btn btn-primary'>Cancel</button>
                                    </div>
                                </div>
                                </div>
	                            </form>
	                        	</div>
				                </div>
				                </div>
			                </div>

			                <!-- Modal ViewMore-->

			                <div class='modal fade' id='ModalViewMore".$row['SchlID']."' tabindex='-1'>
		                        <div class='modal-dialog'>
		                        	<div class='card'>
		                            <div class='modal-content'>
		                            <div class='modal-body' 
		                            <div class='card-body row'>
		                                	<h3 class='card-title'>Information of School  <i style='color:#499dff'>{$row['SchlName']}</i></h3>
										<div class='row'>
			                                <div class='col-md-6'>
			                                    <div class='row'>
												<label>School Code :</label>
												<p> {$row['SchlCode']}</p>
												</div>
			                                    <div class='row'>
												<label>School Name :</label>
												<p> {$row['SchlName']}</p>
												</div>
												<div class='row'>
												<label>Region :</label>
												<p> {$row['Region']}</p>
												</div>
												<div class='row'>
												<label>District :</label>
												<p> {$row['District']}</p>
												</div>
												<div class='row'>
												<label>Category :</label>
												<p> {$row['CtgName']}</p>
												</div>
												<div class='row'>
												<label>State :</label>
												<p> {$row['CtgState']}</p>
												</div>
											</div>
											<div class='col-md-6'>
			                                    <div class='row'>
												<label>Total Student :</label>
												<p> {Comming soon}</p>
												</div>
												<div class='row'>
												<label>TotalTeacher :</label>
												<p> {Comming soon}</p>
												</div>
											</div>
											</div>
										</div>

									
		                            </div>
		                                    <div class='border-top'>
			                                    <div class='card-body'>
			                                        <button type='reset' data-dismiss='modal' class='btn btn-primary'>Cancel</button>
			                                    </div>
                               				</div>
		                            </div>
		                            </div>
		                        </div>
		                    </div>";

			                
			}

		}
	}

	function UpdateSchool(){
		global $conn;
		$SchoolCode = $_POST['SchoolCode'];
		$SchoolName = $_POST['SchoolName'];
		$Region = $_POST['Region'];
		$District = $_POST['District'];
		$Category = $_POST['Category'];
		$State = $_POST['State'];
		$SchlID = $_POST['SchlID'];
		$UserID = $_SESSION['UID'];

		$sql = "UPDATE tbl_School SET SchlCode='$SchoolCode',SchlName='$SchoolName',Region='$Region',District='$District',CtgName='$Category',CtgState='$State' WHERE SchlID = '$SchlID'";
		$result = $conn->query($sql);
		if ($result == true) {
			//echo "<script>alert('School Updated Successfull')</script>";
			$_SESSION['Updated'] = "done";
		}else{
			echo "<script>alert('School NOT Updated')</script>";
		}
	}

	function AddSubject(){
		global $conn;
		$SubjectCode = $_POST['SubjectCode'];
		$SubjectName = $_POST['SubjectName'];
		
		$sql = "SELECT * FROM tbl_Subject WHERE SubjectCode = '$SubjectCode'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$_SESSION['Exist'] = "done";
			
		}else{
			$sql = "INSERT INTO tbl_Subject VALUES('','$SubjectCode','$SubjectName')";
			$result = $conn->query($sql) or die(mysqli_error($sql));
			if ($result == true) {
				$_SESSION['Success'] = "done";
			}else{
				echo "<script>alert('Data NOT Saved')</script>";
			}
		}
	}

	function ViewSubject(){
		global $conn;
		$sql = "SELECT * FROM tbl_Subject WHERE SubjectCode != 'None'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				echo"
					<tr>
						<td>{$row['SubjectCode']}</td>
						<td>{$row['SubjectName']}</td>
						<td><a data-toggle='modal' data-target='#ModalEditSubject".$row['SubjectID']."' data-toggle='tooltip' data-placement='top' title='Edit'>
                                         <i class='far fa-edit'></i></a>
                        </td>
					</tr>";
					echo "<!-- Modal Edit Subject-->
		                <div class='modal fade in' id='ModalEditSubject".$row['SubjectID']."'>
			                <div class='modal-dialog'>
			                <div class='card'>
		                      <div class='modal-content'>
		                      <form class='form-horizontal' action='#' method='post'>
		                        <div class='card-body'>
                                <h4 class='card-title'>Update Subject</h4>
	                                <div class='form-group'>
                                        <div class='form-line'>
                                            <input class='form-control' name='SubjectID' value='".$row['SubjectID']."' type='hidden' required=''>
			                           </div>
	                                </div>
	                                <div class='form-group'>
                                        <div class='form-line'>
                                        <label for='TotalStu' text-right control-label col-form-label'>Subject Code :</label>
                                        	<input class='form-control' name='SubjectCode' value='".$row['SubjectCode']."' type='text' required=''>
			                           </div>
	                                </div>
	                                <div class='form-group'>
                                        <div class='form-line'>
                                        <label for='TotalStu' text-right control-label col-form-label'>Subject Name :</label>
                                        	<input class='form-control' name='SubjectName' value='".$row['SubjectName']."' type='text' required=''>
			                           </div>
	                                </div>

		                          </div>
		                        	<div class='border-top'>
	                                    <div class='card-body'>
	                                        <button type='submit' name='UpdateSubject' class='btn btn-success'>Update</button>
	                                        <button type='reset' class='btn btn-primary' data-dismiss='modal'>Cancel</button>
	                                    </div>
                       				</div>
		                      </form>
		                      </div>
			                </div>
			                </div>
			            </div>";

			}
		}
	}

	function UpdateSubject(){
		global $conn;
		$SubjectID = $_POST['SubjectID'];
		$SubjectCode = $_POST['SubjectCode'];
		$SubjectName = $_POST['SubjectName'];;

		$sql = "UPDATE tbl_Subject SET SubjectCode='$SubjectCode',SubjectName='$SubjectName' WHERE SubjectID = '$SubjectID'";
		$result = $conn->query($sql);
		if ($result == true) {
			$_SESSION['Updated'] = "done";
		}else{
			echo "<script>alert('Subject NOT Updated')</script>";
		}
	}

	function AddTeacher($Privilage = ""){
		global $conn;
		/*$ImageName = $_POST['img'];
		$TempName = $_FILES['img']['tmp_name'];
		$FolderName = "Images/".time()."_".$ImageName;
		$CertificateName = $_POST['CertImg'];
		$TempCertificateName = $_FILES['CertImg']['tmp_name'];
		$CertificateFolderName = "Images/".time()."_".$CertificateName;*/
		$EmpNo = $_POST['EmpNo'];
		$FName = $_POST['FName'];
		$LName = $_POST['LName'];
		$Gender = $_POST['Gender'];
		$Address = $_POST['Address'];
		$Email = $_POST['Email'];
		$Phone = $_POST['Phone'];
		$Dob = $_POST['Dob'];
		$Image = "ImageName";
		$Level = $_POST['Level'];
		$Title = $_POST['Title'];
		$Year = $_POST['Year'];
		$Certificate = "CertificateName";
		$Category = $_POST['Category'];
		$Date = date('Y-m-d');

		if($Privilage == "Admin"){
			$sql = "SELECT * FROM tbl_Teacher WHERE EmpNo = '$EmpNo'";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				$_SESSION['Exist'] = "done";
			}else{
					$sql = "INSERT INTO tbl_Teacher VALUES('','$EmpNo','$FName','$LName','$Gender','$Address','$Dob','$Image','$Phone','$Email')";
					$result = $conn->query($sql) or die(mysqli_error($conn));
					$TchID = $conn->insert_id;
					$sql1 = "INSERT INTO tbl_Tch_Education VALUES('','$Level','$Title','$Year','$Certificate','$Category','$TchID')";
					$result1 = $conn->query($sql1) or die(mysqli_error($conn));
					if ($result == true && $result1 == true) {
						$_SESSION['Success'] = "done";
				
					}else{
						echo "<script>alert('Data NOT Saved')</script>";
					}
			}
		}elseif ($Privilage == "School") {
			$SchlID =  $_SESSION['SchlID'];
			$sql = "SELECT * FROM tbl_Teacher WHERE EmpNo = '$EmpNo'";
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				$_SESSION['Exist'] = "done";
			}else{
					$sql = "INSERT INTO tbl_Teacher VALUES('','$EmpNo','$FName','$LName','$Gender','$Address','$Dob','$Image','$Phone','$Email')";
					$result = $conn->query($sql) or die(mysqli_error($conn));
					$TchID = $conn->insert_id;
					$sql1 = "INSERT INTO tbl_Tch_Education VALUES('','$Level','$Title','$Year','$Certificate','$Category','$TchID')";
					$result1 = $conn->query($sql1) or die(mysqli_error($conn));
					$sql2 = "INSERT INTO tbl_Sch_Tch VALUES('','$TchID','$SchlID','$Date','Approved','Null','1')";
					$result2 = $conn->query($sql2) or die(mysqli_error($conn));
					if ($result2 == true) {
						$_SESSION['Success'] = "done";
				
					}else{
						echo "<script>alert('Data NOT Saved')</script>";
					}
			}
		}
	}

	function ViewTeacher(){
		global $conn;
		$sql = "SELECT * FROM tbl_sch_tch RIGHT JOIN (tbl_Teacher INNER JOIN tbl_Tch_Education USING(TchID)) ON tbl_teacher.TchID = tbl_sch_tch.TchID";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$Age = date('Y') - date('Y', strtotime($row['Dob']));
				echo"
					<tr>
						<td>{$row['EmpNo']}</td>
						<td>{$row['FName']} {$row['LName']}</td>
						<td>{$row['Gender']}</td>
						<td>{$row['Address']}</td>
						<td>{$Age}</td>
						<td>{$row['Phone']}</td>
						<td>{$row['Email']}</td>
						<td><a data-toggle='modal' data-target='#ModalEditTeacher".$row['TchID']."' data-toggle='tooltip' data-placement='top' title='Edit'>
                                         <i class='far fa-edit'></i></a>";
                            if(empty($row['ReportDate'])){
	                    	echo "<a data-toggle='modal' data-target='#ModalViewMore".$row['TchID']."' data-toggle='tooltip' data-placement='top' title='View More'>
                                         <i class='fas fa-eye'></i></a>
	                    	<a data-toggle='modal' data-target='#ModalAssignTeacherToSchool".$row['TchID']."' data-toggle='tooltip' data-placement='top' title='Assign Teacher To School'>
                                     <i class='fas fa-sign-in-alt'></i></a>";
	                    	}
                                 
					echo"</td>
					</tr>";
					echo "
						<div class='modal fade in' id='ModalEditTeacher".$row['TchID']."' tabindex='-1' role='dialog'>
			                <div class='modal-dialog modal-lg'>
			                <div class='card'>
			                <div class='modal-content'>
                            <form class='form-horizontal row' method='post' action='ViewTeacher.php'>
                            	<div class='col-sm-6'>
                                <input  type='hidden' name='TchID' value='".$row['TchID']."'>
							        <div class='card-body'>
							            <h4 class='card-title'>Update Teacher</h4>
							            <div class='form-group row'>
                                            <label for='EmpNo' class='col-sm-3 text-right control-label col-form-label'>Employee No</label>
                                            <div class='col-sm-9'>
                                                <input type='text' class='form-control' name='EmpNo'value='".$row['EmpNo']."' required placeholder='Employee No Here'>
                                            </div>
                                        </div>
							            <div class='form-group row'>
							                <label for='fname' class='col-sm-3 text-right control-label col-form-label'>First Name</label>
							                <div class='col-sm-9'>
							                    <input type='text' class='form-control' name='FName' value='".$row['FName']."' required placeholder='First Name Here'>
							                </div>
							            </div>
							            <div class='form-group row'>
							                <label for='lname' class='col-sm-3 text-right control-label col-form-label'>Last Name</label>
							                <div class='col-sm-9'>
							                    <input type='text' class='form-control' name='LName' value='".$row['LName']."' required placeholder='Last Name Here'>
							                </div>
							            </div>
							            <div class='form-group row'>
							                <label for='Gender' class='col-sm-3 text-right control-label col-form-label'>Gender</label>
							                <div class='col-sm-9'>
							                    <select class='form-control' name='Gender'>
							                        <option value='Male'>Male</option>
							                        <option value='Female'>Female</option>
							                    </select>
							                </div>
							            </div>
							            <div class='form-group row'>
							                <label for='Address' class='col-sm-3 text-right control-label col-form-label'>Address</label>
							                <div class='col-sm-9'>
							                    <input type='text' class='form-control' name='Address' value='".$row['Address']."' required placeholder='Address Here'>
							                </div>
							            </div>
							            <div class='form-group row'>
							                <label for='Phone' class='col-sm-3 text-right control-label col-form-label'>Phone</label>
							                <div class='col-sm-9'>
							                    <input type='text' class='form-control' name='Phone' value='".$row['Phone']."' required placeholder='Phone Here'>
							                </div>
							            </div>
							            <div class='form-group row'>
							                <label for='email' class='col-sm-3 text-right control-label col-form-label'>Email</label>
							                <div class='col-sm-9'>
							                    <input type='email' class='form-control' name='Email' value='".$row['Email']."' required placeholder='Email Here'>
							                </div>
							            </div>
							            <div class='form-group row'>
							                <label for='Dob' class='col-sm-3 text-right control-label col-form-label'>Dob</label>
							                <div class='col-sm-9'>
							                    <input type='date' class='form-control' name='Dob' value='".$row['Dob']."' required placeholder='Date Of Birth Here'>
							                </div>
							            </div>
							            <div class='form-group row'>
							                <label for='Image' class='col-sm-3 text-right control-label col-form-label'>Upload Image</label>
							                <div class='col-sm-9'>
							                    <input type='file' class='form-control' name='Image' required>
							                </div>
							            </div>
							        </div>
							    </div>
							    <div class='col-sm-6'>
							        <div class='card-body'>
							            <h5 class='card-title'><i>Education Background</i></h5>
							             <div class='form-group row'>
							                <label for='Level' class='col-sm-3 text-right control-label col-form-label'>Edu_Level</label>
							                <div class='col-sm-9'>
							                    <select class='form-control' name='Level'>
							                        <option value='".$row['EduLevel']."'>".$row['EduLevel']."</option>
							                        <option value='PHD'>PHD</option>
							                        <option value='Master'>Master</option>
							                        <option value='Degree'>Degree</option>
							                        <option value='Diploma'>Diploma</option>
							                    </select>
							                </div>
							            </div>
							            <div class='form-group row'>
							                <label for='Title' class='col-sm-3 text-right control-label col-form-label'>Edu_Title</label>
							                <div class='col-sm-9'>
							                    <input type='text' class='form-control'  name='Title' value='".$row['EduTitle']."' required placeholder='Education Title Here'>
							                </div>
							            </div>
							            <div class='form-group row'>
							                <label for='Year' class='col-sm-3 text-right control-label col-form-label'>Edu_Year</label>
							                <div class='col-sm-9'>
							                    <input type='number' min='1980' class='form-control' name='Year' value='".$row['EduYear']."' required>
							                </div>
							            </div>
							            <div class='form-group row'>
							                <label for='Category' class='col-sm-3 text-right control-label col-form-label'>Edu_Category</label>
							                <div class='col-sm-9'>
							                    <select class='form-control' name='Category'>
							                        <option value='".$row['EduCategory']."'>".$row['EduCategory']."</option>
							                        <option value='SCIENCE'>SCIENCE</option>
							                        <option value='ART'>ART</option>
							                    </select>
							                </div>
							            </div>
							            <div class='form-group row'>
							                <label for='Image' class='col-sm-3 text-right control-label col-form-label'>Upload_Cert.</label>
							                <div class='col-sm-9'>
							                    <input type='file' class='form-control' name='Image' required>
							                </div>
							            </div>
							        </div>
							    </div>
                                <div class='border-top'>
                                    <div class='card-body'>
                                        <button type='submit' name='updateTeacher' class='btn btn-success'><i class='ti-pencil'></i> Update</button>
                                        <button type='reset' data-dismiss='modal' class='btn btn-primary'>Cancel</button>
                                    </div>
                                </div>
                                </div>
	                            </form>
	                        	</div>
				                </div>
				                </div>
			                </div>

			                <!-- Modal ViewMore-->

			                <div class='modal fade' id='ModalViewMore".$row['TchID']."' tabindex='-1'>
		                        <div class='modal-dialog'>
		                        	<div class='card'>
		                            <div class='modal-content'>
		                            <div class='modal-body' 
		                            <div class='card-body row'>
		                                	<h3 class='card-title'>Information of Teacher <i style='color:#499dff'>{$row['FName']} {$row['LName']}</i></h3>
										<div class='row'>
			                                <div class='col-md-6'>
			                                    <div class='row'>
												<label>RegNo :</label>
												<p> {$row['EmpNo']}</p>
												</div>
			                                    <div class='row'>
												<label>Full Name :</label>
												<p> {$row['FName']} {$row['LName']}</p>
												</div>
												<div class='row'>
												<label>Gender :</label>
												<p> {$row['Gender']}</p>
												</div>
												<div class='row'>
												<label>Address :</label>
												<p> {$row['Address']}</p>
												</div>
												<div class='row'>
												<label>Age :</label>
												<p> {$Age}</p>
												</div>
												<div class='row'>
												<label>Phone :</label>
												<p> {$row['Phone']}</p>
												</div>
												<div class='row'>
												<label>Email :</label>
												<p> {$row['Email']}</p>
												</div>

											</div>
											<div class='col-md-6'>
			                                    <div class='row'>
												<label>EducationLevel :</label>
												<p> {$row['EduLevel']}</p>
												</div>
												<div class='row'>
												<label>EducationTitle :</label>
												<p> {$row['EduTitle']}</p>
												</div>
												<div class='row'>
												<label>Year :</label>
												<p> {$row['EduYear']}</p>
												</div>
												<div class='row'>
												<label>Category :</label>
												<p> {$row['EduCategory']}</p>
												</div>
												<div class='row'>
												<label>Assigned School :</label>";
												if($row['Status'] == 'Approved'){
													echo "<p> {$row['SchlName']}</p>";
												}else{echo "<p>None</p>";}
											echo "</div>
											</div>
										</div>

									</div>
		                            </div>
		                                    <div class='border-top'>
			                                    <div class='card-body'>
			                                        <button type='reset' data-dismiss='modal' class='btn btn-primary'>Cancel</button>
			                                    </div>
                               				</div>
		                            </div>
		                            </div>
		                        </div>
		                    </div>

		                    <!-- Modal Assing To School-->

			                <div class='modal fade in' id='ModalAssignTeacherToSchool".$row['TchID']."'>
				                <div class='modal-dialog'>
				                <div class='card'>
			                      <div class='modal-content'>
			                      <form class='form-horizontal' action='ViewTeacher.php' method='post'>
			                        <div class='card-body'>
	                                <h4 class='card-title'>Assign <i style='color:#499dff'>{$row['FName']} {$row['LName']}</i> To School</h4> 
			                           <div class='form-group'>
	                                        <div class='form-line'>
	                                            <input class='form-control' name='TchID' value='".$row['TchID']."' type='hidden' required=''>
	                                            <label for='School' text-right control-label col-form-label'>Choose School :</label>
	                                            <select class='select2 form-control custom-select' name='SchlID' style='width: 100%; height:36px;'>";
												$call = new STMS();
		                                    	$call->SchoolSeclection();
			                           		echo" </select>
				                           </div>
		                                </div>
		                                <div class='form-group'>
	                                        <div class='form-line'>
	                                            <input class='form-control' name='UserID' value='".$row['TchID']."' type='hidden' required=''>
	                                            <label for='ReportDate' text-right control-label col-form-label'>Report Date :</label>
	                                            <input type='date' class='form-control' name='ReportDate' required placeholder='Report Date Here'>
				                           </div>
		                                </div>
			                          </div>
			                        	<div class='border-top'>
		                                    <div class='card-body'>
		                                        <button type='submit' name='AssignTeacher' class='btn btn-success'>Assign</button>
		                                        <button type='reset' class='btn btn-primary' data-dismiss='modal'>Cancel</button>
		                                    </div>
                           				</div>
			                      </form>
			                      </div>
				                </div>
				                </div>
				            </div>";

			}
		}
	}

	function UpdateTeacher(){
		global $conn;
		$TchID = $_POST['TchID'];
		$FName = $_POST['FName'];
		$LName = $_POST['LName'];
		$Gender = $_POST['Gender'];
		$Address = $_POST['Address'];
		$Email = $_POST['Email'];
		$Phone = $_POST['Phone'];
		$Level = $_POST['Level'];
		$Title = $_POST['Title'];
		$Year = $_POST['Year'];
		$Category = $_POST['Category'];
		$Dob = $_POST['Dob'];

		$sql = "UPDATE tbl_Teacher SET FName='$FName',LName='$LName',Gender='$Gender',Address='$Address',Email='$Email',Phone='$Phone',Dob='$Dob' WHERE TchID = '$TchID'";
		$sql2 = "UPDATE tbl_Tch_Education SET EduLevel='$Level',EduTitle='$Title',EduYear='$Year',EduCategory='$Category' WHERE TchID = '$TchID'";
		$result = $conn->query($sql);
		$result2 = $conn->query($sql2);
		if ($result == true && $result2 == true) {
			$_SESSION['Updated'] = "done";
		}else{
			echo "<script>alert('User NOT Updated')</script>";
		}
	}

	function AssignUserToSchool(){
		global $conn;
		$userID = $_POST['UserID'];
		$SchoolId = $_POST['SchlID'];

		$sql = "UPDATE tbl_School SET SchlUserID='$userID' WHERE SchlID = '$SchoolId' AND SchlUserID = '0'";
		$result = $conn->query($sql);
		if ($result == true) {
			$_SESSION['Assigned'] = "done";
		}else{
			echo "<script>alert('User NOT Assigned(Exist)')</script>";
		}
	}

	function AssignTeacherToSchool(){
		global $conn;
		$TchID = $_POST['TchID'];
		$SchlID = $_POST['SchlID'];
		$ReportDate = $_POST['ReportDate'];

		$sql = "INSERT INTO tbl_Sch_Tch VALUES('','$TchID','$SchlID','$ReportDate','Null','Null','1')";
		$result = $conn->query($sql);
		if ($result == true) {
			$_SESSION['Assigned'] = "done";
		}else{
			echo "<script>alert('Teacher NOT Assigned')</script>";
		}
	}

	function UnAssignTeacherToSchool(){
		global $conn;
		$TchID = $_POST['TchID'];
		
		$sql = "DELETE FROM tbl_Sch_Tch WHERE tbl_Sch_Tch.TchID = $TchID ";
		$result = $conn->query($sql);
		if ($result == true) {
			$_SESSION['Success'] = "done";
		}else{
			echo "<script>alert('Teacher NOT Assigned')</script>";
		}
	}

	function ViewTeacherAssignToSchool(){
		global $conn;
		$sql = "SELECT * FROM tbl_School INNER JOIN ((tbl_Sch_Tch inner join tbl_Teacher using(TchID)) inner join tbl_Tch_Education using(TchID))USING(SchlID)";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$Age = date('Y') - date('Y', strtotime($row['Dob']));
				echo"
					<tr>
						<td>{$row['EmpNo']}</td>
						<td>{$row['FName']} {$row['LName']}</td>
						<td>{$row['Gender']}</td>
						<td>{$row['Address']}</td>
						<td>{$Age}</td>
						<td>{$row['Phone']}</td>
						<td>{$row['Email']}</td>
						<td>
                            <a data-toggle='modal' data-target='#ModalViewMore".$row['TchID']."' data-toggle='tooltip' data-placement='top' title='View More'>
                                <i class='fas fa-eye'></i></a>
                                <a data-toggle='modal' data-target='#ModalUnAssignTeacherToSchool".$row['TchID']."' data-toggle='tooltip' data-placement='top' title='Remove Teacher to School'>
                                <i class='fas fa-times'></i></a>
						</td>
					</tr>";
					echo " <!-- Modal ViewMore-->
			                <div class='modal fade' id='ModalViewMore".$row['TchID']."' tabindex='-1'>
		                        <div class='modal-dialog'>
		                        	<div class='card'>
		                            <div class='modal-content'>
		                            <div class='modal-body' 
		                            <div class='card-body row'>
		                                	<h3 class='card-title'>Information of Teacher <i style='color:#499dff'>{$row['FName']} {$row['LName']}</i></h3>
										<div class='row'>
			                                <div class='col-md-6'>
			                                    <div class='row'>
												<label>RegNo :</label>
												<p> {$row['EmpNo']}</p>
												</div>
			                                    <div class='row'>
												<label>Full Name :</label>
												<p> {$row['FName']} {$row['LName']}</p>
												</div>
												<div class='row'>
												<label>Gender :</label>
												<p> {$row['Gender']}</p>
												</div>
												<div class='row'>
												<label>Address :</label>
												<p> {$row['Address']}</p>
												</div>
												<div class='row'>
												<label>Age :</label>
												<p> {$Age}</p>
												</div>
												<div class='row'>
												<label>Phone :</label>
												<p> {$row['Phone']}</p>
												</div>
												<div class='row'>
												<label>Email :</label>
												<p> {$row['Email']}</p>
												</div>

											</div>
											<div class='col-md-6'>
			                                    <div class='row'>
												<label>EducationLevel :</label>
												<p> {$row['EduLevel']}</p>
												</div>
												<div class='row'>
												<label>EducationTitle :</label>
												<p> {$row['EduTitle']}</p>
												</div>
												<div class='row'>
												<label>Year :</label>
												<p> {$row['EduYear']}</p>
												</div>
												<div class='row'>
												<label>Category :</label>
												<p> {$row['EduCategory']}</p>
												</div>
												<div class='row'>
												<label>Assigned School :</label>";
												if($row['Status'] == 'Approved'){
													echo "<p> {$row['SchlName']}</p>";
												}else{echo "<p>None</p>";}
											echo "</div>
											</div>
										</div>

									</div>
		                            </div>
		                                    <div class='border-top'>
			                                    <div class='card-body'>
			                                        <button type='reset' data-dismiss='modal' class='btn btn-primary'>Cancel</button>
			                                    </div>
                               				</div>
		                            </div>
		                            </div>
		                        </div>
		                    </div>

		                    <!-- Modal UnAssing Teacher To School-->

			                <div class='modal fade' id='ModalUnAssignTeacherToSchool".$row['TchID']."' tabindex='-1'>
		                        <div class='modal-dialog'>
		                        	<div class='card'>
		                            <div class='modal-content'>
		                                <form action='ViewTeacherAssinged.php' method='post'><div class='modal-body' <div class='card-body'>
		                                	<h4 class='card-title'>Comfirm !</h4>
		                                    <div class='form-group'>
		                                        <div class='form-line'>
		                                            <h4 class='center'>Are you sure want to UnAssign this Teacher to School ?
		                                            <input type='hidden' name='TchID' class='form-control' value='".$row['TchID']."'>
		                                        </div>
		                                    </div>
		                                    </div>
		                                    <div class='border-top'>
			                                    <div class='card-body'>
			                                        <button type='submit' name='UnAssign' class='btn btn-success'>Yes</button>
			                                        <button type='reset' data-dismiss='modal' class='btn btn-primary'>No</button>
			                                    </div>
                               				</div>
		                                </form>
		                            </div>
		                            </div>
		                        </div>
		                    </div>";

			}
		}
	}

		function ViewTeacherUnAssignToSchool(){
		global $conn;
		$sql = "SELECT * FROM tbl_Teacher inner join tbl_Tch_Education using(TchID) WHERE tbl_Teacher.TchID NOT IN(SELECT TchID FROM tbl_Teacher inner join tbl_Sch_Tch using(TchID))";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$Age = date('Y') - date('Y', strtotime($row['Dob']));
				echo"
					<tr>
						<td>{$row['EmpNo']}</td>
						<td>{$row['FName']} {$row['LName']}</td>
						<td>{$row['Gender']}</td>
						<td>{$row['Address']}</td>
						<td>{$Age}</td>
						<td>{$row['Phone']}</td>
						<td>{$row['Email']}</td>
						<td>
                            <a data-toggle='modal' data-target='#ModalViewMore".$row['TchID']."' data-toggle='tooltip' data-placement='top' title='View More'>
                                <i class='fas fa-eye'></i></a>
                            <a data-toggle='modal' data-target='#ModalAssignTeacherToSchool".$row['TchID']."' data-toggle='tooltip' data-placement='top' title='Assign Teacher To School'>
                                     <i class='fas fa-sign-in-alt'></i></a>    
						</td>
					</tr>";
					echo " <!-- Modal ViewMore-->
			                <div class='modal fade' id='ModalViewMore".$row['TchID']."' tabindex='-1'>
		                        <div class='modal-dialog'>
		                        	<div class='card'>
		                            <div class='modal-content'>
		                            <div class='modal-body' 
		                            <div class='card-body row'>
		                                	<h3 class='card-title'>Information of Teacher <i style='color:#499dff'>{$row['FName']} {$row['LName']}</i></h3>
										<div class='row'>
			                                <div class='col-md-6'>
			                                    <div class='row'>
												<label>RegNo :</label>
												<p> {$row['EmpNo']}</p>
												</div>
			                                    <div class='row'>
												<label>Full Name :</label>
												<p> {$row['FName']} {$row['LName']}</p>
												</div>
												<div class='row'>
												<label>Gender :</label>
												<p> {$row['Gender']}</p>
												</div>
												<div class='row'>
												<label>Address :</label>
												<p> {$row['Address']}</p>
												</div>
												<div class='row'>
												<label>Age :</label>
												<p> {$Age}</p>
												</div>
												<div class='row'>
												<label>Phone :</label>
												<p> {$row['Phone']}</p>
												</div>
												<div class='row'>
												<label>Email :</label>
												<p> {$row['Email']}</p>
												</div>

											</div>
											<div class='col-md-6'>
			                                    <div class='row'>
												<label>EducationLevel :</label>
												<p> {$row['EduLevel']}</p>
												</div>
												<div class='row'>
												<label>EducationTitle :</label>
												<p> {$row['EduTitle']}</p>
												</div>
												<div class='row'>
												<label>Year :</label>
												<p> {$row['EduYear']}</p>
												</div>
												<div class='row'>
												<label>Category :</label>
												<p> {$row['EduCategory']}</p>
												</div>
												<div class='row'>
												<label>Assigned School :</label>
												<p>None</p>
												</div>
											</div>
										</div>

									</div>
		                            </div>
		                                    <div class='border-top'>
			                                    <div class='card-body'>
			                                        <button type='reset' data-dismiss='modal' class='btn btn-primary'>Cancel</button>
			                                    </div>
                               				</div>
		                            </div>
		                            </div>
		                        </div>
		                    </div>

		                    <!-- Modal Assing To School-->

			                <div class='modal fade in' id='ModalAssignTeacherToSchool".$row['TchID']."'>
				                <div class='modal-dialog'>
				                <div class='card'>
			                      <div class='modal-content'>
			                      <form class='form-horizontal' action='ViewTeacherUnAssinged.php' method='post'>
			                        <div class='card-body'>
	                                <h4 class='card-title'>Assign <i style='color:#499dff'>{$row['FName']} {$row['LName']}</i> To School</h4> 
			                           <div class='form-group'>
	                                        <div class='form-line'>
	                                            <input class='form-control' name='TchID' value='".$row['TchID']."' type='hidden' required=''>
	                                            <label for='School' text-right control-label col-form-label'>Choose School :</label>
	                                            <select class='select2 form-control custom-select' name='SchlID' style='width: 100%; height:36px;'>";
												$call = new STMS();
		                                    	$call->SchoolSeclection();
			                           		echo" </select>
				                           </div>
		                                </div>
		                                <div class='form-group'>
	                                        <div class='form-line'>
	                                            <input class='form-control' name='TchID' value='".$row['TchID']."' type='hidden' required=''>
	                                            <label for='ReportDate' text-right control-label col-form-label'>Report Date :</label>
	                                            <input type='date' class='form-control' name='ReportDate' required placeholder='Report Date Here'>
				                           </div>
		                                </div>
			                          </div>
			                        	<div class='border-top'>
		                                    <div class='card-body'>
		                                        <button type='submit' name='AssignTeacher' class='btn btn-success'>Assign</button>
		                                        <button type='reset' class='btn btn-primary' data-dismiss='modal'>Cancel</button>
		                                    </div>
                           				</div>
			                      </form>
			                      </div>
				                </div>
				                </div>
				            </div>";

			}
		}
	}
//=================== Function For Count Everything in whole System ===============>

	function Count($what = ""){
		global $conn;
		$YearNow = date('Y');
		if($what == "ComingTech"){
			$SchlID =  $_SESSION['SchlID'];
			$sql = "SELECT * FROM tbl_School INNER JOIN ((tbl_Sch_Tch inner join tbl_Teacher using(TchID)) inner join tbl_Tch_Education using(TchID))USING(SchlID) WHERE tbl_School.SchlID = $SchlID AND tbl_Sch_Tch.Status = 'Null'";
			$result = $conn->query($sql);
			echo $result->num_rows;
		}elseif ($what == "SchlTech") {
			$SchlID =  $_SESSION['SchlID'];
			$sql = "SELECT * FROM tbl_School INNER JOIN (((tbl_Sch_Tch inner join tbl_Teacher using(TchID))inner join tbl_subject using(SubjectID))inner join tbl_Tch_Education using(TchID))USING(SchlID) WHERE tbl_School.SchlID = $SchlID AND tbl_Sch_Tch.Status = 'Approved'";
			$result = $conn->query($sql);
			echo $result->num_rows;
		}
		elseif ($what == "Science") {
			$SchlID =  $_SESSION['SchlID'];
			$sql = "SELECT * FROM tbl_School INNER JOIN (((tbl_Sch_Tch inner join tbl_Teacher using(TchID))inner join tbl_subject using(SubjectID))inner join tbl_Tch_Education using(TchID))USING(SchlID) WHERE tbl_School.SchlID = $SchlID AND tbl_Sch_Tch.Status = 'Approved' AND tbl_Tch_Education.EduCategory = 'SCIENCE'";
			$result = $conn->query($sql);
			echo $result->num_rows;
		}
		elseif ($what == "Art") {
			$SchlID =  $_SESSION['SchlID'];
			$sql = "SELECT * FROM tbl_School INNER JOIN (((tbl_Sch_Tch inner join tbl_Teacher using(TchID))inner join tbl_subject using(SubjectID))inner join tbl_Tch_Education using(TchID))USING(SchlID) WHERE tbl_School.SchlID = $SchlID AND tbl_Sch_Tch.Status = 'Approved' AND tbl_Tch_Education.EduCategory = 'ART'";
			$result = $conn->query($sql);
			echo $result->num_rows;
		}
		elseif ($what == "School") {
			$sql = "SELECT * FROM tbl_School";
			$result = $conn->query($sql);
			echo $result->num_rows;
		}
		elseif ($what == "Private") {
			$sql = "SELECT * FROM tbl_School  WHERE tbl_School.CtgName = 'Private'";
			$result = $conn->query($sql);
			echo $result->num_rows;
		}
		elseif ($what == "Government") {
			$sql = "SELECT * FROM tbl_School  WHERE tbl_School.CtgName = 'Government'";
			$result = $conn->query($sql);
			echo $result->num_rows;
		}
		elseif ($what == "Teacher") {
			$sql = "SELECT * FROM tbl_Teacher";
			$result = $conn->query($sql);
			echo $result->num_rows;
		}
		elseif ($what == "Assigned") {
			$sql = "SELECT TchID FROM tbl_Teacher inner join tbl_Sch_Tch using(TchID)";
			$result = $conn->query($sql);
			echo $result->num_rows;
		}
		elseif ($what == "UnAssigned") {
			$sql = "SELECT * FROM tbl_Teacher WHERE tbl_Teacher.TchID NOT IN(SELECT TchID FROM tbl_Teacher inner join tbl_Sch_Tch using(TchID))";
			$result = $conn->query($sql);
			echo $result->num_rows;
		}
		elseif ($what == "OverRoll") {
			$SchlID =  $_SESSION['SchlID'];
			$sql = "SELECT * FROM tbl_School INNER JOIN ((tbl_Sch_Year inner join tbl_YearClass using(SchYrID)) inner join tbl_Class using(ClassID))USING(SchlID) WHERE tbl_School.SchlID = $SchlID";
			$result = $conn->query($sql);
			$OverRoll = 0;
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$OverRoll += $row['TotalStudent'];
				}
				echo $OverRoll;
			}
		}
		
	}

}

?>