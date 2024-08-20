// topに戻るボタンのクリック
$(function () {
  $('.to-top a').on('click', function () {
    $('body,html').animate({
      scrollTop: 0
    }, 500);
    return false;
  });

  //スムーススクロール
  $('a[href^="#"]').click(function () {
    let href = $(this).attr("href");
    let target = $(href == "#" || href == "" ? 'html' : href);
    let position = target.offset().top;
    $("html,body").animate({ scrollTop: position }, 500, "swing");
    return false;
  });

  //セクションのフェードイン
  //メイン画像
  $(window).scroll(function () {
    $('.content .main-flex .main-photo img').each(function () {
      var position = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > position - windowHeight + 200) {
        $(this).addClass('fadein');
      }
      if (scroll == 0) {
        $(this).remove('fadein');
      }
    });
  });

  //ロゴ下の文章フェードイン
  $(window).scroll(function () {
    $('.content .main-flex .main-example').each(function () {
      var position = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > position - windowHeight + 150) {
        $(this).addClass('text-in');
      }
      if (scroll == 0) {
        $(this).remove('text-in');
      }
    });
  });

  //ロゴ一覧の文章
  $(window).scroll(function () {
    $('.explain').each(function () {
      var position = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > position - windowHeight + 200) {
        $(this).addClass('explain-in');
      }
      if (scroll == 0) {
        $(this).remove('explain-in');
      }
    });
  });

  //ロゴ一覧
  $(window).scroll(function () {
    $('.logo-flex div img').each(function () {
      var position = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > position - windowHeight + 200) {
        $(function () {
          $('.logo-flex div img').each(function (i) {
            $(this).delay(i * 200).queue(function () {
              $(this).addClass('active');
            });
          });
        });
      }
    });
  });

  //naviの表示制御
  $(window).scroll(function () {
    // スクロール位置を取得
    let scroll = $(window).scrollTop();
    // スクロール位置を超えた場合
    if (scroll < 2500) {
      // fadeInで表示する
      $('.header').fadeIn(400);
      // スクロール位置が未満の場合
    } else {
      // fadeOutで非表示にする
      $('.header').fadeOut(400);
    }
  });

  //nav
  $(".btn").click(function () {//ボタンがクリックされたら
    $(this).toggleClass('active');
    $(".close-btn").toggleClass('active');
    $('body,html').css('overflow-y', 'hidden');
    return false
  });
  $(".close-btn p").click(function () {
    $(".btn").removeClass('active');//ボタンの activeクラスを除去し
    $(".close-btn").removeClass('active');
    $('body,html').css('overflow-y', 'visible');
    return false
  });

  //mainvisual
  $(".slider").slick({
    autoplay: true, // 自動でスクロール
    autoplaySpeed: 0, // 自動再生のスライド切り替えまでの時間を設定
    speed: 5000, // スライドが流れる速度を設定
    cssEase: "ease", // スライドの流れ方を等速に設定
    slidesToShow: 1, // 表示するスライドの数
    swipe: false, // 操作による切り替えはさせない
    arrows: false, // 矢印非表示
    pauseOnFocus: false, // スライダーをフォーカスした時にスライドを停止させるか
    pauseOnHover: false, // スライダーにマウスホバーした時にスライドを停止させるか
    responsive: [
      {
        breakpoint: 750,
        settings: {
          slidesToShow: 3, // 画面幅750px以下でスライド3枚表示
        }
      }
    ]
  });





});


