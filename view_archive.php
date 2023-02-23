<?php 
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT a.* FROM `archive_list` a where a.id = '{$_GET['id']}'");
    if($qry->num_rows){
        foreach($qry->fetch_array() as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
    
    $submitted = "N/A";
    if(isset($student_id)){
        $student = $conn->query("SELECT * FROM student_list where id = '{$student_id}'");
        if($student->num_rows > 0){
            $res = $student->fetch_array();
            $submitted = $res['email'];
        }
    }
}
?>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    #document_field{
        min-height:80vh
    }
    .card-line{
        border-top: 3px solid #a30909 !important;
    }
    .text-info{
    color: #a30909 !important;
}
.card-spann{
    color: darkgreen;
    font-weight: 800;
}
.italic{
    font-style: italic;
    color: #008080;
}
.box {
  width: 45%;
  background: rgba(255,255,255,0.2);
  padding: 35px;
  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
}

.button {
  font-size: 1em;
  padding: 10px;
  color: #ffffff;
  background: #a30909;
  border-radius: 20px/50px;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.3s ease-out;
}
.button:hover {
  background: #000000;
  color: #ffffff;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 99%;
  overflow-x: hidden;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #a30909;
}
.popup .content {
  max-height: 30%;
  width: 200%;
  overflow: hidden;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}
</style>
</head>
<div class="content py-4">
    <div class="col-12">
        <div class="card card-line card-outline card-primary shadow rounded-0">
        <div id="google_translate_element"></div>
            <div class="card-header">
                <h3 class="card-title">
                    <span class="card-spann">Archived Code</span> - <?= isset($archive_code) ? $archive_code : "" ?>
                </h3>
            </div>
            <div class="card-body rounded-0">
                <div class="container-fluid">
                    <h2><b><?= isset($title) ? $title : "" ?></b></h2>
                    <small class="text-muted"></i> Uploaded by <b class="text-info"><?= $submitted ?></b> on  <?= date("F d, Y h:i A",strtotime($date_created)) ?></small>
                    <?php if(isset($student_id) && $_settings->userdata('login_type') == "2" && $student_id == $_settings->userdata('id')): ?>
                        <div class="form-group">
                            <a href="./?page=submit-archive&id=<?= isset($id) ? $id : "" ?>" class="btn btn-flat btn-default bg-navy btn-sm"><i class="fa fa-edit"></i> Edit</a>
                            <button type="button" data-id = "<?= isset($id) ? $id : "" ?>" class="btn btn-flat btn-danger btn-sm delete-data"><i class="fa fa-trash"></i> Delete</button>
                        </div>
                    <?php endif; ?>
                    <hr>
                    <center>
                        <img src="<?= validate_image(isset($banner_path) ? $banner_path : "") ?>" alt="Banner Image" id="banner-img" class="img-fluid border bg-gradient-dark">
                    </center>
                    <fieldset>
                        <legend class="text-navy"><i class="fa fa-calendar" aria-hidden="true"></i> Publish Year:</legend>
                        <div class="pl-4"><large><?= isset($year) ? $year : "----" ?></large></div>
                    </fieldset>
                    <fieldset>
                        <legend class="text-navy"><i class="fa fa-newspaper-o"></i> Abstract:</legend>
                        <div class="pl-4"><large><?= isset($abstract) ? html_entity_decode($abstract) : "" ?></large></div>
                    </fieldset>
                    <fieldset>
                        <legend class="text-navy"><i class="fa fa-group"></i> Authors:</legend>
                        <div class="pl-4"><large><?= isset($members) ? html_entity_decode($members) : "" ?></large></div>
                    </fieldset>
                    <fieldset>
                    <div class="box">
	<a class="button" href="#popup1">View Citation</a>
</div>
<div id="popup1" class="overlay">
	<div class="popup">
		<h2>Format</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
        <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                            <legend class="text-navy">APA 6:</legend>
                        <div class="pl-4"><large class="italic"><?= isset($citation) ? html_entity_decode($citation) : "" ?></large></div>
                        <legend class="text-navy">MLA:</legend>
                        <div class="pl-4"><large class="italic"><?= isset($mla) ? html_entity_decode($mla) : "" ?></large></div>
                        <legend class="text-navy">HARVARD:</legend>
                        <div class="pl-4"><large class="italic"><?= isset($hardvard) ? html_entity_decode($harvard) : "" ?></large></div>
                            </div>
                            <legend class="text-navy">Chicago:</legend>
                        <div class="pl-4"><large class="italic"><?= isset($chicago) ? html_entity_decode($chicago) : "" ?></large></div>
                        </div>
                    </div>
		</div>
	</div>
</div>
                    </fieldset>
                    <fieldset>
                        <legend class="text-navy"><i class="fa fa-file-pdf-o"></i> Document:</legend>
                        <div class="pl-4">
                            <iframe src="<?= isset($document_path) ? base_url.$document_path : "" ?>" frameborder="0" id="document_field" class="text-center w-100">Loading Document ...</iframe>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
    $(function(){
        $('.delete-data').click(function(){
            _conf("Are you sure to delete <b>Archive-<?= isset($archive_code) ? $archive_code : "" ?></b>","delete_archive")
        })
    })
    function delete_archive(){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_archive",
			method:"POST",
			data:{id: "<?= isset($id) ? $id : "" ?>"},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.replace("./");
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}

</script>