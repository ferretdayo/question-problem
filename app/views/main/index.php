<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset='utf-8'>
		<meta name="keywords" content="">
		<meta name="description" content="">
		<title></title>
		<link rel="stylesheet" href="<?php echo url('/');?>/css/foundation.css" />
		<script src="<?php echo url('/');?>/js/vendor/modernizr.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo url('/');?>/js/function.js"></script>
		<script type="text/javascript" src="<?php echo url('/');?>/js/custom.js"></script>
	</head>
	<body>
		<nav class="top-bar" data-topbar role="navigation">
			<!-- if window size small -->
			<ul class="title-area">
				<li class="name">
					<h1><a href="./main.html"></a></h1>
				</li>
				<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
			</ul>
			<!-- navigation bar -->
			<section class="top-bar-section">
				<ul class="left">
					<li class="divider"></li>
					<li><a href="<?php echo url('/');?>">&nbsp;&nbsp;&nbsp;Home&nbsp;&nbsp;&nbsp;</a></li>
					<li class="divider"></li>
					<li class="has-dropdown">
						<a href="#">&nbsp;&nbsp;&nbsp;○○学部&nbsp;&nbsp;&nbsp;</a>
						<ul class="dropdown">
							<li class="divider"></li>
							<li><a href="<?php echo url('./info_grade/1');?>">1年生授業</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo url('./info_grade/2');?>">2年生授業</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo url('./info_grade/3');?>">3年生授業</a></li>
							<li class="divider"></li>
						</ul>
					</li>
					<li class="divider"></li>
				</ul>
				<ul class="right">
					<li class="divider"></li>
					<li><a href="#" data-reveal-id="Contribute">&nbsp;&nbsp;&nbsp;投稿&nbsp;&nbsp;&nbsp;</a></li>
					<li class="divider"></li>
				</ul>
			</section>
		</nav>
		<!-- Contribute Modal , user upload file -->
		<div id="Contribute" class="reveal-modal" data-reveal>
			<form action="" method="post" data-abide>
				<div class="row">
					<!-- choose grade -->
					<div class="large-12 columns">
						<label>[必須]学年
							<select name="grade" id="grade">
								<option value="1">1年</option>
								<option value="2">2年</option>
								<option value="3">3年</option>
							</select>
						</label>
					</div>
					<!-- choose faculty -->
					<div class="large-12 columns">
						<label>[必須]科目
							<select name="subject" id="subject">
								<!-- 科目を代入 -->
							</select>
						</label>
					</div>
					<!-- category -->
					<div class="large-12 columns">
						<label>[必須]カテゴリー
							<select name="category">
								<option value="0">出題</option>
								<option value="1">質問</option>
							</select>
						</label>
					</div>
					<!-- deside title -->
					<div class="large-12 columns">
						<label>[必須]タイトル
							<input type="text" value="" name="title" required>
						</label>
						<small class="error">Please write the title.</small>
					</div>
					<!-- problem or question -->
					<div class="large-12 columns">
						<label>[必須]内容
							<textarea name="content" required></textarea>
						</label>
						<small class="error">Please write the content.</small>
					</div>
					<!-- submit -->
					<div class="large-12 columns">
						<label>
							<input type='submit' class="button expand" value="提出" name='submit'>
						</label>
					</div>
					<a class="close-reveal-modal">&#215;</a>
				</div>
			</form>
		</div>
		<!-- Hometext -->
		<div class="row">
			<div class="large-3 columns">&nbsp;</div>
			<div class="large-9 columns">
				<h1>出題or質問サイト</h1>
			</div>
		</div>
		<div class="row">
			<!-- side menu -->
			<div class="large-3 columns">
				ʅ(‾◡◝)ʃ
			</div>
			<!-- article -->
			<div class="large-9 columns">
				<div class="article">
					<?php foreach($data as $post){ ?>
					<script>
						var id = '<?php echo $post->id ?>';
						var title = '<?php echo $post->title ?>';
						var subject = '<?php echo $post->subject ?>';
						var grade = '<?php echo $post->grade ?>';
						var category = '<?php echo $post->category ?>';
						var content = <?php echo json_encode(str_replace("\n","<br>",$post->content)) ?>;
						var date = '<?php echo $post->date ?>';
						var data = [grade,subject,category,content,date,title,id];
						show_article(data,'<?php echo url('/');?>');
					</script>
					<?php } ?>
				</div>
				<!-- paginator -->
				<div class="pagination-centered">
					<?php echo $data->links();?>
				</div>
			</div>
		</div>
		<script> subject_select(1); </script>
		<script src="<?php echo url('/');?>/js/vendor/jquery.js"></script>
		<script src="<?php echo url('/');?>/js/foundation.min.js"></script>
		<script>
			$(document).foundation();
		</script>
	</body>
</html>