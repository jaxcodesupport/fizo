<?php
session_start();

class HealthCalculator
{
    // Function to calculate age from date of birth
    public function calculateAge($dob)
    {
        $currentDate = time();
        $dobTimestamp = strtotime($dob);
        $ageInSeconds = $currentDate - $dobTimestamp;
        $ageInYears = floor($ageInSeconds / (60 * 60 * 24 * 365));
        return $ageInYears;
    }

    // Function to calculate total height in inches
    public function calculateHeightInches($heightFeet, $heightInches)
    {
        return ($heightFeet * 12) + $heightInches;
    }

    // Function to calculate Waist-to-Height Ratio (WHtR)
    public function calculateWaistToHeightRatio($waist, $height)
    {
        // Ensure the ratio is rounded to 2 decimal places
        return round($waist / $height, 2);
    }

    // Function to calculate FIZO Score based on WHtR using a switch statement
    public function getFizoScore($whtR)
    {
        // Round the WHtR to 2 decimal places
        $whtR = round($whtR, 2);

        switch ($whtR) {
            case 0.20: return 310;
            case 0.21: return 330;
            case 0.22: return 350;
            case 0.23: return 370;
            case 0.24: return 390;
            case 0.25: return 410;
            case 0.26: return 430;
            case 0.27: return 450;
            case 0.28: return 470;
            case 0.29: return 490;
            case 0.30: return 510;
            case 0.31: return 530;
            case 0.32: return 550;
            case 0.33: return 570;
            case 0.34: return 590;
            case 0.35: return 610;
            case 0.36: return 630;
            case 0.37: return 650;
            case 0.38: return 670;
            case 0.39: return 690;
            case 0.40: return 700;
            case 0.41: return 710;
            case 0.42: return 720;
            case 0.43: return 730;
            case 0.44: return 740;
            case 0.45: return 750;
            case 0.46: return 760;
            case 0.47: return 770;
            case 0.48: return 780;
            case 0.49: return 790;
            case 0.50: return 690;
            case 0.51: return 680;
            case 0.52: return 670;
            case 0.53: return 660;
            case 0.54: return 650;
            case 0.55: return 640;
            case 0.56: return 630;
            case 0.57: return 620;
            case 0.58: return 610;
            case 0.59: return 600;
            case 0.60: return 590;
            case 0.61: return 580;
            case 0.62: return 570;
            case 0.63: return 560;
            case 0.64: return 550;
            case 0.65: return 540;
            case 0.66: return 530;
            case 0.67: return 520;
            case 0.68: return 510;
            case 0.69: return 500;
            case 0.70: return 490;
            case 0.71: return 480;
            case 0.72: return 470;
            case 0.73: return 460;
            case 0.74: return 450;
            case 0.75: return 440;
            case 0.76: return 430;
            case 0.77: return 420;
            case 0.78: return 410;
            case 0.79: return 400;
            case 0.80: return 390;
            case 0.81: return 380;
            case 0.82: return 370;
            case 0.83: return 360;
            case 0.84: return 350;
            case 0.85: return 340;
            case 0.86: return 330;
            case 0.87: return 320;
            case 0.88: return 310;
            case 0.89: return 300;
            case 0.90: return 300;
            default: return 300; // Default to 300 if outside defined range
        }
    }

    // Function to adjust FIZO Score based on blood pressure
    public function adjustFizoScoreByBloodPressure($fizoScore, $systolic, $diastolic)
    {
        if ($systolic < 50 || $diastolic < 20) {
            // Dangerously Low: subtract 100 points
            return $fizoScore - 100;
        } elseif (($systolic >= 50 && $systolic <= 69) || ($diastolic >= 20 && $diastolic <= 39)) {
            // Severely Low: subtract 50 points
            return $fizoScore - 50;
        } elseif (($systolic >= 70 && $systolic <= 89) || ($diastolic >= 40 && $diastolic <= 59)) {
            // Low: subtract 20 points
            return $fizoScore - 20;
        } elseif (($systolic >= 90 && $systolic <= 120) && ($diastolic >= 60 && $diastolic <= 80)) {
            // Normal Blood Pressure: add no points
            return $fizoScore;
        } elseif (($systolic >= 121 && $systolic <= 129) && $diastolic <= 80) {
            // Elevated Blood Pressure: subtract 10 points
            return $fizoScore - 10;
        } elseif (($systolic >= 130 && $systolic <= 139) || ($diastolic >= 80 && $diastolic <= 89)) {
            // Hypertension Stage 1: subtract 20 points
            return $fizoScore - 20;
        } elseif (($systolic >= 140 && $systolic <= 179) || ($diastolic >= 90 && $diastolic <= 119)) {
            // Hypertension Stage 2: subtract 50 points
            return $fizoScore - 50;
        } elseif ($systolic >= 180 || $diastolic >= 120) {
            // Hypertensive Crisis: subtract 100 points
            return $fizoScore - 100;
        }

        // No change for other cases
        return $fizoScore;
    }

    // Function to assign a badge based on WHtR
    public function assignBadgeBasedOnWHtR($whtR)
    {
        if ($whtR < 0.50) {
            return [
                'badge' => '<span class="badge" style="background-color:#01cc34;">Good Job</span>',
                'message' => 'Your Waist-to-Height Ratio is in the healthy range. Keep up the good work!'
            ];
        } elseif ($whtR >= 0.50 && $whtR < 0.55) {
            return [
                'badge' => '<span class="badge" style="background-color:#ffcc33;">Borderline</span>',
                'message' => 'Your Waist-to-Height Ratio is borderline. Consider making lifestyle adjustments.'
            ];
        } elseif ($whtR >= 0.55 && $whtR < 0.60) {
            return [
                'badge' => '<span class="badge" style="background-color:#ff6501;">Needs Work</span>',
                'message' => 'Your Waist-to-Height Ratio needs improvement. Start focusing on lifestyle changes.'
            ];
        } elseif ($whtR >= 0.60 && $whtR < 0.65) {
            return [
                'badge' => '<span class="badge" style="background-color:#fe0002;">High</span>',
                'message' => 'Your Waist-to-Height Ratio is high. Immediate changes to diet and exercise are recommended.'
            ];
        } elseif ($whtR >= 0.65 && $whtR < 0.70) {
            return [
                'badge' => '<span class="badge" style="background-color:#fe0002;">Very High</span>',
                'message' => 'Your Waist-to-Height Ratio is very high. Significant health risks are associated with this level.'
            ];
        } else {
            return [
                'badge' => '<span class="badge" style="background-color:#fe0002;">Urgent</span>',
                'message' => 'Urgent attention needed. Consult a healthcare provider immediately to avoid serious health complications.'
            ];
        }
    }

    // Function to classify blood pressure
    public function classifyBloodPressure($systolic, $diastolic)
    {
        if ($systolic >= 180 || $diastolic >= 120) {
            return [
                'badge' => '<span class="badge" style="background-color:#fe0002;">High</span>',
                'message' => '<strong>Hypertensive Crisis:</strong> Seek immediate medical attention or call 911.',
            ];
        } elseif ($systolic >= 140 || $diastolic >= 90) {
            return [
                'badge' => '<span class="badge" style="background-color:#ff6501;">High</span>',
                'message' => 'Your blood pressure is high. Consult your doctor to discuss treatment options.',
            ];
        } elseif ($systolic == 120 && $diastolic == 80) {
            return [
                'badge' => '<span class="badge" style="background-color:#01cc34;">Normal</span>',
                'message' => 'Your blood pressure is within the normal range. Keep maintaining a healthy lifestyle to keep it that way.',
            ];
        } elseif ($systolic > 120 || $diastolic > 80) {
            return [
                'badge' => '<span class="badge" style="background-color:#ffcc33;">Elevated</span>',
                'message' => 'Your blood pressure is slightly elevated. Consider lifestyle changes to lower your blood pressure.',
            ];
        } elseif ($systolic < 90 || $diastolic < 60) {
            return [
                'badge' => '<span class="badge" style="background-color:#fe0002;">Low</span>',
                'message' => '<strong>Low Blood Pressure:</strong> This could indicate hypotension. Please consult your doctor if you are experiencing symptoms like dizziness, fainting, or fatigue.',
            ];
        } else {
            return [
                'badge' => '<span class="badge" style="background-color:#01cc34;">Normal</span>',
                'message' => 'Your blood pressure is in the normal range. Continue maintaining a healthy lifestyle.',
            ];
        }
    }

    // Function to calculate ideal waist size (half the height)
    public function calculateIdealWaist($height)
    {
        return round($height / 2, 1);  // Half of the height in inches
    }

    // Function to get health status based on FIZO Score
    public function getHealthStatus($fizoScore)
    {
        if ($fizoScore >= 800) {
            return [
                'status' => 'Excellent Health',
                'color' => '01cc34',
                'gauge' => 'guages_green.png',
                'analysis' => '<strong>Excellent Health 800-850</strong><br>You are in excellent health with low risk of chronic diseases.'
            ];
        } elseif ($fizoScore >= 740) {
            return [
                'status' => 'Very Good Health',
                'color' => '9bcc35',
                'gauge' => 'guages_yellowishgreen.png',
                'analysis' => '<strong>Very Good Health 740-799</strong><br>Your health indicators are positive, reflecting lower risks for chronic diseases.'
            ];
        } elseif ($fizoScore >= 670) {
            return [
                'status' => 'Good Health',
                'color' => 'ffcc33',
                'gauge' => 'guages_yellow.png',
                'analysis' => '<strong>Good Health 670-739</strong><br>You are in a good health range, reducing your risk for cardiovascular diseases and chronic conditions.'
            ];
        } elseif ($fizoScore >= 580) {
            return [
                'status' => 'Fair Health',
                'color' => 'ff6501',
                'gauge' => 'guages_orange.png',
                'analysis' => '<strong>Fair Health 580-669</strong><br>You are at moderate risk of health issues such as high blood pressure, type 2 diabetes, and heart disease.'
            ];
        } else {
            return [
                'status' => 'Poor Health',
                'color' => 'fe0002',
                'gauge' => 'guages_red.png',
                'analysis' => '<strong>Poor Health 300-579</strong><br>You are at significant risk for serious health conditions. Immediate action is needed.'
            ];
        }
    }
}

// Process form inputs
if ($_POST) {
    $calculator = new HealthCalculator();

    // Capture user inputs
    $dob = $_POST['dob'];
    $_SESSION['dob'] = $dob;
    $_SESSION['gender'] = $_POST['gender'];

    // Calculate and store age
    $age = $calculator->calculateAge($dob);
    $_SESSION['age'] = $age;

    // Capture waist and height inputs
    $waist = $_POST['waist'];
    $_SESSION['waist'] = $waist;
    $heightFeet = $_POST['height_feet'];
    $_SESSION['height_feet'] = $heightFeet;
    $heightInches = $_POST['height_inches'];
    $_SESSION['height_inches'] = $heightInches;

    // Capture blood pressure values
    $systolic = $_POST['systolic'];
    $diastolic = $_POST['diastolic'];
    $_SESSION['systolic'] = $systolic;
    $_SESSION['diastolic'] = $diastolic;

    // Classify blood pressure and store badge
    $bpStatus = $calculator->classifyBloodPressure($systolic, $diastolic);
    $_SESSION['bp_badge'] = $bpStatus['badge'];
    $_SESSION['bp_message'] = $bpStatus['message'];

    // Calculate total height in inches
    $totalHeightInches = $calculator->calculateHeightInches($heightFeet, $heightInches);
    $_SESSION['totalHeightInches'] = $totalHeightInches;

    // Calculate Waist-to-Height Ratio (WHtR)
    $ratio = $calculator->calculateWaistToHeightRatio($waist, $totalHeightInches);
    $_SESSION['WtHrcalculated'] = $ratio;

    // Get FIZO Score based on WHtR
    $fizoScore = $calculator->getFizoScore($ratio);

    // Adjust FIZO Score based on blood pressure
    $adjustedFizoScore = $calculator->adjustFizoScoreByBloodPressure($fizoScore, $systolic, $diastolic);
    $_SESSION['fizo_score'] = round($adjustedFizoScore);

    // Get badge based on WHtR
    $badgeInfo = $calculator->assignBadgeBasedOnWHtR($ratio);
    $_SESSION['fizo_badge'] = $badgeInfo['badge'];
    $_SESSION['fizo_badge_message'] = $badgeInfo['message'];

    // Calculate ideal waist size (half the height)
    $idealWaist = $calculator->calculateIdealWaist($totalHeightInches);
    $_SESSION['ideal_waist'] = $idealWaist;

    // Store weight
    $_SESSION['weight'] = $_POST['weight'];

    // Capture optional inputs: HDL, Triglycerides,  CAC, CRP, HOMA_IR, TC, LDL, Vitamin_D
    $_SESSION['hdl'] = isset($_POST['hdl']) ? $_POST['hdl'] : NULL;
    $_SESSION['triglycerides'] = isset($_POST['triglycerides']) ? $_POST['triglycerides'] : NULL;
    $_SESSION['CAC'] = isset($_POST['CAC']) ? $_POST['CAC'] : NULL;
    $_SESSION['CRP'] = isset($_POST['CRP']) ? $_POST['CRP'] : NULL;
    $_SESSION['HOMA_IR'] = isset($_POST['HOMA_IR']) ? $_POST['HOMA_IR'] : NULL;
    $_SESSION['TC'] = isset($_POST['TC']) ? $_POST['TC'] : NULL;
    $_SESSION['LDL'] = isset($_POST['LDL']) ? $_POST['LDL'] : NULL;
    $_SESSION['Vitamin_D'] = isset($_POST['Vitamin_D']) ? $_POST['Vitamin_D'] : NULL;

// Set default values for A1C and HDL/Triglycerides
$_SESSION['A1C'] = 0;
$_SESSION['A1C_status'] = '';
$_SESSION['A1C_message'] = '';
$_SESSION['A1C_badge'] = '';
$_SESSION['hdl'] = 0;
$_SESSION['triglycerides'] = 0;
$_SESSION['tg_hdl_ratio'] = 0;
$_SESSION['tg_hdl_message'] = '';
$_SESSION['tg_hdl_badge'] = '';
$_SESSION['ldl'] = 0;
$_SESSION['tc'] = 0;
$_SESSION['remnant_cholesterol'] = 0;

// Check if A1C is set and calculate status
if (isset($_POST['A1C'])) {
    $A1C = $_POST['A1C'];
    $_SESSION['A1C'] = $A1C;

    if ($A1C >= 6.5) {
        $_SESSION['A1C_status'] = 'Diabetes';
        $_SESSION['A1C_message'] = '<span class="text-danger">Your A1C level indicates that you have diabetes. Please consult your healthcare provider for further evaluation and management of diabetes.</span>';
        $_SESSION['A1C_badge'] = '<span class="badge" style="background-color:#fe0002;">Diabetes</span>';
    } elseif ($A1C >= 5.7 && $A1C < 6.5) {
        $_SESSION['A1C_status'] = 'Pre-Diabetes';
        $_SESSION['A1C_message'] = '<span class="text-warning">Your A1C level indicates that you are at risk for diabetes (Pre-Diabetes). Consider lifestyle changes to prevent diabetes.</span>';
        $_SESSION['A1C_badge'] = '<span class="badge" style="background-color:#ffcc33;">Pre-Diabetes</span>';
    } else {
        $_SESSION['A1C_status'] = 'Normal';
        $_SESSION['A1C_message'] = '<span class="text-success">Your A1C level is in the normal range, indicating no current risk for diabetes. Keep up the healthy lifestyle to maintain this and prevent diabetes.</span>';
        $_SESSION['A1C_badge'] = '<span class="badge" style="background-color:#01cc34;">Normal</span>';
    }
}

// Check if HDL and Triglycerides are set and calculate the ratio
if (isset($_POST['hdl']) && isset($_POST['triglycerides'])) {
    $HDL = floatval($_POST['hdl']); // Ensure HDL is a float
    $Triglycerides = floatval($_POST['triglycerides']); // Ensure Triglycerides is a float
    $_SESSION['hdl'] = $HDL;
    $_SESSION['triglycerides'] = $Triglycerides;

    // Calculate the Triglycerides-to-HDL ratio
    if ($HDL != 0) { // Prevent division by zero
        $tgToHdlRatio = round($Triglycerides / $HDL, 2);
        $_SESSION['tg_hdl_ratio'] = $tgToHdlRatio;

        // Determine cardiovascular risk based on the TG/HDL ratio and assign badge
        if ($tgToHdlRatio <= 1) {
            $_SESSION['tg_hdl_message'] = '<span class="text-success">Your Triglycerides-to-HDL ratio indicates an excellent cardiovascular risk profile.</span>';
            $_SESSION['tg_hdl_badge'] = '<span class="badge" style="background-color:#01cc34;">Excellent</span>';
        } elseif ($tgToHdlRatio > 1 && $tgToHdlRatio <= 2) {
            $_SESSION['tg_hdl_message'] = '<span class="text-success">Your Triglycerides-to-HDL ratio indicates a good cardiovascular risk profile. Keep up the healthy lifestyle!</span>';
            $_SESSION['tg_hdl_badge'] = '<span class="badge" style="background-color:#ffcc33;">Good</span>';
        } elseif ($tgToHdlRatio > 2 && $tgToHdlRatio <= 4) {
            $_SESSION['tg_hdl_message'] = '<span class="text-warning">Your Triglycerides-to-HDL ratio indicates a moderate cardiovascular risk. Consider lifestyle changes.</span>';
            $_SESSION['tg_hdl_badge'] = '<span class="badge" style="background-color:#ff6501;">Moderate Risk</span>';
        } else {
            $_SESSION['tg_hdl_message'] = '<span class="text-danger">Your Triglycerides-to-HDL ratio indicates a high cardiovascular risk. Please consult your healthcare provider for further evaluation.</span>';
            $_SESSION['tg_hdl_badge'] = '<span class="badge" style="background-color:#fe0002;">High Risk</span>';
        }
    } else {
        // Handle the case where HDL is 0 to avoid division by zero
        $_SESSION['tg_hdl_message'] = '<span class="text-danger">Unable to calculate the ratio. HDL value cannot be zero.</span>';
        $_SESSION['tg_hdl_badge'] = '<span class="badge" style="background-color:#fe0002;">Error</span>';
    }
}

// Check if TC, LDL, and HDL are set and not zero
if (isset($_POST['tc'], $_POST['ldl'], $_POST['hdl'])) {
    $TC = floatval($_POST['tc']);
    $LDL = floatval($_POST['ldl']);
    $HDL = floatval($_POST['hdl']);

    // Store the values in session
    $_SESSION['tc'] = $TC;
    $_SESSION['ldl'] = $LDL;
    $_SESSION['hdl'] = $HDL;

    // Ensure values are not zero before calculating remnant cholesterol
    if ($TC != 0 && $LDL != 0 && $HDL != 0) {
        // Calculate Remnant Cholesterol (TC - LDL - HDL)
        $remnantCholesterol = $TC - $LDL - $HDL;
        $_SESSION['remnant_cholesterol'] = round($remnantCholesterol, 2);

        // Determine health status based on Remnant Cholesterol
        if ($remnantCholesterol < 20) {
            $_SESSION['remnant_message'] = '<span class="text-success">Your Remnant Cholesterol is healthy.</span>';
            $_SESSION['remnant_badge'] = '<span class="badge" style="background-color:#01cc34;">Healthy</span>';
        } else {
            $_SESSION['remnant_message'] = '<span class="text-danger">Your Remnant Cholesterol is above the healthy threshold. Please consult your healthcare provider for further evaluation.</span>';
            $_SESSION['remnant_badge'] = '<span class="badge" style="background-color:#fe0002;">High</span>';
        }
    } else {
        // Handle cases where any of the values are zero
        $_SESSION['remnant_message'] = '<span class="text-warning">Unable to calculate Remnant Cholesterol. Please ensure all values (TC, LDL, HDL) are greater than zero.</span>';
        $_SESSION['remnant_badge'] = '<span class="badge" style="background-color:#ffcc33;">Incomplete</span>';
    }
} else {
    // Handle cases where values are not set
    $_SESSION['remnant_message'] = '<span class="text-warning">Please enter your Total Cholesterol, LDL, and HDL values to calculate Remnant Cholesterol.</span>';
    $_SESSION['remnant_badge'] = '<span class="badge" style="background-color:#ffcc33;">Missing Data</span>';
}




    // Calculate health status based on FIZO score
    $healthStatus = $calculator->getHealthStatus($adjustedFizoScore);
    $_SESSION['fizo_health_status'] = $healthStatus['status'];
    $_SESSION['fizo_score_color'] = $healthStatus['color'];
    $_SESSION['fizo_score_guage'] = $healthStatus['gauge'];
    $_SESSION['fizo_analysis'] = $healthStatus['analysis'];

    // Redirect to the results page after calculations
    header("Location: fizoscore.php");
    exit;
} else {
    // Redirect to index page if no POST data
    header("Location: index.php");
    exit;
}
?>
