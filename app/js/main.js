if (window.innerWidth < 701) {
  document.querySelector(".header-nav").classList.add("mobile-menu");

  const menu = document.querySelector(".mobile-menu");

  function toggleMenu() {
    const btnToToggle = document.querySelector("#toggleNav");

    btnToToggle.addEventListener("click", (event) => {
      event.stopPropagation();

      let classes = menu.classList;

      if (classes.contains("active")) {
        classes.remove("active");
        setTimeout(() => {
          menu.style.display = "none";
        }, 290);
      } else {
        menu.style.display = "block";
        setTimeout(() => {
          classes.add("active");
        }, 14);
      }
    });
  }

  window.onclick = function (event) {
    if (!event.target.matches(".mobile-menu")) {
      menu.classList.remove("active");
      setTimeout(() => {
        menu.style.display = "none";
      }, 290);
    }
  };

  window.onscroll = function (event) {
    if (window.scrollY > 80) {
      menu.classList.remove("active");
      setTimeout(() => {
        menu.style.display = "none";
      }, 290);
    }
  };

  toggleMenu();
}

function gsapAnim() {
  gsap.registerPlugin(ScrollTrigger);

  gsap.to(".stage1 .left-content", {
    scrollTrigger: {
      trigger: ".stage1 .left-content",
      start: "top center",
      scrub: true,
    },
    x: 100,
    duration: 1,
  });

  gsap.to(".stage2 .right-content", {
    scrollTrigger: {
      trigger: ".stage2 .right-content",
      start: "top center",
      scrub: true,
    },
    x: -100,
    duration: 1,
  });

  gsap.to(".stage3 .left-content", {
    scrollTrigger: {
      trigger: ".stage3 .left-content",
      start: "top center",
      scrub: true,
    },
    x: 100,
    duration: 1,
  });

  gsap.to(".wine .right-content", {
    scrollTrigger: {
      trigger: ".wine .right-content",
      start: "top center",
      scrub: true,
    },
    x: -100,
    duration: 1,
  });

  gsap.to(".jars .left-content", {
    scrollTrigger: {
      trigger: ".jars .left-content",
      start: "top center",
      scrub: true,
    },
    x: 100,
    duration: 1,
  });

  gsap.to(".deluxe .right-content", {
    scrollTrigger: {
      trigger: ".deluxe .right-content",
      start: "top center",
      scrub: true,
    },
    x: -100,
    duration: 1,
  });

  gsap.from(".collection__inner-img", {
    scrollTrigger: {
      trigger: "#collection",

      start: "top center",
      end: "bottom bottom",
      scrub: true,
    },
    y: 500,
    duration: 3,
  });

  gsap.from(".collection__inner-text", {
    scrollTrigger: {
      trigger: "#collection",

      start: "top center",
      end: "bottom bottom",
      scrub: true,
    },
    y: -180,
    duration: 2,
  });
}

document.addEventListener("DOMContentLoaded", function (event) {
  if (window.innerWidth > 540) {
    gsapAnim();
  }
  if (window.innerWidth > 440) {
    AOS.init();
    document.querySelector(".AOSCss").setAttribute("href", "https://unpkg.com/aos@2.3.1/dist/aos.css");
  }
});
