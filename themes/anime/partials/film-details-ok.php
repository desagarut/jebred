 <!-- Breadcrumb Begin -->
 <!--<div class="breadcrumb-option">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="breadcrumb__links">
                     <a href="<?= base_url() ?>"><i class="fa fa-home"></i> Home</a>
                     <span><?= $article['judul'] ?> Details</span>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Breadcrumb End -->
 <?php $article = $single_artikel ?>
 <!-- Anime Section Begin -->
 <section class="anime-details spad">
     <div class="container">
         <div class="anime__details__content">
             <div class="row">
                 <div class="col-lg-7">
                     <?php $article = $single_artikel ?>

                     <div class="anime__video__player">

                         <?php if ($article['gambar'] && is_file(LOKASI_FOTO_ARTIKEL . 'kecil_' . $article['gambar'])) : ?>
                             <iframe width="100%" height="450px" src="https://www.youtube.com/embed/<?= $article['link_trailer'] ?>" title="<?= $article['judul'] ?>" frameborder="0" allow="accelerometer; 
           autoplay; clipboard-write; encrypted-media; gyroscope; 
           picture-in-picture" allowfullscreen>
                             </iframe>
                         <?php endif ?>
                         <!--<div class="anime__details__pic set-bg" data-setbg="<?= AmbilFotoArtikel($single_artikel['gambar'], 'sedang') ?>">
                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                            <div class="view"><i class="fa fa-eye"></i> <?= $article['hit'] ?></div>
                        </div>-->
                     </div>
                 </div>
                 <div class="col-lg-5">
                     <div class="anime__details__text">
                         <div class="anime__details__title">
                             <h3><?= $article['judul'] ?></h3>
                             <span>フェイト／ステイナイト, Feito／sutei naito</span>
                         </div>
                         <div class="anime__details__rating">
                             <div class="rating">
                                 <a href="#"><i class="fa fa-star"></i></a>
                                 <a href="#"><i class="fa fa-star"></i></a>
                                 <a href="#"><i class="fa fa-star"></i></a>
                                 <a href="#"><i class="fa fa-star"></i></a>
                                 <a href="#"><i class="fa fa-star-half-o"></i></a>
                             </div>
                             <span>1.029 Votes</span>
                         </div>
                         <p><?= $article['isi'] ?></p>
                         <div class="anime__details__widget">
                             <div class="row">
                                 <div class="col-lg-6 col-md-6">
                                     <ul>
                                         <li><span>Type:</span> <?= $article['kategori'] ?></li>
                                         <li><span>Studios:</span> <?= $article['kategori'] ?></li>
                                         <li><span>Date aired:</span> Oct 02, 2019 to ?</li>
                                         <li><span>Status:</span> Airing</li>
                                         <li><span>Genre:</span> <?= $article['genre1'] ?>, <?= $article['genre2'] ?>, <?= $article['genre3'] ?></li>
                                     </ul>
                                 </div>
                                 <div class="col-lg-6 col-md-6">
                                     <ul>
                                         <li><span>Scores:</span> 7.31 / 1,515</li>
                                         <li><span>Rating:</span> <?= $article['rating'] ?> / 161 times</li>
                                         <li><span>Duration:</span> 24 min/ep</li>
                                         <li><span>Quality:</span> HD</li>
                                         <li><span>Views:</span> <?= $article['hit'] ?></li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                         <div class="anime__details__btn">
                             <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</a>
                             <a href="#" class="watch-btn"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-lg-8 col-md-8">
                 <div class="anime__details__review">
                     <div class="section-title">
                         <h5>Reviews</h5>
                     </div>
                     <div class="anime__review__item">
                         <div class="anime__review__item__pic">
                             <img src="img/anime/review-1.jpg" alt="">
                         </div>
                         <div class="anime__review__item__text">
                             <h6>Chris Curry - <span>1 Hour ago</span></h6>
                             <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                 "demons" LOL</p>
                         </div>
                     </div>
                     <div class="anime__review__item">
                         <div class="anime__review__item__pic">
                             <img src="img/anime/review-2.jpg" alt="">
                         </div>
                         <div class="anime__review__item__text">
                             <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                             <p>Finally it came out ages ago</p>
                         </div>
                     </div>
                     <div class="anime__review__item">
                         <div class="anime__review__item__pic">
                             <img src="img/anime/review-3.jpg" alt="">
                         </div>
                         <div class="anime__review__item__text">
                             <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                             <p>Where is the episode 15 ? Slow update! Tch</p>
                         </div>
                     </div>
                     <div class="anime__review__item">
                         <div class="anime__review__item__pic">
                             <img src="img/anime/review-4.jpg" alt="">
                         </div>
                         <div class="anime__review__item__text">
                             <h6>Chris Curry - <span>1 Hour ago</span></h6>
                             <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                 "demons" LOL</p>
                         </div>
                     </div>
                     <div class="anime__review__item">
                         <div class="anime__review__item__pic">
                             <img src="img/anime/review-5.jpg" alt="">
                         </div>
                         <div class="anime__review__item__text">
                             <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                             <p>Finally it came out ages ago</p>
                         </div>
                     </div>
                     <div class="anime__review__item">
                         <div class="anime__review__item__pic">
                             <img src="img/anime/review-6.jpg" alt="">
                         </div>
                         <div class="anime__review__item__text">
                             <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                             <p>Where is the episode 15 ? Slow update! Tch</p>
                         </div>
                     </div>
                 </div>
                 <div class="anime__details__form">
                     <div class="section-title">
                         <h5>Your Comment</h5>
                     </div>
                     <form action="#">
                         <textarea placeholder="Your Comment"></textarea>
                         <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                     </form>
                 </div>
             </div>
             <div class="col-lg-4 col-md-4">
                 <div class="anime__details__sidebar">
                     <div class="section-title">
                         <h5>you might like...</h5>
                     </div>
                     <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-1.jpg">
                         <div class="ep">18 / ?</div>
                         <div class="view"><i class="fa fa-eye"></i> 9141</div>
                         <h5><a href="#">Boruto: Naruto next generations</a></h5>
                     </div>
                     <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-2.jpg">
                         <div class="ep">18 / ?</div>
                         <div class="view"><i class="fa fa-eye"></i> 9141</div>
                         <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                     </div>
                     <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-3.jpg">
                         <div class="ep">18 / ?</div>
                         <div class="view"><i class="fa fa-eye"></i> 9141</div>
                         <h5><a href="#">Sword art online alicization war of underworld</a></h5>
                     </div>
                     <div class="product__sidebar__view__item set-bg" data-setbg="img/sidebar/tv-4.jpg">
                         <div class="ep">18 / ?</div>
                         <div class="view"><i class="fa fa-eye"></i> 9141</div>
                         <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Anime Section End -->


 <!-- Anime Section Begin -->
 <!--<section class="anime-details spad">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <?php $article = $single_artikel ?>

                 <div class="anime__video__player">

                     <?php if ($article['gambar'] && is_file(LOKASI_FOTO_ARTIKEL . 'kecil_' . $article['gambar'])) : ?>
                         <iframe width="100%" height="550px" src="https://www.youtube.com/embed/<?= $article['link_trailer'] ?>" title="<?= $article['judul'] ?>" frameborder="0" allow="accelerometer; 
							autoplay; clipboard-write; encrypted-media; gyroscope; 
							picture-in-picture" allowfullscreen>
                         </iframe>
                     <?php endif ?>
                 
                 <div class="section-title">
                     <h4><?= $article['judul'] ?> - <?= $article['tahun'] ?></h4>
                     <P><?= $article['isi'] ?></p>
                 </div>
                </div>
                 <div class="anime__details__episodes">
                     <div class="section-title">
                         <h5>List Name</h5>
                     </div>
                     <a href="#">Ep 01</a>
                     <a href="#">Ep 02</a>
                     <a href="#">Ep 03</a>
                     <a href="#">Ep 04</a>
                     <a href="#">Ep 05</a>
                     <a href="#">Ep 06</a>
                     <a href="#">Ep 07</a>
                     <a href="#">Ep 08</a>
                     <a href="#">Ep 09</a>
                     <a href="#">Ep 10</a>
                     <a href="#">Ep 11</a>
                     <a href="#">Ep 12</a>
                     <a href="#">Ep 13</a>
                     <a href="#">Ep 14</a>
                     <a href="#">Ep 15</a>
                     <a href="#">Ep 16</a>
                     <a href="#">Ep 17</a>
                     <a href="#">Ep 18</a>
                     <a href="#">Ep 19</a>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-lg-8">
                 <div class="anime__details__review">
                     <div class="section-title">
                         <h5>Reviews</h5>
                     </div>
                     <div class="anime__review__item">
                         <div class="anime__review__item__pic">
                             <img src="img/anime/review-1.jpg" alt="">
                         </div>
                         <div class="anime__review__item__text">
                             <h6>Chris Curry - <span>1 Hour ago</span></h6>
                             <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                 "demons" LOL</p>
                         </div>
                     </div>
                     <div class="anime__review__item">
                         <div class="anime__review__item__pic">
                             <img src="img/anime/review-2.jpg" alt="">
                         </div>
                         <div class="anime__review__item__text">
                             <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                             <p>Finally it came out ages ago</p>
                         </div>
                     </div>
                     <div class="anime__review__item">
                         <div class="anime__review__item__pic">
                             <img src="img/anime/review-3.jpg" alt="">
                         </div>
                         <div class="anime__review__item__text">
                             <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                             <p>Where is the episode 15 ? Slow update! Tch</p>
                         </div>
                     </div>
                     <div class="anime__review__item">
                         <div class="anime__review__item__pic">
                             <img src="img/anime/review-4.jpg" alt="">
                         </div>
                         <div class="anime__review__item__text">
                             <h6>Chris Curry - <span>1 Hour ago</span></h6>
                             <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                 "demons" LOL</p>
                         </div>
                     </div>
                     <div class="anime__review__item">
                         <div class="anime__review__item__pic">
                             <img src="img/anime/review-5.jpg" alt="">
                         </div>
                         <div class="anime__review__item__text">
                             <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                             <p>Finally it came out ages ago</p>
                         </div>
                     </div>
                     <div class="anime__review__item">
                         <div class="anime__review__item__pic">
                             <img src="img/anime/review-6.jpg" alt="">
                         </div>
                         <div class="anime__review__item__text">
                             <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                             <p>Where is the episode 15 ? Slow update! Tch</p>
                         </div>
                     </div>
                 </div>
                 <div class="anime__details__form">
                     <div class="section-title">
                         <h5>Your Comment</h5>
                     </div>
                     <form action="#">
                         <textarea placeholder="Your Comment"></textarea>
                         <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Anime Section End -->