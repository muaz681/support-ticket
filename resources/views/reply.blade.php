<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="app.css">
    <title>Ticket Reply</title>
    <style>
        body  {
              font-family: 'Times New Roman', serif;
              }

          textarea.form-control
          {
          height: auto;
          width: 700px;
          }

          .left
          {
            margin-left:auto;
          }

          .form-left
          {
               margin-left: 40px;
          }

          .row {
          display: -ms-flexbox;
          display: flex;
          -ms-flex-wrap: wrap;
          flex-wrap: wrap;
          margin-right: 25px;
          margin-left: 0px;
          }

          img{

            margin-left:15px;

          }


            .animated {
              -webkit-transition: height 0.2s;
              -moz-transition: height 0.2s;
              transition: height 0.2s;
          }

          .stars
          {
              margin: 20px 0;
              font-size: 24px;
              color: #d17581;
          }
            textarea.form-control {
            height: auto;
            width: 475px;
          }


    </style>

 </head>

  <body style="margin-top: 30px; margin-left: 200px;">


    <main class="content">
      <div class="container p-0">
        <h1 class="h3 mb-3">Ticket No #{{$data->id}}</h1><span style="color:rgb(138, 24, 24)">{{ $data->subject }}</span><hr>
          <div class="col-12 col-lg-7 col-xl-9">
            <div class="position-relative">
              <div class="chat-messages p-6">

                @foreach ($admin_reply as $item)
                <div class="chat-message-left pb-4">
                  <div class="row">

                      @if ($item->role == 'Admin')

                       <div class="col-md-6">
                        <div class="row">
                          <div class="">
                            <img src="{{asset('avatar/avatar1.png')}}" class="rounded-circle mr-1" alt="Admin" width="40" height="40">
                          </div>
                          <div class="col-lg-8">
                          <div class="text-muted small text-nowrap mt-2"><b><strong>{{$item->role}}</strong></b> {{$item->created_at}}</div>
                            {{$item->message}}<br>
                          </div>
                        </div>

                        @if($item->attachment)

                        @php
                        $i = 1;
                        $file_name = $item->attachment;
                        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
                        @endphp

                            @if($extension == 'jpg' || $extension == 'png')

                            @foreach(explode('|',$item->attachment) as $image)
                            <div class="row">
                              <a style="margin-left: 70px" href="{{url('show/')}}?image={{$image}}">Attachment{{$i++}}</a>
                            </div>
                            @endforeach

                            @elseif ($extension == 'txt' || $extension == 'pdf')

                            @foreach(explode('|',$item->attachment) as $image)
                            <div class="row">
                                <a style="margin-left: 70px" href="{{url('show/')}}?image={{$image}}"> Attachment{{$i++}}</a>
                            </div>
                            @endforeach

                            @endif

                        @endif

                      </div>

                      @else

                      <div class="col-md-6 left">
                        <div class="row">
                          <div class="col-lg-8">
                            <div class="text-muted small text-nowrap mt-2"><b><strong>{{$item->role}}</strong></b> {{$item->created_at}}</div>
                            {{$item->message}}<br>
                          </div>
                          <div class="">
                            <img src="{{asset('avatar/avatar4.png')}}" class="rounded-circle mr-1" alt="Member" width="40" height="40" style="margin-right: 20px;">
                          </div>
                        </div>

                        @php
                        $i = 1;
                        $file_name = $item->attachment;
                        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
                        @endphp

                      @if($extension == 'jpg' || $extension == 'png')

                      @foreach(explode('|',$item->attachment) as $image)
                      <div class="row">
                        <a style="margin-left: 15px" href="{{url('show/')}}?image={{$image}}">Attachment{{$i++}}</a>
                      </div>
                      @endforeach

                      @elseif ($extension == 'txt' || $extension == 'pdf')

                      @foreach(explode('|',$item->attachment) as $image)
                      <div class="row">
                          <a style="margin-left: 15px" href="{{url('show/')}}?image={{$image}}"> Attachment{{$i++}}</a>
                      </div>
                      @endforeach
                       
                      
                       @endif

                       </div>

                       @endif
                   </div>
                  </div>

                  @endforeach

                  @if($data->status !== 'Closed')

                      <form class="form-left" action="{{url('user/reply/'.$data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group purple-border">
                              <label for="exampleFormControlTextarea4">Reply</label>
                              <textarea name="message" class="form-control" id="exampleFormControlTextarea4" rows="2" placeholder="Message"></textarea>
                            </div>

                            <div class="form-group">
                              <label for="exampleFormControlFile1">Attachments</label><br>
                              <input type="file" accept=".jpg,.png,.pdf,.txt" name="attachment[]"  multiple>
                            </div>

                            <button type="submit" class="btn btn-success">Send</button>
                      </form>


                  @else


                      @if($rating)

                      <div class="container">
                        <div class="row" style="margin-top:40px;">
                          <div class="col-md-6">
                            <div class="well well-sm">
                                  <div class="text-right">
                                      <a class="btn btn-success btn-green" href="#reviews-anchor" id="open-review-box">See Review</a>
                                  </div>

                                  <div class="row" id="post-review-box" style="display:none;">
                                        <div class="col-md-6">
                                                <td>{{$rating->comment}}</td>
                                                    <div class="text-right">
                                                        <div class="stars starrrr" name="value" data-rating={{$rating->value}}></div>
                                                          <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                                                        <span class="glyphicon glyphicon-remove"></span>Closed</a>
                                                  </div>
                                        </div>
                                  </div>
                            </div>
                          </div>
                        </div>
                      </div>

                     @else

                     <div class="container">
                      <div class="row" style="margin-top:40px;">
                        <div class="col-md-6">
                          <div class="well well-sm">
                                <div class="text-right">
                                    <a class="btn btn-success btn-green" href="#reviews-anchor" id="open-review-box">Leave a Review</a>
                                </div>

                                <div class="row" id="post-review-box" style="display:none;">
                                    <div class="col-md-12">
                                        <form accept-charset="UTF-8" action="{{url('rating/'.$data->id)}}" method="post">
                                         
                                          @csrf
                                            <input id="ratings-hidden" name="rating" type="hidden">
                                            <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." rows="5"></textarea>

                                            <div class="text-right">
                                                <div class="stars starrr" data-rating="0"></div>
                                                <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                                                <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                                                <button class="btn btn-success btn-lg" type="submit">Save</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                          </div>
                        </div>
                      </div>
                    </div>
              @endif
            @endif
          </div>
         </div>
       </div>
     </div>
   </main>
   <script>
      (function(e) { var t, o = { className: "autosizejs", append: "", callback: !1, resizeDelay: 10 },
         i = '<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',
         n = ["fontFamily", "fontSize", "fontWeight", "fontStyle", "letterSpacing", "textTransform", "wordSpacing", "textIndent"],
         s = e(i).data("autosize", !0)[0];
     s.style.lineHeight = "99px", "99px" === e(s).css("lineHeight") && n.push("lineHeight"), s.style.lineHeight = "", e.fn.autosize = function(i) { return this.length ? (i = e.extend({}, o, i || {}), s.parentNode !== document.body && e(document.body).append(s), this.each(function() {
             function o() { var t, o; "getComputedStyle" in window ? (t = window.getComputedStyle(u, null), o = u.getBoundingClientRect().width, e.each(["paddingLeft", "paddingRight", "borderLeftWidth", "borderRightWidth"], function(e, i) { o -= parseInt(t[i], 10) }), s.style.width = o + "px") : s.style.width = Math.max(p.width(), 0) + "px" }

             function a() { var a = {}; if (t = u, s.className = i.className, d = parseInt(p.css("maxHeight"), 10), e.each(n, function(e, t) { a[t] = p.css(t) }), e(s).css(a), o(), window.chrome) { var r = u.style.width;
                     u.style.width = "0px", u.offsetWidth, u.style.width = r } }

             function r() { var e, n;
                 t !== u ? a() : o(), s.value = u.value + i.append, s.style.overflowY = u.style.overflowY, n = parseInt(u.style.height, 10), s.scrollTop = 0, s.scrollTop = 9e4, e = s.scrollTop, d && e > d ? (u.style.overflowY = "scroll", e = d) : (u.style.overflowY = "hidden", c > e && (e = c)), e += w, n !== e && (u.style.height = e + "px", f && i.callback.call(u, u)) }

             function l() { clearTimeout(h), h = setTimeout(function() { var e = p.width();
                     e !== g && (g = e, r()) }, parseInt(i.resizeDelay, 10)) } var d, c, h, u = this,
                 p = e(u),
                 w = 0,
                 f = e.isFunction(i.callback),
                 z = { height: u.style.height, overflow: u.style.overflow, overflowY: u.style.overflowY, wordWrap: u.style.wordWrap, resize: u.style.resize },
                 g = p.width();
             p.data("autosize") || (p.data("autosize", !0), ("border-box" === p.css("box-sizing") || "border-box" === p.css("-moz-box-sizing") || "border-box" === p.css("-webkit-box-sizing")) && (w = p.outerHeight() - p.height()), c = Math.max(parseInt(p.css("minHeight"), 10) - w || 0, p.height()), p.css({ overflow: "hidden", overflowY: "hidden", wordWrap: "break-word", resize: "none" === p.css("resize") || "vertical" === p.css("resize") ? "none" : "horizontal" }), "onpropertychange" in u ? "oninput" in u ? p.on("input.autosize keyup.autosize", r) : p.on("propertychange.autosize", function() { "value" === event.propertyName && r() }) : p.on("input.autosize", r), i.resizeDelay !== !1 && e(window).on("resize.autosize", l), p.on("autosize.resize", r), p.on("autosize.resizeIncludeStyle", function() { t = null, r() }), p.on("autosize.destroy", function() { t = null, clearTimeout(h), e(window).off("resize", l), p.off("autosize").off(".autosize").css(z).removeData("autosize") }), r()) })) : this } })(window.jQuery || window.$);

      var __slice = [].slice;
      (function(e, t) { var n;
          n = function() {
              function t(t, n) { var r, i, s, o = this;
                  this.options = e.extend({}, this.defaults, n);
                  this.$el = t;
                  s = this.defaults; for (r in s) { i = s[r]; if (this.$el.data(r) != null) { this.options[r] = this.$el.data(r) } }
                  this.createStars();
                  this.syncRating();
                  this.$el.on("mouseover.starrr", "span", function(e) { return o.syncRating(o.$el.find("span").index(e.currentTarget) + 1) });
                  this.$el.on("mouseout.starrr", function() { return o.syncRating() });
                  this.$el.on("click.starrr", "span", function(e) { return o.setRating(o.$el.find("span").index(e.currentTarget) + 1) });
                  this.$el.on("starrr:change", this.options.change) }
              t.prototype.defaults = { rating: void 0, numStars: 5, change: function(e, t) {} };
              t.prototype.createStars = function() { var e, t, n;
                  n = []; for (e = 1, t = this.options.numStars; 1 <= t ? e <= t : e >= t; 1 <= t ? e++ : e--) { n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>")) } return n };
              t.prototype.setRating = function(e) { if (this.options.rating === e) { e = void 0 }
                  this.options.rating = e;
                  this.syncRating(); return this.$el.trigger("starrr:change", e) };
              t.prototype.syncRating = function(e) { var t, n, r, i;
                  e || (e = this.options.rating); if (e) { for (t = n = 0, i = e - 1; 0 <= i ? n <= i : n >= i; t = 0 <= i ? ++n : --n) { this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star") } } if (e && e < 5) { for (t = r = e; e <= 4 ? r <= 4 : r >= 4; t = e <= 4 ? ++r : --r) { this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty") } } if (!e) { return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty") } }; return t }(); return e.fn.extend({ starrr: function() { var t, r;
                  r = arguments[0], t = 2 <= arguments.length ? __slice.call(arguments, 1) : []; return this.each(function() { var i;
                      i = e(this).data("star-rating"); if (!i) { e(this).data("star-rating", i = new n(e(this), r)) } if (typeof r === "string") { return i[r].apply(i, t) } }) } }) })(window.jQuery, window);
      $(function() { return $(".starrr").starrr() })
      var __slice = [].slice;
      (function(e, t) { var n;
          n = function() {
              function t(t, n) { var r, i, s, o = this;
                  this.options = e.extend({}, this.defaults, n);
                  this.$el = t;
                  s = this.defaults; for (r in s) { i = s[r]; if (this.$el.data(r) != null) { this.options[r] = this.$el.data(r) } }
                  this.createStars();
                  this.syncRating();
                  this.$el.on("starrrr:change", this.options.change) }
              t.prototype.defaults = { rating: void 0, numStars: 5, change: function(e, t) {} };
              t.prototype.createStars = function() { var e, t, n;
                  n = []; for (e = 1, t = this.options.numStars; 1 <= t ? e <= t : e >= t; 1 <= t ? e++ : e--) { n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>")) } return n };
              t.prototype.setRating = function(e) { if (this.options.rating === e) { e = void 0 }
                  this.options.rating = e;
                  this.syncRating(); return this.$el.trigger("starrrr:change", e) };
              t.prototype.syncRating = function(e) { var t, n, r, i;
                  e || (e = this.options.rating); if (e) { for (t = n = 0, i = e - 1; 0 <= i ? n <= i : n >= i; t = 0 <= i ? ++n : --n) { this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star") } } if (e && e < 5) { for (t = r = e; e <= 4 ? r <= 4 : r >= 4; t = e <= 4 ? ++r : --r) { this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty") } } if (!e) { return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty") } }; return t }(); return e.fn.extend({ starrrr: function() { var t, r;
                  r = arguments[0], t = 2 <= arguments.length ? __slice.call(arguments, 1) : []; return this.each(function() { var i;
                      i = e(this).data("star-rating"); if (!i) { e(this).data("star-rating", i = new n(e(this), r)) } if (typeof r === "string") { return i[r].apply(i, t) } }) } }) })(window.jQuery, window);
      $(function() { return $(".starrrr").starrrr() })

      $(function() {

          $('#new-review').autosize({ append: "\n" });

          var reviewBox = $('#post-review-box');
          var newReview = $('#new-review');
          var openReviewBtn = $('#open-review-box');
          var closeReviewBtn = $('#close-review-box');
          var ratingsField = $('#ratings-hidden');

          openReviewBtn.click(function(e) {
              reviewBox.slideDown(400, function() {
                  $('#new-review').trigger('autosize.resize');
                  newReview.focus();
              });
              openReviewBtn.fadeOut(100);
              closeReviewBtn.show();
          });

          closeReviewBtn.click(function(e) {
              e.preventDefault();
              reviewBox.slideUp(300, function() {
                  newReview.focus();
                  openReviewBtn.fadeIn(200);
              });
              closeReviewBtn.hide();

          });

          $('.starrr').on('starrr:change', function(e, value) {
              ratingsField.val(value);
          });
      });
   </script>
 </body>
</html>
