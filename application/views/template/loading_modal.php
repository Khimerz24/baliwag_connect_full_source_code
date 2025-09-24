<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Loader Example</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/css/bootstrap.min.css">
<style>
  .loader-modal .modal-dialog {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
  }
  .loader {
    display: flex;
    flex-direction: column;
    align-items: center;
    background: #333;
    padding: 1.5rem 2rem;
    border-radius: 8px;
    color: #fff;
  }
  .icon {
    height: 4rem;
    width: 4rem;
    animation: spin 1s linear infinite;
    stroke: #fff;
    margin-bottom: 0.5rem;
  }
  .loading-text {
    font-size: 0.9rem;
    font-weight: 500;
  }
  @keyframes spin {
    to { transform: rotate(360deg); }
  }
</style>
</head>
<body>

<div class="modal fade loader-modal" id="loader" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm" role="document">
    <div class="loader" role="status" aria-label="Loading...">
      <svg class="icon" viewBox="0 0 256 256">
        <line x1="128" y1="32" x2="128" y2="64" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
        <line x1="195.9" y1="60.1" x2="173.3" y2="82.7" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
        <line x1="224" y1="128" x2="192" y2="128" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
        <line x1="195.9" y1="195.9" x2="173.3" y2="173.3" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
        <line x1="128" y1="224" x2="128" y2="192" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
        <line x1="60.1" y1="195.9" x2="82.7" y2="173.3" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
        <line x1="32" y1="128" x2="64" y2="128" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
        <line x1="60.1" y1="60.1" x2="82.7" y2="82.7" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
      </svg>
      <span class="loading-text">Loading...</span>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
<script>
  // Show loader
  function showLoader() {
    $('#loader').modal('show');
  }
  // Hide loader
  function hideLoader() {
    $('#loader').modal('hide');
  }

  // Example usage:
  // showLoader();
  // setTimeout(hideLoader, 3000); // hides after 3 seconds
</script>

</body>
</html>
