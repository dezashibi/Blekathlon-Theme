<?php Theme::plugins('pageBegin'); ?>
<div class="content-area site-content main-padding">
	<main class="site-main main-width blog-wrapper" role="main">
		<header class="page-header">
			<!-- Site title -->
			<?php if ($site->slogan()): ?>
			<h1 class="page-title small-margin-bottom text-center text-italic">
				<?php echo $helper->slogan(); ?>
			</h1>
			<?php endif ?>
			<?php if ($site->description()): ?>
			<p class="site-description no-margin-bottom text-center">
				<?php echo $helper->description(); ?>
			</p>
			<?php endif ?>
		</header>
		<?php foreach ($content as $page): ?>
		<article class="home-page hentry">
			<?php $coverImage = $helper->get_thumb();?>
			<div class="entry-header-bg" <?php if(!empty($coverImage)) echo "style=\"background-image:url(".$coverImage .")\""?>>
				<a class="entry-header-bg-link" href="<?php echo $page->permalink() ?>" rel="bookmark">
					<?php if(empty($coverImage)):?>
					<svg class="icon icon-pencil" aria-hidden="true" role="img">
						<use xlink:href="#icon-pencil"></use>
					</svg>
					<?php endif ?>
					<span class="screen-reader-text">
						<?php echo $L->get('Continue reading') . ' ' . $page->title() . PHP_EOL ?>
					</span>
				</a>
			</div>
			<div class="entry-inner">

				<!-- Page title -->
				<header class="entry-header">
					<div class="entry-meta soft-color medium-font-weight smaller-font-size">
						<span class="posted-on">
							<span class="screen-reader-text">Posted on</span>
							<time class="entry-date published" datetime="<?php echo $page->dateRaw('c') ?>">
								<?php echo $page->date() ?>
							</time>
							-
							<i class="soft-color">
							  <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
							    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
							    <g id="SVGRepo_iconCarrier">
							      <path d="M12 7V12H15M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
							    </g>
							  </svg>
							</i>
							<?php echo $L->get('Reading time') . ': ' . $page->readingTime(); ?>
						</span>
					</div>
					<h2 class="entry-title title-font text-italic">
						<a href="<?php echo $page->permalink() ?>" rel="bookmark">
							<?php echo $page->title() ?>
						</a>
					</h2>
				</header>

				<div class="entry-summary">
					<?php if(strlen($page->description())>0 ){
                              echo  $page->description();
                          }
                          else{
                              echo $helper->content2excerpt($page->content(false));
                          }
                    ?>
				</div>

				<div class="entry-comment grid-same-line">
					<a class="more-link underline-link medium-font-weight" href="<?php echo $page->permalink() ?>" role="button">
						<?php echo $L->get('Read more'); ?>
					</a>
				</div>
			</div>
		</article>
		<?php endforeach ?>

		<?php if (Paginator::numberOfPages()>1): ?>

		<nav class="navigation pagination" role="navigation" aria-label="Page navigation">
			<h3 class="screen-reader-text">Posts navigation</h3>
			<div class="nav-links">

				<?php if (Paginator::showPrev()):?>
				<a class="prev page-numbers" href="<?php echo Paginator::previousPageUrl() ?>" tabindex="-1">
					<?php echo $L->get('Previous'); ?>
				</a>
				<?php endif ?>

				<?php
                  //max 9 pages with move
                  $pmax = max(Paginator::currentPage() + 4, 9);
                  $pmin = min(Paginator::currentPage() - 4, Paginator::numberOfPages()-8);
                ?>
				<?php for ($i = max(1, $pmin); $i <= min($pmax,Paginator::numberOfPages()); $i++): ?>
				<?php if(Paginator::currentPage() == $i): ?>
				<span class="page-numbers current">
					<?php echo $i ?>
				</span>
				<?php else: ?>
				<a class="page-numbers" href="<?php echo Paginator::numberUrl($i) ?>">
					<?php echo $i ?>
				</a>
				<?php endif; ?>
				<?php endfor; ?>

				<?php if (Paginator::showNext()):?>
				<a class="next page-numbers" href="<?php echo Paginator::nextPageUrl() ?>">
					<?php echo $L->get('Next'); ?>
				</a>
				<?php endif ?>

			</div>
		</nav>
		<?php endif ?>
		<?php //Theme::plugins('pageEnd'); ?>
	</main>
</div>

