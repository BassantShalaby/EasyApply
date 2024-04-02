<?php
loadPartial("head");
loadPartial("spinner");
loadPartial("navbar");
?>
<!-- Header End -->
<div class="py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Category</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Category</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->


<!-- Category Start -->
<div class="py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
        <div class="row g-4">
            <?php foreach($categories as $category): ?>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <a class="cat-item rounded p-4" href="/category/show?id=<?= $category['id'] ?>">
                    <i class="fa fa-3x fa-hands-helping text-primary mb-4"></i>
                    <h6 class="mb-3"><?= $category['name'] ?></h6>
                    <p class="mb-0">123 Vacancy</p>
                </a>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- Category End -->

<?php
loadPartial("footer");
loadPartial("back-to-top");
loadPartial("jslinks");
?>