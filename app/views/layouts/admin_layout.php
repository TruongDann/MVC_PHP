<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php
$this->render('blocks/admin/header')
?>

<body class="g-sidenav-show  bg-gray-100">
    <?
    $this->render('blocks/admin/sidenav')
    ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

        <?php
        $this->render('blocks/admin/navbar', $sub_content)
        ?>
        <div class="container-fluid py-4">
            <?php
            $this->render($content, $sub_content);
           
            
            ?>
            <?php
            $this->render('blocks/admin/footer')
            ?>
        </div>
    </main>
    <?php
    $this->render('blocks/admin/setting')
    ?>
    <?php
    $this->render('blocks/admin/script')
    ?>
</body>

</html>