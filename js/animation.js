//animation.html内のアニメーション
window.addEventListener("DOMContentLoaded", () => {
  // 星を表示するための親要素を取得
  const stars = document.querySelector(".stars");

  // 星を生成する関数
  const createStar = () => {
    const starEl = document.createElement("span");
    starEl.className = "star";
    const minSize = 1; // 星の最小サイズを指定
    const maxSize = 2; // 星の最大サイズを指定
    const size = Math.random() * (maxSize - minSize) + minSize;
    starEl.style.width = `${size}px`;
    starEl.style.height = `${size}px`;
    starEl.style.left = `${Math.random() * 100}%`;
    starEl.style.top = `${Math.random() * 100}%`;
    starEl.style.animationDelay = `${Math.random() * 10}s`;
    stars.appendChild(starEl);
  };

  // for文で星を生成する関数を指定した回数呼び出す
  for (let i = 0; i <= 500; i++) {
    createStar();
  }

  //文章無限アニメーション
  //アニメーションの速度を計算してCSS変数に
  class Main {
    constructor() {
      this.init();
    }

    init() {
      this.copyText();
      this.calculateLoopAnimationSpeed();
      this.resizeRefresh();
    }

    //リサイズ時にアニメーションの速度を再計算
    resizeRefresh() {
      const target = document.body;
      const resizeObserver = new ResizeObserver((entries) => {
        entries.forEach((entry) => {
          this.calculateLoopAnimationSpeed();
        });
      });
      resizeObserver.observe(target);
    }

    //アニメーションの速度を計算してCSS変数に
    calculateLoopAnimationSpeed() {
      const targets = document.querySelectorAll('.js-tick');
      if (!targets.length) {
        return;
      }

      const distance = window.innerWidth;
      const mql = window.matchMedia('(min-width: 801px)');
      const time = mql.matches ? 18 : 9;
      const speed = distance / time;

      targets.forEach((target) => {
        const tickElems = target.querySelectorAll('.js-tick-item');
        if (!tickElems.length) {
          return;
        }

        const total = tickElems.length - 1;

        tickElems.forEach((el, i) => {
          const elWidth = el.clientWidth;
          const elTime = Math.floor(elWidth / speed);
          el.style.setProperty('--tick-duration', `${elTime}s`);
          el.style.setProperty('--tick-delay', `${elTime / -2}s`);

          if (i === total) {
            el.parentNode.classList.remove('no-tick');
          }
        });
      });
    }

    //テキストをコピーする
    copyText() {
      const targets = document.querySelectorAll('.js-tick');
      if (!targets.length) {
        return;
      }

      targets.forEach((target) => {
        const tickElems = target.querySelectorAll('.js-tick-item');
        if (!tickElems.length) {
          return;
        }

        let length = 0;
        tickElems.forEach((el) => {
          length += el.clientWidth;
          el.insertAdjacentHTML('afterend', el.outerHTML);
          if (length > window.innerWidth) {
            return;
          }
        });
      });
    }
  }

  new Main();



});


