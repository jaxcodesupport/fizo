<?php
session_start();

if(!isset($_SESSION['fizo_score'])) {
header("Location: https://fizoscore.com");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>FIZO Score</title>
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="../icons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="../icons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="../icons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="../icons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="../icons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="../icons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="../icons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="../icons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="../icons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../icons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../icons/favicon-16x16.png">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">

<!-- Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="fizoscore.css">
</head>
<body>

<!-- Header Section DATA INPUT BAR -->
<?php if(isset($_SESSION['guestEmail'])) { ?>
<div class="header">
<div class="navbar-sim" data-role="navbar" data-grid="d">
<ul>
<li><a href="#" style="color:#000000;" data-bs-toggle="modal" data-bs-target="#weight"><img style="width:23px;" src="../icons-flatiron/weight-scale.png" alt="tape measure icon"><br>Weight</a></li>
<li><a href="#" style="color:#000000;" data-bs-toggle="modal" data-bs-target="#bp"><i class="bi bi-heart-pulse" ></i><br>BP</a></li>
<li><a href="#" style="color:#000000;" data-bs-toggle="modal" data-bs-target="#waist"><img style="width:23px;" src="../icons-flatiron/tape-measure.png" alt="tape measure icon"><br>Waist</a></li>
<li><a href="#" style="color:#000000;" data-bs-toggle="modal" data-bs-target="#labs"><i class="fas fa-flask" style="color:#000000;"></i><br>Labs</a></li>
<li><a href="#plan" style="color:#000000;"><i class="fa fa-list" aria-hidden="true"></i><br>Plan</a></li>
</ul>
</div>
</div>
<?php } ?>
<!-- /header DATA INPUT -->

<!-- Main Content with Two Columns -->
<div class="container mt-5">
<div class="row">
<!-- Left Column (FIZO Score Section) -->
<div class="col-md-6">
<div class="score-section">
<h4 style="color:#001058;" class="roboto-bold">Your Baseline Health</h4>
<h1 class="roboto-black">FIZO Score</h1>
<p class="text-muted roboto-thin">This report is for educational purposes only.</p>
<div class="gauge">
<img src="images/<?=$_SESSION['fizo_score_guage']?>" alt="FIZO Score Guage" class="img-fluid text-center gauge-img">
</div>
<p class="fizo-score"><?=$_SESSION['fizo_score']?></p>
<p class="fizo-description roboto-bold"><?=$_SESSION['fizo_health_status']?></p>
<p class="text-muted roboto-thin">Generated: <small><?=date('m/d/Y h:i:s a', time())?></small><br>
Sponsored by: <a href="https://fitzoneclinic.com" target="_blank">FitZone Clinic</a></p>
<a href="https://fizoscore.com" class="btn btn-light">Start Over</a>

</div>


<!-- FIZO Factors Section -->
<div class="fizo-factors">
<h4 class="roboto-bold" style="background-color:lightgray;padding:5px 15px;">FIZO Score Analysis</h4>
<p><?=$_SESSION['fizo_analysis']?></p>
<p>The <a href="#" data-bs-toggle="modal" data-bs-target="#whatisFIZO">FIZO Score</a> provides valuable insights into your <a href="#" data-bs-toggle="modal" data-bs-target="#metabolic">metabolic health</a> by evaluating key indicators of <a href="#" data-bs-toggle="modal" data-bs-target="#metabolic">metabolic syndrome</a> and <a href="#" data-bs-toggle="modal" data-bs-target="#metabolic">insulin resistance</a>. This analysis helps identify risks and informs personalized strategies to improve your overall well-being. Understanding your FIZO Score empowers you to take proactive steps toward reversing or preventing chronic health issues and achieving a healthier lifestyle.</p>


<div class="fizo-factor">
<p><i class="fas fa-square whats-next-icon"></i> Your Waist to Height Ratio (<a href="#" data-bs-toggle="modal" data-bs-target="#WHtR">WHtR</a>): 
<strong> <?=$_SESSION['WtHrcalculated']?></strong> <?=$_SESSION['fizo_badge']?>
<br><span class="text-success">A WHtR between 0.40 and 0.49 is considered healthy. A score above 0.50 indicates an increased risk of cardiovascular disease.</span>

<br>
<br><i class="fas fa-square whats-next-icon"></i> Your current Waist is <strong><?=$_SESSION['waist']?> inches</strong>  <?=$_SESSION['fizo_badge']?>
<br><span class="text-success">Your ideal waist is less than <strong><?=$_SESSION['ideal_waist']?> inches</strong></span>
</p>

</div>
<hr>
<?php
if(isset($_SESSION['metabolic'])) { ?>
<div class="fizo-factor">
    <!-- Display Metabolic Syndrome Status -->
    <p>
        <i class="fas fa-square whats-next-icon"></i> Metabolic Syndrome Status: 
        <strong><?=$_SESSION['metabolic_syndrome_badge']?></strong>
        <br>
        <span><?=$_SESSION['metabolic_syndrome_message']?></span>
    </p>
</div>
<hr>
<?php } ?>


<?php
if($_SESSION['remnant_cholesterol'] != 0) {
?>
<div class="fizo-factor">
<p><i class="fas fa-square whats-next-icon"></i> Your Remnant Cholesterol (<a href="#" data-bs-toggle="modal" data-bs-target="#rc">RC</a>) is  
<strong> <?=$_SESSION['remnant_cholesterol']?></strong> <?=$_SESSION['remnant_badge']?><br>
<?=$_SESSION['remnant_message']?>
</p>
<p>Remnant cholesterol is a type of bad cholesterol that builds up in the blood after you eat. High levels of it can clog your arteries, increasing your risk of heart disease. It's like leftover cholesterol that your body didn't use, and it can contribute to heart problems if it's too high. By lowering remnant cholesterol, you can help keep your heart and blood vessels healthy.</p>
</div>
<hr>
<?php
}
?>




<?php
if($_SESSION['A1C'] != 0) {
?>
<div class="fizo-factor">
<p><i class="fas fa-square whats-next-icon"></i> Your A1C  (<a href="#" data-bs-toggle="modal" data-bs-target="#a1c">A1C</a>): 
<strong> <?=$_SESSION['A1C']?></strong> <?=$_SESSION['A1C_badge']?>
<br><?=$_SESSION['A1C_message']?>
</p>

</div>
<hr>
<?php
}
?>



<?php
if($_SESSION['tg_hdl_ratio'] != 0) {
?>
<div class="fizo-factor">
<p><i class="fas fa-square whats-next-icon"></i> Your TG/HDL Ratio (<a href="#" data-bs-toggle="modal" data-bs-target="#tg_hdl">TG/HDL</a>): 
<strong> <?=$_SESSION['tg_hdl_ratio']?></strong> <?=$_SESSION['tg_hdl_badge']?>
<br><?=$_SESSION['tg_hdl_message']?>
</p>

</div>
<hr>
<?php
}
?>

<div class="fizo-factor">
<p><i class="fas fa-square whats-next-icon"></i> Blood Pressure (<a href="#" data-bs-toggle="modal" data-bs-target="#BP">BP</a>): 
<strong><?=$_SESSION['systolic']?> / <?=$_SESSION['diastolic']?> mmHg</strong> <?=$_SESSION['bp_badge']?><br>
Ideal Blood Pressure: Less than 120/80 mmHg
</p>

<?php 
// Check for BP levels and assign the appropriate message and badge
if ($_SESSION['systolic'] < 70 || $_SESSION['diastolic'] < 40) {
    echo '<p class="text-danger"><strong>Severely Low Blood Pressure:</strong> Your blood pressure reading of ' . $_SESSION['systolic'] . '/' . $_SESSION['diastolic'] . ' mmHg is dangerously low. Seek immediate medical attention, especially if you are experiencing symptoms like fainting, weakness, or confusion.</p>';
} elseif ($_SESSION['systolic'] >= 70 && $_SESSION['systolic'] < 80 || $_SESSION['diastolic'] >= 40 && $_SESSION['diastolic'] < 50) {
    echo '<p class="text-warning"><strong>Low Blood Pressure:</strong> Your blood pressure is low and may result in symptoms such as dizziness or fatigue. Consult your doctor if symptoms persist.</p>';
} elseif ($_SESSION['systolic'] >= 80 && $_SESSION['systolic'] < 90 || $_SESSION['diastolic'] >= 50 && $_SESSION['diastolic'] < 60) {
    echo '<p class="text-warning"><strong>Borderline Low Blood Pressure:</strong> Your blood pressure is borderline low. This could cause dizziness or fatigue. Consult your doctor if symptoms appear.</p>';
} elseif ($_SESSION['systolic'] >= 180 || $_SESSION['diastolic'] >= 120) {
    echo '<p class="text-danger"><strong>Hypertensive Crisis:</strong> Your blood pressure reading of ' . $_SESSION['systolic'] . '/' . $_SESSION['diastolic'] . ' mmHg indicates a hypertensive crisis, which requires immediate medical attention.</p>';
    echo '<p class="text-danger">If you are experiencing any of the following symptoms, call 911 immediately:</p>';
    echo '<ul class="text-danger">';
    echo '<li>Chest pain</li>';
    echo '<li>Shortness of breath</li>';
    echo '<li>Back pain</li>';
    echo '<li>Numbness or weakness</li>';
    echo '<li>Changes in vision</li>';
    echo '<li>Difficulty speaking</li>';
    echo '</ul>';
    echo '<p class="text-danger">There are two types of hypertensive crises:</p>';
    echo '<ul class="text-danger">';
    echo '<li><strong>Urgent hypertensive crisis:</strong> Blood pressure is 180/120 or higher, but there are no signs of organ damage. Seek immediate medical attention.</li>';
    echo '<li><strong>Emergency hypertensive crisis:</strong> Blood pressure is 180/120 or higher with signs of life-threatening damage to organs. Call 911 immediately if you are experiencing any of the symptoms listed above.</li>';
    echo '</ul>';
} elseif ($_SESSION['systolic'] >= 140 || $_SESSION['diastolic'] >= 90) {
    echo '<p class="text-warning"><strong>High Blood Pressure:</strong> Your blood pressure is elevated. Please consult your doctor to discuss treatment options to prevent long-term health issues.</p>';
} elseif ($_SESSION['systolic'] > 120 || $_SESSION['diastolic'] > 80) {
    echo '<p class="text-warning"><strong>Elevated Blood Pressure:</strong> Your blood pressure is slightly elevated. Consider lifestyle changes to lower your blood pressure.</p>';
} elseif ($_SESSION['systolic'] == 120 && $_SESSION['diastolic'] == 80) {
    echo '<p class="text-success"><strong>Normal Blood Pressure:</strong> Your blood pressure is within the normal range. Keep maintaining a healthy lifestyle to keep it that way.</p>';
    $_SESSION['bp_badge'] = '<span class="badge" style="background-color:#01cc34;">Normal</span>';
} else {
    echo '<p class="text-success"><strong>Normal Blood Pressure:</strong> Your blood pressure is within the normal range. Keep maintaining a healthy lifestyle to keep it that way.</p>';
    $_SESSION['bp_badge'] = '<span class="badge" style="background-color:#01cc34;">Normal</span>';
}
?>
</div>
<hr>







<!-- Dev Data -->
<br><br>
<div style="background-color:aliceblue;">
TESTING Data:
<br>Badges Available: <br>
<span class="badge" style="background-color:#fe0002;">Urgent</span>
<span class="badge" style="background-color:#ff6501;">Borderline</span>
<span class="badge" style="background-color:#ffcc33;">Needs Work</span>   
<span class="badge" style="background-color:#9bcc35;">Good Job</span> 
<span class="badge" style="background-color:#01cc34;">Excellent</span> 
<span class="badge bg-info">Info</span>  
<span class="badge bg-primary">Alert</span>
<span class="badge bg-secondary">Learn</span>
<span class="badge" style="background-color:#a64dff;">Recommended</span>   
<span class="badge bg-success">Edit</span>


<?php


// Check if there are session variables
if (!empty($_SESSION)) {
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
} else {
    echo "No session variables available.";
}
?>
</div>
<!-- /Dev Data -->
</div>


</div>

<!-- Right Column (Sidebar Section) -->
<div class="col-md-6">
<div class="sidebar">
<h4 class="roboto-bold">User info</h4>
<p><?php if(isset($_SESSION['guestFirst'])) {
echo 'Guest: <strong>'.$_SESSION['guestFirst'].' '.$_SESSION['guestLast'].' '.$_SESSION['guestEmail'].'</strong><br>'.$_SESSION['id'];
} ?>

<?php $gender = ($_SESSION['gender'] == "male") ? "M" : "F"; ?>
<?php $dob_parts = explode("-", $_SESSION['dob']); ?>
Gender: <strong><?=$gender?></strong> | Age: <strong><?=$_SESSION['age']?></strong> | DOB: <strong><?=$dob_parts[1]?></strong>/<strong><?=$dob_parts[2]?></strong>/<strong><?=$dob_parts[0]?></strong> <br> Height: <strong><?=$_SESSION['height_feet']?>&#39; <?=$_SESSION['height_inches']?>&quot;</strong> | 
Weight: <strong><?=$_SESSION['weight']?></strong> | Waist: <strong><?=$_SESSION['waist']?></strong> 




<?php
if (isset($_SESSION['created_at'])) {
    // Create a DateTime object from the session variable
    $createdAt = new DateTime($_SESSION['created_at']);
    
    // Format the date as "September 14, 2024" and the time as "1:26 PM"
    $formattedDate = $createdAt->format('F j, Y'); // e.g., September 14, 2024
    $formattedTime = $createdAt->format('g:i A'); // e.g., 1:26 PM
    
    echo "Member Since: <strong>" . $formattedDate . " " . $formattedTime . '</strong>';
}

// Function to determine and echo diet recommendation based on FIZO score
function getDietRecommendation($fizo_score) {
    if ($fizo_score >= 300 && $fizo_score <= 579) {
        echo "Diet Recommendation: <strong>Carnivore</strong>";
    } elseif ($fizo_score >= 580 && $fizo_score <= 669) {
        echo "Diet Recommendation: <strong>Carnivore or Ketovore</strong>";
    } elseif ($fizo_score >= 670 && $fizo_score <= 739) {
        echo "Diet Recommendation: <strong>Ketovore or Ketogenic</strong>";
    } elseif ($fizo_score >= 740 && $fizo_score <= 799) {
        echo "Diet Recommendation: <strong>Ketogenic or Low Carb Diet</strong>";
    } elseif ($fizo_score >= 800 && $fizo_score <= 850) {
        echo "Diet Recommendation: <strong>Low Carb Diet</strong>";
    } else {
        echo "<strong>Invalid FIZO Score</strong>";
    }
}
// Check if FIZO score is set in the session
if (isset($_SESSION['fizo_score'])) {
    $fizo_score = $_SESSION['fizo_score'];

    // Output the FIZO score
    //echo "FIZO Score: " . $fizo_score . "<br>";
  echo '<br>';
    // Echo the diet recommendation
    getDietRecommendation($fizo_score);
} else {
    echo "FIZO score is not set in the session.";
}
?>
 <a href="#" data-bs-toggle="modal" data-bs-target="#diets">info</a>
</p>

<hr><a name="plan"></a>
<h4 class="roboto-bold" style="background-color:lightgray;padding:5px 15px;">DO THE FOLLOWING TO GET HEALTHY</h4><br>

<ul class="list-unstyled">
<li>
    <i class="fas fa-flask whats-next-icon"></i>
    <strong>Input Labs:</strong> Enhance your FIZO Score by entering your most recent A1C and Cholesterol (Lipid) readings from your latest blood work. Ensure that your blood work is less than 3 months old. If you need new tests, consult your doctor or order A1C and Lipid bundle for $32 from our partners at Rupa Health and Labcorp.<br>
    <span class="links">
        <strong>Input</strong>: <a href="#" data-bs-toggle="modal" data-bs-target="#inputa1c">A1C</a> 
        | 
<a href="#" data-bs-toggle="modal" data-bs-target="#inputlipids">Lipids</a> 
        | 
<strong>Order</strong>: 
        <a href="#" data-bs-toggle="modal" data-bs-target="#orderlabs">Labs</a>
    </span>
</li>

<hr>
<li>
    <i class="fas fa-cutlery whats-next-icon"></i>
    <strong>Adopt a Ketogenic Lifestyle:</strong> By reducing your carbohydrate intake, you can stabilize blood sugar levels, promote fat loss, and increase mental clarity. This approach supports better metabolic health and can help prevent or reverse chronic diseases.
    <br>
    <span class="links">
        <a href="#" data-bs-toggle="modal" data-bs-target="#lowcarb">View Low Carb Choices</a>
    </span>
</li>
<hr>
<li>
    <i class="fas fa-skull-crossbones whats-next-icon"></i>
    <strong>Remove Sugars, Grains & Seed Oils From Your Diet:</strong> Eliminate these common culprits to reduce inflammation, improve metabolic health, and support long-term wellness. This simple change can help you lose weight, boost energy, and reverse chronic conditions. <br>
    <span class="links">
        <a href="#" data-bs-toggle="modal" data-bs-target="#eliminate">Learn More</a>
    </span>
</li>
<hr>
<li>
    <i class="fas fa-clock whats-next-icon"></i>
    <strong>Practice Intermittent Fasting:</strong> Harness the power of timed eating to improve insulin sensitivity, enhance fat burning, and boost cellular repair. Intermittent fasting helps you manage your weight, optimize energy levels, and promote overall health.
    <br>
    <span class="links">
        <a href="#" data-bs-toggle="modal" data-bs-target="#intermittentFasting">Learn More</a>
    </span>
</li>

<hr>
<li>
<i class="fas fa-walking whats-next-icon"></i>
<strong>Exercise:</strong> Engage in regular physical activity like high-intensity interval training to boost heart health, mood, and fat burning.
<br>
    <span class="links">
        <a href="#" data-bs-toggle="modal" data-bs-target="#hiit">Learn More</a>
    </span>
<br><br>
<i class="fas fa-bed whats-next-icon"></i>
<strong>Sleep:</strong> Prioritize 7-9 hours of quality sleep to enhance recovery, mental clarity, and overall health.
<br>
    <span class="links">
        <a href="#" data-bs-toggle="modal" data-bs-target="#sleep">Learn More</a>
    </span>
</li>

<hr>
<li>
    <i class="fas fa-user-md whats-next-icon"></i>
    <strong>Consult Your Doctor:</strong> Share your health goals with your doctor and discuss following these guidelines. They understand your medical history and can monitor your progress, making any necessary adjustments to your medications to ensure this approach is safe and effective for you.
    <br>
    <span class="links">
        <a href="#" data-bs-toggle="modal" data-bs-target="#consultyourdoctor">Learn More</a>
    </span>
</li>

<hr>
<li>
    <i class="fa fa-medkit whats-next-icon"></i>
    <strong>Seek Support:</strong> This site is designed as a DIY (Do-It-Yourself) resource. If you'd like professional guidance to improve your FIZO Score, lose weight, fix your blood work, and reverse chronic diseases, you can schedule a telemedicine visit with one of our Lifestyle Medicine Physicians at FitZone Clinic. They will provide medical supervision and help you achieve optimal health. physician consultations are available for just $25.
    <br>
    <span class="links">
<form action="https://fitzoneclinic.com" target="_blank" method="post">
        <button class="btn btn-success w-100">Book Appointment <i class="fas fa-external-link-alt"></i></button></form>
    </span>
</li>
</ul>


</div>
<?php require_once('dashboard/tidbits.php'); ?>
</div>
</div>
</div>

<!-- Footer Section -->
<div class="footer mt-4">
<p>&copy; <?=date('Y')?> FitZone Clinic. Owned and operated by <a href="https://fitzoneclinic.com" style="color:white;">FitZone Clinic</a></p>
<p style="padding-left:10px;font-size:17px;"  class="text-start">
<strong>Disclaimer:</strong> The information provided by FIZO Score, including on this page and associated websites, is for educational purposes only and offers a basic assessment of your health or metabolic health. It may not account for preexisting conditions and does not constitute medical advice, diagnosis, or treatment. Users should consult a licensed healthcare provider before making any health-related decisions based on this information. While we regularly update our algorithms to ensure your FIZO Score reflects the most accurate health assessment possible, scores may vary occasionally. By using this site, you agree to these terms and warnings.
</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
<script>
// JavaScript to dynamically get current date and time
function updateDateTime() {
const now = new Date();
const formattedDate = now.toLocaleDateString();
const formattedTime = now.toLocaleTimeString();
document.getElementById('currentDateTime').innerText = `${formattedDate} ${formattedTime}`;
}

// Update date and time on page load
updateDateTime();

// Optional: Update date and time every second
setInterval(updateDateTime, 1000);
</script>



<!-- Modal - Become a Member -->
<div class="modal fade" id="join" tabindex="-1" aria-labelledby="joinModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="joinModalLabel">
          <img src="gauge.png" style="width:60px;" class="img-fluid" alt="Fizo Score">
          FIZO Score
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <!-- Left Column: Form -->
            <div class="col-md-5">
              <h2>Sign Up</h2>
              <form action="registerGuest.php" method="post">
                <div class="mb-3">
                  <label for="firstName" class="form-label">First Name</label>
                  <input name="guestFirst" type="text" class="form-control" id="firstName" placeholder="Enter your first name" required>
                </div>
                <div class="mb-3">
                  <label for="lastName" class="form-label">Last Name</label>
                  <input name="guestLast" type="text" class="form-control" id="lastName" placeholder="Enter your last name" required>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input name="guestEmail" type="email" class="form-control" id="email" placeholder="Enter your email" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
            <!-- Right Column -->
            <div class="col-md-7">
              <h2>Welcome to Our Platform!</h2>
              <p>Sign up to gain access to exclusive features and benefits. Enjoy a personalized experience with tailored content and resources just for you.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /modal -->

<!-- Modal = Welcome Video -->
<div class="modal fade" id="welcomevideo" tabindex="-1" aria-labelledby="welcomeVideoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="welcomeVideoModalLabel">
          <img src="gauge.png" style="width:60px;" class="img-fluid" alt="Fizo Score"> FIZO Score
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <!-- Left Column: Video -->
            <div class="col-md-5">
              <h2>Welcome Video</h2>
              <div class="ratio ratio-16x9">
                <video controls>
                  <source src="welcome.mp4" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
            </div>
            <!-- Right Column: Placeholder Content -->
            <div class="col-md-7">
              <h2>Welcome to Our Platform!</h2>
              <p>Sign up to gain access to exclusive features and benefits. Enjoy a personalized experience with tailored content and resources just for you.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->

<!-- Modal - Blood Pressure -->
<div class="modal fade" id="BP" tabindex="-1" aria-labelledby="BPModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <div class="d-flex w-100 justify-content-between align-items-center">
          <!-- Left side: logo -->
          <div>
            <img src="gauge.png" style="width:60px;" class="img-fluid" alt="Fizo Score">
          </div>
          <!-- Centered title with h1 -->
          <h1 class="modal-title text-center flex-grow-1 fw-bold" id="BPModalLabel">
            Blood Pressure
          </h1>
          <!-- Right side: close button -->
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      </div>

      <div class="modal-body">
        <div class="container">
          <div class="row">
            <!-- Explanation of Blood Pressure -->
            <div class="col-lg-6">
              <h2>What is Blood Pressure?</h2>
              <p>Blood pressure is the force of your blood pushing against the walls of your arteries. It’s an essential measure of heart health. High blood pressure (hypertension) increases the risk of heart disease, stroke, and other serious health conditions.</p>

              <h3>Blood Pressure Categories:</h3>
              <ul>
                <li><strong>Normal:</strong> Less than 120/80 mmHg</li>
                <li><strong>Elevated:</strong> Systolic between 120-129 and diastolic less than 80 mmHg</li>
                <li><strong>Hypertension (Stage 1):</strong> Systolic between 130-139 or diastolic between 80-89 mmHg</li>
                <li><strong>Hypertension (Stage 2):</strong> Systolic 140 or higher or diastolic 90 or higher</li>
                <li><strong>Hypertensive Crisis:</strong> Systolic over 180 and/or diastolic over 120 mmHg, requiring immediate medical attention</li>
              </ul>
            </div>

            <!-- Video Section -->
            <div class="col-lg-6 text-center">
              <iframe width="100%" height="315" src="https://www.youtube.com/embed/rI-ktNcbi7M?si=A9LshOJE9phP4_LK" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->


<!-- Modal - Input A1C -->
<div class="modal fade" id="inputa1c" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="d-flex w-100 justify-content-between align-items-center">
          <!-- Left side: logo -->
          <div>
            <img src="gauge.png" style="width:60px;" class="img-fluid" alt="Fizo Score">
          </div>
          <!-- Centered title with h1 -->
          <h1 class="modal-title text-center flex-grow-1 fw-bold" id="inputLabsModalLabel">
            Lab Results
          </h1>
          <!-- Right side: close button -->
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      </div>

      <div class="modal-body">
        <div class="container">
          <div class="row">
            <!-- Form for HbA1c -->
            <div class="col-lg-12">
              <h2>Enter Your HbA1c</h2>
              <p>To input your HbA1c, find the value on your lab report labeled as "Hemoglobin A1c" or "HbA1c". This is typically shown as a percentage (%). Enter the exact value from your lab report.</p>
              <form action="fizoscorecalculate.php" method="post">
<input type="hidden" name="dob" value="<?=$_SESSION['dob']?>">
<input type="hidden" name="gender" value="<?=$_SESSION['gender']?>">
<input type="hidden" name="waist" value="<?=$_SESSION['waist']?>">
<input type="hidden" name="weight" value="<?=$_SESSION['weight']?>">
<input type="hidden" name="height_feet" value="<?=$_SESSION['height_feet']?>">
<input type="hidden" name="height_inches" value="<?=$_SESSION['height_inches']?>">
<input type="hidden" name="systolic" value="<?=$_SESSION['systolic']?>">
<input type="hidden" name="diastolic" value="<?=$_SESSION['diastolic']?>">
<input type="hidden" name="hdl" value="<?=$_SESSION['hdl']?>">
<input type="hidden" name="triglycerides" value="<?=$_SESSION['triglycerides']?>">

                <div class="mb-3">
                  <label for="A1C" class="form-label">HbA1c (%)</label>
                  <input type="number" step="0.01" class="form-control" id="A1C" name="A1C" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit HbA1c</button>
              </form>
            </div>

            <!-- Form for HDL and Triglycerides -->
            
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->

<!-- Modal - Input Lipids -->
<div class="modal fade" id="inputlipids" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="d-flex w-100 justify-content-between align-items-center">
          <!-- Left side: logo -->
          <div>
            <img src="gauge.png" style="width:60px;" class="img-fluid" alt="Fizo Score">
          </div>
          <!-- Centered title with h1 -->
          <h1 class="modal-title text-center flex-grow-1 fw-bold" id="inputLabsModalLabel">
              Lab Results
          </h1>
          <!-- Right side: close button -->
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <!-- Form for Lipid Profile Inputs -->
            <div class="col-lg-12">
              <h2>Enter Your Lipid Profile</h2>
              <p>On your lab report, look for "Total Cholesterol," "LDL Cholesterol," "HDL," and "Triglycerides." Enter the values as they appear on your report.</p>
              <form action="fizoscorecalculate.php" method="post">
                <!-- Hidden Inputs -->
                <input type="hidden" name="dob" value="<?=$_SESSION['dob']?>">
                <input type="hidden" name="gender" value="<?=$_SESSION['gender']?>">
                <input type="hidden" name="waist" value="<?=$_SESSION['waist']?>">
                <input type="hidden" name="weight" value="<?=$_SESSION['weight']?>">
                <input type="hidden" name="height_feet" value="<?=$_SESSION['height_feet']?>">
                <input type="hidden" name="height_inches" value="<?=$_SESSION['height_inches']?>">
                <input type="hidden" name="systolic" value="<?=$_SESSION['systolic']?>">
                <input type="hidden" name="diastolic" value="<?=$_SESSION['diastolic']?>">
                <input type="hidden" name="A1C" value="<?=$_SESSION['A1C']?>">

                <!-- Total Cholesterol (TC) Input -->
                <div class="mb-3">
                  <label for="tc" class="form-label">Total Cholesterol (mg/dL)</label>
                  <input type="number" step="0.1" class="form-control" id="tc" name="tc" required>
                </div>

                <!-- LDL Input -->
                <div class="mb-3">
                  <label for="ldl" class="form-label">LDL (mg/dL)</label>
                  <input type="number" step="0.1" class="form-control" id="ldl" name="ldl" required>
                </div>

                <!-- HDL Input -->
                <div class="mb-3">
                  <label for="hdl" class="form-label">HDL (mg/dL)</label>
                  <input type="number" step="0.1" class="form-control" id="hdl" name="hdl" required>
                </div>

                <!-- Triglycerides Input -->
                <div class="mb-3">
                  <label for="triglycerides" class="form-label">Triglycerides (mg/dL)</label>
                  <input type="number" step="0.1" class="form-control" id="triglycerides" name="triglycerides" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Submit Lipid Profile</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->




<!-- Modal - Waist-to-Height Ratio (WHtR) -->
<div class="modal fade" id="WHtR" tabindex="-1" aria-labelledby="WHtRModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <div class="d-flex w-100 justify-content-between align-items-center">
          <!-- Left side: logo -->
          <div>
            <img src="gauge.png" style="width:60px;" class="img-fluid" alt="Fizo Score">
          </div>
          <!-- Centered title with h1 -->
          <h1 class="modal-title text-center flex-grow-1 fw-bold" id="WHtRModalLabel">
            Waist-to-Height Ratio (WHtR)
          </h1>
          <!-- Right side: close button -->
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      </div>

      <div class="modal-body">
        <div class="container">
          <div class="row">
            <!-- Explanation of WHtR -->
            <div class="col-lg-6">
              <h2>What is Waist-to-Height Ratio?</h2>

<p>BMI (Body Mass Index) has long been used as a measure of obesity and metabolic health, but it often proves inaccurate for many individuals. A more reliable and easy-to-calculate alternative is the Waist-to-Height Ratio (WHtR), which provides a better assessment of health risks. Unlike BMI, WHtR is accurate for people of varying heights, body types, muscle mass, and across different ethnicities.</p>
<p>
The WHtR is a measure of the distribution of body fat. Higher values of WHtR indicate higher risk of obesity-related cardiovascular diseases; it is correlated with abdominal obesity.</p>
              <p>Your Waist-to-Height Ratio (WHtR) is an important indicator of your overall health. It is calculated by dividing your waist circumference by your height. This ratio helps assess your risk for obesity-related diseases, such as heart disease and type 2 diabetes. The lower your WHtR, the healthier you are likely to be.</p>

              <h3>How to Calculate WHtR:</h3>
              <ul>
                <li>Measure your waist circumference at the level of your belly button.</li>
                <li>Measure your height (in inches or cm).</li>
                <li>Divide your waist measurement by your height.</li>
              </ul>

              <p>A healthy WHtR is typically below 0.5. A WHtR higher than 0.5 indicates an increased risk of obesity-related health conditions.</p>
            </div>

            <!-- Video Section -->
            <div class="col-lg-6 text-center">
              <iframe width="100%" height="315" src="https://www.youtube.com/embed/Dz3Pj9nq6dI?si=10a8bvGe9zwJ4RjO" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->



<!-- Modal - Order Labs -->
<div class="modal fade" id="orderlabs" tabindex="-1" aria-labelledby="orderLabsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <div class="d-flex w-100 justify-content-between align-items-center">
          <!-- Left side: logo -->
          <div>
            <img src="gauge.png" style="width:60px;" class="img-fluid" alt="Fizo Score">
          </div>
          <!-- Centered title with h1 -->
          <h1 class="modal-title text-center flex-grow-1 fw-bold" id="orderLabsModalLabel">
            Two Important Labs to Order
          </h1>
          <!-- Right side: close button -->
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      </div>

      <div class="modal-body">
        <div class="container">
          
          <!-- Order Labs Information -->
          <div class="row mb-4">
            <div class="col-lg-12">
              <h2>Order Your Labs with Rupa Health</h2>
              <p>Our patients can conveniently order labs directly from our partner, Rupa Health. We recommend ordering the following tests to track your metabolic health. Please note that you should be **fasting** (not eating or drinking anything except water for 8-12 hours) before both tests:</p>

              <h3 class="roboto-bold">#1. Cholesterol (Lipid) Panel</h3>
              <p><strong>Lab:</strong> Labcorp Draw</p>
              <p><strong>Specimen Type:</strong> Serum</p>
              <p>The Lipid Panel is a blood test that measures the levels of lipids (fats and cholesterol) in your body. It is used to help diagnose and monitor conditions such as high cholesterol and diabetes. This test can also help your doctor assess your risk of developing cardiovascular disease.</p>

              <h3 class="roboto-bold">#2. Hemoglobin A1c (HbA1c)</h3>
              <p><strong>Lab:</strong> Labcorp Draw</p>
              <p><strong>Specimen Type:</strong> Whole Blood</p>
              <p>The HbA1c test is a blood test that measures the average level of glucose (sugar) in your blood over the past two to three months. It is used to monitor blood sugar levels in people with diabetes to help them keep their diabetes under control. It can also be used to diagnose diabetes.</p>

              <p>To get started, simply visit our co-branded lab ordering site below:</p>
              <a href="https://labs.rupahealth.com/store/storefront_o401ANG" target="_blank" class="btn btn-primary">Order Labs Now</a>
            </div>
          </div>

        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->



<!-- Modal - What is FIZO Score -->
<div class="modal fade" id="whatisFIZO" tabindex="-1" aria-labelledby="whatisFIZOModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="welcomeVideoModalLabel">
          <img src="gauge.png" style="width:60px;" class="img-fluid" alt="Fizo Score"> FIZO Score
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="container">
          <h1 class="text-center">Understanding the FIZO Score for Your Health</h1>

          <!-- What is a FIZO Score -->
          <div class="row">
            <div class="col-md-12">
              <h2>What is a FIZO Score?</h2>
              <p>The FIZO Score is a health metric designed to give you a clear picture of your metabolic health. Think of it like a credit score but for your health. It helps us understand how well your body is managing key factors that influence your risk for conditions like heart disease, diabetes, and other chronic illnesses.</p>
            </div>
          </div>

          <!-- Key Components -->
          <div class="row">
            <div class="col-md-12">
              <h2>Key Components of the FIZO Score</h2>
              <ul>
                <li><strong>Waist-to-Height Ratio (WHtR):</strong> A healthy ratio indicates a lower risk of metabolic syndrome.</li>
                <li><strong>TG/HDL Ratio:</strong> This ratio helps us understand your lipid metabolism. Lower ratios are better for heart health.</li>
                <li><strong>Remnant Cholesterol:</strong> This measures the cholesterol left after subtracting the good (HDL) and bad (LDL) cholesterol from total cholesterol. Lower levels are healthier.</li>
                <li><strong>A1C:</strong> This measures your average blood sugar levels over the past few months.</li>
                <li><strong>Blood Pressure:</strong> Healthy blood pressure is crucial for reducing the risk of heart disease and stroke.</li>
              </ul>
            </div>
          </div>

          <!-- Why Lifestyle Modifications -->
          <div class="row">
            <div class="col-md-12">
              <h2>Why Lifestyle Modifications are Key</h2>
              <p>Many doctors often turn to medication first, but at our clinic, we believe that lifestyle modifications should be the first line of defense. Medications can manage symptoms, but lifestyle changes can address the root causes of metabolic syndrome and other chronic diseases.</p>
            </div>
          </div>

          <!-- How We Use Your FIZO Score -->
          <div class="row">
            <div class="col-md-12">
              <h2>How We Use Your FIZO Score</h2>
              <ol>
                <li><strong>Initial Assessment:</strong> The FIZO Score gives us a starting point to improve your health.</li>
                <li><strong>Custom Plan:</strong> We create a personalized plan aimed at improving your score and overall health.</li>
                <li><strong>Ongoing Support:</strong> We provide continuous support through telemedicine visits and our VIP membership program.</li>
              </ol>
            </div>
          </div>

          <!-- Benefits of a High FIZO Score -->
          <div class="row">
            <div class="col-md-12">
              <h2>The Benefits of a High FIZO Score</h2>
              <ul>
                <li><strong>Reduced Risk of Chronic Diseases:</strong> Lower risk of heart disease, stroke, and type 2 diabetes.</li>
                <li><strong>Better Energy Levels:</strong> More vitality and improved daily life.</li>
                <li><strong>Weight Management:</strong> Easier to maintain a healthy weight.</li>
                <li><strong>Improved Blood Sugar Control:</strong> Lower risk of diabetes-related complications.</li>
                <li><strong>Peace of Mind:</strong> Confidence in knowing you're in great health.</li>
              </ul>
            </div>
          </div>

          <!-- Our Goal -->
          <div class="row">
            <div class="col-md-12">
              <h2>Our Goal</h2>
              <p>Our goal is to help you achieve a high FIZO Score and reverse metabolic syndrome through sustainable lifestyle changes. We empower you to take control of your health with a plan that works for you, reducing your reliance on medications and improving your quality of life.</p>
              <p>By focusing on lifestyle modifications, particularly low carb, high fat diets, or Nutritional Ketosis, we aim to provide you with the tools and support needed to achieve optimal health. Together, we can work towards a healthier, happier you.</p>
            </div>
          </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->


<!-- Modal - Metabolic Health, Metabolic Syndrome, and Insulin Resistance -->
<div class="modal fade" id="metabolic" tabindex="-1" aria-labelledby="metabolicHealthModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <div class="d-flex w-100 justify-content-between align-items-center">
          <!-- Left side: logo -->
          <div>
            <img src="gauge.png" style="width:60px;" class="img-fluid" alt="Fizo Score">
          </div>
          <!-- Centered title with h1 -->
          <h1 class="modal-title text-center flex-grow-1 fw-bold" id="metabolicHealthModalLabel">
            Metabolic Health, Metabolic Syndrome, and Insulin Resistance
          </h1>
          <!-- Right side: close button -->
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      </div>

      <div class="modal-body">
        <div class="container">

          <!-- Section for Metabolic Health -->
          <div class="row align-items-center mb-4">
            <div class="col-lg-6">
              <h2>What is Metabolic Health?</h2>
              <p>Metabolic health refers to how well your body processes and utilizes energy from food. Optimal metabolic health means maintaining healthy levels of blood sugar, cholesterol, blood pressure, and waist-to-height ratio. When your metabolism is functioning properly, your body efficiently converts food into energy, maintains stable blood sugar levels, and supports overall health.</p>
            </div>
            <div class="col-lg-6 text-center">
              <iframe width="100%" height="300" src="https://www.youtube.com/embed/Pm5scBxJm7k?si=UHUwWwJ0LPHRakh7" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>
<hr>
          <!-- Section for Metabolic Syndrome -->
          <div class="row align-items-center mb-4">
            <div class="col-lg-6">
              <h2>What is Metabolic Syndrome?</h2>
              <p>Metabolic Syndrome is a cluster of conditions that increase your risk for heart disease, stroke, and type 2 diabetes. If you have at least three of the following risk factors, you may have Metabolic Syndrome:</p>
              <ul>
                <li><strong>A1C higher than 5.7%</strong> (chronic high blood sugars)</li>
                <li><strong>Blood Pressure higher than 120/80</strong> (hypertension)</li>
                <li><strong>Waist-to-Height ratio > 0.5</strong> (excess weight around the waist)</li>
                <li><strong>Triglycerides > 150 mg/dL</strong> (too much fat in your blood)</li>
                <li><strong>HDL < 40 mg/dL</strong> (too little good cholesterol)</li>
              </ul>
            </div>
            <div class="col-lg-6 text-center">
              <iframe width="100%" height="300" src="https://www.youtube.com/embed/J-o6tRZ2n8o?si=Z475IF0kRb-yE-jB" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
          </div>
<hr>
          <!-- Section for Insulin Resistance -->
          <div class="row align-items-center mb-4">
            <div class="col-lg-6">
              <h2>What is Insulin Resistance?</h2>
              <p>Insulin resistance occurs when your cells stop responding properly to insulin, the hormone that helps regulate blood sugar levels. As a result, your body needs to produce more insulin to keep blood sugar in check. Over time, this can lead to high blood sugar levels, weight gain, and an increased risk of developing type 2 diabetes and other metabolic disorders.</p>
            </div>
            <div class="col-lg-6 text-center">
              <iframe width="100%" height="335" src="https://www.youtube.com/embed/pxl8hhyN6AQ?si=yJC9gd9oHf7xinGh" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>

        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->







<!-- Modal -->
<div class="modal fade" id="lorem" tabindex="-1" aria-labelledby="loremModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="welcomeVideoModalLabel">
          <img src="gauge.png" style="width:60px;" class="img-fluid" alt="Fizo Score"> FIZO Score
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="container">
          <h1 class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, provident.</h1>

          <div class="row">
            <div class="col-md-12">
              <h2>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, sunt.?</h2>
              <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque nihil aliquid at! Iste maxime dicta iure ipsam temporibus, fuga tempora voluptatem facere laborum repudiandae, reiciendis fugit inventore dignissimos corporis nemo.</p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <h2>Lorem ipsum dolor sit amet.</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus temporibus adipisci cum ut repudiandae, doloribus incidunt, ab harum molestiae totam, impedit tenetur ducimus id quod eos. Sed aut rerum quidem.</p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <h2>Lorem ipsum dolor sit amet.</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt corrupti unde blanditiis adipisci facilis eligendi voluptatum quod. Enim libero molestias earum inventore impedit expedita doloribus tenetur porro provident, ullam animi.</p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <h2>Lorem ipsum dolor sit amet.</h2>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas natus tempora vel earum culpa aliquid, itaque dolore repellendus amet. Autem modi illo asperiores ex cum accusantium doloribus in, nulla quidem?</p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <h2>Lorem ipsum dolor sit amet.</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et pariatur, aliquid, delectus voluptatum, autem est maxime eos cum qui corporis veritatis deleniti? Ullam ad error assumenda ea doloribus corporis illo!</p>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <h2>Lorem, ipsum.</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia necessitatibus doloribus mollitia? Voluptatibus praesentium quae fugit ex! Et voluptas, praesentium maiores ut cupiditate nihil eius deserunt, accusamus, quo laborum pariatur?</p>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->


<!-- Modal - Consult Your Doctor -->
<div class="modal fade" id="consultyourdoctor" tabindex="-1" aria-labelledby="consultDoctorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <div class="d-flex w-100 justify-content-between align-items-center">
          <!-- Left side: logo -->
          <div>
            <img src="gauge.png" style="width:60px;" class="img-fluid" alt="Fizo Score">
          </div>
          <!-- Centered title with h1 -->
          <h1 class="modal-title text-center flex-grow-1 fw-bold" id="consultDoctorModalLabel">
            Consult Your Doctor
          </h1>
          <!-- Right side: close button -->
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      </div>

      <div class="modal-body">
        <div class="container">
          <div class="row mb-4">
            <div class="col-lg-12">
              <h2>Discuss Your Health Goals</h2>
              <p>It’s important to share your health goals with your doctor before starting any new dietary or exercise program. Your doctor understands your medical history and current health status, which allows them to provide personalized advice and monitor your progress.</p>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-lg-12">
              <h2>Monitor Your Progress</h2>
              <p>As you implement these changes, your doctor can help track your progress, make adjustments, and ensure that the approach is both safe and effective. Regular check-ins allow your doctor to modify medications or treatments as needed to align with your health journey.</p>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-lg-12">
              <h2>Safety First</h2>
              <p>By consulting your healthcare provider, you can avoid potential risks and ensure that any adjustments to your diet, exercise, or medication are suitable for your condition. This partnership is key to achieving long-term success in reaching your health goals.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->





<!-- Modal - Low Carb -->
<div class="modal fade" id="lowcarb" tabindex="-1" aria-labelledby="lowcarbModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <div class="d-flex w-100 justify-content-between align-items-center">
          <!-- Left side: logo -->
          <div>
            <img src="gauge.png" style="width:60px;" class="img-fluid" alt="Fizo Score">
          </div>
          <!-- Centered title with bold text -->
          <h1 class="modal-title text-center flex-grow-1 fw-bold" id="lowcarbModalLabel">
            Adopt a Low Carb Lifestyle
          </h1>
          <!-- Right side: close button -->
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      </div>

      <div class="modal-body">
        <div class="container">
          
          <!-- Section for Keto Diet -->
          <div class="row align-items-center mb-4">
            <div class="col-lg-6">
              <h2>Keto Diet</h2>
              <p>The ketogenic diet (Keto) is a high-fat, moderate-protein, and very low-carb diet. By drastically reducing carbohydrate intake and replacing it with fat, your body enters a state of ketosis, where it burns fat for fuel. This diet is effective for weight loss, improving insulin sensitivity, and enhancing mental focus.</p>
            </div>
            <div class="col-lg-6 text-center">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?si=yvZafzhv6UBfg8-5&amp;list=PLRqeJ_bauYBIVYhhPMlgpQQjtlaDHBFww" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

            </div>
          </div>
<hr>
          <!-- Section for Ketovore Diet -->
          <div class="row align-items-center mb-4">
            <div class="col-lg-6">
              <h2>Ketovore Diet</h2>
              <p>The Ketovore diet is a combination of keto and carnivore diets. It focuses primarily on animal-based foods like meat, eggs, and dairy while keeping carbs very low. This diet allows for more flexibility compared to a strict carnivore diet, but it still promotes ketosis and fat-burning by limiting carb intake.</p>
            </div>
            <div class="col-lg-6 text-center">
              <iframe width="100%" height="300" src="https://www.youtube.com/embed/R8K87_6PJr0?si=4IRSeM1BuFGVmYg7" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>
<hr>
          <!-- Section for Carnivore Diet -->
          <div class="row align-items-center mb-4">
            <div class="col-lg-6">
              <h2>Carnivore Diet</h2>
              <p>The Carnivore diet is a strict elimination diet that involves eating only animal-based products like meat, fish, eggs, and some dairy. It eliminates all plant-based foods, which can reduce inflammation, improve digestion, and support mental clarity. The diet is known for its simplicity and effectiveness in weight loss and healing various chronic conditions.</p>
            </div>
            <div class="col-lg-6 text-center">
              <iframe width="100%" height="300" src="https://www.youtube.com/embed/e56gVwMFVPw?si=WG9ajgDfO7G3JSPL" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
          </div>
<hr>
          <!-- Section for Vegan Keto Diet -->
          <div class="row align-items-center mb-4">
            <div class="col-lg-6">
              <h2>Vegan Keto Diet</h2>
              <p>The Vegan Keto diet is a plant-based version of the ketogenic diet. It excludes all animal products and focuses on high-fat, low-carb plant-based foods like avocados, nuts, seeds, and oils. This diet can be challenging but is beneficial for those seeking to combine the health benefits of both veganism and keto for weight loss, improved brain function, and metabolic health.</p>
            </div>
            <div class="col-lg-6 text-center">
              <iframe width="100%" height="300" src="https://www.youtube.com/embed/8LVoIwXttpw?si=rnMs_WdpYnTbkFTb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>
<hr>
          <!-- Section for Vegetarian Keto Diet -->
          <div class="row align-items-center mb-4">
            <div class="col-lg-6">
              <h2>Vegetarian Keto Diet</h2>
              <p>The Vegetarian Keto diet is similar to the standard keto diet but excludes meat. It focuses on high-fat, low-carb vegetarian foods like eggs, dairy, nuts, seeds, and healthy oils. This diet offers the benefits of ketosis, such as fat loss and improved energy, while aligning with a vegetarian lifestyle.</p>
            </div>
            <div class="col-lg-6 text-center">
              <iframe width="100%" height="300" src="https://www.youtube.com/embed/X1QGdn408Qw?si=-Fn7-3RrZvR6j_D0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>

        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->

<!-- Modal - Diets -->
<div class="modal fade" id="diets" tabindex="-1" aria-labelledby="dietsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <div class="d-flex w-100 justify-content-between align-items-center">
          <!-- Left side: logo -->
          <div>
            <img src="gauge.png" style="width:60px;" class="img-fluid" alt="Fizo Score">
          </div>
          <!-- Centered title with bold text -->
          <h1 class="modal-title text-center flex-grow-1 fw-bold" id="dietsModalLabel">
            Comparison of Low Carb Diets
          </h1>
          <!-- Right side: close button -->
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      </div>

      <div class="modal-body">
        <div class="container">

          <!-- Section for Low-Carb Diet -->
          <div class="row mb-4">
            <div class="col-lg-12">
              <h2>Low-Carb Diet</h2>
              <p>This diet reduces carbohydrate intake but doesn't necessarily put you into ketosis. People typically consume <strong>50-150 grams of carbs per day</strong>. The focus is on reducing starchy foods like bread, pasta, and sugar, and increasing the intake of proteins and healthy fats. This diet can improve blood sugar levels and aid in weight loss, but isn't as strict as a ketogenic diet.</p>
            </div>
          </div>
          <hr>

          <!-- Section for Ketogenic Diet -->
          <div class="row mb-4">
            <div class="col-lg-12">
              <h2>Ketogenic (Keto) Diet</h2>
              <p>The ketogenic diet is much stricter about carb intake, generally limiting carbs to around <strong>20-50 grams per day</strong> to induce ketosis. In ketosis, the body shifts from burning glucose to burning fats for energy. It emphasizes high-fat, moderate protein, and very low carbohydrates, commonly used for weight loss and improving mental clarity.</p>
            </div>
          </div>
          <hr>

          <!-- Section for Ketovore Diet -->
          <div class="row mb-4">
            <div class="col-lg-12">
              <h2>Ketovore Diet</h2>
              <p>Ketovore is a hybrid between the ketogenic and carnivore diets. It’s a meat-based ketogenic diet where most food comes from animal products, but some low-carb vegetables may still be included. The carb intake typically stays at <strong>very low levels, below 20 grams per day</strong>. The focus remains on maintaining ketosis while improving digestion and reducing inflammation by limiting plant-based foods.</p>
            </div>
          </div>
          <hr>

          <!-- Section for Carnivore Diet -->
          <div class="row mb-4">
            <div class="col-lg-12">
              <h2>Carnivore Diet</h2>
              <p>The carnivore diet is the most restrictive, consisting only of animal-based foods like meat, fish, eggs, and dairy. It eliminates all plant-based foods and has <strong>virtually zero carbs</strong>. Because it’s naturally ketogenic, it promotes fat burning and is known for simplicity, weight loss, and claims of improved gut health.</p>
            </div>
          </div>

        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->




<!-- Modal - HIIT -->
<div class="modal fade" id="hiit" tabindex="-1" aria-labelledby="hiitModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <div class="d-flex w-100 justify-content-between align-items-center">
          <!-- Left side: logo -->
          <div>
            <img src="gauge.png" style="width:60px;" class="img-fluid" alt="Fizo Score">
          </div>
          <!-- Centered title with h1 -->
          <h1 class="modal-title text-center flex-grow-1 fw-bold" id="hiitModalLabel">
            High-Intensity Interval Training (HIIT)
          </h1>
          <!-- Right side: close button -->
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      </div>

      <div class="modal-body">
        <div class="container">
          
          <!-- Explanation of HIIT -->
          <div class="row align-items-center mb-4">
            <div class="col-lg-6">
              <h2>What is HIIT?</h2>
              <p>HIIT exercises are high-intensity, short-duration exercises that produce a high spike in growth hormone and offer many other benefits. HIIT sessions take less time than traditional workouts and are very effective in promoting fat loss and muscle growth.</p>
              <p>Typically, during HIIT, you exercise intensely for about 30-60 seconds, followed by 1-5 minutes of rest. You repeat this cycle 3-7 times per workout and usually do HIIT 1-3 times per week. The key to HIIT is intensity, but proper recovery between intervals is crucial to optimize results.</p>


  <h2>Can walking be used for HIIT?</h2>
  <p>Yes, walking can be incorporated into a modified version of HIIT. While traditional HIIT exercises are usually high-intensity, walking can be adapted by alternating between faster-paced walking (brisk walking) and slower-paced walking (active recovery). This approach is especially helpful for beginners or individuals who prefer lower-impact exercises.</p>

  <h3>How to Do HIIT with Walking:</h3>
  <ul>
    <li><strong>Warm-up:</strong> Start with a 5-minute slow, steady walk.</li>
    <li><strong>High-Intensity Phase:</strong> Walk briskly or speed-walk for 30-60 seconds, aiming for a fast pace.</li>
    <li><strong>Recovery Phase:</strong> Slow down to a more comfortable pace for 1-2 minutes.</li>
    <li><strong>Repeat:</strong> Perform 4-6 intervals of brisk walking followed by slower recovery walking.</li>
    <li><strong>Cool down:</strong> Finish with a 5-minute slow, steady walk.</li>
  </ul>

  <h3>Benefits of HIIT with Walking:</h3>
  <ul>
    <li>Easier on the joints and suitable for all fitness levels.</li>
    <li>Helps improve cardiovascular health, burn calories, and increase endurance.</li>
    <li>Can be done outdoors or on a treadmill.</li>
  </ul>





            </div>
            <div class="col-lg-6 text-center">
              <iframe width="100%" height="300" src="https://www.youtube.com/embed/_eB3z1mhlBw?si=tijVAyt3nD6PNmYs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
          </div>

          <!-- HIIT Cautions -->
          <div class="row mb-4">
            <div class="col-lg-12">
              <h2>HIIT Cautions</h2>
              <p>Before engaging in HIIT, keep these precautions in mind to avoid injury or overtraining:</p>
              <ul>
                <li>Don’t overtrain</li>
                <li>Don’t do HIIT if you have injuries</li>
                <li>Don’t do HIIT if you have poor recovery</li>
                <li>Don’t do HIIT if you have heart problems</li>
              </ul>
              <p>Always ensure you're allowing enough recovery time between intervals and between workout sessions, especially when you're starting out.</p>
            </div>
          </div>

          <!-- Great HIIT Exercises -->
          <div class="row mb-4">
            <div class="col-lg-12">
              <h2>Great HIIT Exercises</h2>
              <ul>
                <li>Plyometrics</li>
                <li>Jump rope</li>
                <li>Burpees</li>
                <li>Kickboxing</li>
                <li>Spin bike</li>
                <li>Kettlebell</li>
                <li>Bulgarian bag</li>
                <li>Crossfit</li>
                <li>Cross-country skiing</li>
                <li>Push-ups/sit-ups</li>
                <li>Jumping jacks</li>
                <li>Mountain climbers</li>
              </ul>
            </div>
          </div>

          <!-- Sprinting: The #1 Best HIIT Exercise -->
          <div class="row mb-4">
            <div class="col-lg-12">
              <h2>Sprinting: The #1 Best HIIT Exercise</h2>
              <p>Sprinting, even on a treadmill, is one of the most effective HIIT exercises for burning fat and building strength. Here’s how to perform sprints for optimal fat loss:</p>
              <ul>
                <li>Sprint as fast as you can for 15-30 seconds</li>
                <li>Rest for 2-4 minutes</li>
                <li>Repeat 4-6 sprints per workout</li>
                <li>Do this twice per week</li>
              </ul>
<p><strong>Disclaimer:</strong> Always consult with a licensed medical provider before starting any new exercise program, especially if you have any underlying health conditions, injuries, or concerns. HIIT exercises are high intensity and may not be suitable for everyone. A healthcare professional can help determine if HIIT is appropriate for your specific health needs.</p>

            </div>
          </div>

        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->



<!-- Modal - Sleep -->
<div class="modal fade" id="sleep" tabindex="-1" aria-labelledby="sleepModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <div class="d-flex w-100 justify-content-between align-items-center">
          <!-- Left side: logo -->
          <div>
            <img src="gauge.png" style="width:60px;" class="img-fluid" alt="Fizo Score">
          </div>
          <!-- Centered title with h1 -->
          <h1 class="modal-title text-center flex-grow-1 fw-bold" id="sleepModalLabel">
            The Importance of Sleep
          </h1>
          <!-- Right side: close button -->
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      </div>

      <div class="modal-body">
        <div class="container">
          
          <!-- Explanation of Sleep -->
          <div class="row align-items-start mb-4">
            <div class="col-lg-6">
              <h2>Why Sleep Matters</h2>
              <p>Getting quality sleep is vital for mental and physical health. Sleep plays a key role in recovery, cognitive function, mood regulation, and overall well-being. It helps repair muscles, balances hormones, and strengthens the immune system.</p>
              <p>Experts recommend 7-9 hours of sleep per night for adults, but individual needs may vary. Establishing a consistent sleep schedule and creating a restful environment can help improve sleep quality.</p>

              <h3>Tips for Better Sleep:</h3>
              <ul>
                <li>Stick to a sleep schedule, even on weekends.</li>
                <li>Create a relaxing bedtime routine.</li>
                <li>Limit screen time before bed.</li>
                <li>Keep the bedroom cool, dark, and quiet.</li>
                <li>Avoid caffeine and heavy meals close to bedtime.</li>
              </ul>
              
              <h2>Sleep Apnea</h2>
              <p>Sleep apnea is a serious sleep disorder where breathing repeatedly stops and starts during sleep. It can lead to fatigue, heart problems, and other health issues.</p>
              <h3>Lifestyle Modifications for Sleep Apnea:</h3>
              <ul>
                <li><strong>Weight Loss:</strong> Losing weight can significantly reduce the severity of obstructive sleep apnea by decreasing the pressure on the airway.</li>
                <li><strong>Exercise:</strong> Regular physical activity helps improve overall sleep quality and can reduce sleep apnea symptoms, even in the absence of significant weight loss.</li>
                <li><strong>Avoid Alcohol and Smoking:</strong> Both can worsen sleep apnea by relaxing the muscles that control your airway.</li>
                <li><strong>Sleep Position:</strong> Sleeping on your side rather than your back can help prevent airway obstruction during sleep.</li>
              </ul>
              <h2>Sleep Cautions</h2>
              <p>If you experience sleep disorders such as insomnia, sleep apnea, or excessive daytime sleepiness, consult with a healthcare provider for proper evaluation and treatment. Lifestyle modifications can help manage sleep apnea, but medical intervention may be necessary in more severe cases.</p>
            </div>
            <div class="col-lg-6 text-center">
              <iframe width="100%" height="315" src="https://www.youtube.com/embed/iS2p52Z78jE?si=ssK8XReHkZpHyrTu" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
              <br><br>
              <iframe width="100%" height="315" src="https://www.youtube.com/embed/qMjuUsizAqg?si=X9w2YXsfZQXLFsva" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
              
            </div>
          </div>

        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->






<!-- Modal - Intermittent Fasting -->
<div class="modal fade" id="intermittentFasting" tabindex="-1" aria-labelledby="intermittentFastingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <div class="d-flex w-100 justify-content-between align-items-center">
          <!-- Left side: logo -->
          <div>
            <img src="gauge.png" style="width:60px;" class="img-fluid" alt="Fizo Score">
          </div>
          <!-- Centered title with h1 -->
          <h1 class="modal-title text-center flex-grow-1 fw-bold" id="intermittentFastingModalLabel">
            Intermittent Fasting
          </h1>
          <!-- Right side: close button -->
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      </div>

      <div class="modal-body">
        <div class="container">
          
          <!-- Explanation of Intermittent Fasting -->
          <div class="row align-items-center mb-4">
            <div class="col-lg-6">
              <h2>What is Intermittent Fasting?</h2>
              <p>Intermittent fasting (IF) is an eating pattern that alternates between periods of eating and fasting. Instead of focusing on what you eat, intermittent fasting focuses on when you eat. This approach can help regulate blood sugar, promote fat loss, and improve mental clarity. It’s a simple but effective tool to enhance metabolic health and prevent or reverse chronic diseases such as diabetes and heart disease.</p>
            </div>
            <div class="col-lg-6 text-center">
              <iframe width="100%" height="500" src="https://www.youtube.com/embed/OiGg4Fk1PGY?si=RytA18_pr5Yo3xte" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
          </div>

          <!-- Section for Benefits of Intermittent Fasting -->
          <div class="row mb-4">
            <div class="col-lg-12">
              <h2>Benefits of Intermittent Fasting</h2>
              <p>Intermittent fasting offers several health benefits, including:</p>
              <ul>
                <li>Improved insulin sensitivity</li>
                <li>Enhanced fat burning and weight loss</li>
                <li>Better mental focus and clarity</li>
                <li>Reduction in inflammation</li>
                <li>Improved heart health</li>
              </ul>
            </div>
          </div>

          <!-- Section for Popular Methods of Intermittent Fasting -->
          <div class="row mb-4">
            <div class="col-lg-12">
              <h2>Popular Intermittent Fasting Methods</h2>
              <p>There are several ways to practice intermittent fasting. Here are some of the most popular methods:</p>
              <ul>
                <li><strong>16/8 Method</strong>: Fast for 16 hours and eat within an 8-hour window.</li>
                <li><strong>5:2 Diet</strong>: Eat normally for 5 days, and on 2 non-consecutive days, reduce calorie intake to about 500–600 calories.</li>
                <li><strong>Eat-Stop-Eat</strong>: Fast for 24 hours once or twice a week.</li>
                <li><strong>Alternate-Day Fasting</strong>: Alternate between normal eating days and fasting days.</li>
              </ul>
            </div>
          </div>

        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->






<!-- Modal - Eliminate -->
<div class="modal fade" id="eliminate" tabindex="-1" aria-labelledby="eliminateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <div class="d-flex w-100 justify-content-between align-items-center">
          <!-- Left side: logo -->
          <div>
            <img src="gauge.png" style="width:60px;" class="img-fluid" alt="Fizo Score">
          </div>
          <!-- Centered title with bold text -->
          <h1 class="modal-title text-center flex-grow-1 fw-bold" id="eliminateModalLabel">
            Remove Sugars, Grains & Seed Oils From Your Diet
          </h1>
          <!-- Right side: close button -->
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      </div>

      <div class="modal-body">
        <div class="container">
          
          <!-- Section for Sugars -->
          <div class="row align-items-center mb-4">
            <div class="col-lg-6">
              <h2>Why Sugars Are Harmful</h2>
              <p>Excessive sugar consumption leads to insulin resistance, spikes in blood sugar, and weight gain. It increases the risk of developing type 2 diabetes and contributes to chronic inflammation, which can damage your metabolic health over time.</p>
            </div>
            <div class="col-lg-6 text-center">
              <iframe height="300" width="100%" height="300"" src="https://www.youtube.com/embed/zFMBdyYLSf4?si=pQDsL1xM9OcVxivY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
          </div>
<hr>
          <!-- Section for Grains -->
          <div class="row align-items-center mb-4">
            <div class="col-lg-6">
              <h2>Why Grains Are Harmful</h2>
              <p>Grains, especially refined grains, are quickly broken down into sugars in the body. This can lead to blood sugar spikes, promote insulin resistance, and contribute to weight gain. Many grains also contain gluten, which can cause inflammation and digestive issues in sensitive individuals.</p>
            </div>
            <div class="col-lg-6 text-center">
              <iframe height="300" width="100%" height="300"" src="https://www.youtube.com/embed/bkrCbM1UvuU?si=_vEUVJSCWoyFOS40" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
          </div>
<hr>
          <!-- Section for Seed Oils -->
          <div class="row align-items-center mb-4">
            <div class="col-lg-6">
              <h2>Why Seed Oils Are Harmful</h2>
              <p>Many common seed oils, such as soybean, corn, and canola oil, are highly processed and rich in omega-6 fatty acids, which can lead to inflammation and oxidative stress in the body. These oils are often found in processed foods and contribute to an imbalanced ratio of omega-6 to omega-3 fatty acids, which is detrimental to your overall health.</p>
<table class="table table-bordered">              
<tr>
<td><h3>Bad Seed Oils to Avoid</h3>
<ul>
                <li>Soybean Oil</li>
                <li>Corn Oil</li>
                <li>Canola Oil</li>
                <li>Sunflower Oil</li>
                <li>Safflower Oil</li>
                <li>Grapeseed Oil</li>
                <li>Cottonseed Oil</li>
              </ul></td>
<td><h3>Healthier Alternatives</h3>
              <ul>
                <li>Butter</li>
                <li>Ghee</li>
                <li>Lard</li>
                <li>Tallow</li>
                <li>Olive Oil</li>
                <li>Avocado Oil</li>
                <li>Coconut Oil</li>
              </ul></td>
</tr>
</table>
            </div>
            <div class="col-lg-6 text-center">
              <iframe height="300" width="100%" height="300"" src="https://www.youtube.com/embed/wPlHuXYI8v0?si=aVmzzLeWZ3FAFiGc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
          </div>

        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->



<!-- Modals for INPUT BAR -->

<!-- Weight -->
<!-- Modal -->
<div class="modal fade" id="weight" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter New Weight</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Weight Form
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!--/Weight -->

<!-- BP -->
<!-- Modal -->
<div class="modal fade" id="bp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Blood Pressure</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        BP Form
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- /BP -->

<!-- Waist -->
<!-- Modal -->
<div class="modal fade" id="waist" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Waist</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Waist Input Form
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- /Waist -->

<!-- Labs -->
<!-- Modal -->
<div class="modal fade" id="labs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- /Labs -->

<!-- /Modals for INPUT BAR -->

</body>
</html>
