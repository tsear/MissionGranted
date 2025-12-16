<section class="page-hero">
    <div class="page-hero__container">
        <h1 class="page-hero__title"><?php the_title(); ?></h1>
        <?php if (has_excerpt()) : ?>
        <p class="page-hero__subtitle"><?php the_excerpt(); ?></p>
        <?php endif; ?>
    </div>
</section>
