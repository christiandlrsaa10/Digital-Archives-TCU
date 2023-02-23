<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .user-img{
        position: absolute;
        height: 27px;
        width: 27px;
        object-fit: cover;
        left: -7%;
        top: -12%;
  }
  .btn-rounded{
        border-radius: 50px;
  }
</style>
<!-- Navbar -->
      <style>
        #login-nav{
          position:fixed !important;
          top: 0 !important;
          z-index: 1037;
          padding: 1em 1.5em !important;
        }
        #top-Nav{
          top: 4em;
          height: 8.5vh;
        }
        .text-sm .layout-navbar-fixed .wrapper .main-header ~ .content-wrapper, .layout-navbar-fixed .wrapper .main-header.text-sm ~ .content-wrapper {
          margin-top: calc(3.6) !important;
          padding-top: calc(5em) !important;
      }
      .bg-red{
        background: #a30909 !important;
      }
      .fa-sign-out-alt{
        color: #ffffff;
      }
      .form-controled:focus{
        border: 1px solid #a30909 !important;
      }
      .official{
        color:#ffffff;
      }
      .official:hover{
        color:lightgray;
      }
      .nav-link{
        font-family: helvetica !important;
        font-weight: 455 !important;
      }
      .nav-link:hover{
        background: #555555 !important;
        color: #ffffff !important;
        border-radius: 10px !important;
        box-shadow: 0 0 8px 0 rgba(0,0,0.80);
      }
      .dropdown-item{
        font-family: helvetica !important;
      }

      .logo-head{
	display: flex;
	justify-content: space-between;
	align-items: center;
}

.logo-head > h2 {
	margin: -5px 25px 15px 0;
	color: #ffffff;
	letter-spacing: 2px;
  font-size: 15px;
}

.logo-head > h2 > span{
	display: block;
	font-size: 12px;
	color: #ffffff;
  font-weight: 488 !important;
}

.logo-head > h2 > img{
  width:2%;
}

div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span:nth-of-type(1), div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span:nth-of-type(2), div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span:nth-of-type(3){display:none;}
div#google_translate_element div.goog-te-gadget-simple {margin:0px; padding:5px; display:inline-block; background-color:#a30909;}
div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value {color:white;}
div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value::after{content:"Translate Content"; font-size: 12px; padding-right:5px;}
div#google_translate_element div.goog-te-gadget-simple img:nth-of-type(1) {display:none;}


      </style>
      <nav class="bg-red w-100 px-2 py-1 position-fixed top-0" id="login-nav">
        <div class="d-flex justify-content-between w-100">
          <div>
          <header class="logo-head">
<h2><img src="./uploads/logo-archive.png">Digital Thesis Archives<span>Taguig City University</span></h2>
</header>
          </div>
          <div>
            <?php if($_settings->userdata('id') > 0): ?>
              <span class="mx-2"><img src="<?= validate_image($_settings->userdata('avatar')) ?>" alt="User Avatar" id="student-img-avatar"></span>
              <span class="mx-2">Kamusta, <?= !empty($_settings->userdata('firstname')) ? $_settings->userdata('firstname') : $_settings->userdata('username') ?></span>
              <span class="mx-1"><a href="<?= base_url.'classes/Login.php?f=student_logout' ?>"><i class="fas fa-sign-out-alt"></i></a></span>
            <?php else: ?>
              <a href="./register.php" class="mx-2 text-light me-2">Register</a>
              <a href="./login.php" class="mx-2 text-light me-2"><i class='fas fa-user-alt'></i> Student Login</a>
            <?php endif; ?>
          </div>
        </div>
      </nav>
      <nav class="main-header navbar navbar-expand navbar-light border-0 navbar-light text-sm" id='top-Nav'>
        
        <div class="container">

          <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="./" class="nav-link <?= isset($page) && $page =='home' ? "active" : "" ?>">Home</a>
              </li>
              <li class="nav-item">
                <a href="./?page=projects" class="nav-link <?= isset($page) && $page =='projects' ? "active" : "" ?>">Thesis & Research</a>
              </li>
              <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle  <?= isset($page) && $page =='projects_per_department' ? "active" : "" ?>">Department</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="left: 0px; right: inherit;">
                  <?php 
                    $departments = $conn->query("SELECT * FROM department_list where status = 1 order by `name` asc");
                    $dI =  $departments->num_rows;
                    while($row = $departments->fetch_assoc()):
                      $dI--;
                  ?>
                  <li>
                    <a href="./?page=projects_per_department&id=<?= $row['id'] ?>" class="dropdown-item"><?= ucwords($row['name']) ?></a>
                    <?php if($dI != 0): ?>
                    <li class="dropdown-divider"></li>
                    <?php endif; ?>
                  </li>
                  <?php endwhile; ?>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle  <?= isset($page) && $page =='projects_per_curriculum' ? "active" : "" ?>">Courses</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" style="left: 0px; right: inherit;">
                  <?php 
                    $curriculums = $conn->query("SELECT * FROM curriculum_list where status = 1 order by `name` asc");
                    $cI =  $curriculums->num_rows;
                    while($row = $curriculums->fetch_assoc()):
                      $cI--;
                  ?>
                  <li>
                    <a href="./?page=projects_per_curriculum&id=<?= $row['id'] ?>" class="dropdown-item"><?= ucwords($row['name']) ?></a>
                    <?php if($cI != 0): ?>
                    <li class="dropdown-divider"></li>
                    <?php endif; ?>
                  </li>
                  <?php endwhile; ?>
                </ul>
              </li>
              <li class="nav-item">
                <a href="./?page=about" class="nav-link <?= isset($page) && $page =='about' ? "active" : "" ?>">About Us</a>
              </li>
              <li class="nav-item">
              </li> 
              <li class="nav-item">
                <a href="instruction.html" target="_blank" class="nav-link">Manual</a>
              </li> 
              <?php if($_settings->userdata('id') > 0): ?>
              <li class="nav-item">
                <a href="./?page=profile" class="nav-link <?= isset($page) && $page =='profile' ? "active" : "" ?>">Profile</a>
              </li>
              <li class="nav-item">
                <a href="./?page=submit-archive" class="nav-link <?= isset($page) && $page =='submit-archive' ? "active" : "" ?>">Submit Thesis/Research</a>
              </li>
              <?php endif; ?>
            </ul>

            
          </div>
          <!-- Right navbar links -->
          <div class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <a href="javascript:void(0)" class="text-navy" id="search_icon"><i class="fa fa-search"></i> Search Keyword</a>
                <div class="position-relative">
                  <div id="search-field" class="position-absolute">
                    <input type="search" id="search-input" class="form-control form-controled rounded-0" required placeholder="find a research..." value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>">
                  </div>
                </div>
          </div>
        </div>
      </nav>
      <!-- /.navbar -->
      <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
      <script>
        $(function(){
          $('#search-form').submit(function(e){
            e.preventDefault()
            if($('[name="q"]').val().length == 0)
            location.href = './';
            else
            location.href = './?'+$(this).serialize();
          })
          $('#search_icon').click(function(){
              $('#search-field').addClass('show')
              $('#search-input').focus();
              
          })
          $('#search-input').focusout(function(e){
            $('#search-field').removeClass('show')
          })
          $('#search-input').keydown(function(e){
            if(e.which == 13){
              location.href = "./?page=projects&q="+encodeURI($(this).val());
            }
          })
          
        })
      </script>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'es,fr,ar,de,el,iw,ja,ko,la,no,pl,ru,sv,tr,uk,vi,zh-CN,zh-TW', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>