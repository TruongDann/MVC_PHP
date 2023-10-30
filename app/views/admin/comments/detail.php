<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body px-0 pt-0 pb-2">
                <div class="d-flex justify-content-between mt-5 mx-4">
                    <div class="pb-3">
                        <h6>Chi Tiết Bình Luận</h6>
                    </div>
                </div>
                <div class="container mt-4">
                    <!-- Hiển thị danh sách bình luận -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-2">
                                <div class="card-body">
                                   
                                    <h6 class="card-title">Người dùng: {{$comment['name']}}</h6>
                                    <p class="card-text">{{$comment['content']}}</p>
                                    <p class="card-text">Thời gian: <?php
                                                                    $commentTime = strtotime($comment['created_at']);
                                                                    $currentTime = time();

                                                                    $timeDiff = $currentTime - $commentTime;

                                                                    if ($timeDiff < 60) {
                                                                        $timeAgo = $timeDiff . ' giây trước';
                                                                    } elseif ($timeDiff < 3600) {
                                                                        $timeAgo = floor($timeDiff / 60) . ' phút trước';
                                                                    } elseif ($timeDiff < 86400) {
                                                                        $timeAgo = floor($timeDiff / 3600) . ' giờ trước';
                                                                    } else {
                                                                        $timeAgo = floor($timeDiff / 86400) . ' ngày trước';
                                                                    }

                                                                    echo $timeAgo;
                                                                    ?></p>
                                    <!-- Nút trả lời bình luận -->
                                    <a href="#comment-input" class="btn btn-primary">Trả lời</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form trả lời bình luận -->
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <h6 class="card-title">Trả lời bình luận</h6>
                                    <form method="post" action="<?= _WEB_ROOT . 'comments/post_comment'; ?>">
                                        <div class="mb-3">
                                        <textarea class="form-control" id="comment-input" rows="4" style="background: #fff;" name="content"></textarea>
                                        <input type="hidden" name="id_reply" value="{{$comment['id']}}">
                                        <input type="hidden" name="id_product" value="{{$comment['id_product']}}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Gửi</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>