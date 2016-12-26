<?php get_header(); ?>
<section id="about" class="s_about bg_light">
	<div class="section_header">
		<h2><?php echo get_cat_name(5)?></h2>
		<div class="s_descr_wrap">
			<div class="s_descr"><?php echo category_description(5)?></div>
		</div>
	</div>
	<div class="section_content">
		<div class="container">
			<div class="row">
				<?php if (have_posts()) : query_posts('p=10')?>
				<div class="col-md-4 col-md-push-4 animation_1">
					<?php while (have_posts()) : the_post();?>
					<h3><?php the_title()?></h3>
					<div class="person">
						<a href="<?php echo get_the_post_thumbnail_url($post->ID);?>" class="popup"><img src="<?php echo get_the_post_thumbnail_url($post->ID);?>" alt="<?php echo get_bloginfo('name')?>" /></a>
					</div>
					<?php endwhile; ?>
				</div>
				<?php endif; wp_reset_query();?>

				<?php if (have_posts()) : query_posts('p=8')?>
				<div class="col-md-4 col-md-pull-4 animation_2">
					<?php while (have_posts()) : the_post();?>
					<h3><?php the_title();?></h3>
					<?php the_content();?>
					<?php endwhile; ?>
				</div>
				<?php endif; wp_reset_query();?>

				<?php if (have_posts()) : query_posts('p=13')?>
				<div class="col-md-4 animation_3 personal_last_block">
					<?php while (have_posts()) : the_post();?>
					<h3><?php the_title();?></h3>
						<?php the_content();?>
						<?php dynamic_sidebar('social')?>
					<?php endwhile; ?>
				</div>
				<?php endif; wp_reset_query();?>
			</div>
		</div>
	</div>

</section>

<section id="resume" class="s_resume">
	<div class="section_header">
		<h2><?php echo get_cat_name(6)?></h2>
		<div class="s_descr_wrap">
			<div class="s_descr"><?php echo category_description(6)?></div>
		</div>
	</div>
	<div class="section_content">
		<div class="container">
			<div class="row">
				<div class="resume_container">
					<?php if (have_posts()) : query_posts('cat=7')?>
					<div class="col-md-6 col-sm-6 left">
						<h3><?php echo get_cat_name(7)?></h3>
						<div class="resume_icon"><i class="icon-basic-case"></i></div>
						<?php while (have_posts()) : the_post();?>
						<div class="resume_item">
							<div class="year"><?php echo get_post_meta($post->ID, 'period', true)?></div>
							<div class="resume_description"><?php the_title();?><strong><?php echo get_post_meta($post->ID, 'profession', true)?></strong></div>
							<?php the_content();?>
						</div>
						<?php endwhile; ?>
					</div>
					<?php endif; wp_reset_query();?>

					<?php if (have_posts()) : query_posts('cat=8')?>
					<div class="col-md-6 col-sm-6 right">
						<h3><?php echo get_cat_name(8)?></h3>
						<div class="resume_icon"><i class="icon-basic-book-pen"></i></div>
						<?php while (have_posts()) : the_post();?>
						<div class="resume_item">
							<div class="year"><?php echo get_post_meta($post->ID, 'period', true)?></div>
							<div class="resume_description"><strong><?php echo get_post_meta($post->ID, 'profession', true)?></strong><?php the_title();?></div>
							<?php the_content();?>
						</div>
						<?php endwhile; ?>
					</div>
					<?php endif; wp_reset_query();?>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="portfolio" class="s_portfolio bg_dark">
	<div class="section_header">
		<h2><?php echo get_cat_name(9)?></h2>
		<div class="s_descr_wrap">
			<div class="s_descr"><?php echo category_description(9)?></div>
		</div>
	</div>
	<div class="section_content">
		<div class="container">
			<div class="row">
				<?php $categories = get_categories(['child_of' => 9, 'order' => 'DESC']);?>
				<?php if( $categories ) :?>
					<div class="filter_div controls">
						<ul>
							<li class="filter active" data-filter="all">Все работы</li>
							<?php foreach( $categories as $cat ):?>
							<li class="filter" data-filter=".category-<?php echo $cat->cat_ID?>"><?php echo $cat->name?></li>
							<?php endforeach;?>
						</ul>
					</div>
				<?php endif;?>
				<?php if (have_posts()) : query_posts('cat=9')?>
				<div id="portfolio_grid">
					<?php while (have_posts()) : the_post();?>
						<?php $category = get_the_category();?>
					<div class="mix col-md-3 col-sm-6 col-xs-12 portfolio_item category-<?php echo $category[0]->cat_ID?>">
						<img src="<?php echo get_the_post_thumbnail_url($post->ID);?>" alt="<?php echo get_the_post_thumbnail_caption($post->ID);?>" />
						<div class="port_item_cont">
							<h3><?php the_title();?></h3>
							<p>Описание работы</p>
							<a href="#" class="popup_content">Посмотреть</a>
						</div>
						<div class="hidden">
							<div class="podrt_descr">
								<div class="modal-box-content">
									<button class="mfp-close" type="button" title="Закрыть (Esc)">×</button>
									<h3><?php the_title();?></h3>
									<?php the_content();?>
									<img src="<?php echo get_the_post_thumbnail_url($post->ID);?>" alt="Alt" />
								</div>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
			<?php endif; wp_reset_query();?>
		</div>
	</div>
</section>

<section id="contacts" class="s_contacts bg_light">
	<div class="section_header">
		<h2>Контакты</h2>
		<div class="s_descr_wrap">
			<div class="s_descr">Оставьте ваше сообщение</div>
		</div>
	</div>
	<div class="section_content">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="contact_box">
						<div class="contacts_icon icon-basic-geolocalize-05"></div>
						<h3>Адрес:</h3>
						<p>Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне.</p>
					</div>
					<div class="contact_box">
						<div class="contacts_icon icon-basic-smartphone"></div>
						<h3>Телефон:</h3>
						<p>+7 999 999 99 99</p>
					</div>
					<div class="contact_box">
						<div class="contacts_icon icon-basic-webpage-img-txt"></div>
						<h3>Веб-сайт:</h3>
						<p><a href="//webdesign-master.ru" target="_blank">webdesign-master.ru</a></p>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<form action="http://formspree.io/agragregra@ya.ru" class="main_form" novalidate target="_blank" method="post">
						<label class="form-group">
							<span class="color_element">*</span> Ваше имя:
							<input type="text" name="name" placeholder="Ваше имя" data-validation-required-message="Вы не ввели имя" required />
							<span class="help-block text-danger"></span>
						</label>
						<label class="form-group">
							<span class="color_element">*</span> Ваш E-mail:
							<input type="email" name="email" placeholder="Ваш E-mail" data-validation-required-message="Не корректно введен E-mail" required />
							<span class="help-block text-danger"></span>
						</label>
						<label class="form-group">
							<span class="color_element">*</span> Ваше сообщение:
							<textarea name="message" placeholder="Ваше сообщение" data-validation-required-message="Вы не ввели сообщение" required></textarea>
							<span class="help-block text-danger"></span>
						</label>
						<button>Отправить</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_footer();