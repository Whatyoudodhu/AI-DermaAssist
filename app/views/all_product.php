<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>All Products</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include "header.php"; ?>

<!-- HERO -->
<section class="hero">
    <img src="assets/images/product.jpg" class="hero-bg">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>Elevate Your Skin Care</h1>
        <p>Premium products curated for your skin profile</p>
    </div>
</section>

<section class="page-header">
    <div id="SkincareProduct" class="product-container">
        <h1>SKINCARE PRODUCTS</h1>
    </div>
</section>

<main class="container layout">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <h3>Filter by</h3>

        <h4>Skin Concern</h4>
        <?php foreach ($problems as $pb): ?>
            <a href="?problem=<?= $pb['id'] ?>"><?= $pb['name'] ?></a>
        <?php endforeach; ?>

        <h4>Skin Type</h4>
        <?php foreach ($types as $tp): ?>
            <a href="?type=<?= $tp['id'] ?>"><?= $tp['name'] ?></a>
        <?php endforeach; ?>

        <h4>Skin Tone</h4>
        <?php foreach ($tones as $tn): ?>
            <a href="?tone=<?= $tn['id'] ?>"><?= $tn['name'] ?></a>
        <?php endforeach; ?>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="content" id="productSection">

        <!-- BREADCRUMB -->
        <div class="breadcrumbs">
            <a href="all_product.php#SkincareProduct">Products</a>
            <?php if ($filterName): ?>
                > <a href="all_product.php?<?= $filterType ?>=<?= $_GET[$filterType] ?>"><?= $filterName ?></a>
            <?php endif; ?>
            <?php if ($viewProduct): ?>
                > <span><?= $viewProduct['name'] ?></span>
            <?php endif; ?>
        </div>

        <!-- ── PRODUCT DETAIL VIEW ── -->
        <?php if ($viewProduct): ?>
        <section class="section product-detail">
            <div class="detail-layout">
                <div class="detail-image">
                    <img src="<?= $viewProduct['image_url'] ?>" alt="<?= $viewProduct['name'] ?>">
                </div>
                <div class="detail-info">
                    <h1><?= $viewProduct['name'] ?></h1>
                    <p class="brand">Brand: <strong><?= $viewProduct['brand'] ?></strong></p>
                    <p class="desc"><?= $viewProduct['description'] ?></p>

                    <?php if ($ingredients): ?>
                    <div class="ingredients">
                        <h3>Ingredients</h3>
                        <ul>
                            <?php foreach ($ingredients as $ing): ?>
                                <li><?= $ing ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <?php if ($productUrl): ?>
                        <a href="<?= $productUrl ?>" target="_blank" class="btn">Buy Now</a>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- ── SEARCH RESULTS ── -->
        <?php elseif ($search): ?>
        <section class="section">
            <h2 class="section-title">Search Results for "<?= htmlspecialchars($search) ?>"</h2>
            <div class="product-grid">
                <?php foreach ($filteredProducts as $p): ?>
                    <?php include __DIR__ . '/partials/product_card1.php'; ?>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- ── FILTERED RESULTS ── -->
        <?php elseif ($filteredProducts): ?>
        <div class="product-grid">
            <?php foreach ($filteredProducts as $p): ?>
                <?php include __DIR__ . '/partials/product_card1.php'; ?>
            <?php endforeach; ?>
        </div>

        <!-- ── DEFAULT BROWSE ── -->
        <?php else: ?>

        <!-- Most Loved -->
        <section class="section">
            <h2 class="section-title">Most Loved</h2>
            <div class="product-grid">
                <?php foreach ($popular as $p): ?>
                    <?php include __DIR__ . '/partials/product_card1.php'; ?>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- By Skin Concern -->
        <section class="section">
            <h2 class="section-title">Shop by Skin Concern</h2>
            <?php foreach ($problems as $pb): ?>
                <h4 class="category-title" id="<?= strtolower(str_replace(' ', '-', $pb['name'])) ?>">
                    <?= $pb['name'] ?>
                </h4>
                <div class="product-grid">
                    <?php if (!$productsByProblem[$pb['id']]): ?>
                        <p class="empty">No products found.</p>
                    <?php else: ?>
                        <?php foreach ($productsByProblem[$pb['id']] as $p): ?>
                            <?php include __DIR__ . '/partials/product_card1.php'; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </section>

        <!-- By Skin Type -->
        <section class="section">
            <h2 class="section-title">Shop by Skin Type</h2>
            <?php foreach ($types as $tp): ?>
                <h4 class="category-title" id="<?= strtolower(str_replace(' ', '-', $tp['name'])) ?>">
                    <?= $tp['name'] ?>
                </h4>
                <div class="product-grid">
                    <?php if (!$productsByType[$tp['id']]): ?>
                        <p class="empty">No products found.</p>
                    <?php else: ?>
                        <?php foreach ($productsByType[$tp['id']] as $p): ?>
                            <?php include __DIR__ . '/partials/product_card1.php'; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </section>

        <!-- By Skin Tone -->
        <section class="section">
            <h2 class="section-title">Shop by Skin Tone</h2>
            <?php foreach ($tones as $tn): ?>
                <h4 class="category-title" id="<?= strtolower(str_replace(' ', '-', $tn['name'])) ?>">
                    <?= $tn['name'] ?>
                </h4>
                <div class="product-grid">
                    <?php if (!$productsByTone[$tn['id']]): ?>
                        <p class="empty">No products found.</p>
                    <?php else: ?>
                        <?php foreach ($productsByTone[$tn['id']] as $p): ?>
                            <?php include __DIR__ . '/partials/product_card1.php'; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </section>

        <?php endif; ?>

    </div><!-- .content -->

</main>

<?php include "footer.php"; ?>

<script src="assets/js/all_product.js"></script>

</body>
</html>
