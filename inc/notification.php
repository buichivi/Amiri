<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
    if (isset($_SESSION['notification']) && $_SESSION['notification'] != '') 
    {
?>
    <script>
        Swal.fire({
            position: 'center-center',
            width: 600,
            height: 800,
            imageUrl: 'assets/img/add-to-cart-success.jpg',
            imageWidth: 300,
            imageHeight: 250,
            title: '<h1 class="add-to-cart-success"><?=$_SESSION['notification']?><h1>',
            showConfirmButton: false,
            color: '#000',
            timer: 1500
        })
    </script>
<?php
    unset($_SESSION['notification']);
    }
?>