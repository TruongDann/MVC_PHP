<!-- content -->
<section class="py-5">
  <div class="container">
    <div class="row gx-5">
      <aside class="col-lg-6">
        <div class="border rounded-4 mb-3 d-flex justify-content-center">
          <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big.webp">
            <img style="max-width: 100%; max-height: 80vh; margin: auto;" class="rounded-4 fit" src="<?= _WEB_ROOT; ?>/public/uploads/products/2023_10/{{$product['thumbnail']}}" />
          </a>
        </div>

        <!-- thumbs-wrap<?= _WEB_ROOT; ?>/public/assets/client// -->
        <!-- gallery-wrap .end// -->
      </aside>

      <main class="col-lg-6">
        <div class="ps-lg-3 text-light">
          <h4 class="title">
            {{$product['name']}}
          </h4>
          <div class="d-flex flex-row my-3">
            <div class="text-warning mb-1 me-2">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
              <span class="ms-1">
                4.5
              </span>
            </div>
            <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 lượt đặt hàng</span>
          </div>

          <div class="mb-3">
            <span class="h5">{{number_format($product['price'])}}</span>
            <span class="text-muted">/Sản Phẩm</span>
          </div>

          <p>
            {{$product['content']}}
          </p>


          <hr />


          <!-- col<?= _WEB_ROOT; ?>/public/assets/client// -->
          <form action="<?= _WEB_ROOT; ?>cart/addToCart?id={{$product['id']}}">
            <div class="col-md-4 col-6 mb-3">
              <label class="mb-2 d-block">Quantity</label>
              <div class="input-group mb-3" style="width: 170px;">
                <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon1" data-mdb-ripple-color="dark">
                  <i class="fas fa-minus"></i>
                </button>
                <input type="number" name="quality" class="form-control text-center border border-secondary" placeholder="0" required />
                <input type="hidden" value="{{$product['id']}}" name="id">
                <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
            </div>
        </div>
        <a href="#" class="btn btn-warning shadow-0"> Buy now </a>
        <button type="submit" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </button>
        <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Save </a>
    </div>
    </form>
    </main>

  </div>
  </div>
</section>
<!-- content -->

<section class="py-4">
  <div class="container">
    <div class="row gx-4">
      <div class="col-lg-8 mb-4">
        <div class="border rounded-2 px-3 py-2 bg-white">
          <!-- Pills navs -->
          <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item d-flex" role="presentation">
              <a class="nav-link d-flex align-items-center justify-content-center w-100 active" id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab" aria-controls="ex1-pills-1" aria-selected="true">Specification</a>
            </li>
            <li class="nav-item d-flex" role="presentation">
              <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-2" data-mdb-toggle="pill" href="#ex1-pills-2" role="tab" aria-controls="ex1-pills-2" aria-selected="false">Warranty info</a>
            </li>
            <li class="nav-item d-flex" role="presentation">
              <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-3" data-mdb-toggle="pill" href="#ex1-pills-3" role="tab" aria-controls="ex1-pills-3" aria-selected="false">Shipping info</a>
            </li>
            <li class="nav-item d-flex" role="presentation">
              <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-4" data-mdb-toggle="pill" href="#ex1-pills-4" role="tab" aria-controls="ex1-pills-4" aria-selected="false">Seller profile</a>
            </li>
          </ul>
          <!-- Pills navs -->

          <!-- Pills content -->
          <div class="tab-content" id="ex1-content">
            <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
              <p>
                With supporting text below as a natural lead-in to additional content. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                pariatur.
              </p>
              <div class="row mb-2">
                <div class="col-12 col-md-6">
                  <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-check text-success me-2"></i>Some great feature name here</li>
                    <li><i class="fas fa-check text-success me-2"></i>Lorem ipsum dolor sit amet, consectetur</li>
                    <li><i class="fas fa-check text-success me-2"></i>Duis aute irure dolor in reprehenderit</li>
                    <li><i class="fas fa-check text-success me-2"></i>Optical heart sensor</li>
                  </ul>
                </div>
                <div class="col-12 col-md-6 mb-0">
                  <ul class="list-unstyled">
                    <li><i class="fas fa-check text-success me-2"></i>Easy fast and ver good</li>
                    <li><i class="fas fa-check text-success me-2"></i>Some great feature name here</li>
                    <li><i class="fas fa-check text-success me-2"></i>Modern style and design</li>
                  </ul>
                </div>
              </div>
              <table class="table border mt-3 mb-2">
                <tr>
                  <th class="py-2">Display:</th>
                  <td class="py-2">13.3-inch LED-backlit display with IPS</td>
                </tr>
                <tr>
                  <th class="py-2">Processor capacity:</th>
                  <td class="py-2">2.3GHz dual-core Intel Core i5</td>
                </tr>
                <tr>
                  <th class="py-2">Camera quality:</th>
                  <td class="py-2">720p FaceTime HD camera</td>
                </tr>
                <tr>
                  <th class="py-2">Memory</th>
                  <td class="py-2">8 GB RAM or 16 GB RAM</td>
                </tr>
                <tr>
                  <th class="py-2">Graphics</th>
                  <td class="py-2">Intel Iris Plus Graphics 640</td>
                </tr>
              </table>
            </div>
            <div class="tab-pane fade mb-2" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
              Tab content or sample information now <br />
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
              aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
              officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
              nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            </div>
            <div class="tab-pane fade mb-2" id="ex1-pills-3" role="tabpanel" aria-labelledby="ex1-tab-3">
              Another tab content or sample information now <br />
              Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
              commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
              mollit anim id est laborum.
            </div>
            <div class="tab-pane fade mb-2" id="ex1-pills-4" role="tabpanel" aria-labelledby="ex1-tab-4">
              Some other tab content or sample information now <br />
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
              aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
              officia deserunt mollit anim id est laborum.
            </div>
          </div>
          <!-- Pills content -->
        </div>
      </div>
      <div class="col-lg-4">
        <div class="px-0 border rounded-2 shadow-0">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Similar items</h5>
              <div class="d-flex mb-3">
                <a href="#" class="me-3">
                  <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/8.webp" style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                </a>
                <div class="info">
                  <a href="#" class="nav-link mb-1">
                    Rucksack Backpack Large <br />
                    Line Mounts
                  </a>
                  <strong class="text-dark"> $38.90</strong>
                </div>
              </div>

              <div class="d-flex mb-3">
                <a href="#" class="me-3">
                  <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/9.webp" style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                </a>
                <div class="info">
                  <a href="#" class="nav-link mb-1">
                    Summer New Men's Denim <br />
                    Jeans Shorts
                  </a>
                  <strong class="text-dark"> $29.50</strong>
                </div>
              </div>

              <div class="d-flex mb-3">
                <a href="#" class="me-3">
                  <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/10.webp" style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                </a>
                <div class="info">
                  <a href="#" class="nav-link mb-1"> T-shirts with multiple colors, for men and lady </a>
                  <strong class="text-dark"> $120.00</strong>
                </div>
              </div>

              <div class="d-flex">
                <a href="#" class="me-3">
                  <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/11.webp" style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                </a>
                <div class="info">
                  <a href="#" class="nav-link mb-1"> Blazer Suit Dress Jacket for Men, Blue color </a>
                  <strong class="text-dark"> $339.90</strong>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="comments">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="fw-bold text-dark mb-1">Review</h3>
          </div>
          <div class="card-body">
          @foreach ($comments as $comment)
    <div class="d-flex flex-start align-items-center">
        <img class="rounded-circle shadow-1-strong me-3" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="60" height="60" />
        <div>
            <h6 class="text-xxs fw-bold text-primary mb-1">{{$comment['name']}}</h6>
            <p class="text-muted small mb-0">
                Shared publicly - Jan 2020
            </p>
        </div>
    </div>

    <p class="mt-3 mb-4 pb-2">
        {{$comment['content']}}
    </p>

    <div class="small d-flex justify-content-start mb-4">
        <a href="#!" class="d-flex align-items-center me-3">
            <i class="far fa-thumbs-up me-2"></i>
            <p class="mb-0">Like</p>
        </a>
        <a href="#comment-input" class="d-flex align-items-center me-3 comment-link" data-id="{{$comment['id']}}">
            <i class="far fa-comment-dots me-2"></i>
            <p class="mb-0">Comment</p>
        </a>
        <a href="#!" class="d-flex align-items-center me-3">
            <i class="fas fa-share me-2"></i>
            <p class="mb-0">Share</p>
        </a>
    </div>

    <?php
    $comments_with_matching_id_reply = array();

    foreach ($comments_reply as $reply) {
        if ($reply['id_reply'] == $comment['id']) {
            $comments_with_matching_id_reply[] = $reply;
        }
    }
    ?>

    @foreach ($comments_with_matching_id_reply as $comment_info)
        <div class="d-flex flex-start align-items-center mx-3">
            <img class="rounded-circle shadow-1-strong me-3" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40" height="40" />
            <div>
                <h6 class="fw-bold text-primary mb-1">{{ $comment_info['name'] }}</h6>
                <p class="text-muted small mb-0">
                    Shared publicly - Jan 2020
                </p>
            </div>
        </div>

        <p class="mt-3 mb-4 pb-2 mx-3">
            {{ $comment_info['content'] }}
        </p>
        <div class="small d-flex justify-content-start mb-4 mx-3">
            <a href="#!" class="d-flex align-items-center me-3">
                <i class="far fa-thumbs-up me-2"></i>
                <p class="mb-0">Like</p>
            </a>
            <a href="#comment-input" class="d-flex align-items-center me-3 comment-link" data-id="{{ $comment_info['id'] }}">
                <i class="far fa-comment-dots me-2"></i>
                <p class="mb-0">Comment</p>
            </a>
            <a href="#!" class="d-flex align-items-center me-3">
                <i class="fas fa-share me-2"></i>
                <p class="mb-0">Share</p>
            </a>
        </div>
    @endforeach
@endforeach
          </div>
          <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
            <form method="post" class="form-outline" action="<?= _WEB_ROOT . 'comments/post_comment'; ?>">
              <div class="d-flex flex-start w-100">
                <img class="rounded-circle shadow-1-strong me-3" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40" height="40" />
                <input type="hidden" name="id_product" value="{{$product['id']}}">
                <div class="w-100">
                  <input type="hidden" name="id_reply" value="">
                  <textarea class="form-control" id="comment-input" rows="4" style="background: #fff;" name="content"></textarea>
                  <label class="form-label" for="comment-input">Message</label>
                </div>
              </div>
              <div class="float-end mt-2 pt-1">
                <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
                <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>